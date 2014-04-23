<?php
	require_once('includes/head.php');
?>

<script type="text/javascript">
	$(document).ready(function(){
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
		          		document.location = 'welcome';
						},3000);
	          	}
          		//var n = noty({text: msg, type: 'error',shadow: false, styling: "bootstrap" , hide: true, delay: 500});
	          });
	          event.preventDefault;
			}
        	  return false;
			});
	});

</script>
	<body>
	<hgroup class="bs-callout bs-callout-info">
	<h4> Acesso ao sistema </h4>
		<form class="form-horizontal" role="form" id="login" method="POST">
			<div class="form-group" id="group-email-login">
				<div class="input-group">
				  <span class="input-group-addon">
					  <img src="<?php echo base_url();?>resources/img/email.png" width="14px" height="14px" />
				  </span>
				  <input type="email" class="form-control" placeholder="Email" name="email" required>
				</div>
			</div>

			<div class="form-group">
				<div class="input-group" id="group_login_senha">
				  <span class="input-group-addon">
				  	<img src="<?php echo base_url();?>resources/img/lock.png" width="14px" height="14px" />
				  </span>
				  <input type="password" class="form-control" placeholder="Senha" name="senha" id="login_senha" required minlength="6" >
				</div>
			</div>
			<div class="form-group">
		      <button type="submit" class="btn btn-default" id="btnEntrar">Entrar</button>
		    </div>
		</form>
	</hgroup>
	</body>
</html>