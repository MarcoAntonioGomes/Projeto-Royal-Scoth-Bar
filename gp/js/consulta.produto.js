$.getJSON("../php/busca.fornecedor.php", function(result) {
	var tag = $("#fornecedor");
	$.each(result.data, function(item,value) {
		$("<option />").val(value.idFornecedor).text(value.nome).appendTo(tag);
	});
});

function manageRow(data) {
	var	rows = '';
	$.each( data, function( key, value ) {
	  	rows = rows + '<tr class="odd gradeX">';
		rows = rows + '<td>'+value.codigobarra+'</td>';
	  	rows = rows + '<td>'+value.nome+'</td>';
		rows = rows + '<td>'+value.preco_final+'</td>';
		rows = rows + '<td>'+value.quantidade+'</td>';
		rows = rows + '<td>'+value.fornecedor+'</td>';
		rows = rows + '<td>'+value.observacao+'</td>';
		rows = rows + '<td> <a href="'+"../atualizar/produto.html?id="+value.idProduto
			+'"> <img id="pencil-editar" style="width:30px" src="../img/lapis.png" > </a> </td>';
		rows = rows + '</tr>';      
	});
	$("#clientes tbody").html(rows);
}

$("#consultar").click(function(e){
	e.preventDefault();
	e.stopImmediatePropagation();
			
	var nome=$("#nome").val();
	var codigobarras=$("#codigobarras").val();
	var fornecedor=$("#fornecedor").val();
	
	
	if(nome=="" && codigobarras=="" && fornecedor=="0"){
		window.alert("Digite o nome ou codigo de barras ou escolha um fornecedor");
		return;
	}
	
	if(nome !="" && codigobarras !="" && fornecedor !="0"){
		window.alert("Digite em apenas um dos campos");
		return;
	}
	
	if((nome =="" && codigobarras !="" && fornecedor !="0") || (nome !="" && codigobarras =="" && fornecedor !="0") ){
		window.alert("Digite em apenas um dos campos");
		return;
	}
	
	var dataFields="nome="+nome+"&"+"codigobarras="+codigobarras+"&fornecedor="+fornecedor;
		
	//console.log(dataFields);
	//return;
	
	$.ajax({
		url: "../php/consulta.produto.php",
		type: "POST",
		data: dataFields,
		dataType: "json"

	}).done(function(data) {
		if(data.data.length>0){
			manageRow(data.data);
			
		}else{
			window.alert("Nenhum produto encontrado!");
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
			
	var nome=$("#nome").val();
	var codigobarras=$("#codigobarras").val();
	var fornecedor=$("#fornecedor").val();
	
	
	if(nome =="" || codigobarras =="" || fonecedor == "0"){
		nome = "%";
		codigobarras="";
		fonecedor="0";
	}
	
	if(nome != "" || codigobarras != "" || fonecedor != "0"){
		nome = "%";
		codigobarras = "";
		fonecedor="0";
	}
	
	var dataFields="nome="+nome+"&"+"codigobarras="+codigobarras+"&fornecedor="+fornecedor;
		
	//console.log(dataFields);
	//return;
	
	$.ajax({
		url: "../php/consulta.produto.php",
		type: "POST",
		data: dataFields,
		dataType: "json"

	}).done(function(data) {
		if(data.data.length>0){
			manageRow(data.data);
			
		}else{
			window.alert("Nenhum produto encontrado!");
		}

	}).fail(function(jqXHR, textStatus ) {
		window.alert("Erro, tente novamente!");
		console.log(textStatus);

	}).always(function() {
		
	});
	
});