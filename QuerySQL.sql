-- 1. Cria o banco de dados 
CREATE DATABASE sistema_chamados;

-- 2. Seleciona o banco de dados
USE sistema_chamados;

-- 3. Cria a tabela de usuários
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 4. Cria a tabela de chamados
CREATE TABLE chamados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    status ENUM('aberto', 'em_andamento', 'fechado') DEFAULT 'aberto',
    usuario_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

-- 5. Insere usuários de teste (senhas criptografadas)
-- Senha padrão: 'password' (hash gerado com password_hash())
INSERT INTO usuarios (username, password) VALUES 
('admin', '123'),
('Felipe', 'Barros');

-- 6. Insere 3 chamados de exemplo (um de cada status)
INSERT INTO chamados (titulo, descricao, status, usuario_id) VALUES
('Problema no login', 'Não consigo acessar o sistema com minhas credenciais', 'aberto', 1),
('Erro na página inicial', 'O layout está quebrado em dispositivos móveis', 'em_andamento', 2),
('Solicitação de recurso', 'Necessário adicionar campo de telefone no cadastro', 'fechado', 1);

-- 7. Verifica se os dados foram inseridos corretamente
SELECT 
    c.id, 
    c.titulo, 
    c.status, 
    u.username as autor,
    DATE_FORMAT(c.created_at, '%d/%m/%Y %H:%i') as data_criacao
FROM 
    chamados c
JOIN 
    usuarios u ON c.usuario_id = u.id;