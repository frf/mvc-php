CREATE TABLE produto
(
    co_produto INT PRIMARY KEY AUTO_INCREMENT,
    no_produto VARCHAR(150) NOT NULL,
    vl_produto DECIMAL(10,2) NOT NULL,
    ds_produto TEXT,
    dt_cadastro DATE NOT NULL,
    dt_validade DATE NOT NULL
);

CREATE TABLE usuario
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    usuario VARCHAR(30) NOT NULL,
    senha VARCHAR(15) NOT NULL,
    perfil CHAR(1)  DEFAULT 'U' NOT NULL
);
