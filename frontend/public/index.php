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
            // Busca a variável do ambiente e a URL interna da API
            $ambiente = getenv('APP_ENV') ?: 'development';
            
            // O padrão assume que o serviço da API no docker-compose se chama "api" e roda na 8000
            $apiBaseUrl = getenv('API_BASE_URL') ?: 'http://api:8000'; 
            
            // --------------------------------------------------------
            // PHP CONSUMINDO A API INTERNAMENTE
            // --------------------------------------------------------
            // O arroba (@) suprime warnings na tela caso a API esteja desligada
            $apiResponse = @file_get_contents($apiBaseUrl . '/health');
            
            // Decodifica o JSON retornado pela API
            $apiData = $apiResponse ? json_decode($apiResponse, true) : null;
        ?>
        
        <h1>Projeto Final Preparatório</h1>
        <p><strong>Ambiente atual:</strong> <span class="ambiente"><?php echo htmlspecialchars($ambiente); ?></span></p>
        
        <div class="api-box">
            <h3>Comunicação Backend-to-Backend</h3>
            <p>O PHP tentou consumir a API na rede interna (<code><?php echo htmlspecialchars($apiBaseUrl); ?></code>).</p>
            
            <?php if ($apiData && isset($apiData['status']) && $apiData['status'] === 'ok'): ?>
                <p class="success">✅ Sucesso! A API retornou: <?php echo htmlspecialchars($apiData['status']); ?></p>
            <?php else: ?>
                <p class="error">❌ Falha na conexão! O PHP não conseguiu alcançar a API.</p>
            <?php endif; ?>
        </div>
        
        <hr>
        
        <p>
            🔗 
            <!-- 
              Se a porta 8000 foi fechada, o acesso direto (localhost:8000) não funciona mais.
              De acordo com a Parte 6 do exercício, o Nginx fará um proxy da rota /api/.
              Portanto, a documentação ficará acessível através do Nginx na porta 8080!
            -->
            <a href="http://10.78.0.142:8080/api/docs" target="_blank">
                Acessar a Documentação da API (via Proxy Nginx)
            </a>
        </p>
    </div>

</body>
</html>