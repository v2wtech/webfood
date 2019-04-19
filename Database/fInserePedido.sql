CREATE DEFINER=`root`@`localhost` FUNCTION `inserePedido`(_idMesa INT) RETURNS int(11)
    DETERMINISTIC
BEGIN
	INSERT INTO pedido (idMesa)
    VALUES (_idMesa);
RETURN LAST_INSERT_ID();
END