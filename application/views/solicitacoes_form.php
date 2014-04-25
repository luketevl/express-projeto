<?php
	require_once('includes/head.php');
?>
<body>
<section class="ajuste-98-porc">
	<blockquote>
	  <p> Cadastro de Solicitações</p>
	</blockquote>
	
		<form class="form-horizontal" role="form" id="cadastrar" method="POST" action="save">
	      <input type="hidden" class="form-control" id="inputId" placeholder="Digite o nome do perfil" name='id_soli' value='{id_soli}' >
		  
		  <div class="form-group">
		  		    <label for="inputNome" class="col-sm-2 control-label">Tipo Solicitação</label>
		    <div class="col-sm-10">
			 <select class="form-control" name="id_tipo_soli">
				  <option>Selecione</option>
			  {tipo_solicitacoes}
				  <option value="{id_tipo_soli}">{descricao_tipo_soli}</option>
			  {/tipo_solicitacoes}
			 </select>
		    </div>
		  </div>
		  
		  <div class="form-group">
		  		    <label for="inputNome" class="col-sm-2 control-label">Projeto</label>
		    <div class="col-sm-10">
			 <select class="form-control" name="id_proj">
				  <option>Selecione</option>
			  {todos_projetos}
				  <option value="{id_proj}">{nome_proj}</option>
			  {/todos_projetos}
			 </select>
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label for="inputNome" class="col-sm-2 control-label">Sigla</label>
		    <div class="col-sm-10">
			  <input type="text" class="form-control" placeholder="Sigla" name="sigla_soli" required value="{sigla_soli}">
		    </div>
		  </div>


   		  <div class="form-group">
		    <label for="input" class="col-sm-2 control-label">Identificador</label>
		    <div class="col-sm-10">
			  <textarea class="form-control" placeholder="Identificador" name="identificacao_soli" id="identificacao_soli">{identificacao_soli} </textarea>
		    </div>
		  </div>
		  
			
  		  <div class="form-group">
		    <label for="inputNome" class="col-sm-2 control-label">Data</label>
		    <div class="col-sm-10">
				  <input type="text" class="form-control campo-data" placeholder="Data" name="data_soli" required value="{data_soli}">
		    </div>
		  </div>
			
			 <div class="form-group">
		  		    <label for="inputNome" class="col-sm-2 control-label">Técnica</label>
		    <div class="col-sm-10">
			 <select class="form-control" name="tipo_ind">
			  <option value="E" {select_estimada}>Estimada</option>
			  <option value="D" {select_detalhada}>Detalhada</option>
			 </select>
		    </div>
		  </div>
			
			 <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default" id="btnCadastrar" >Salvar</button>
	    </div>
	  </div>
		</form>
</section>