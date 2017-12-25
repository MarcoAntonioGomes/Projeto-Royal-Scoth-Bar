$.getJSON("../php/busca.forma.pagamento.php", function(result) {
	var tag = $("#pagamento");
	$.each(result.data, function(item,value) {
		$("<option />").val(value.idForma_Pagamento).text(value.nome).appendTo(tag);
	});
});

function inicializarForm(data){
	$("#nome").val(data["nomeFornecedor"]);
	$("#mask-cnpj").val(data["cnpj"]);
	$("#endereco").val(data["endereco"]);
	$("#complemento").val(data["complemento"]);
	$("#cidade").val(data["cidade"]);
	$("#estado").val(data["estado"]).change();
	$("#mask-cep").val(data["cep"]);
	$("#mask-celular").val(data["telefone"]).change();
	$("#pagamento").val(data["pagamento"]).change();	
}

$.urlParam = function(name){  
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);  
    return results[1] || 0;  
}

id=$.urlParam("id");
dataFields="id="+id;

$.ajax({
	url: "../php/get.fornecedor.php",
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
	
	if($("#nome").val() =="" || $("#mask-cnpj").val()=="" || $("#pagamento").val()=="0"){
		window.alert("Preencha todos os campos obrigatórios (*)");
		return;
	}
	
	var dataFields="nome="+$("#nome").val()+"&";
	dataFields+="cnpj="+$("#mask-cnpj").val()+"&";
	dataFields+="endereco="+$("#endereco").val()+"&";
	dataFields+="complemento="+$("#complemento").val()+"&";
	dataFields+="cidade="+$("#cidade").val()+"&";
	dataFields+="estado="+$("#estado").val()+"&";
	dataFields+="cep="+$("#mask-cep").val()+"&";
	dataFields+="telefone="+$("#mask-celular").val()+"&";
	dataFields+="pagamento="+$("#pagamento").val()+"&";
	dataFields+="id="+id;
	
	//console.log("Beep");
	//console.log(dataFields);
	//return;
	
	$.ajax({
		url: "../php/atualizar.fornecedor.php",
		type: "POST",
		data: dataFields,
		dataType: "json"

	}).done(function(resposta) {
		if(resposta.success){
			window.alert("Fornecedor atualizado com sucesso!");
		}else if(resposta.falha){
			window.alert("Fornecedor já cadastrado!");
		}else{
			window.alert("Erro, tente novamente!");
		}

	}).fail(function(jqXHR, textStatus ) {
		window.alert("Erro interno, tente novamente!");
		console.log(textStatus);

	}).always(function() {
		
	});
	
});



