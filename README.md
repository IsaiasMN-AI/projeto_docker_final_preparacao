## 1. Registro dos Comandos e Explicação de Diagnóstico

*   **`docker compose ps`**
    *   Permitiu verificar o status atual de todos os contêineres do projeto.

*   **`docker compose logs api`**
    *   Ajudou a identificar erros de inicialização no backend (FastAPI).

*   **`docker compose exec -it mysql /bin/sh`**
    **`mysql -uroot -p`**
    **`SHOW DATABASES;`**
    **`USE DB_NAME;`**
    **`SHOW TABLES;`**
    **`SELECT * FROM table_name;`**
    *   Confirmou se o MySQL inicializou corretamente e se o banco de dados e as tables foram iniciadas e populadas corretamente.

*   **`docker inspect <container_id>`**
    *   Foi usada para verificar qual é o ip do container.

## 2. Demonstração de Persistência de Dados (Volumes)

**Cenário A: Derrubar e subir mantendo o volume (`docker compose down`)**
1. O comando `docker compose down` foi executado, o que parou e removeu os contêineres e redes, mas **preservou o volume nomeado** do MySQL.
2. Em seguida, foi executado `docker compose up -d` para reconstruir os contêineres.
3. Ao acessar o banco de dados, todos os dados previamente inseridos continuavam lá. E como não foi excluído nenhum volume do mysql, isso garante que os arquivos de `init.sql` não foram executados novamente.

**Cenário B: Derrubar apagando os volumes (`docker compose down -v`)**
1. O comando `docker compose down -v` foi executado. O parâmetro `-v` destruiu propositalmente o volume que armazenava os dados persistentes.
2. Ao rodar `docker compose up -d` novamente, o contêiner do MySQL foi recriado totalmente do zero.
3. **Resultado:** Ao subir, o banco de dados estava vazio. Isso forçou o Docker a executar os scripts `init.sql` novamente para recriar as tabelas e repopular os dados iniciais. Isso comprova que a vida útil dos dados está atrelada ao volume, e não ao contêiner em si.