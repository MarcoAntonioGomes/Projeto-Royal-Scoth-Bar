$.getJSON("../php/busca.forma.pagamento.php", function(result) {
	var tag = $("#pagamento");
	$.each(result.data, function(item,value) {
		$("<option />").val(value.idForma_Pagamento).text(value.nome).appendTo(tag);
	});
});

$.getJSON("../php/busca.fornecedor.php", function(result) {
	var tag = $("#fornecedor");
	$.each(result.data, function(item,value) {
		$("<option />").val(value.idFornecedor).text(value.nome).appendTo(tag);
	});
});

function inicializarForm(data){
	$("#nome").val(data["nomeProduto"]);
	$("#precocusto").val(data["precocusto"]);
	$("#mask-lucro").val(data["margem"]);
	$("#precofinal").val(data["precofinal"]);
	$("#quantidade").val(data["quantidade"]);
	$("#codigobarras").val(data["codigobarras"]);
	$("#observacao").val(data["observacao"]);
	$("#fornecedor").val(data["fornecedor"]).change();
	$("#pagamento").val(data["pagamento"]).change();	
}

$.urlParam = function(name){  
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);  
    return results[1] || 0;  
}

id=$.urlParam("id");
dataFields="id="+id;

$.ajax({
	url: "../php/get.produto.php",
	type: "GET",
	data: dataFields,
	dataType: "json"

}).done(function(data) {
	//console.log(data)
	inicializarForm(data)

}).fail(function(jqXHR, textStatus ) {
	window.alert("Erro, tente novamente!");
	console.log(textStatus);

}).always(function() {
	
});

$("#cadastrar").click(function(e){
	e.preventDefault();
	e.stopImmediatePropagation();
	
	
	if($("#nome").val() =="" || $("#precocusto").val()==""|| $("#mask-lucro").val()=="" ||  $("#precofinal").val() ==""|| $("#quantidade").val() ==""|| $("#fornecedor").val()=="0" || $("#pagamento").val()=="0"){
		window.alert("Preencha todos os campos obrigatórios (*)");
			return;
	}
	
	var dataFields="nome="+$("#nome").val()+"&";
	dataFields+="precocusto="+$("#precocusto").val()+"&";
	dataFields+="margem="+$("#mask-lucro").val()+"&";
	dataFields+="precofinal="+$("#precofinal").val()+"&";
	dataFields+="quantidade="+$("#quantidade").val()+"&";
	dataFields+="codigobarras="+$("#codigobarras").val()+"&";
	dataFields+="observacao="+$("#observacao").val()+"&";
	dataFields+="fornecedor="+$("#fornecedor").val()+"&";
	dataFields+="pagamento="+$("#pagamento").val()+"&";
	dataFields+="id="+id;
	
	//console.log("Beep");
	console.log(dataFields);
	//return;
	
	$.ajax({
		url: "../php/atualizar.produto.php",
		type: "POST",
		data: dataFields,
		dataType: "json"

	}).done(function(resposta) {
		if(resposta.success){
			window.alert("Produto atualizado com sucesso!");
		}else if(resposta.falha){
			window.alert("Produto já cadastrado!");
		}else{
			window.alert("Erro, tente novamente!");
		}

	}).fail(function(jqXHR, textStatus ) {
		window.alert("Erro interno, tente novamente!");
		console.log(textStatus);

	}).always(function() {
		
	});
	
});