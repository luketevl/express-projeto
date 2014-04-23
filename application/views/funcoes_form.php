<?php
	require_once('includes/head.php');
?>
<body>
<section class="ajuste-98-porc">
<blockquote>
	  <p> Cadastro de Funções</p>
	</blockquote>
	
		<form class="form-horizontal" role="form" id="cadastrar" method="POST" action="save">
	      <input type="hidden" class="form-control" id="inputId" placeholder="Digite o nome do perfil" name='id_func' value='{id_func}' >
		  
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
			  <input type="text" class="form-control" placeholder="Nome" name="nome_func" required value="{nome_func}">
		    </div>
		  </div>
			
  		  <div class="form-group">
		    <label for="inputNome" class="col-sm-2 control-label">Projeto</label>
		    <div class="col-sm-10">
				  <input type="text" class="form-control" placeholder="Projeto" name="id_proj" required value="{id_proj}">
		    </div>
		  </div>
		  
			 <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default" id="btnCadastrar" >Salvar</button>
	    </div>
	  </div>
		</form>
</section>