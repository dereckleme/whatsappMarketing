$(document).ready(function(){	
	
	$('input[type=file]').bootstrapFileInput();
	$(".telefone").mask("+55 (99) 99999-9999");
	
	$(".carregarLista").on("click",function(){
		var conteudo = $(".listaConteudo").val();
		var total = (conteudo.match(/\n/g)||[]).length;
		$(".infoCarregados").html("N° Contatos carregado: "+total);
		return false;
	})
	
})