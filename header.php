<?php
require_once 'shared.php'; 	

?>
<html>
    <head>
	 	<title>Shape On</title>

			<!-- css -->
     	<link rel="shortcut icon" type="image/x-icon" href="<?=$base?>/assets/img/icon-biceps2.png">
		<link rel="manifest" href="<?=$base?>/src/pwa/manifest.json">
		<link rel="stylesheet" type="text/css" href="<?=$base?>/assets/bootstrap-5.1.3/css/bootstrap.min.css">
       	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       	<link rel="stylesheet" type="text/css" href="<?=$base?>/assets/css/dripicons/webfont.css">
       	<link rel="stylesheet" type="text/css" href="<?=$base?>/assets/css/addtohomescreen.css">

		<!-- js -->
		<script type='text/javascript' src='<?=$base?>/assets/js/jquery-1.11.0.js'></script>
		<script type='text/javascript' src='<?=$base?>/assets/bootstrap-5.1.3/js/bootstrap.bundle.min.js'></script>
		<script type='text/javascript' src='<?=$base?>/assets/js/addtohomescreen.min.js'></script>
    </head>
    <style type="text/css">
        .menu {
            display: flex;
        }

        .modal-success .modal-content{
        	color: #155724;
		    background-color: #d4edda;
		    border-color: #c3e6cb;
        }

        .modal-success .modal-header {
        	border-bottom: 1px solid #b1dfbb;
        }

        .modal-danger .modal-content {
		    color: #721c24;
		    background-color: #f8d7da;
		    border-color: #f5c6cb;
        }

        .modal-danger .modal-header {
        	border-bottom: 1px solid #b67772e3;
        }
        
        input[readonly] {
        	cursor: not-allowed;
        }

        .media {
    	    border-bottom: 1px solid;
    		padding-bottom: 25px;
    		padding-top: 25px;
        }

        a {
        	cursor: pointer;
        }

		body {
			background-color: <?= $bodyBgCor ?> !important;
		}

		.text-right {
			text-align: right !important;
		}
		.text-left {
			text-align: left !important;
		}
    </style>
    <body>

		<main class="container mt-5">
			<?php if($msg!= null):?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Error!</strong> <?= $msg ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<?php endif; ?>
			<?php if($msgSuccess!= null):?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Sucesso!</strong> <?= $msgSuccess ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<?php endif; ?>