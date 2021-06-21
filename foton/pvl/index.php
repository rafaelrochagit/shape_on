<?php $page = 'tabelas'; ?>
<?php require_once '../../header.php'; ?>
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

<style type="text/css">
	.indexJson {
		overflow-x: overlay;
		white-space : nowrap;
	    min-height: 40px;
	    font-size: 9pt;
	    text-align: right;
	}

	.tipo {
		width: 100px;
	}

	.size {
		width: 50px;
		display: block;
    	padding: 0;
	}

	.size .size-title {
	    font-size: 8pt;
    	font-weight: bold;
	}

	.size .size-value {
	    font-size: 10pt;
    	margin-top: -2px;
	}

</style>
	
	<div class="row mb-3">
		<div class="col">
   			<a href="lista.php" class="btn btn-success">Lista</a>
		</div>
	</div>
	<div class="card">
	  <div class="card-header" style="font-size: 20pt;">
	    PVL
	  </div>
	  <div class="card-body">
	  	<form class="forms-sample d-print-none mt-5" action="salvar.php" method="post" style="border-bottom: 1px solid;">
		    <div class="row">
		    	<div class="col-7">
		    		 <h4 class="card-title text-left mb-5">Gera partição variável string</h4>
		    	</div>
				<div class="col-1 mt-1">
					<b>COD</b>		
				</div>
				<div class="col-2">
					<div class="form-group text-left">
						<input id="codPvl" class="form-control" type="number" name="codPvl" value="<?= $codPvl?>">
					</div>
				</div>
				<div class="col-2 text-center">
					<button class="btn btn-dark"  type="submit">Salvar</button>
				</div>
			</div>
		   	<div class="forms-sample"  
		   		style="border-bottom: 1px solid;">
				<div class="form-group row">
					<div class="col">
	            		<h5>PVL JSON</h5>
	            	</div>
				</div>
	            <div class="form-group row">
	            	<div class="col-10">
		            	<div class="input-group">
					        <textarea id="jsonPvl" class="form-control" placeholder="" name="jsonPvl" value=""><?= $pvlResult["jsonPvl"] ?></textarea> 
				      	</div>
	            	</div>
	            	<div class="col-2">
	            		<a class="btn btn-primary" onclick="gerar()"> > </a>
	            	</div>
	            </div>
	        </div>
	        <div>
	    		<div class="form-group row mt-5">
	    			<div class="col">
	        			<h5>String Partição Variável</h5>
	    			</div>
	        	</div>

	        	<div class="form-group row">
	        		<div class="col">
	        			<pre id="particaoVariavel"></pre>
	        		</div>
	        	</div>

	        	<div class="row">
					<div class="col text-center">
						<a id="gerarString" class="btn btn-primary" onclick="gerarString()">Atualizar String Partição</a>
					</div>
				</div>
				
	        	<div id="result" class="forms-sample">
	        		<?php foreach($pvlResult['pvl'] as $index => $obj): ?>
	        			<div class="form-group row mt-4">
				        	<div class="col-3 mt-1">
				        		<div class="indexJson"><?=$index?></div>
				        	</div>
				        	<div class="col-8">
				            	<div class="input-group">
					            	<div class="input-group-prepend">
							          <div class="input-group-text tipo"><?=$obj["tipo"]?></div>
							        </div>
							        <?php if($obj[$index]["tipo"] == "String"): ?>
							        	<input id="<?= $index ?>" type="number" name="pvl[<?= $index?>][valor]"  
										onkeyup="tamanhoMaximo('<?= $index ?>', '<?= $obj['tamanho'] ?>')" 
										onchange="corrigeInput('<?= $index ?>', '<?= $obj['tamanho'] ?>', '<?= $obj['tipo'] ?>')" 
										class="form-control" placeholder="" value="<?= $obj['valor'] ?>">
							        <?php else: ?>
							        	<input id="<?= $index ?>" type="text" name="pvl[<?= $index?>][valor]"
							        	maxlength="<?= $obj['tamanho'] ?>" 
										onchange="corrigeInput('<?= $index ?>', '<?= $obj['tamanho'] ?>', '<?= $obj['tipo'] ?>')" 
										class="form-control" placeholder="" value="<?= $obj['valor'] ?>">
							        <?php endif; ?>
							        <input type="hidden" name="pvl[<?=$index?>][tipo]" value="<?= $obj['tipo'] ?>">
							        <input type="hidden" name="pvl[<?=$index?>][tamanho]" value="<?= $obj['tamanho'] ?>">
							        <input type="hidden" name="pvl[<?=$index?>][posicao-de-inicio]" value="<?= $obj['posicao-de-inicio'] ?>">
							        <div class="input-group-append">
								          <div class="input-group-text size">
								          	<div class="size-title">Size:</div>
								          	<div class="size-value"><?= $obj["tamanho"] ?> </div> 
							          	</div>
							        </div>
						      	</div>
				        	</div>
				        	<div class="col-1 mt-2"> 
				        		<span><b title="Posição Inicial">p</b>: <?= $obj["posicao-de-inicio"] ?></span>
				        	</div>
				        </div>
	        		<?php endforeach;?>
		        </div>
	        </div>
        </form>
	  </div>
	</div>
