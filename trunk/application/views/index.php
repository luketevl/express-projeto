<?php
require_once ('includes/head.php');
?>
<script>
	$(document).ready(function(){
		$('nav > ul > li').click(function(){
			var url = $(this).attr('value');
			$('iframe').attr('src',url);
			$('nav > ul > li').each(function(){
				$(this).removeClass();
			});
			$(this).addClass('active');
		});
		
	});
</script>
<body>
	<blockquote>
		<p>Página Inicial</p>
	</blockquote>
	<nav id="menu">
		<ul class="nav nav-tabs nav-justified">
			<li class="active"><a>Início</a></li>
			<li value="index.php/usuarios_controller/"><a>Usuários</a></li>
			<li value="index.php/perfis_controller/"><a>Perfil</a></li>
			<li value="index.php/projetos_controller/"><a>Projetos</a></li>
			<li value="index.php/funcoes_controller/"><a>Funções</a></li>
			<li value="index.php/indicadores_controller/"><a>Indicadores</a></li>
			<li value="index.php/solicitacoes_controller/"><a>Solicitações</a></li>
		</ul>
	</nav>
			<iframe src=""	style="width: 100%; padding: 0px; margin: 0px; border: none; display: block; min-height: 600px; overflow: hidden;">
			</iframe>
</body>
</html>