<?php
	require_once('includes/head.php');
?>
<script>
	$(document).ready(function(){
			alert();
		if($('#inputId').val() == ''){
			$('#btnCadastrarFuncao').attr('disabled');
			$('#btnCadastrarFuncao').tooltip('show');
		}
		$('#btnCadastrarFuncao').hover(function(){
			if($('#id_proj').val() < 0){
				$('#btnCadastrarFuncao').attr('disabled');
				$('#btnCadastrarFuncao').tooltip('show');
			}
		});

	});
</script>
<body>
<section class="ajuste-98-porc">
<blockquote>
	  <p> Cadastro de Projetos</p>
	</blockquote>
	
		<form class="form-horizontal" role="form" id="cadastrar" method="POST" action="save">
	      <input type="hidden" class="form-control" id="inputId" placeholder="Digite o nome do projeto" name='id_proj' value='{id_proj}' >
		  
		  <div class="form-group">
		  		    <label for="inputNome" class="col-sm-2 control-label">Nome</label>
		    <div class="col-sm-10">
			  <input type="text" class="form-control" placeholder="Nome" name="nome_proj" required value="{nome_proj}">
		    </div>
		  </div>
			
  		  <div class="form-group">
		    <label for="inputNome" class="col-sm-2 control-label" >Descrição</label>
		    <div class="col-sm-10">
				  <textarea class="form-control" placeholder="Descrição" name="descricao_proj" required > {descricao_proj} </textarea>
		    </div>
		  </div>
		  
		  <div class="form-group">
		  		    <label for="inputNome" class="col-sm-2 control-label">Sigla</label>
		    <div class="col-sm-10">
			  <input type="text" class="form-control sigla" placeholder="Sigla" name="sigla_proj" required value="{sigla_proj}">
		    </div>
		  </div>

		  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default" id="btnCadastrar" >Salvar</button>
				<button class="btn btn-success" data-toggle="modal" data-target="#myModal" id="btnCadastrarFuncao" title="Projeto deve estar Cadastrado para poder vincular Funções.">
				  Cadastrar Funções
				</button>
	    </div>
	  </div>
	  
		</form>
</section>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <iframe src="<?php echo base_url()?>index.php/funcoes_controller/load_new"	style="width: 100%; padding: 0px; margin: 0px; border: none; display: block; min-height: 600px; overflow: hidden;">
			</iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div> 