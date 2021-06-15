<?php $page = 'tabelas'; ?>
<?php require_once '../header.php'; ?>
<?php

$form = getFromArray($countResult, 'form');
$counts = getFromArray($form, 'count', array());

?>

	<style type="text/css">

		.check {
			display: none;
		}

	</style>
	
	<div class="card">
	  <div class="card-header" style="font-size: 20pt;">
	    Count
	  </div>
	  <div class="card-body">
	  

	   	<form class="forms-sample d-print-none" action="salvar.php" method="post" style="border-bottom: 1px solid;">
	   		<div class="row">
				<div class="col-9">
					<?php if($usuarioLogado): ?>
						<a class="btn btn-info" href="lista.php">Lista</a>
					<?php endif; ?>
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
				<?php foreach($counts as $index => $c): ?>
					<div class="row mb-3">
						<div class="col-1" id="qtd<?= $index ?>">
							<?= $c['qtd'] ?>
						</div>
						<div class="col-5">
							<?= $c['descricao'] ?>
						</div>
						<div class="col-3">
							<input id="input<?=$index?>" type="form-control" value="0" disabled>
							<div id="check<?=$index?>" class="check">
								<span class="text-success"><i class="fa fa-check"></i></span>
							</div>
						</div>
						<div class="col-2">
							<a class="btn btn-danger" onclick="plus(<?=$index?>)"><i class="fa fa-plus"></i></a>
							<a class="btn btn-success" onclick="minus(<?=$index?>)"><i class="fa fa-minus"></i></a>
						</div>
					</div>
					
				<?php endforeach;?>
			</div>

			<div class="form-group text-left mt-5">
				<a onclick="reload()" class="btn btn-dark">Limpar</a>
			</div>
			
            
        </div>
	  </div>
	</div>

<script type="text/javascript">
	
	function plus(index) {
		const inputIndex = "#input"+index
		const qtdIndex = "#qtd"+index
		const checkIndex = "#check"+index

		let qtdAtual = $(inputIndex).val()
		let qtd = $(qtdIndex).text()

		qtdAtual++

		if(qtdAtual <= qtd) {
			$(inputIndex).val(qtdAtual)
		} 

		checkUpdate(index)
	}

	function minus(index) {
		const inputIndex = "#input"+index
		const qtdIndex = "#qtd"+index
		const checkIndex = "#check"+index

		let qtdAtual = $(inputIndex).val()
		let qtd = $(qtdIndex).text()

		qtdAtual--

		if(qtdAtual >= 0) {
			$(inputIndex).val(qtdAtual)
		} 

		checkUpdate(index)
	}

	function checkUpdate(index) {
		const inputIndex = "#input"+index
		const qtdIndex = "#qtd"+index
		const checkIndex = "#check"+index

		let qtdAtual = parseInt($(inputIndex).val())
		let qtd = parseInt($(qtdIndex).text())

		if (qtdAtual == qtd) {
			$(checkIndex).css('display', 'inline-flex')
		} else {
			$(checkIndex).css('display', 'none')
		}
	}

	function reload() {
		document.location.reload(true);
	}


</script>
<?php require_once '../footer.php'; ?>


