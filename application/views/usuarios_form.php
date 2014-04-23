<?php
	require_once('includes/head.php');
?>
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
	          <input type="checkbox" name="ativo" {opcao_ativo}> Ativo
	        </label>
	    </div>
	    </div>
	    </div>
		  <div class="form-group">
		  		    <label for="inputNome" class="col-sm-2 control-label">Nome</label>
		    <div class="col-sm-10">
			  <input type="text" class="form-control" placeholder="Nome" name="nome_usu" required value="{nome_usu}">
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label for="inputNome" class="col-sm-2 control-label">Email</label>
		    <div class="col-sm-10">
			  <input type="email" class="form-control" placeholder="Email" name="email_usu" required value="{email_usu}">
		    </div>
		  </div>

		  
  		  <div class="form-group">
		    <label for="inputNome" class="col-sm-2 control-label">Senha</label>
		    <div class="col-sm-10">
				  <input type="password" class="form-control" placeholder="Senha" name="senha_usu" id="cadastro_senha" minlength="6" required value="{senha_usu}">
		    </div>
		  </div>
		  

		    		  <div class="form-group">
		    <label for="inputNome" class="col-sm-2 control-label">Confirmar senha</label>
		    <div class="col-sm-10">
			  <input type="password" class="form-control" placeholder="Confirmar senha" name="senha_usu" id="cadastro_senha_rp" minlength="6" required value="{senha_usu}">
		    </div>
		  </div>
		  
			
  		  <div class="form-group">
		    <label for="inputNome" class="col-sm-2 control-label">Perfil</label>
		    <div class="col-sm-10">
				  <input type="text" class="form-control" placeholder="Perfil" name="id_perf" required name="nome_usu" value="{id_perf}">
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