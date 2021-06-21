<?php
error_reporting(E_ALL);
error_reporting(E_ERROR);

$base_url = __DIR__."/";
if($_SERVER['HTTP_HOST'] == 'localhost') $base = "/ferramentas";
else $base = "";

ob_start();
require_once $base_url.'util.php'; 	
require_once $base_url.'count/COUNT.php'; 	
require_once $base_url.'foton/pvl/PVL.php'; 	


$count = new COUNT();
$pvl = new PVL();

date_default_timezone_set('America/Sao_Paulo');
$pagina = isset($page) ? $page : 'home';

session_start();
$usuarioLogado = isset($_SESSION["user"]) ? $_SESSION["user"] : null;

$msg = isset($_SESSION["msg"]) ? $_SESSION["msg"] : null;
unset($_SESSION["msg"]);
$msgSuccess = isset($_SESSION["msgSuccess"]) ? $_SESSION["msgSuccess"] : null;
unset($_SESSION["msgSuccess"]);
$erroForm = isset($_SESSION["erroForm"]) ? $_SESSION["erroForm"] : null;
unset($_SESSION["erroForm"]);

$codCountAtual = isset($_GET['codCount']) ? $_GET['codCount'] : '';
$codCount = getIdUsuario();
$counts = $count->readSimulacoes();
$countResult = isset($counts["count".$codCountAtual]) ? $counts["count".$codCountAtual] : null;

$codPvlAtual = isset($_GET['codPvl']) ? $_GET['codPvl'] : '';
$codPvl = getIdUsuario();
$pvls = $pvl->read();
$pvlResult = isset($pvls["pvl".$codPvlAtual]) ? $pvls["pvl".$codPvlAtual] : null;

$simulacoesCount = $count->readSimulacoes();

if($codCountAtual != '') $codCount = $codCountAtual;
if($codPvlAtual != '') $codPvl = $codPvlAtual;

$config = readConfig();

function getFromArray($var, $index, $default = null) {
    return is_array($var) && $index != null && isset($var[$index]) ? $var[$index] : $default;
}

function get($var, $default = null) {
    return $var != null ? $var : $default;
}
