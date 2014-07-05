$(document).ready(function(){	
	$( document ).ajaxSend(function() {
		  $("#popup-login").fadeIn();
		});
	$( document ).ajaxComplete(function() {
		 $("#popup-login").fadeOut();
		});
	$('input[type=file]').bootstrapFileInput();
	//$(".telefone").mask("+55  ");
	
	$(".carregarLista").on("click",function(){
		var conteudo = $(".listaConteudo").val();
		var total = (conteudo.match(/\n/g)||[]).length;
		$(".infoCarregados").html("N° Contatos carregado: "+total);
		return false;
	})
	$(".envioSimples").on("click",function(){
		var erros = "";
		if($('.telefone').val() == "") erros = erros+"- Telefone está em branco.<br/>";
		if($('.Mensagem').val() == "" && $('input[type=file]')[0].files[0] == null) erros = erros+"- É necessário o envio de uma mensagem ou arquivo, ambos os campos estão em branco.<br/>";
		if(erros != "")
		{
			$(".alert").html("<b>Atenção existe alguns erros abaixo:</b><br/>"+erros).fadeIn();
		}
		else
			{
				$(".alert").fadeOut();
				var formData = new FormData();
				formData.append('imagem', $('input[type=file]')[0].files[0]);
	        	formData.append('mensagem', $(".Mensagem").val());
	        	formData.append('telefone', $(".telefone").val());
	        	$.ajax({
        	        url: basePatch+"/adicionaFilaMensagem",
        	        type: 'POST',
        	        contentType: 'multipart/form-data',
        	        success: function( data )  
                    {  
        	        	if(data == "enviada com sucesso;")
        	        		{
        	        		$(".alert").html("Mensagem enviada com sucesso!").fadeIn();
        	        		}
        	        	else
        	        		{
        	        		$(".alert").html("<B>Numero do telefone não cadastrado no Whatsapp!</b>").fadeIn();
        	        		}
        	        	//
                    },
                    error:function(){
                    	$(".alert").html("Error no gateway de envio!").fadeIn();
                    },
        	        data: formData,
        	        cache: false,
        	        contentType: false,
        	        processData: false
        	    });
			}
		return false;
	})
	$(".salvarLista").on("click",function(){
		var conteudo = $(".listaConteudo").val();
		var total = (conteudo.match(/\n/g)||[]).length;
		var erros = "";
		if($('.titulo').val() == "") erros = erros+"- Titulo da sua lista está em branco<br/>";
		if(total == 0) erros = erros+"- O carregamento da sua lista está zerada<br/>";
		if(erros != "")
		{
			$(".alert").html("<b>Atenção existe alguns erros abaixo:</b><br/>"+erros).fadeIn();
		}
		else
			{
				$.ajax({
			        url: basePatch+"/criarLista",
			        type: 'POST',
			        data:{data:conteudo, titulo:$('.titulo').val()},
			        success: function( data )  
		            {  
			        	window.location = basePatch+"/minhasListas";
		            },
			    });
			}
		return false;
	})
	$(".eventLogin").on("click",function(){
		$.ajax({
	        url: basePatch+"/login",
	        type: 'POST',
	        success: function( data )  
            { 
	        	location.reload();
            },
	        data:{eventLogin:$(".usuario").val(), eventPassword:$(".senha").val()},
	    });
		return false;
	})
	$(".enviarCampanha").on("click",function(){
		var idCampanha = $(this).attr("rel");
		if(confirm("Tem certeza que deseja enviar está campanha? ID da campanha:"+idCampanha))
			{
				
				  $(".table"+idCampanha).fadeOut();
				var total = $(".info").size()-1;
				if(total < 1)
					{
						$("#contentController").append('<div class="alert">\
  <button type="button" class="close" data-dismiss="alert">&times;</button>\
  <strong>Atenção!</strong> Você não tem cadastrado uma campanha, para cadastrar acesse: <a href="'+basePatch+"/criarCampanhas"+'">Criar Campanhas.</a>\
</div>');
					}
				$.ajax({
			        url: basePatch+"/enviarCampanha",
			        type: 'POST',
			        success: function( data )  
		            { 
			        	alert(data);
			        	alert("A campanha está sendo enviada, para mais detalhes acesse o menu Gerenciar Campanhas.");
		            },
			        data:{idCampanha:idCampanha},
			    });
			}
		return false;
	})
	
	$(".actionCriarCampanha").on("click",function(){
		idLista = $(".listaContato").val();
		var erros = "";
		if($('.tituloCampanha').val() == "") erros = erros+"- Titulo da sua campanha está em branco.<br/>";
		if(idLista == 0) erros = erros+"- Selecione uma lista para envios.<br/>";
		if($('.MensagemCampanha').val() == "" && $('input[type=file]')[0].files[0] == null) erros = erros+"- A mensagem que está enviada para seus contatos está em branco.<br/>";
		
		if(erros != "")
		{
			$(".alert").html("<b>Atenção existe alguns erros abaixo:</b><br/>"+erros).fadeIn();
		}
		else
			{
					var formData = new FormData();
					formData.append('imagem', $('input[type=file]')[0].files[0]);
					formData.append('titulo', $(".tituloCampanha").val());
		        	formData.append('lista', idLista);
		        	formData.append('mensagem', $(".MensagemCampanha").val());
		        	$.ajax({
	        	        url: basePatch+"/criarCampanhas",
	        	        type: 'POST',
	        	        contentType: 'multipart/form-data',
	        	        success: function( data )  
	                    {  
	        	        	window.location = basePatch+"/enviarCampanhas";
	                    },
	                    error:function(){},
	        	        data: formData,
	        	        cache: false,
	        	        contentType: false,
	        	        processData: false
	        	    });
			}
		return false;
	})
	$(".validarLista").on("click",function(){
		var botao = $(this);
		if(confirm("Tem certeza que deseja validar esta lista?"))
			{
			var idLista = $(this).attr("rel");
				$.ajax({
			        url: basePatch+"/minhasListas/validar",
			        type: 'POST',
			        success: function( data )  
		            { 
			        	$(".alert").html("<b>Atenção sua lista está em processo de validação, aguarde alguns minutos para que o processo se conclúa.</b>").fadeIn();
			        	$(botao).html("Validando Lista");
			        	$(botao).removeClass( "btn-inverse validarLista" ).addClass( "btn-success" );
		            },
			        data:{idLista:idLista},
			    });
			}
		
		return false;
	})
})