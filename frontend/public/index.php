<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frontend - Projeto Final Preparatório</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 50px;
            display: flex;
            justify-content: center;
        }
        .container {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            max-width: 600px;
            width: 100%;
        }
        h1 {
            color: #2c3e50;
        }
        .ambiente {
            display: inline-block;
            background-color: #3498db;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
        }
        .mensagem {
            background-color: #e8f8f5;
            border-left: 4px solid #1abc9c;
            padding: 15px;
            margin: 20px 0;
            font-style: italic;
        }
        a {
            color: #e67e22;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <?php
            // Busca a variável de ambiente APP_ENV. 
            // Se não estiver definida, usa "development" como valor padrão.
            $ambiente = getenv('APP_ENV') ?: 'development';
        ?>
        
        <h1>Projeto Final Preparatório</h1>
        
        <p><strong>Ambiente atual:</strong> <span class="ambiente"><?php echo htmlspecialchars($ambiente); ?></span></p>
        
        <div class="mensagem">
            🚀 Esta página PHP está rodando em um contêiner separado, servida através da comunicação entre Nginx e PHP-FPM!
        </div>
        
        <hr>
        
        <p>
            🔗 
            <!-- Como o FastAPI padrão usa a porta 8000, apontamos para a rota automática do Swagger -->
            <a href="http://localhost:8000/docs" target="_blank">
                Acessar a Documentação da API (Swagger)
            </a>
        </p>
    </div>

</body>
</html>