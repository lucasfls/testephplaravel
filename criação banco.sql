CREATE TABLE clientes (
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(100) NOT NULL,
data_nasc DATE,
sexo CHAR,
cep VARCHAR(10),
endereco VARCHAR(60),
estado VARCHAR(2),
bairro VARCHAR(50),
numero INT,
complemento VARCHAR (50),
cidade VARCHAR(50),
updated_at TIMESTAMP DEFAULT NOW()
created_at TIMESTAMP DEFAULT NOW()

)