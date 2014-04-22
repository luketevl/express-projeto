<?php
	require_once('includes/head.php');
?>
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