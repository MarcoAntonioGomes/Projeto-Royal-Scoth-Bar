$.getJSON("../php/busca.forma.pagamento.php", function(result) {
	var tag = $("#pagamento");
	$.each(result.data, function(item,value) {
		$("<option />").val(value.idForma_Pagamento).text(value.nome).appendTo(tag);
	});
});