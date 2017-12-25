$("#cadastrar").click(function(e){
	e.preventDefault();
	e.stopImmediatePropagation();
			
	var inputs=$("#form .control-group :input");
	
	var valuesFields={};
	inputs.each(function (){
		valuesFields[this.name]=$(this).val();
	});
	
	
	var nome=$("#nome").val();
	var cpf=$("#mask-cpf").val();
	var dataFields="nome="+valuesFields["nome"];
	
	if(nome == "" || cpf == ""){
			window.alert("Preencha os campos obrigatorios (*)");
			return;
	}
	
	$.each(valuesFields,function(field,key){
		if(field!="nome" && key!=""){
			dataFields+="&"+field+"="+key;
		}
	});
	
	//console.log(dataFields);
	//return;
	
	$.ajax({
		url: "../php/cadastro.cliente.php",
		type: "POST",
		data: dataFields,
		dataType: "json"

	}).done(function(resposta) {
		if(resposta.success){
			window.alert("Cliente inserido com sucesso!");
			var inputs=$("#form .control-group :input");
			inputs.each(function (){
				$(this).val("");
			});
		}
		else if(resposta.falha){
			window.alert("Cliente j? cadastrado!");
		}
		else{
			window.alert("Error, tente novamente!asas");
		}

	}).fail(function(jqXHR, textStatus ) {
		window.alert("Error, tente novamente!1");
		console.log(textStatus);

	}).always(function() {
		
	});
	
});





