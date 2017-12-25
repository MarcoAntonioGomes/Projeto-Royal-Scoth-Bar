$.getJSON("../php/busca.fornecedor.php", function(result) {
	var tag = $("#fornecedor");
	$.each(result.data, function(item,value) {
		$("<option />").val(value.idFornecedor).text(value.nome).appendTo(tag);
	});
});

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
	var nome=$("#nome").val();
	var precocusto=$("#precocusto").val();
	var margem=$("#mask-lucro").val();
	var precofinal=$("#precofinal").val();
	var quantidade=$("#quantidade").val();
	var fornecedor=$("#fornecedor").val();
	var formp=$("#pagamento").val();
	
	if(nome == "" || precocusto == "" || margem == "" || precofinal == "" || quantidade == "" || fornecedor == "0" || formp == "0" ){
			window.alert("Preencha todos os campos obrigatórios (*)");
			return;
	}
	
	var valuesFields={};
	inputs.each(function (){
		valuesFields[this.name]=$(this).val();
	});
	
	var dataFields="nome="+valuesFields["nome"];
	
	
	$.each(valuesFields,function(field,key){
		if(field!="nome" && key!=""){
			dataFields+="&"+field+"="+key;
		}
	});
	
	//console.log(dataFields);
		
	$.ajax({
		url: "../php/cadastro.produto.php",
		type: "POST",
		data: dataFields,
		dataType: "json"

	}).done(function(resposta) {
		if(resposta.success){
			window.alert("Produto inserido com sucesso!");
			var inputs=$("#form .control-group :input");
			inputs.each(function (){
				$(this).val("");
			});
			location.reload();
		}else if(resposta.falha){
			window.alert("Já existem um produto com esse nome!");
		}else{
			window.alert("Erro, tente novamente!");
		}

	}).fail(function(jqXHR, textStatus ) {
		window.alert("Erro interno, tente novamente!");
		console.log(textStatus);

	}).always(function() {
		
	});
	
});




