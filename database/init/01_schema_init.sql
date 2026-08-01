-- Criação da tabela de usuários
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL
);

-- Criação da tabela de tickets
CREATE TABLE IF NOT EXISTS tickets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(200) NOT NULL,
    descricao TEXT,
    status VARCHAR(50) DEFAULT 'Aberto',
    prioridade VARCHAR(50) DEFAULT 'Normal',
    
    -- Tipo exato ao da tabela usuarios
    usuario_id INT NOT NULL, 
    
    -- Configuração da chave estrangeira (Foreign Key)
    CONSTRAINT fk_usuario
        FOREIGN KEY (usuario_id) 
        REFERENCES usuarios (id)
        ON DELETE CASCADE
);