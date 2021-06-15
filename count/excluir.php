<?php
require_once 'COUNT.php'; 
session_start();
$count = new COUNT();
$simulacoesCount = $count->readSimulacoes();
$codSimulacaoCountAtual = isset($_GET['codCount']) ? $_GET['codCount'] : null;

if($codSimulacaoCountAtual != null) {
	
    unset($simulacoesCount['count'.$codSimulacaoCountAtual]);
    $count->salvarSimulacoes($simulacoesCount);
    $_SESSION["msgSuccess"] = "Simulação ".$codSimulacaoCountAtual." excluída com sucesso!";
} else {
    $_SESSION["msg"] = "Simulação não encontrada";
}
header("Location: lista.php");
?>