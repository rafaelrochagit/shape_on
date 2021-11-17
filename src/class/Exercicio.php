<?php
require_once __DIR__ ."/../../config.php";
require_once $base_util_path. "util.php";

class Exercicio
{

    private $filepath = __DIR__ . "/";

    function __construct()
    {
    }

    function salvarCodSimulacao($cod)
    {
        file_put_contents($this->filepath . "/bd/codAtual.json", $cod);
    }

    function readCod()
    {
        $cod = @file_get_contents($this->filepath . "/bd/codAtual.json");
        return $cod;
    }

    function salvar($pvls)
    {
        $bdJson = json_encode($pvls);
        file_put_contents($this->filepath . "/bd/pvls.json", $bdJson);
    }

    function read()
    {
        $bdJson = @file_get_contents("bd/exercicios.json");
        $json = array();
        if ($bdJson) {
            $json = json_decode($bdJson, true);
        }
        return $json;
    }

    function form($form) {
        $pvlArray = $form;

        $codPvl = isset($form['codPvl']) ? $form['codPvl'] : '';

        $pvlArray['data'] = date('Y-m-d H:i:s');
        $pvls = $this->read();
        $pvls["pvl".$codPvl] = $pvlArray;
        $this->salvar($pvls);
    }
}
