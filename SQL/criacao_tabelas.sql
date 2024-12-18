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
    idade DATE NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    cpf VARCHAR(20) NOT NULL,
    data_inscricao DATE,
    faixa INT NOT NULL,
    observacoes_medicas TEXT,
    endereco VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS contagem_presenca (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_aluno INT NOT NULL,
    contagem_presenca INT,
    FOREIGN KEY (id_aluno) REFERENCES aluno(id)
);

CREATE TABLE IF NOT EXISTS aluno_aula (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_aluno INT NOT NULL,
    id_aula INT NOT NULL,
    FOREIGN KEY (id_aluno) REFERENCES aluno(id),
    FOREIGN KEY (id_aula) REFERENCES aula(id)
);

CREATE TABLE IF NOT EXISTS faixas (
    id INT PRIMARY KEY,
    cor VARCHAR(50) NOT NULL
);

INSERT INTO faixas (id, cor) VALUES
(1, 'Branca'),
(2, 'Branca Decidida'),
(3, 'Laranja'),
(4, 'Laranja Decidida'),
(5, 'Amarela'),
(6, 'Amarela Decidida'),
(7, 'Camuflada'),
(8, 'Camuflada Decidida'),
(9, 'Verde'),
(10, 'Verde Decidida'),
(11, 'Roxa'),
(12, 'Roxa Decidida'),
(13, 'Azul'),
(14, 'Azul Decidida'),
(15, 'Marrom'),
(16, 'Marrom Decidida'),
(17, 'Vermelha'),
(18, 'Vermelha Recomendada'),
(19, 'Vermelha e Preta'),
(20, 'Preta');