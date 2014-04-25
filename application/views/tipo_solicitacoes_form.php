<?php
	require_once('includes/head.php');
?>
<script>

</script>
<body>
<section class="ajuste-98-porc">
<blockquote>
	  <p> Cadastro de Tipo de Solicitações</p>
	</blockquote>
	
		<form class="form-horizontal" role="form" id="cadastrar" method="POST" action="save">
	      <input type="hidden" class="form-control" id="inputId" name='id_tipo_soli' value='{id_tipo_soli}' >
		  
		  <div class="form-group">
		  		    <label for="inputNome" class="col-sm-2 control-label">Descrição</label>
		    <div class="col-sm-10">
			  <input type="text" class="form-control" placeholder="Descrição da Solicitação" name="descricao_tipo_soli" required value="{descricao_tipo_soli}">
		    </div>
		  </div>
		  
			 <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default" id="btnCadastrar" >Salvar</button>
	    </div>
	  </div>
		</form>
</section>
