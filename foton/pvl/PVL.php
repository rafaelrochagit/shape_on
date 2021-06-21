<?php
require_once __DIR__ . "/../../util.php";

class PVL
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
        $bdJson = @file_get_contents($this->filepath . "/bd/pvls.json");
        $pvls = array();
        if ($bdJson) {
            $pvls = json_decode($bdJson, true);
        }
        return $pvls;
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
