$.getJSON("../php/busca.produto_pre_venda.php", function(result) {
	var tag = $("#estoque");
	
	$.each(result.data, function(item,value) {
	$("<option />").val(value.idProduto).text("Produto: "+value.nome + " * Preço unitário: "+ value.preco_final + " | Quantidade estoque: " +value.quantidade).appendTo(tag);
		
	});
		
	
});




