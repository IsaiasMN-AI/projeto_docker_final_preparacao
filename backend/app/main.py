import os
from fastapi import FastAPI
import pymysql  # Importação do driver do MySQL

app = FastAPI(title="Projeto Final Preparatório")

@app.get("/")
def read_root():
    return {"mensagem": "A API está funcionando!"}

@app.get("/health")
def health_check():
    return {"status": "ok"}

@app.get("/info")
def get_info():
    ambiente = os.getenv("APP_ENV", "development")
    return {
        "app": "Projeto Final Preparatório",
        "ambiente": ambiente
    }

@app.get("/db-check")
def db_check():
    try:
        # Busca as variáveis de ambiente com os mesmos nomes sugeridos.
        # Nenhuma senha fica exposta no código.
        db_host = os.getenv("DB_HOST", "db")
        db_port = int(os.getenv("DB_PORT", 3306)) # Porta deve ser um número inteiro
        db_name = os.getenv("DB_NAME", "appdb")
        db_user = os.getenv("DB_USER", "appuser")
        db_password = os.getenv("DB_PASSWORD", "apppass")
        
        # Tenta estabelecer a conexão com o banco de dados
        conexao = pymysql.connect(
            host=db_host,
            port=db_port,
            user=db_user,
            password=db_password,
            database=db_name
        )
        
        # Se chegou até aqui, a conexão foi um sucesso! Fechamos a conexão.
        conexao.close()
        return {"database": "connected"}
        
    except Exception as e:
        # Se houver qualquer falha (senha errada, banco fora do ar, etc.),
        # a exceção é capturada e transformada em string.
        return {
            "database": "error",
            "detail": str(e)
        }