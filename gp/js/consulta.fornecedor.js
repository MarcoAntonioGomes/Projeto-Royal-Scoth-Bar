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
		rows = rows + '<td> <a href="'+"../atualizar/fornecedor.html?id="+value.idFornecedor
			+'"> <img id="pencil-editar" style="width:30px" src="../img/lapis.png" > </a> </td>';
		rows = rows + '</tr>';    
		
	});
	$("#clientes tbody").html(rows);
}

$("#consultar").click(function(e){
	e.preventDefault();
	e.stopImmediatePropagation();
			
	var nome=$("#nome").val();
	var cnpj=$("#mask-cnpj").val();
	
	
	if(nome=="" && cnpj==""){
		window.alert("Digite o nome ou cnpj");
		return;
	}
	if(nome !="" && cnpj !=""){
		window.alert("Digite o nome ou cnpj");
		return;
	}
	
	var dataFields="nome="+nome+"&cnpj="+cnpj;
		
	//console.log(dataFields);
	//return;
	
	$.ajax({
		url: "../php/consulta.fornecedor.php",
		type: "POST",
		data: dataFields,
		dataType: "json"

	}).done(function(data) {
		if(data.data.length>0){
			manageRow(data.data);
			
		}else{
			window.alert("Nenhum fornecedor encontrado!");
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
	var cnpj=$("#cnpj").val();
	
	if(nome=="" || cnpj==""){
		nome = "%";
	}
	if(nome != "" || cnpj != ""){
		nome = "%";
		cnpj = "";
	}
	
	var dataFields="nome="+nome+"&cnpj="+cnpj;
		
	//console.log(dataFields);
	//return;
	
	$.ajax({
		url: "../php/consulta.fornecedor.php",
		type: "POST",
		data: dataFields,
		dataType: "json"

	}).done(function(data) {
		if(data.data.length>0){
			manageRow(data.data);
			
		}else{
			window.alert("Nenhum fornecedor encontrado!");
		}

	}).fail(function(jqXHR, textStatus ) {
		window.alert("Erro, tente novamente!");
		console.log(textStatus);

	}).always(function() {
		
	});
	
});















