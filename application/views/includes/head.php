<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Responsive Retina-Friendly Menu with different, size-dependent layouts" />
		<meta name="keywords" content="responsive menu, retina-ready, icon font, media queries, css3, transition, mobile" />
		<meta name="author" content="Codrops" />
		<title>Bem Vindo - Express</title>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

        <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
        
	    <script src="<?php echo base_url()?>resources/js/jquery.maskedinput.js" type="text/javascript"></script>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="<?php echo base_url()?>resources/css/bootstrap.min.css">

		<link rel="stylesheet" href="<?php echo base_url()?>resources/css/doc.css">

		<!-- Optional theme
		<link rel="stylesheet" href="<?php echo base_url()?>resources/css/bootstrap-theme.min.css">
		 -->

		<link rel="stylesheet" href="<?php echo base_url()?>resources/css/normalize.css">
		<link rel="stylesheet" href="<?php echo base_url()?>resources/css/style.css">
		<!-- 
		Latest compiled and minified JavaScript -->
		<script src="<?php echo base_url()?>resources/js/bootstrap.min.js"></script>

		<script src="<?php echo base_url()?>resources/js/noty/packaged/jquery.noty.packaged.js"></script>

		<script src="<?php echo base_url()?>resources/js/validator-form/jquery.validate.js"></script>
		<script src="<?php echo base_url()?>resources/js/validator-form/packaged/additional-methods.js"></script>
		<script src="<?php echo base_url()?>resources/js/validator-form/packaged/jquery.noty.packaged.js"></script>
		<script src="<?php echo base_url()?>resources/js/validator-form/localization/messages_pt_BR.js "></script>
		<script src="<?php echo base_url()?>resources/js/jquery.tools.min.js "></script>
		<script src="<?php echo base_url()?>resources/js/bootstrap-filestyle.js "></script>
		<script src="<?php echo base_url()?>resources/js/jquery.MultiFile.js "></script>

		<script src="<?php echo base_url()?>resources/js/jquery-upload.js "></script>

		<script src="<?php echo base_url()?>resources/js/tablesorter/jquery.tablesorter.js"></script>
		<script src="<?php echo base_url()?>resources/js/tablesorter/wid.js"></script>
		
		
		<script src="<?php echo base_url()?>resources/js/funcoes.js"></script>


<script>
		$(document).ready(function(){
		function removeTodos(n){}
		function feedback(msg){
			var obj = jQuery.parseJSON(msg);
			if(obj.cod == '-1'){
	        	var n = noty({text: obj.msg, type: 'error', shadow: false, styling: "bootstrap" , hide: true, delay: 500,
				killer: true

	        });
	        	removeTodos(n);
		          	}
	      	else if(obj.cod == '1'){
	      		var n = noty({text: obj.msg, type: 'success',shadow: false, styling: "bootstrap" , hide: true, delay: 500,
	      	killer: true
			});
	  			removeTodos(n);
	      	}
	      	return obj.cod;
	}
		$(function(){
			  $("table").tablesorter();
			});
		});

</script>
	</head>
