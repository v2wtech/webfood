CREATE DEFINER=`root`@`localhost` PROCEDURE `consultaConta`(
	IN _idPedido INT
)
BEGIN
	SELECT pr.descricao, SUM(pr.preco * ip.quantidade) AS preco, SUM(ip. quantidade) AS quantidade
	FROM produto pr, item_pedido ip 
	WHERE pr.idProduto = ip.idProduto AND ip.idPedido = _idPedido
	GROUP BY descricao;
END