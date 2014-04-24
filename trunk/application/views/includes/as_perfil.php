<script>
		$(function() {
			 var cache = {};
		    $("#as_perfil").autocomplete({
		          minLength: 2,
		          source: function( request, response ) {
		            var term = request.term;
		            if ( term in cache ) {
		              response( cache[ term ] );
		              return;
		            }
		     
		            $.getJSON( "<?php echo base_url()?>index.php/perfis_controller/as_perfil", request, function( data, status, xhr ) {
		              cache[ term ] = data;
		              response( data );
		            });
		          },
		          select: function( event, ui ) {
		              $('#hd_id_perfil').val(ui.item.id_perf)
		            },
		    });
		 
		});

		$(document).ready(function(){
			$('as_perfil').val("{descricao_perf}");
			});
		</script>
 <input type="hidden" class="form-control" placeholder="Perfil" name="id_perf" required name="nome_usu" value="{id_perf}" {opcao_adm} id="hd_id_perfil">
 <input type="text" class="form-control" placeholder="Perfil" required name="descricao_proj" {opcao_adm} id="as_perfil">