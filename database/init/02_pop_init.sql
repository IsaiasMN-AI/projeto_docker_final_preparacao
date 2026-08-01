INSERT INTO usuarios (nome, email) VALUES 
('João Silva', 'joao.silva@email.com'),
('Maria Souza', 'maria.souza@email.com'),
('Isaias Nunes', 'isaias.nunes@email.com');

INSERT INTO tickets (titulo, descricao, status, prioridade, usuario_id) VALUES 
('Erro de login', 'O sistema apresenta erro 500 ao tentar fazer login.', 'Aberto', 'Alta', 1),
('Atualizar banner', 'Trocar a imagem do banner da página inicial para a campanha de inverno.', 'Em Andamento', 'Baixa', 2),
('Dúvida sobre fatura', 'Cliente solicitou a segunda via do boleto.', 'Fechado', 'Média', 3);