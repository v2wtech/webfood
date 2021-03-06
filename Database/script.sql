CREATE DATABASE webfood;
USE webfood;

CREATE TABLE MESA (
descricao VARCHAR(30),
senha VARCHAR(32),
idMesa INT PRIMARY KEY AUTO_INCREMENT
);

INSERT INTO mesa (descricao, senha, idMesa) VALUES ("Mesa 1","mesa1",1);
INSERT INTO mesa (descricao, senha, idMesa) VALUES ("Mesa 2","mesa2",2);
INSERT INTO mesa (descricao, senha, idMesa) VALUES ("Mesa 3","mesa3",3);
INSERT INTO mesa (descricao, senha, idMesa) VALUES ("Mesa 4","mesa4",4);
INSERT INTO mesa (descricao, senha, idMesa) VALUES ("Mesa 5","mesa5",5);
INSERT INTO mesa (descricao, senha, idMesa) VALUES ("Mesa 6","mesa6",6);
INSERT INTO mesa (descricao, senha, idMesa) VALUES ("Mesa 7","mesa7",7);
INSERT INTO mesa (descricao, senha, idMesa) VALUES ("Mesa 8","mesa8",8);
INSERT INTO mesa (descricao, senha, idMesa) VALUES ("Mesa 9","mesa9",9);
INSERT INTO mesa (descricao, senha, idMesa) VALUES ("Mesa 10","mesa10",10);
INSERT INTO mesa (descricao, senha, idMesa) VALUES ("Mesa 11","mesa11",11);
INSERT INTO mesa (descricao, senha, idMesa) VALUES ("Mesa 12","mesa12",12);


CREATE TABLE PEDIDO (
idPedido INT PRIMARY KEY AUTO_INCREMENT,
idMesa INT,
FOREIGN KEY(idMesa) REFERENCES MESA (idMesa)
);


CREATE TABLE PRODUTO (
idProduto INT PRIMARY KEY AUTO_INCREMENT,
descricao VARCHAR(100),
urlImagem VARCHAR(100),
custo DECIMAL(12,2),
margem DECIMAL(12,2),
preco DECIMAL(12,2),
idCategoria INT
);

INSERT INTO produto VALUES (1, "Pizza 4 Queijos", "pizza.png", 18.57, 0, 36.00, 1);
INSERT INTO produto VALUES (2, "Pizza 5 Queijos", "pizza.png", 18.57, 0, 39.00, 1);
INSERT INTO produto VALUES (3, "Pizza Frango", "pizza.png", 18.57, 0, 34.00, 1);
INSERT INTO produto VALUES (4, "Pizza Portuguesa", "pizza.png", 18.57, 0, 35.00, 1);
INSERT INTO produto VALUES (5, "Pizza Camarão", "pizza.png", 18.57, 0, 48.00, 1);


INSERT INTO produto VALUES (6, "X-Tudo", "hamburguer.png", 18.57, 0, 18.00, 2);
INSERT INTO produto VALUES (7, "X-Bacon", "hamburguer.png", 18.57, 0, 13.00, 2);
INSERT INTO produto VALUES (8, "X-Salada", "hamburguer.png", 18.57, 0, 12.00, 2);
INSERT INTO produto VALUES (9, "X-4Queijos", "hamburguer.png", 18.57, 0, 15.00, 2);
INSERT INTO produto VALUES (10, "X- Burguer Duplo", "hamburguer.png", 18.57, 0, 26.00, 2);

INSERT INTO produto VALUES (11, "Suco de Laranja", "bebidas.png", 18.57, 0, 4.00, 3);
INSERT INTO produto VALUES (12, "Suco de Uva", "bebidas.png", 18.57, 0, 4.00, 3);
INSERT INTO produto VALUES (13, "Suco de Abacaxi com Leite", "bebidas.png", 18.57, 0, 6.00, 3);
INSERT INTO produto VALUES (14, "Refrigerante", "bebidas.png", 18.57, 0, 3.00, 3);
INSERT INTO produto VALUES (15, "Coca-Cola", "bebidas.png", 18.57, 0, 4.00, 3);

INSERT INTO produto VALUES (16, "Macarronada com Queijo", "massas.png", 18.57, 0, 18.00, 4);
INSERT INTO produto VALUES (17, "Macarronada com Carne", "massas.png", 18.57, 0, 15.00, 4);
INSERT INTO produto VALUES (18, "Lasanha à Bolonhesa", "massas.png", 18.57, 0, 15.00, 4);
INSERT INTO produto VALUES (19, "Panqueca Americana", "massas.png", 18.57, 0, 12.00, 4);
INSERT INTO produto VALUES (20, "Empadão de Frango", "massas.png", 18.57, 0, 10.00, 4);

INSERT INTO produto VALUES (21, "Sorvete de Morango", "sobremesa.png", 18.57, 0, 5.00, 5);
INSERT INTO produto VALUES (22, "Sorvete de Chocolate", "sobremesa.png", 18.57, 0, 9.00, 5);
INSERT INTO produto VALUES (23, "Sorvete de Abacaxi", "sobremesa.png", 18.57, 0, 8.00, 5);
INSERT INTO produto VALUES (24, "Sorvete de Limão", "sobremesa.png", 18.57, 0, 5.00, 5);
INSERT INTO produto VALUES (25, "Sorvete de Creme", "sobremesa.png", 18.57, 0, 17.00, 5);

INSERT INTO produto VALUES (26, "Pizza Calabresa", "pizza.png", 18.57, 0, 37.49, 1);
INSERT INTO produto VALUES (27, "X-Costela", "hamburguer.png", 18.57, 0, 22.90, 2);
INSERT INTO produto VALUES (28, "Suco de Goiaba", "bebidas.png", 18.57, 0, 5.30, 3);
INSERT INTO produto VALUES (29, "Empadão de Carne", "massas.png", 18.57, 0, 10.60, 4);
INSERT INTO produto VALUES (30, "Sorvete de Amendoin", "sobremesa.png", 18.57, 0, 13.25, 5);

CREATE TABLE CATEGORIA (
idCategoria INT PRIMARY KEY AUTO_INCREMENT,
descricao VARCHAR(60)
);

INSERT INTO categoria VALUES(1, "Pizzas");
INSERT INTO categoria VALUES(2, "Hamburguer Gourmet");
INSERT INTO categoria VALUES(3, "Bebidas");
INSERT INTO categoria VALUES(4, "Massas");
INSERT INTO categoria VALUES(5, "Sobremesas");

CREATE TABLE ITEM_PEDIDO (
idPedido INT,
idProduto INT,
quantidade INT,
FOREIGN KEY(idProduto) REFERENCES PRODUTO (idProduto),
FOREIGN KEY(idPedido) REFERENCES PEDIDO (idPedido)
);

ALTER TABLE PRODUTO ADD FOREIGN KEY(idCategoria) REFERENCES CATEGORIA (idCategoria);


SELECT * FROM mesa;
SELECT * FROM produto ORDER BY idProduto;
SELECT * FROM pedido ORDER BY idPedido;
SELECT * FROM item_pedido;


