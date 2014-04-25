<?php
	require_once('includes/head.php');
?>
<body>
<section class="ajuste-98-porc">
	<blockquote>
	  <p> Cadastro de Indicadores</p>
	</blockquote>
	
		<form class="form-horizontal" role="form" id="cadastrar" method="POST" action="save">
	      <input type="hidden" class="form-control" id="inputId" placeholder="Digite o nome do perfil" name='id_ind' value='{id_ind}' >
		  
		  <div class="form-group">
		  		    <label for="inputNome" class="col-sm-2 control-label">Tipo</label>
		    <div class="col-sm-10">
			 <select class="form-control" name="tipo_ind">
			  <option value="D" {select_deflator}>Deflator</option>
			  <option value="I" {select_inflator}>Inflator</option>
			  <option value="IM" {select_item}>Item não Mensurável</option>
			 </select>
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <label for="inputNome" class="col-sm-2 control-label">Nome</label>
		    <div class="col-sm-10">
			  <input type="text" class="form-control" placeholder="Nome" name="descricao_ind" required value="{descricao_ind}">
		    </div>
		  </div>

		  <!-- 
  		  <div class="form-group">
		    <label for="inputNome" class="col-sm-2 control-label">Tipo</label>
		    <div class="col-sm-10">
				  <input type="text" class="form-control" placeholder="Tipo do indicador" name="tipo_ind" id="tipo_ind" required value="{tipo_ind}">
		    </div>
		  </div>
		   -->
		  

   		  <div class="form-group">
		    <label for="input" class="col-sm-2 control-label">Sigla</label>
		    <div class="col-sm-10">
			  <input type="text" class="form-control" placeholder="Sigla Incador" name="sigla_ind" id="sigla_ind" value="{sigla_ind}" maxlength="2">
		    </div>
		  </div>
		  
			
  		  <div class="form-group">
		  		    <label for="inputNome" class="col-sm-2 control-label">Regra</label>
		    <div class="col-sm-10">
			 <select class="form-control" name="regra_ind">
			  <option value="PC" {select_pc}>Ponto Contado</option>
			  <option value="PF" {select_pf}>Ponto de Função</option>
			 </select>
		    </div>
		  </div>
		  
  		  <div class="form-group">
		    <label for="inputNome" class="col-sm-2 control-label">Versão</label>
		    <div class="col-sm-10">
				  <input type="text" class="form-control" placeholder="Versão Indicador" name="versao_ind" required name="versao_ind" value="{versao_ind}">
		    </div>
		  </div>
		  
  		  <div class="form-group">
		    <label for="inputNome" class="col-sm-2 control-label">Valor</label>
		    <div class="col-sm-10">
				  <input type="text" class="form-control campo-double" placeholder="Valor do Indicador" name="valor" required name="valor" value="{valor}">
		    </div>
		  </div>
		  
  		  <div class="form-group">
		    <label for="inputNome" class="col-sm-2 control-label">Referência Indicador</label>
		    <div class="col-sm-10">
				  <input type="text" class="form-control" placeholder="Referência do Indicador" name="referencia_ind" required value="{referencia_ind}">
		    </div>
		  </div>
		  
  		  <div class="form-group">
		    <label for="inputNome" class="col-sm-2 control-label">Data de Referência</label>
		    <div class="col-sm-10">
				  <input type="text" class="form-control campo-data" placeholder="Data de Referencia do Identificador" name="data_referencia_ind" required value="{data_referencia_ind}">
		    </div>
		  </div>
		  
			 <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default" id="btnCadastrar" >Salvar</button>
	    </div>
	  </div>
		</form>
</section>