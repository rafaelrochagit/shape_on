<?php require_once '../../shared.php'; ?>
<?php require_once '../../util.php'; ?>
<div class="col">
    <a href="index.php" class="btn btn-success">Nova Simulação</a>
</div>
<?php
$form = $_POST;
$codPvl = isset($form['codPvl']) ? $form['codPvl'] : '';
$pvl->form($form);
$_SESSION["msgSuccess"] = 'PVL salva!';
header("Location: index.php?codPvl=" . $codPvl);





?>