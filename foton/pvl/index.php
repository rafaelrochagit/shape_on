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

	.modal-body pre {
	    max-height: 30vw;
    	overflow: auto;
	}

	.display-none {
		display: none;
	}

</style>
	<form class="forms-sample d-print-none mt-5" action="salvar.php" method="post">
		<div class="row mb-3">
			<div class="col">
	   			<a href="lista.php" class="btn btn-success">Lista</a>
			</div>
		</div>
		<div class="card">
		  <div class="card-header" style="font-size: 20pt; display: flex;">
		  	<div class="col text-left">
		    	PVL
			</div>
		    <div class="col text-right">
				<button class="btn btn-dark" type="submit">Salvar</button>
			</div>
		  </div>
		  <div class="card-body">
		  	<div class="row">
		  		<div class="col">
		   			<a href="index.php" class="btn btn-info">Novo</a>
				</div>
		  	</div>
		  	<div class="forms-sample d-print-none mt-5" style="border-bottom: 1px solid;">
			    <div class="row">
			    	<div class="col-8">
			    		 <h4 class="card-title text-left mb-5">Gera partição variável string</h4>
			    	</div>
					<div class="col-1 mt-1">
						<b>COD</b>		
					</div>
					<div class="col-3">
						<div class="form-group text-left">
							<input id="codPvl" class="form-control" type="text" name="codPvl" value="<?= $codPvl?>">
						</div>
					</div>
					
				</div>
			   	<div class="forms-sample"  
			   		style="border-bottom: 1px solid;">
					<div class="form-group row">
						<div class="col">
		            		<h5>PVL JSON</h5>
		            	</div>
					</div>
		            <div id="inputPvl" class="form-group row <?=isset($pvlResult['jsonPvl']) ? 'display-none' : ''?>">
		            	<div class="col-10">
			            	<div class="input-group">
						        <textarea id="jsonPvl" class="form-control" placeholder="" name="jsonPvl" value=""><?= $pvlResult["jsonPvl"] ?></textarea> 
					      	</div>
		            		<a class="" onclick="cancelarEdicaoPvl()">Cancelar Edição</a>
		            	</div>
		            	<div class="col-2">
		            		<a class="btn btn-primary" onclick="gerar()"> > </a>
		            	</div>
		            </div>
	             	<div id="inputPvlActions" class="form-group row <?=isset($pvlResult['jsonPvl']) ? '' : 'display-none'?>">
		            	<div class="col-1">
			            	<a class="" onclick="verPvl()">Ver</a>
		            	</div>
		            	<div class="col-1">
		            		<a class="" onclick="editarPvl()">Editar</a>
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
		        		<div class="col-11">
		        			<input id="particaoVariavel" type="text"
		        			class="form-control  <?= isset($pvlResult['jsonPvl']) ? '' : 'display-none'?>"></input>
		        			<span id="erroString" class="display-none" style="color:red;">String com erro</span>
		        			<div id="alertString" class="col display-none p-1">
								<div class="alert alert-success p-1 mb-0" role="alert">
								  <strong>Sucesso!</strong> <span class="alertContent"></span>
								  <button type="button" class="close" aria-label="Close" onclick="(function(){$('#alertString').hide()})()">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>
							</div>
		        		</div>
		        		<div class="col-1">
							<a class="btn btn-danger" onclick="resetUltimaStringValida()">Reset</a>
						</div>
		        	</div>
		        	

		        	<div class="row mb-3">
						<div class="col text-center">
							<a class="btn btn-primary" onclick="stringChange()">Atualizar Variáveis</a>
						</div>
					</div>
					<div class="row mb-3">
						
					</div>

					<div class="form-group row mt-5">
		    			<div class="col">
		        			<h5>Varíaveis da String Partição Variável</h5>
		        			<div id="alertVariaveis" class="col display-none p-1">
								<div class="alert alert-success p-1 mb-0" role="alert">
								  <strong>Sucesso!</strong> <span class="alertContent"></span>
								  <button type="button" class="close" aria-label="Close" onclick="(function(){$('#alertString').hide()})()">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>
							</div>
		    			</div>
		        	</div>
	        		<div class="form-group row">
			        	<div class="col text-center">
							<a class="btn btn-dark" onclick="gerarString()">Atualizar String</a>
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
											class="form-control" placeholder="" value="<?= $obj['valor'] ?>">
											<!--onchange="corrigeInput('<?= $index ?>', '<?= $obj['tamanho'] ?>', '<?= $obj['tipo'] ?>')" -->
								        <?php else: ?>
								        	<input id="<?= $index ?>" type="text" name="pvl[<?= $index?>][valor]"
								        	maxlength="<?= $obj['tamanho'] ?>" 
											class="form-control" placeholder="" value="<?= $obj['valor'] ?>">
											<!--onchange="corrigeInput('<?= $index ?>', '<?= $obj['tamanho'] ?>', '<?= $obj['tipo'] ?>')" -->
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
			        <div class="form-group row">
			        	<div class="col text-center">
							<a class="btn btn-dark" onclick="gerarString()">Atualizar String</a>
						</div>
					</div>
		        </div>
	        </div>
		  </div>
		</div>

	    <div class="modal fade" id="modalPVL" tabindex="-1" role="dialog" aria-labelledby="modalAlertTitle" aria-hidden="true">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="modalAlertTitle">PVL</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <?= $pvlResult["jsonPvl"] ?>
		      </div>
		    </div>
		  </div>
		</div>
	</form>
