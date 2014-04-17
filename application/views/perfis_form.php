<?php
	require_once('includes/head.php');
?>
<body>
	<blockquote>
	  <p> de Perfis</p>
	</blockquote>
	
	<form class="form-horizontal" role="form">
      <input type="hidden" class="form-control" id="inputNome" placeholder="Digite o nome do perfil" value='{id_perf}' >
	  <div class="form-group">
	    <label for="inputNome" class="col-sm-2 control-label">Nome</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="inputNome" placeholder="Digite o nome do perfil" value='{descricao_perf}' >
	    </div>
	  </div>

	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <div class="checkbox">
	        <label>
	          <input type="checkbox" name="perm_usuario" checked="checked"> Cadastrar Usuário
	        </label>
	    </div>
  	    	<div class="checkbox">
		        <label>
		          <input type="checkbox" name="perm_solicitacoes" checked="checked"> Cadastrar Solicitação
		        </label>
	        </div>
	        <div class="checkbox">
		        <label>
		          <input type="checkbox" name="perm_projetos" checked="checked"> Cadastrar Projetos
		        </label>
	        </div>
	        <div class="checkbox">
		        <label>
		          <input type="checkbox" name="perm_perfis" checked="checked"> Cadastrar Perfil
		        </label>
	        </div>
        	<div class="checkbox">
		        <label>
		          <input type="checkbox" name="perm_opcoes" checked="checked"> Cadastrar Opções
		        </label>
	        </div>
	        <div class="checkbox">
		        <label>
		          <input type="checkbox" name="perm_indicadores" checked="checked"> Cadastrar Indicadores
		        </label>
	        </div>
	  </div>
	      </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-default">Salvar</button>
	    </div>
	  </div>
	</form>


</body>
</html>