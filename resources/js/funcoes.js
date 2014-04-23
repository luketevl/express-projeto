$(document).ready(function(){
	$('a').tooltip();

	$('.campo-data').mask('9999-99-99');
	$('.campo-double').mask('999.99');

	$('#cep').keypress(function(){
		$('#grupoCep').removeClass('has-error');
		$('#carrega').hide();
	});

	$('#btn-novo').click(function(){
		var url = $(location).attr('href');
		$(window.document.location).attr('href',url+'/load_new');
		
	});
	$('button').click(function(){
		if($(this).attr('id') == 'btn_edit'){
			var temp = $(this).parent().parent();
			var id = temp.find('td#id').html();
			var url = $(location).attr('href');
			$(window.document.location).attr('href',url+'/load_form?id='+id);
		}
	})
	$('button').click(function(){
		if($(this).attr('id') == 'btn_remove'){
			var temp = $(this).parent().parent();
			var id = temp.find('td#id').html();
			var url = $(location).attr('href');
			$(window.document.location).attr('href',url+'/deletar?id='+id);
		}
	})
	});
