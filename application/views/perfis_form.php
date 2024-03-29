<?php
	require_once('includes/head.php');
?>
<body>
<section class="ajuste-98-porc">
	<blockquote>
	  <p> Cadastro de Perfis</p>
	</blockquote>
	
	<form class="form-horizontal" role="form" id="cadastrar" method="POST" action="save">
      <input type="hidden" class="form-control" id="inputId" placeholder="Digite o nome do perfil" name='id_perf' value='{id_perf}' >
	  <div class="form-group">
	    <label for="inputNome" class="col-sm-2 control-label">Nome</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="inputNome" placeholder="Digite o nome do perfil" name='descricao_perf' value='{descricao_perf}' required>
	    </div>
	  </div>

	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <div class="checkbox">
	        <label>
	          <input type="checkbox" name="perm_usuario" {perm_usuario}> Cadastrar Usuário
	        </label>
	    </div>
  	    	<div class="checkbox">
		        <label>
		          <input type="checkbox" name="perm_solicitacoes" {perm_solicitacoes}> Cadastrar Solicitação
		        </label>
	        </div>
	        <div class="checkbox">
		        <label>
		          <input type="checkbox" name="perm_projetos" {perm_projetos}> Cadastrar Projetos
		        </label>
	        </div>
	        <div class="checkbox">
		        <label>
		          <input type="checkbox" name="perm_perfis" {perm_perfis}> Cadastrar Perfil
		        </label>
	        </div>
        	<div class="checkbox">
		        <label>
		          <input type="checkbox" name="perm_opcoes" {perm_opcoes}> Cadastrar Opções
		        </label>
	        </div>
	        <div class="checkbox">
		        <label>
		          <input type="checkbox" name="perm_indicadores" {perm_indicadores}> Cadastrar Indicadores
		        </label>
	        </div>
	        <div class="checkbox">
		        <label>
		          <input type="checkbox" name="perm_funcoes" {perm_funcoes}> Cadastrar Funções
		        </label>
	        </div>
	        <div class="checkbox">
		        <label>
		          <input type="checkbox" name="perm_tipo_solicitacoes" {perm_tipo_solicitacoes}> Cadastrar Tipo Solicitações
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
</section>

</body>
</html>
