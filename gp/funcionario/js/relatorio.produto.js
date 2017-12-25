function manageRow(data) {
	var	rows = '';
	$.each( data, function( key, value ) {
	  	rows = rows + '<tr class="odd gradeX">';
	  	rows = rows + '<td>'+value.idProduto+'</td>';
		rows = rows + '<td>'+value.nomeProduto+'</td>';
		rows = rows + '<td>'+value.preco_final+'</td>';
		rows = rows + '<td>'+value.quantidade+'</td>';
		rows = rows + '<td>'+value.codigo_barras+'</td>';
		rows = rows + '<td>'+value.observacao+'</td>';
		rows = rows + '<td>'+value.nomeFornecedor+'</td>';
		rows = rows + '<td>'+value.CNPJ+'</td>';
		rows = rows + '<td>'+value.pagamento+'</td>';
		if(value.quantidade>0)
			rows = rows + '<td>'+"Disponivel"+'</td>';
		else
			rows = rows + '<td>'+"Indisponivel"+'</td>';
		rows = rows + '</tr>';       
		
	});
	$("#produtos tbody").html(rows);
}


$.ajax({
	url: "../php/relatorio.produto.php",
	type: "POST",
	data: "",
	dataType: "json"
	}).done(function(data) {
	if(data.data.length>0){
		manageRow(data.data);
		
	}else{
		window.alert("Nenhum Protudo!");
	}
	}).fail(function(jqXHR, textStatus ) {
	window.alert("Erro, tente novamente!");
	console.log(textStatus);
	}).always(function() {
	
});
console.log("Pos ready");















