<?php $page = 'mei'; ?>
<?php require_once '../../header.php'; ?>
<?php 
    usort($pvls, function($a, $b) {
        $dt1 = isset($a['data']) ? new DateTime($a['data']) : null; 
        $dt2 = isset($b['data']) ? new DateTime($b['data']) : null; 
        return $dt1 > $dt2 ? -1 : 1;
    });
?>

    <style>

        nav {
            display: none !important;
        }

    </style>

	<div class="row mb-3">
		<div class="col">
			<a class="btn btn-primary" href="index.php">Voltar</a>
		</div>
	</div>
	<h2 class="text-center">Lista PVL</h2>
	<div class="row">
		<div class="col">
			<?php if(count($pvls) > 0): ?>
			<table class="table">
                <thead>
                    <tr>
                        <th>COD</th>
                        <th>Data</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
				<?php foreach($pvls as $s): 
                    $dt = isset($s['data']) ? (new DateTime($s['data']))->format('d/m/y H:i:s') : '-';     
                ?>
		  		<tr>
                    <td>#<?= $s['codPvl'] ?></td>
                    <td><?= $dt ?></td>
                    <td><a class="ml-3" href="index.php?codPvl=<?= $s['codPvl'] ?>">Ver</a>
					<a class="ml-3" href="excluir.php?codPvl=<?= $s['codPvl'] ?>">Excluir</a></td>
                </tr>
				<?php endforeach; ?>
                </tbody>
			</table>
			<?php else : ?>
			<h6 class="text-center mt-5">Nenhum resultado encontrado</h6>
			<?php endif; ?>
		</div>
	</div>

<div id="modalTabela" class="modal fade bd-example-modal-lg" tabindex="-1"
 role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="modalTabelaLabel">Large modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col"><h5>Faixa</h5></div>
        	<div class="col"><h5>Piso</h5></div>
        	<div class="col"><h5>Teto</h5></div>
        	<div class="col"><h5>%</h5></div>
        	<div class="col"><h5>Valor Máximo</h5></div>
        </div>
     	<div class="row mt-2">
        	<div class="col"><h6>1ª Faixa Salarial</h6></div>
        	<div class="col">R$ <span id="piso1"></span></div>
        	<div class="col">R$ <span id="teto1"></span></div>
        	<div class="col"><span id="percent1"></span>%</div>
        	<div class="col">R$ <span id="max1"></span></div>
        </div>
        <div class="row mt-2">
        	<div class="col"><h6>2ª Faixa Salarial</h6></div>
        	<div class="col">R$ <span id="piso2"></span></div>
        	<div class="col">R$ <span id="teto2"></span></div>
        	<div class="col"><span id="percent2"></span>%</div>
        	<div class="col">R$ <span id="max2"></span></div>
        </div>
        <div class="row mt-2">
        	<div class="col"><h6>3ª Faixa Salarial</h6></div>
        	<div class="col">R$ <span id="piso3"></span></div>
        	<div class="col">R$ <span id="teto3"></span></div>
        	<div class="col"><span id="percent3"></span>%</div>
        	<div class="col">R$ <span id="max3"></span></div>
        </div>
        <div class="row mt-2">
        	<div class="col"><h6>4ª Faixa Salarial</h6></div>
        	<div class="col">R$ <span id="piso4"></span></div>
        	<div class="col">R$ <span id="teto4"></span></div>
        	<div class="col"><span id="percent4"></span>%</div>
        	<div class="col">R$ <span id="max4"></span></div>
        </div>
        <div class="row mt-2">
        	<div class="col"><h6>Teto</h6></div>
        	<div class="col">-</div>
        	<div class="col">-</div>
        	<div class="col">-</div>
        	<div class="col">R$ <span id="tetoTotal"></span></div>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>


<?php require_once '../footer.php'; ?>