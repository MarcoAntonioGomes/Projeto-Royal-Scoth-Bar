function manageRow(data) {
	var	rows = '';
	$.each( data, function( key, value ) {
	  	rows = rows + '<tr class="odd gradeX">';
	  	rows = rows + '<td>'+value.idFuncionario+'</td>';
		rows = rows + '<td>'+value.nome+'</td>';
		rows = rows + '<td>'+value.cpf+'</td>';
		rows = rows + '<td>'+value.rg+'</td>';
		rows = rows + '<td>'+value.telefone+'</td>';
		rows = rows + '<td>'+value.endereco+'</td>';
		rows = rows + '<td>'+value.complemento+'</td>';
		rows = rows + '<td>'+value.cidade+'</td>';
		rows = rows + '<td>'+value.estado+'</td>';
		rows = rows + '<td>'+value.cep+'</td>';
		rows = rows + '<td>'+value.salario+'</td>';
		rows = rows + '<td> <a href="'+"../atualizar/funcionario.html?id="+value.idFuncionario
			+'"> <img id="pencil-editar" style="width:30px" src="../img/lapis.png" > </a> </td>';
		rows = rows + '</tr>';      
		
	});
	$("#clientes tbody").html(rows);
}

$("#consultar").click(function(e){
	e.preventDefault();
	e.stopImmediatePropagation();
			
	var nome=$("#nome").val();
	var cpf=$("#mask-cpf").val();
	
	
	if(nome=="" && cpf==""){
		window.alert("Digite o nome ou cpf");
		return;
	}
	if(nome != "" && cpf != ""){
		window.alert("Digite o nome ou cpf");
		return;
	}
	
	var dataFields="nome="+nome+"&cpf="+cpf;
		
	//console.log(dataFields);
	//return;
	
	$.ajax({
		url: "../php/consulta.funcionario.php",
		type: "POST",
		data: dataFields,
		dataType: "json"

	}).done(function(data) {
		if(data.data.length>0){
			manageRow(data.data);
			
		}else{
			window.alert("Nenhum funcionario encontrado!");
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
	var cpf=$("#cpf").val();
	
	
	if(nome == "" || cpf == ""){
		nome = "%";
	}
	if(nome != "" || cpf != ""){
		nome = "%";
		cpf = "";
	}
	
	var dataFields="nome="+nome+"&cpf="+cpf;
		
	//console.log(dataFields);
	//return;
	
	$.ajax({
		url: "../php/consulta.funcionario.php",
		type: "POST",
		data: dataFields,
		dataType: "json"

	}).done(function(data) {
		if(data.data.length>0){
			manageRow(data.data);
			
		}else{
			window.alert("Nenhum funcionario encontrado!");
		}

	}).fail(function(jqXHR, textStatus ) {
		window.alert("Erro, tente novamente!");
		console.log(textStatus);

	}).always(function() {
		
	});
	
});















