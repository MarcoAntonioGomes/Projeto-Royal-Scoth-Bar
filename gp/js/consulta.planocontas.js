function manageRow(data) {
	var	rows = '';
	$.each( data, function( key, value ) {
	  	rows = rows + '<tr class="odd gradeX">';
		rows = rows + '<td>'+value.titulo+'</td>';
	  	rows = rows + '<td>'+value.data2+'</td>';
		rows = rows + '<td>'+value.entrada+'</td>';
		rows = rows + '<td>'+value.situacao+'</td>';
		rows = rows + '<td>'+value.valortotal+'</td>';
		rows = rows + '<td>'+value.fornecedor+'</td>';
		rows = rows + '<td>'+value.pagamento+'</td>';
		rows = rows + '<td>'+value.observacao+'</td>';
		rows = rows + '<td> <a href="'+"../php/deletar.planocontas.php?id="+value.idPlanoContas_Capa
			+'"> <img id="pencil-editar" style="width:30px" src="../img/delete.png" > </a> </td>';
		rows = rows + '</tr>';   
	});
	$("#clientes tbody").html(rows);
}

$("#consultar").click(function(e){
	e.preventDefault();
	e.stopImmediatePropagation();
			
	var situacao=$("#situacao").val();		
	var datainicial=$("#mask-data").val();
	var datafinal=$("#mask-data2").val();
	
	if(situacao == "0"){
		window.alert("Escolha uma situação!");
		return;
	}
	else if(datainicial=="" || datafinal==""){
		window.alert("Digite as datas de inicio e fim da pesquisa");
		return;
	}
	
	var dataFields="situacao="+situacao+"&datainicial="+datainicial+"&datafinal="+datafinal;
		
	//console.log(dataFields);
	//return;
	
	$.ajax({
		url: "../php/consulta.planocontas.php",
		type: "POST",
		data: dataFields,
		dataType: "json"

	}).done(function(data) {
		if(data.data.length>0){
			manageRow(data.data);
			
		}else{
			window.alert("Nenhum registro encontrado nesse intervalo de datas!");
		}

	}).fail(function(jqXHR, textStatus ) {
		window.alert("Erro, tente novamente!");
		console.log(textStatus);

	}).always(function() {
		
	});
	
});