CREATE TABLE produto
(
    co_produto INT PRIMARY KEY AUTO_INCREMENT,
    no_produto VARCHAR(150) NOT NULL,
    vl_produto DECIMAL(10,2) NOT NULL,
    ds_produto TEXT,
    dt_cadastro DATE NOT NULL,
    dt_validade DATE NOT NULL
);