<?php require_once '../../footer.php'; ?>
<script type="text/javascript">
	var valorStringParticaoVariavel = ''
	var tamanhoString = 0
	var jsonPvlConsolidado = ''

	$(document).ready(function(){
		gerarString(true)
	});

	function verPvl() {
		const jsonPvl = $("#jsonPvl").val()
		$('#modalPVL .modal-body').html('<pre>'+jsonPvl+'</pre>');
		$('#modalPVL').modal('show');
	}

	function editarPvl() {
		$('#inputPvl').css('display', 'flex');
		$('#inputPvlActions').hide();
	}

	function cancelarEdicaoPvl() {
		$('#inputPvl').hide();
		$('#inputPvlActions').show();
	}
	
	function gerar() {
		const jsonPvl = $("#jsonPvl").val()
		jsonPvlConsolidado = jsonPvl
		const objPvl = JSON.parse(jsonPvl)
		$('#result').empty()
		for (var index in objPvl) {
			let input = formInput(index, objPvl)
			$('#result').append(input)
		}

		gerarString()
		cancelarEdicaoPvl();
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
			//'onchange="corrigeInput('+ "'"+index+"'" +','+ tamanho +','+ "'"+tipo+"'" +')"'+ 
			'class="form-control" placeholder="" value="'+valor+'">'
	}

	function inputText(index, obj) {
		const tamanho = obj[index]['tamanho']
		const tipo = obj[index]['tipo']
		const valor = stringRepetida('a', tamanho)
		return '<input id="'+index+'" type="text" maxlength="'+tamanho+'" name="pvl['+index+'][valor]" '+
			//'onchange="corrigeInput('+ "'"+index+"'" +','+ tamanho +','+ "'"+tipo+"'" +')"'+ 
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
		//gerarString()
		return newVal

	}

	function gerarString(isFirstChargePage = false) {
		if(isFirstChargePage){
			jsonPvlConsolidado = $("#jsonPvl").val()
		}
		
		const jsonPvl = jsonPvlConsolidado
		if(jsonPvl == '' || jsonPvl == undefined) return
		const objPvl = JSON.parse(jsonPvl)

		let valor = ""
		for (var index in objPvl) {
			let inputVal = $('#'+index).val()
			let newInputVal = corrigeInput(index, objPvl[index]['tamanho'], objPvl[index]['tipo'])
			valor = valor + newInputVal
		}

		tamanhoString = valor.length
		valorStringParticaoVariavel = valor
		$('#particaoVariavel').val(valor)
		$('#particaoVariavel').show()
		if(!isFirstChargePage) successAlertString('Valor String Partição Variável atualizado')
	}

	function stringChange() {
		const jsonPvl = jsonPvlConsolidado
		const objPvl = JSON.parse(jsonPvl)
		const novaString = $('#particaoVariavel').val()
		if(tamanhoString != novaString.length) {
			const msg = 'Novo tamanho da string('+novaString.length+') não condiz com o tamanho correto('+tamanhoString+')'
			//errorMessage(msg)
			errorString(msg)
			$('#alertString').hide()
			return
		}
		valorStringParticaoVariavel = novaString
		stringOk()
		for (var index in objPvl) {
			const posicaoInicio = objPvl[index]['posicao-de-inicio']
			const posicaoFinal = posicaoInicio + objPvl[index]['tamanho']
			$('#'+index).val(novaString.substring(posicaoInicio, posicaoFinal))
		}
		successAlertVariaveis("Inputs de Varíaveis da String Partição Variável atualizados")

	}

	function atualizarString() {
		if($('#particaoVariavel').val() != valorStringParticaoVariavel) {
			stringChange();
		} else {
			gerarString();
		}
	}

	function resetUltimaStringValida() {
		$('#particaoVariavel').val(valorStringParticaoVariavel)
		stringChange();
	}

	function successAlertString(msg) {
		$('#alertString .alertContent').text(msg);
		$('#alertString').show();
		timeOutHide('alertString', 5);
	}

	function successAlertVariaveis(msg) {
		$('#alertVariaveis .alertContent').text(msg);
		$('#alertVariaveis').show();
		timeOutHide('alertVariaveis', 5);	
	}

	function errorString(msg='') {
		$('#particaoVariavel').css('border', '1px solid red');
		if(msg != '') $('#erroString').text(msg)
		$('#erroString').show();
	}

	function stringOk() {
		$('#particaoVariavel').css('border', '1px solid #ced4da;');
		$('#erroString').hide();
	}

</script>


