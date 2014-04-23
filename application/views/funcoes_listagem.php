<?php
	require_once('includes/head.php');
?>
<body>
	<blockquote>
	  <p>Listagem de Funções</p>
	</blockquote>
	
	<button type="button" class="btn btn-default navbar-btn" id="btn-novo"><span class="glyphicon glyphicon-plus"></span> Novo</button>
	
	<div class="table-responsive">
		<form class="form-horizontal" role="form" action='save' method='GET'>
		  	<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th style="display: none;">ID</th>	
						<th>Ativo</th>
						<th>Nome</th>
						<th>Projeto</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					{dados}
						<tr>
						<td style="display: none" id="id">{id_func}</td>
							<td>{ativo}</td>
							<td>{nome_func}</td>
							<td>{id_proj}</td>
							<td style="text-align: right">
								<button type="button" class="btn btn-default btn-sm" id='btn_edit'>
									<span class="glyphicon glyphicon-pencil"></span> Editar
								</button>
								<button type="button" class="btn btn-default btn-sm" id='btn_remove'>	
									<span class="glyphicon glyphicon-remove"></span> Excluir
								</button>
							</td>
					{/dados}
						</tr>
				</tbody>
		  	</table>
  	</form>
	</div>
</body>
</html>