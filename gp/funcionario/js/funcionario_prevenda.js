$.getJSON("../php/busca.funcionario_pre_venda.php", function(result) {
	var tag = $("#funcionario");
	
	$.each(result.data, function(item,value) {
		$("<option />").val(value.idFuncionario).text("Nome: "+value.nome + " | CPF: "+ value.cpf).appendTo(tag);
		
	});
		
	
});
