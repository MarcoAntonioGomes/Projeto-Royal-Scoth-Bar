function manageRow(data) {
	var	rows = '';
	$.each( data, function( key, value ) {
	  	rows = rows + '<tr class="odd gradeX">';
	  	rows = rows + '<td>'+value.idVenda_Capa+'</td>';
		rows = rows + '<td>'+value.data+'</td>';
		rows = rows + '<td>'+value.pagamento+'</td>';
		rows = rows + '<td>'+value.nomeCliente+'</td>';
		rows = rows + '<td>'+value.cpf+'</td>';
		rows = rows + '<td>'+value.valor_total+'</td>';
		rows = rows + '<td>'+value.status+'</td>';
		rows = rows + '<td>'+value.pre_venda+'</td>';
		rows = rows + '<td>'+value.comanda+'</td>';
		rows = rows + '<td>'+value.nomeFuncionario+'</td>';
		rows = rows + '</tr>';       
	});
	$("#vendas tbody").html(rows);
}

$("#procurar").click(function(e){
	
	e.preventDefault();
	e.stopImmediatePropagation();
			
	var dataInicial=$("#mask-data").val();
	var dataFinal=$("#mask-data2").val();

	if(dataInicial=="" || dataFinal==""){
		window.alert("Digite as datas.");
		return;
	}
	
	var dataFields="datainicial="+dataInicial+"&datafinal="+dataFinal;
	console.log(dataFields)
	
	$.ajax({
		url: "../php/relatorio.venda.php",
		type: "POST",
		data: dataFields,
		dataType: "json"

	}).done(function(data) {
		if(data.qtd>0){
			manageRow(data.data);
			
		}else{
			window.alert("Nenhuma venda encontrada nesse intervalo de datas!");
		}

	}).fail(function(jqXHR, textStatus ) {
		window.alert("Erro, tente novamente!");
		console.log(textStatus);

	}).always(function() {
		
	});
	
});














