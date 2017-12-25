$.getJSON("../php/busca.forma.pagamento.php", function(result) {
	var tag = $("#pagamento");
	$.each(result.data, function(item,value) {
		$("<option />").val(value.idForma_Pagamento).text(value.nome).appendTo(tag);
	});
});

$("#cadastrar").click(function(e){
	e.preventDefault();
	e.stopImmediatePropagation();
		
	var inputs=$("#form .control-group :input");
	
	var valuesFields={};
	inputs.each(function (){
		valuesFields[this.name]=$(this).val();
	});
	
	var dataFields="nome="+valuesFields["nome"];
	var nome=$("#nome").val();
	var cnpj=$("#mask-cnpj").val();
	var formp=$("#pagamento").val();
	
	if(nome == "" || cnpj =="" || formp=="0"){
		window.alert("Preencha todos os campos obrigatórios (*)");
		return;
	}
	
	$.each(valuesFields,function(field,key){
		if(field!="nome" && key!=""){
			dataFields+="&"+field+"="+key;
		}
	});
	
	//console.log(dataFields);

	$.ajax({
		url: "../php/cadastro.fornecedor.php",
		type: "POST",
		data: dataFields,
		dataType: "json"

	}).done(function(resposta) {
		if(resposta.success){
			window.alert("Fornecedor inserido com sucesso!");
			var inputs=$("#form .control-group :input");
			inputs.each(function (){
				$(this).val("");
			});
			location.reload();
		}else if(resposta.falha){
			window.alert("Fornecedor já cadastrado!");
		}
		else{
			window.alert("Erro, tente novamente!");
		}

	}).fail(function(jqXHR, textStatus ) {
		window.alert("Erro interno, tente novamente!");
		console.log(textStatus);

	}).always(function() {
		
	});
	
});




