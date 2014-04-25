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
			{dados}
				<li value="{url}"><a>{nome}</a></li>
			{/dados}
			<li><a href="<?php echo base_url();?>index.php/acesso/deslogar">Sair</a></li>
		</ul>
	</nav>
			<iframe src=""	style="width: 100%; padding: 0px; margin: 0px; border: none; display: block; min-height: 600px; overflow: hidden;">
			</iframe>
</body>
</html>