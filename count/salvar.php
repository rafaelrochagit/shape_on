<?php require_once '../shared.php'; ?>
<?php require_once '../util.php'; ?>
<div class="col">
    <a href="index.php" class="btn btn-success">Nova Simulação</a>
</div>
<?php
$form = $_POST;
$codCount = isset($form['codCount']) ? $form['codCount'] : '';
$count->formSimulacao($form);

header("Location: contador.php?codCount=" . $codCount);





?>