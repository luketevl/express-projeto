<?php
	require_once('includes/head.php');
?>
<body>
	<blockquote>
	  <p>Listagem de Perfis</p>
	</blockquote>
	
	<div class="table-responsive">
  	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>	
				<th>Nome</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			{dados}
				<tr>
					<td>{descricao_perf}</td>
					<td style="text-align: right">
						<button type="button" class="btn btn-default btn-sm">
							<span class="glyphicon glyphicon-pencil"></span> Editar
						</button>
						<button type="button" class="btn btn-default btn-sm">
							<span class="glyphicon glyphicon-remove"></span> Excluir
						</button>
					</td>
			{/dados}
				</tr>
		</tbody>
  	</table>
	</div>
</body>
</html>