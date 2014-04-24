<?php
	require_once('includes/head.php');
?>
<script>
jQuery(function($) {

    var multiTags = $("#multi");

    function handler(e) {
        var jqEl = $(e.currentTarget);
        var tag = jqEl.parent();
        switch (jqEl.attr("data-action")) {
        case "add":
            tag.after(tag.clone().find("input").val("").end());
            break;
        case "delete":
            tag.remove();
            break;
        }
        return false;
    }

    function save(e) {
        var tags = multiTags.find("input.tag").map(function() {
            return $(this).val();
        }).get().join(',');
        alert(tags);
        return false;
    }
    multiTags.submit(save).find("a").live("click", handler);
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
		    <label for="inputNome" class="col-sm-2 control-label">Descrição</label>
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

		  
		  <blockquote>
	  		<p> Lista de Funções</p>
	      </blockquote>
		  
		  <div class="form-group" id="">
		  		    <label for="inputNome" class="col-sm-2 control-label">Nome da Função</label>
		    <div class="col-sm-10">
				  <input type="text" class="form-control tag" placeholder="Sigla" name="funcoes[]" required value="{nome_func}">
			        <a href="#" data-action="add">Adicionar</a>
			        <a href="#" data-action="delete">Remover</a>
			  
		    </div>
		  </div>
		  
			 <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default" id="btnCadastrar" >Salvar</button>
	    </div>
	  </div>
		</form>
</section>


<form id="multi">
    <div>
        <label>Tag</label><input class="tag" type="text" name="" type="text" />
        <a href="#" data-action="add">add</a>
        <a href="#" data-action="delete">delete</a>
    </div>
    <input type="submit" value="save" >
</form>