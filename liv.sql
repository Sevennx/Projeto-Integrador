CREATE DATABASE livraria;
CREATE TABLE editora (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL
);


CREATE TABLE acervo (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(255) NOT NULL,
    foto VARCHAR(255),
    autor VARCHAR(100),
    ano VARCHAR (100),
    editora_id INT,
    preco VARCHAR(100),
    FOREIGN KEY (editora_id) REFERENCES editora(id)
);
