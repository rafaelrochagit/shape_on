<?php
require_once 'PVL.php'; 
session_start();

$pvl = new PVL();

$simulacoes = $pvl->read();
$codSimulacaoPvlAtual = isset($_GET['codPvl']) ? $_GET['codPvl'] : null;

if($codSimulacaoPvlAtual != null) {

    unset($simulacoes['pvl'.$codSimulacaoPvlAtual]);
    $pvl->salvar($simulacoes);
    $_SESSION["msgSuccess"] = "Simulação ".$codSimulacaoPvlAtual." excluída com sucesso!";
} else {
    $_SESSION["msg"] = "Simulação não encontrada";
}
header("Location: lista.php");
?>