<?php $page = 'tabelas'; ?>
<?php require_once '../header.php'; ?>
<?php
	if($erroForm != null) {
		$tabela = $erroForm;
	} else if ($tabelaCarregada != null) {
		$tabela = $tabelaCarregada;
	} else {
		$tabela['faixa1'] = array("piso"=>"","teto"=>"","percent"=>"","max"=>"");
		$tabela['faixa2'] = array("piso"=>"","teto"=>"","percent"=>"","max"=>"");
		$tabela['faixa3'] = array("piso"=>"","teto"=>"","percent"=>"","max"=>"");
		$tabela['faixa4'] = array("piso"=>"","teto"=>"","percent"=>"","max"=>"");
		$tabela['teto'] = "";
	}
?>
	<div class="row mb-3">
		<div class="col">
   			<a href="tabelas_inss_lista.php" class="btn btn-success">Lista</a>
		</div>
	</div>
	<div class="card">
	  <div class="card-header" style="font-size: 20pt;">
	    Whatsapp
	  </div>
	  <div class="card-body">
	    <h4 class="card-title text-center mb-5">Abrir Whatsapp web</h4>

	   	<div class="forms-sample"  
	   		style="border-bottom: 1px solid;">
			<div class="form-group row">
				<div class="col">
            		<h5>Número com DDD</h5>
            	</div>
			</div>
            <div class="form-group row">
            	<div class="col">
	            	<div class="input-group">
				        <div class="input-group-prepend">
				          <div class="input-group-text"><i class="fa fa-phone"></i></div>
				        </div>
				        <input id="numero" class="form-control phoneBRddi" placeholder="+55 (61) 9999-9999" name="numero" value=""> 
			      	</div>
            	</div>
            </div>
            <div class="form-group text-center">
	       		<button class="btn btn-primary" onclick="abrir()">Abrir</button>
            </div>
        </div>
	  </div>
	</div>

<script type="text/javascript">

	function abrir() {
		const numero = $("#numero").val()
		const numeroSemMascara = numero.replace(/\D/g, '');
		window.open("https://api.whatsapp.com/send?phone=+"+numeroSemMascara, "_blank")
	}
</script>
<?php require_once '../footer.php'; ?>

