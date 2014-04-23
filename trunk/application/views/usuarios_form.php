<?php
	require_once('includes/head.php');
?>
<script>

$(document).ready(function(){
	
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
	
$('#cadastro_senha').keypress(function(){
			
			//console.log($(this).parent('#group-email'));
			
			var elemento = $(this).parent('#group_cadastrar_senha');
			if($('#cadastro_senha').val().length >= 5){
				$(elemento).removeClass('has-error');
			}
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
			          url: "save",
			          data: dados
			        })
			          .success(function( msg ) {
			          	if(feedback(msg)){
						setInterval(function(){
			          		document.location = 'usuarios_controller';
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
});

</script>
<body>
<section class="ajuste-98-porc">
	<blockquote>
	  <p> Cadastro de Usuário</p>
	</blockquote>
	
		<form class="form-horizontal" role="form" id="cadastrar" method="POST" action="save">
	      <input type="hidden" class="form-control" id="inputId" placeholder="Digite o nome do perfil" name='id_usu' value='{id_usu}' >
		  
		   <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <div class="checkbox">
	        <label>
	          <input type="checkbox" name="ativo" {opcao_ativo} {opcao_adm}> Ativo
	        </label>
	    </div>
	    </div>
	    </div>
		  <div class="form-group">
		  		    <label for="inputNome" class="col-sm-2 control-label">Nome</label>
		    <div class="col-sm-10">
			  <input type="text" class="form-control" placeholder="Nome" name="nome_usu" required value="{nome_usu}" {opcao_adm}>
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label for="inputNome" class="col-sm-2 control-label">Email</label>
		    <div class="col-sm-10">
			  <input type="email" class="form-control" placeholder="Email" name="email_usu" required value="{email_usu}" {opcao_adm}>
		    </div>
		  </div>

		  
  		  <div class="form-group">
		    <label for="inputNome" class="col-sm-2 control-label">Senha</label>
		    <div class="col-sm-10">
				  <input type="password" class="form-control campo-senha" placeholder="Senha" name="senha_usu" id="cadastro_senha" minlength="6" required value="{senha_usu}" {opcao_adm}>
		    </div>
		  </div>
		  

		    		  <div class="form-group">
		    <label for="inputNome" class="col-sm-2 control-label">Confirmar senha</label>
		    <div class="col-sm-10">
			  <input type="password" class="form-control campo-senha" placeholder="Confirmar senha" name="senha_usu" id="cadastro_senha_rp" minlength="6" required value="{senha_usu}" {opcao_adm}>
		    </div>
		  </div>
		  
			
  		  <div class="form-group">
		    <label for="inputNome" class="col-sm-2 control-label">Perfil</label>
		    <div class="col-sm-10">
				  <input type="text" class="form-control" placeholder="Perfil" name="id_perf" required name="nome_usu" value="{id_perf}" {opcao_adm}>
		    </div>
		  </div>
		  
			 <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default" id="btnCadastrar" >Salvar</button>
	    </div>
	  </div>
		</form>
</section>
</body>
</html>