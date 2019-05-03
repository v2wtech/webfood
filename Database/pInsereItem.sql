CREATE DEFINER=`root`@`localhost` PROCEDURE `insereItem`(
	IN _idPedido INT,
    IN _idProduto INT,
    IN _quantidadeProduto INT
)
BEGIN
	INSERT INTO item_pedido (idPedido, idProduto, quantidade) 
    VALUES (_idPedido, _idProduto, _quantidadeProduto);
END