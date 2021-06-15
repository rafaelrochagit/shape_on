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
	<div class="card">
	  <div class="card-header" style="font-size: 20pt;">
	    Count
	  </div>
	  <div class="card-body">
	  

	   	<form class="forms-sample d-print-none" action="salvar.php" method="post" style="border-bottom: 1px solid;">
	   		<div class="row">
				<div class="col-9">
					<a class="btn btn-info" href="lista.php">Lista</a>
				</div>
				<div class="col-1 mt-1">
					<b>COD</b>		
				</div>
				<div class="col-2">
					<div class="form-group text-left">
						<input id="codCount" class="form-control" type="number" name="codCount" value="<?= $codCount?>" readonly>
					</div>
				</div>
			</div>
		  	<h4 class="card-title text-left mb-5">Quantidade</h4>
			<div id="countContainer">
			</div>
			<div class="form-group row">
				<div class="col-2">
					<a class="btn btn-warning" onclick="add()"><i class="fa fa-plus"></i></a>
				</div>
			</div>
			<div class="form-group text-left mt-5">
				<button type="submit" class="btn btn-primary">Salvar</button>
				<a href="resetar.php" class="btn btn-danger">Limpar</a>
			</div>
            
        </div>
	  </div>
	</div>

<script type="text/javascript">
	var index = 0;

	function input() {
		index++;
		return '<div class="form-group row" id="count' + index + '">' +
			'<div class="col-2">' +
			'<div class="">' +
			'<input class="form-control" type="number" min="0" step="1" placeholder="Quantidade" name="count[' + index + '][qtd]">' +
			'</div>' +	
			'</div>' +
			'<div class="col-6">' +
			'<div class="input-group">' +
			'<input class="form-control" placeholder="Descrição" name="count[' + index + '][descricao]" required>' +
			'</div>' +
			'</div>' +
			'<div class="col-2 mt-1">' +
			'<a class="btn btn-danger" onclick="remove(' + index + ')"><i class="fa fa-times"></i></a>' +
			'</div>' +
			'</div>';
	}

	function add() {
		$("#countContainer").append(input())
	}

	function remove(index) {
		$("#count" + index).remove()
	}


</script>
<?php require_once '../footer.php'; ?>


