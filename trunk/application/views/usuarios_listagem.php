<?php
	require_once('includes/head.php');
?>
<body>
	<blockquote>
	  <p>Listagem de Usuários</p>
	</blockquote>
	
	<button type="button" class="btn btn-default navbar-btn" id="btn-novo"><span class="glyphicon glyphicon-plus"></span> Novo</button>
	
	<div class="table-responsive">
		<form class="form-horizontal" role="form" action='save' method='GET'>
		  	<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th style="display: none;">ID</th>	
						<th>Nome</th>
						<th>Email</th>
						<th>Perfil</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					{dados}
						<tr>
						<td style="display: none" id="id">{id_usu}</td>
							<td>{nome_usu}</td>
							<td>{email_usu}</td>
							<td>{descricao_perf}</td>
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