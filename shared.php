<?php
require_once 'config.php'; 	

ob_start();
require_once $base_util_path.'util.php'; 	
require_once $base_path.'foton/pvl/PVL.php'; 	


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

$pvl = new PVL();

$codPvlAtual = isset($_GET['codPvl']) ? $_GET['codPvl'] : '';
$codPvl = getIdUsuario();
$pvls = $pvl->read();
$pvlResult = isset($pvls["pvl".$codPvlAtual]) ? $pvls["pvl".$codPvlAtual] : null;

if($codPvlAtual != '') $codPvl = $codPvlAtual;

$config = readConfig();

function getFromArray($var, $index, $default = null) {
    return is_array($var) && $index != null && isset($var[$index]) ? $var[$index] : $default;
}

function get($var, $default = null) {
    return $var != null ? $var : $default;
}
