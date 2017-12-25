        function genPDF() {
			html2canvas(document.getElementById("relatorio"), {
				onrendered: function (canvas) {
					
					var img = canvas.toDataURL("image/png");
					var doc = new jsPDF();
					doc.addImage(img, 'JPEG', 1,0);	
					doc.save('Relatorio_Soft.pdf');
					
				}
				
			});
	
}