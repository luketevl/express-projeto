$(document).ready(function(){
	$('a').tooltip();

	$('.campo-data').mask('9999-99-99');
	$('.campo-double').mask('99.99');
	$('.campo-senha').mask('******?******',{placeholder:""});

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
		else if($(this).attr('id') == 'btn_remove'){
			var temp = $(this).parent().parent();
			var id = temp.find('td#id').html();
			var url = $(location).attr('href');
			$(window.document.location).attr('href',url+'/deletar?id='+id);
		}
	})
	});
