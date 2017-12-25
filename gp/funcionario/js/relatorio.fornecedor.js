function manageRow(data) {
	
	var	rows = '';
	$.each( data, function( key, value ) {
	  	rows = rows + '<tr class="odd gradeX">';
	  	rows = rows + '<td>'+value.idFornecedor+'</td>';
		rows = rows + '<td>'+value.nome+'</td>';
		rows = rows + '<td>'+value.cnpj+'</td>';
		rows = rows + '<td>'+value.endereco+'</td>';
		rows = rows + '<td>'+value.cidade+'</td>';
		rows = rows + '<td>'+value.estado+'</td>';
		rows = rows + '<td>'+value.complemento+'</td>';
		rows = rows + '<td>'+value.cep+'</td>';
		rows = rows + '<td>'+value.telefone+'</td>';
		rows = rows + '<td>'+value.pagamento+'</td>';
		rows = rows + '</tr>';    
		
		
		
	});
	$("#fornecedores tbody").html(rows);
}

	
console.log("teste");
	
console.log("Ready");
$.ajax({
	url: "../php/relatorio.fornecedor.php",
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















