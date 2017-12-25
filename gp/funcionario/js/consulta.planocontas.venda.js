function manageRow(data) {
	var	rows = '';
	$.each( data, function( key, value ) {
	  	rows = rows + '<tr class="odd gradeX">';
	  	rows = rows + '<td>'+value.cliente+'</td>';
		rows = rows + '<td>'+value.data2+'</td>';
		rows = rows + '<td>'+value.valor_total+'</td>';
		rows = rows + '<td>'+value.pagamento+'</td>';
		rows = rows + '<td>'+value.funcionario+'</td>';
		rows = rows + '</tr>';       
	});
	$("#vendas tbody").html(rows);
}

$("#consultarv").click(function(e){
	e.preventDefault();
	e.stopImmediatePropagation();
			
	var situacao=$("#situacao").val();		
	var datainicial=$("#mask-data").val();
	var datafinal=$("#mask-data2").val();
	
	if(situacao == "0"){
		window.alert("Escolha uma situação!");
		return;
	}else if(datainicial=="" || datafinal==""){
		window.alert("Digite as datas de inicio e fim da pesquisa");
		return;
	}
	
	var dataFields="situacao="+situacao+"&datainicial="+datainicial+"&datafinal="+datafinal;
		
	//console.log(dataFields);
	//return;
	
	$.ajax({
		url: "../php/consulta.planocontas.venda.php",
		type: "POST",
		data: dataFields,
		dataType: "json"

	}).done(function(data) {
		if(data.data.length>0){
			manageRow(data.data);
			
		}else{
			window.alert("Nenhuma venda encontrada!");
		}

	}).fail(function(jqXHR, textStatus ) {
		window.alert("Erro, tente novamente!");
		console.log(textStatus);

	}).always(function() {
		
	});
	
});

$("#showall").click(function(e){
	e.preventDefault();
	e.stopImmediatePropagation();
			
	var comanda=$("#comanda").val();		
	var nome=$("#nome").val();
	var datainicial=$("#mask-data").val();
	var datafinal=$("#mask-data2").val();
	
	if(nome=="" || comanda==""){
		nome = "%";
		comanda="";
	}
	if(nome != "" || comanda != ""){
		nome = "%";
		comanda="";
	}
	if(datainicial=="" || datafinal==""){
		window.alert("Digite as datas de inicio e fim da pesquisa");
		return;
	}
	
	var dataFields="comanda="+comanda+"&nome="+nome+"&datainicial="+datainicial+"&datafinal="+datafinal;
		
	//console.log(dataFields);
	//return;
	
	$.ajax({
		url: "../php/consulta.venda.php",
		type: "POST",
		data: dataFields,
		dataType: "json"

	}).done(function(data) {
		if(data.data.length>0){
			manageRow(data.data);
			
		}else{
			window.alert("Nenhuma venda encontrada!");
		}

	}).fail(function(jqXHR, textStatus ) {
		window.alert("Erro, tente novamente!");
		console.log(textStatus);

	}).always(function() {
		
	});
	
});