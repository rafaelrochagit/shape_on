<?php
$error_on = true;

if($error_on) {
    ini_set('display_errors',1);
    ini_set('display_startup_erros',1);
    error_reporting(E_ALL);
    error_reporting(E_ERROR);
}

if($_SERVER['HTTP_HOST'] == 'localhost') $base = "/shape_on";
else $base = "";

$base_path = __DIR__."/";
$base_src_path = $base_path."src/";
$base_bd_path = $base_path."bd/";
$base_util_path = $base_src_path."utils/";
$base_view_path = $base_src_path."view/";

$thema = "dark";

$bodyBgCor = "#f8f9fa";
$corMenuFooter = "#000";
$corMenuFooterAtivo = "#0d6efd";
$bgFooter = "#f8f9fa";
$bgFooterBorda = "#ccc";

if($thema == "dark") {
    $bodyBgCor = "#272727";
    $corMenuFooter = "#6f6f6f";
    $corMenuFooterAtivo = "#61a1ff";
    $bgFooter = "#212121";
    $bgFooterBorda = "#212121";
}