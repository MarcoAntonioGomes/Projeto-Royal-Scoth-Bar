$.getJSON("../php/busca.cliente_pre_venda.php", function(result) {
	var tag = $("#cliente");
	
	$.each(result.data, function(item,value) {
		$("<option />").val(value.idCliente).text("Nome: "+value.nome + " | CPF: "+ value.cpf).appendTo(tag);
		
	});
		
	
});






