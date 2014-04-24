<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Responsive Retina-Friendly Menu with different, size-dependent layouts" />
		<meta name="keywords" content="responsive menu, retina-ready, icon font, media queries, css3, transition, mobile" />
		<meta name="author" content="Codrops" />
		<title>Calculador de Frete</title>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

        <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
        
	    <script src="<?php echo base_url()?>resources/js/jquery.maskedinput.js" type="text/javascript"></script>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="<?php echo base_url()?>resources/css/bootstrap.min.css">

		<link rel="stylesheet" href="<?php echo base_url()?>resources/css/doc.css">

		<!-- Optional theme
		<link rel="stylesheet" href="<?php echo base_url()?>resources/css/bootstrap-theme.min.css">
		 -->

		<link rel="stylesheet" href="<?php echo base_url()?>resources/css/normalize.css">
		<link rel="stylesheet" href="<?php echo base_url()?>resources/css/style.css">
		<!-- 
		Latest compiled and minified JavaScript -->
		<script src="<?php echo base_url()?>resources/js/bootstrap.min.js"></script>

		<script src="<?php echo base_url()?>resources/js/noty/packaged/jquery.noty.packaged.js"></script>

		<script src="<?php echo base_url()?>resources/js/validator-form/jquery.validate.js"></script>
		<script src="<?php echo base_url()?>resources/js/validator-form/packaged/additional-methods.js"></script>
		<script src="<?php echo base_url()?>resources/js/validator-form/packaged/jquery.noty.packaged.js"></script>
		<script src="<?php echo base_url()?>resources/js/validator-form/localization/messages_pt_BR.js "></script>
		<script src="<?php echo base_url()?>resources/js/jquery.tools.min.js "></script>
		<script src="<?php echo base_url()?>resources/js/bootstrap-filestyle.js "></script>
		<script src="<?php echo base_url()?>resources/js/jquery.MultiFile.js "></script>

		<script src="<?php echo base_url()?>resources/js/jquery-upload.js "></script>

		<script src="<?php echo base_url()?>resources/js/funcoes.js"></script>


<script>
		$(document).ready(function(){
		$("#calcularFrete").click(function(){
    var cep_cli = $('#cep').val();
    if(cep_cli.length == 9){
	    $.ajax({
			  type: "GET",
			  url: "frete",
			  data: { cep: cep_cli , cod_cli :  <?php echo $_GET['cod_cli'];?> , cod_prod :  <?php echo $_GET['cod_prod'];?> }
			})
			  .success(function( msg ) {
			  	if(msg.indexOf('bs-callout-warning') != '-1'){
					$('#servicoInfo').hide();
					$('#camposFrete').hide();
					$('#servicoErro').show();
					$('#carrega').hide();
					$('#erros').show();
					$('#erros').html(msg);
					$('btnTentarNovamente').show();
			  	}
			  	else{
			  		$('btnTentarNovamente').hide();
			  		$('#carrega').show();
				  	$('#carrega').html(msg);	
			  	}
			    
		});
    }
    else{
    	$('#grupoCep').addClass('has-error');
    	$('#cep').focus();
    }
});
			//$('#login').hide();
			$('#cadastrar').hide();
			$('a#openLogin').click(function(){
				$('#login').show(600);
				$('#cadastrar').hide(500);
			});
			$('a#openCadastro').click(function(){
				$('#cadastrar').show(600);
				$('#login').hide(500);
			});

	/*
			$("#login").validate({
				submitHandler: function(form){
				var formulario = $('form#login');
				var dados = formulario.serialize();
				 $.ajax({
			          type: "POST",
			          url: "acesso/cadastrar",
			          data: dados
			        })
			          .success(function( msg ) {
			        	var n = noty({text: msg, type: 'error'});
			        	removeTodos(n);
			          });
					return false;
				}
			});
	*/
		function removeTodos(n){
			
		}
		
		function feedback(msg){
			var obj = jQuery.parseJSON(msg);
			if(obj.cod == '-1'){
	        	var n = noty({text: obj.msg, type: 'error', shadow: false, styling: "bootstrap" , hide: true, delay: 500,
				killer: true

	        });
	        	removeTodos(n);
		          	}
	      	else if(obj.cod == '1'){
	      		var n = noty({text: obj.msg, type: 'success',shadow: false, styling: "bootstrap" , hide: true, delay: 500,
	      	killer: true
			});
	  			removeTodos(n);
	      	}
	      	return obj.cod;
	}
			$('input[name="email"]').keypress(function(){
				//$(this).parent('#group-email');
				//console.log($(this).parent('#group-email'));
				console.log(this);
				var elemento = $(this).parents('.form-group');
				console.log(elemento);
				$(elemento).removeClass('has-error');
			});

	$('#login_senha').keypress(function(){
				
				console.log($(this).parent('#group-email'));
				var elemento = $(this).parent('#group_login_senha');
				if($('#login_senha').val().length >= 5){
					$(elemento).removeClass('has-error');
					
				}
			});

	$('#cadastro_senha').keypress(function(){
				
				//console.log($(this).parent('#group-email'));
				
				var elemento = $(this).parent('#group_cadastrar_senha');
				if($('#cadastro_senha').val().length >= 5){
					$(elemento).removeClass('has-error');
				}
			});

			$('#login').submit(function(event){
				var formulario = $('form#login');
				var dados = formulario.serialize();
				if($('#login_senha').val().length < 6){
					var n = noty({text: 'Senha deve conter no mínimo 6 caracteres.', type: 'error',shadow: false, styling: "bootstrap" , hide: true, delay: 500});
					removeTodos(n);
					$('#group_login_senha').addClass('has-error');
				        $('#login_senha').focus(function(){
				        	 $(this).select();
				        	});
				}
				else {
		        $.ajax({
		          type: "POST",
		          url: "acesso/logar",
		          data: dados
		        })
		          .success(function( msg ) {
		          	if(feedback(msg)){
						setInterval(function(){
			          		document.location = 'upload';
							},3000);
		          	}
	          		//var n = noty({text: msg, type: 'error',shadow: false, styling: "bootstrap" , hide: true, delay: 500});
		          });
		          event.preventDefault;
				}
	        	  return false;
				});

			$('#cadastrar').submit(function(event){
				var formulario = $('form#cadastrar');
				var dados = formulario.serialize();
				if($('#cadastro_senha').val().length < 6){
					var n = noty({text: 'Senha deve conter no mínimo 6 caracteres.', type: 'error',shadow: false, styling: "bootstrap" , hide: true, delay: 500});
					removeTodos(n);
					$('#group_cadastrar_senha').addClass('has-error');
				        $('#cadastro_senha').focus(function(){
				        	 $(this).select();
				        	});
				}
				else{
					if($('#cadastro_senha_rp').val() != $('#cadastro_senha').val()){
						var n = noty({text: 'A confirmação da senha digitada não é igual a senha.', type: 'error',shadow: false, styling: "bootstrap" , hide: true, delay: 500});
					}else{
				        $.ajax({
				          type: "POST",
				          url: "acesso/cadastrar",
				          data: dados
				        })
				          .success(function( msg ) {
				          	if(feedback(msg)){
							setInterval(function(){
				          		document.location = 'upload';
									},3000);
				          	}
							$('#group-email').addClass('has-error');
					        $('#group-email > input[name="email"]').focus(function(){
					        	 $(this).select();
					        	});
				          });
						  event.preventDefault;
					}
				}
			        	  return false;
					});

		})data;

</script>
	</head>