<?php require_once '../../footer.php'; ?>
<script type="text/javascript">

	$(document).ready(function(){
		gerarString()
	});
	
	function gerar() {
		const jsonPvl = $("#jsonPvl").val()
		const objPvl = JSON.parse(jsonPvl)
		$('#result').empty()
		for (var index in objPvl) {
			let input = formInput(index, objPvl)
			$('#result').append(input)
		}

		gerarString()
	}

	function formInput(index, obj) {
		//const inputHtml = 
		const inputsByType = {
			'Integer': 'inputNumber',
			'Long': 'inputNumber',
			'BigDecimal': 'inputNumber',
			'Boolean': 'inputNumber',
			'String': 'inputText',
		}

		const inputFunction = inputsByType[obj[index]['tipo']]

		const inputHtml = inputFunction != undefined ? window[inputFunction](index, obj) : inputText(index, obj)

		return '<div class="form-group row mt-4">' +
		        	'<div class="col-3 mt-1">' +
		        		'<div class="indexJson">'+index+'</div>'+
		        	'</div>' +
		        	'<div class="col-8">' +
		            	'<div class="input-group">' +
			            	'<div class="input-group-prepend">' +
					          '<div class="input-group-text tipo">'+obj[index]['tipo']+'</div>' +
					        '</div>' +
					        inputHtml + 
					        '<input type="hidden" name="pvl['+index+'][tipo]" value="'+obj[index]['tipo']+'">' +
					        '<input type="hidden" name="pvl['+index+'][tamanho]" value="'+obj[index]['tamanho']+'">' +
					        '<input type="hidden" name="pvl['+index+'][posicao-de-inicio]" value="'+obj[index]['posicao-de-inicio']+'">' +
					        '<div class="input-group-append">' +
						          '<div class="input-group-text size">' +
						          	'<div class="size-title">Size:</div>'+
						          	'<div class="size-value">'+obj[index]['tamanho']+'</div>' +
					          	'</div>' +
					        '</div>' +
				      	'</div>' +
		        	'</div>' +
		        	'<div class="col-1 mt-2">' +
		        		'<span><b title="Posição Inicial">p</b>: '+obj[index]['posicao-de-inicio']+'</span>'+
		        	'</div>' +
		        '</div>';
	}

	function inputNumber(index, obj) {
		const tamanho = obj[index]['tamanho']
		const tipo = obj[index]['tipo']
		const valor = stringRepetida('0', tamanho)
		return '<input id="'+index+'" type="number" name="pvl['+index+'][valor]" '+ 
			'onkeyup="tamanhoMaximo('+"'"+index+"'"+','+tamanho+')" '+
			'onchange="corrigeInput('+ "'"+index+"'" +','+ tamanho +','+ "'"+tipo+"'" +')"'+ 
			'class="form-control" placeholder="" value="'+valor+'">'
	}

	function inputText(index, obj) {
		const tamanho = obj[index]['tamanho']
		const tipo = obj[index]['tipo']
		const valor = stringRepetida('a', tamanho)
		return '<input id="'+index+'" type="text" maxlength="'+tamanho+'" name="pvl['+index+'][valor]" '+
			'onchange="corrigeInput('+ "'"+index+"'" +','+ tamanho +','+ "'"+tipo+"'" +')"'+ 
			'class="form-control" placeholder="" value="'+valor+'">'
	}

	function stringRepetida(char, tamanho) {
		let valor = ""
		for (var i = 0; i < tamanho; i++) {
		   valor = valor + char
		}
		return valor
	}

	function tamanhoMaximo(index, tamanho) {
		let inputVal = $('#'+index).val()
		if(inputVal.length > tamanho) {
			let newValue = inputVal.substring(0,tamanho)
			$('#'+index).val(newValue)
		}
	}

	function corrigeInput(index, tamanho, tipo) {
		const charByType = {
			'String': ' ',
			'Long': '0',
		}

		let inputVal = $('#'+index).val()
		let charPadrao = charByType[tipo]
		let charPadraoFinal = charPadrao != undefined ? charPadrao : charByType['Long']
		let complementoAEsquerda = ''

		if(inputVal.length < tamanho) {
			let diferenca = tamanho - inputVal.length
			complementoAEsquerda = stringRepetida(charPadraoFinal, diferenca)
		}

		let newVal = complementoAEsquerda+inputVal
		$('#'+index).val(newVal)
		gerarString()

	}

	function gerarString() {
		const jsonPvl = $("#jsonPvl").val()
		const objPvl = JSON.parse(jsonPvl)

		let valor = ""
		for (var index in objPvl) {
			let inputVal = $('#'+index).val()
			valor = valor + inputVal
		}

		$('#particaoVariavel').text(valor)
	}
</script>


