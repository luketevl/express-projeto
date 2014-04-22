<?php
	require_once('includes/head.php');
?>
	<body>
	<blockquote>
		<p> Opções do sistema </p>
	</blockquote>
<form class="form-horizontal" role="form" id="cadastrar" method="POST" action="<?php echo base_url()?>index.php/opcoes_controller/save">
	<input type="hidden" name="id_opc" name="id_opc" value="{id_opc}"/>
  <div class="form-group">
    <label for="inputProposito" class="col-sm-2 control-label">Proposito</label>
    <div class="col-sm-3">
      <textarea class="form-control" id="proposito" name="proposito_opc" placeholder="Digite o proposito"  value="{proposito_opc}">{proposito_opc}</textarea>
<!-- 
       <input type="text" class="form-control" id="proposito" name="proposito_opc" placeholder="Digite o proposito"  value="{proposito_opc}" />
 -->
    </div>
  </div>
  <div class="form-group">
    <label for="inputCep" class="col-sm-2 control-label">Servidor SMTP</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="servidor" name="servidor_smtp" placeholder="Servidor SMTP"  value="{servidor_smtp}" />
    </div>
  </div>
  <div class="form-group">
    <label for="inputCep" class="col-sm-2 control-label">Usuário SMTP</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="usuario" name="usuario_smtp" placeholder="Usuário SMTP"  value="{usuario_smtp}" />
    </div>
  </div>
  <div class="form-group">
    <label for="inputCep" class="col-sm-2 control-label">Senha SMTP</label>
    <div class="col-sm-3">
      <input type="password" class="form-control" id="senha_smtp" name="senha_smtp" placeholder="Senha SMTP"  value="{senha_smtp}" />
    </div>
  </div>
  <div class="form-group">
    <label for="inputCep" class="col-sm-2 control-label">Porta</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="porta_smtp" name="porta_smtp" placeholder="Exemplo: 25"  value="{porta_smtp}" />
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