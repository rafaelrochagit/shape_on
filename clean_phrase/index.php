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
	    Limpa Frase
	  </div>
	  <div class="card-body">
	    <h4 class="card-title text-center mb-5">Limpar caracteres especiais</h4>

	   	<div class="forms-sample"  
	   		style="border-bottom: 1px solid;">
			<div class="form-group row">
				<div class="col">
            		<h5>Frase</h5>
            	</div>
			</div>
            <div class="form-group row">
            	<div class="col-10">
	            	<div class="input-group">
				        <input id="frase" class="form-control" placeholder="" name="frase" value=""> 
			      	</div>
            	</div>
            	<div class="col-2">
            		<button class="btn btn-primary" onclick="clean()"> > </button>
            	</div>
            </div>
            
        </div>
        <div id="result">
        	<div class="forms-sample">

	            <div class="form-group row mt-4">
	            	<div class="col-2">
	            		<h5>Sem Acentos</h5>
	            	</div>
	            	<div class="col">
		            	<div class="input-group">
					        <input id="fraseSemAcentos" class="form-control" placeholder="" value=""> 
				      	</div>
	            	</div>
	            </div>


	            <div class="form-group row mt-4">
	            	<div class="col-2">
	            		<h5>Só primeira maiúscula</h5>
	            	</div>
	            	<div class="col">
		            	<div class="input-group">
					        <input id="fraseSoPrimeiraMaiuscula" class="form-control" placeholder="" value=""> 
				      	</div>
	            	</div>
	            </div>

	            <div class="form-group row mt-4">
	            	<div class="col-2">
	            		<h5>Cammon Case Maiusculo</h5>
	            	</div>
	            	<div class="col">
		            	<div class="input-group">
					        <input id="fraseCammonCaseMaiuculo" class="form-control" placeholder="" value=""> 
				      	</div>
	            	</div>
	            </div>

             	<div class="form-group row mt-4">
	            	<div class="col-2">
	            		<h5>Cammon Case</h5>
	            	</div>
	            	<div class="col">
		            	<div class="input-group">
					        <input id="fraseCammonCase" class="form-control" placeholder="" value=""> 
				      	</div>
	            	</div>
	            </div>

	            <div class="form-group row mt-4">
	            	<div class="col-2">
	            		<h5>Com Traço</h5>
	            	</div>
	            	<div class="col">
		            	<div class="input-group">
					        <input id="fraseComTraco" class="form-control" placeholder="" value=""> 
				      	</div>
	            	</div>
	            </div>
	            
	        </div>
        </div>
	  </div>
	</div>

<script type="text/javascript">

	function clean() {
		const frase = $("#frase").val()
		const fraseSemAcentos = limpaAcentos(frase)
		const fraseSoPrimeiraMaiuscula = soPrimeiraMaiuscula(fraseSemAcentos)
		const fraseCammonCase = cammonCase(fraseSemAcentos)
		const fraseCammonCaseMaiuculo = cammonCaseMaiusculo(fraseSemAcentos)
		const fraseComTraco = comTraco(fraseSemAcentos)

		$("#fraseSemAcentos").val(fraseSemAcentos)
		$("#fraseSoPrimeiraMaiuscula").val(fraseSoPrimeiraMaiuscula)
		$("#fraseCammonCase").val(fraseCammonCase)
		$("#fraseCammonCaseMaiuculo").val(fraseCammonCaseMaiuculo)
		$("#fraseComTraco").val(fraseComTraco)
		
	}

	function limpaAcentos(str) {
	    return str.normalize('NFD').replace(/[\u0300-\u036f]/g, "");
	}

	function cammonCase(str) {
		let frase = cammonCaseMaiusculo(str)

		frase = frase.charAt(0).toLowerCase() + frase.slice(1);
		return frase
	}

	function cammonCaseMaiusculo(str) {

		let frase = str.split(' ')
				   .map(w => w[0].toUpperCase() + w.substr(1).toLowerCase())
				   .join('')

		return frase
	}

	function comTraco(str) {

		let frase = str.split(' ')
				   .map(w => w.toLowerCase())
				   .join('-')

		return frase
	}

	function soPrimeiraMaiuscula(str) {

		let frase = str.split(' ')
				   .map(w => w.toLowerCase())
				   .join(' ')

		frase = frase.charAt(0).toUpperCase() + frase.slice(1);
		return frase
	}


</script>
<?php require_once '../footer.php'; ?>

