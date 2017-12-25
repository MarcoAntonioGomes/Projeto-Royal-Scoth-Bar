/*function manageRow(data) {
	var	rows = '';
	$.each( data, function( key, value ) {
		rows = rows + '<input value="'+value.idVenda+'">'+value.idVenda+'</input>';
	  	rows = rows + '<tr class="odd gradeX">';
		rows = rows + '<td><input type="checkbox" /></td>';
	  	rows = rows + '<td>'+value.idProduto+'</td>';
		rows = rows + '<td>'+value.quantidade+'</td>';
		rows = rows + '</tr>';       
	});
	$("#prevenda tbody").html(rows);
}
*/
$("#cadastrar_p_venda").click(function(e){
	e.preventDefault();
	e.stopImmediatePropagation();
			
	var cliente=$("#cliente").val();
	var funcionario=$("#funcionario").val();
	var produto=$("#estoque").val();
	var comanda=$("#comanda").val();
	var quantidade=$("#quantidade").val();
	var cod_barras=$("#cod_barras").val();
	
	
	if(cliente == "" && funcionario =="" && produto == "" && comanda == "" && quantidade == "" && cod_barras == ""){
		window.alert("Preencha os campos para prosseguir");
		return;
	}
	
	var dataFields="cliente="+cliente+"&funcionario="+funcionario+"&produto="+produto+"&comanda="+comanda+"&quantidade="+quantidade+"&cod_barras="+cod_barras;
		
	console.log(dataFields);
	//return;
	
	
	$.ajax({
		url: "../php/cadastro.pre_venda.php",
		type: "POST",
		data: dataFields,
		dataType: "json"

	}).done(function(data) {
		if(data.data.length>0){
			window.alert("Pre Venda feita com sucesso!");
			
		}else{
			window.alert("Pre Venda Falhou, refaca !");
		}

	}).fail(function(jqXHR, textStatus ) {
		window.alert("Erro, tente novamente !");
		console.log(textStatus);

	}).always(function() {
		
	});
	
});






