CREATE TABLE IF NOT EXISTS aluno_experimental (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    idade INT NOT NULL,
    nivel VARCHAR(50) NOT NULL,
    data DATE NOT NULL,
    hora TIME NOT NULL,
    telefone VARCHAR(20) NOT NULL
);

CREATE TABLE IF NOT EXISTS aula (
    id INT AUTO_INCREMENT PRIMARY KEY,
    dia_da_semana INT,
    horario TIME NOT NULL,
    nivel INT
);

CREATE TABLE IF NOT EXISTS aluno (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    idade INT NOT NULL,
    nivel INT,
    data DATE NOT NULL,
    hora TIME NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    cpf VARCHAR(20) NOT NULL,
    data_inscricao CURDATE(),
    faixa INT NOT NULL,
    observacoes_medicas TEXT,
    endereco VARCHAR(50) NOT NULL
);