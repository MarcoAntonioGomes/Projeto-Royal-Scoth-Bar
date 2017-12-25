function manageRow(data) {
	var	rows = '';
	$.each( data, function( key, value ) {
	  	rows = rows + '<tr class="odd gradeX">';
	  	rows = rows + '<td>'+value.idCliente+'</td>';
		rows = rows + '<td>'+value.nome+'</td>';
		rows = rows + '<td>'+value.cpf+'</td>';
		rows = rows + '<td>'+value.rg+'</td>';
		rows = rows + '<td>'+value.endereco+'</td>';
		rows = rows + '<td>'+value.cidade+'</td>';
		rows = rows + '<td>'+value.estado+'</td>';
		rows = rows + '<td>'+value.cep+'</td>';
		rows = rows + '<td>'+value.telefone+'</td>';
		rows = rows + '</tr>';       
		
	});
	$("#clientes tbody").html(rows);
}

$.ajax({
	url: "../php/relatorio.cliente.php",
	type: "POST",
	data: "",
	dataType: "json"
	}).done(function(data) {
	if(data.data.length>0){
		manageRow(data.data);
		
	}else{
		//window.alert("Nenhum cliente!");
	}
	}).fail(function(jqXHR, textStatus ) {
	window.alert("Erro, tente novamente!");
	console.log(textStatus);
	}).always(function() {
	
});















