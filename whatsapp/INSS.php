<?php

class INSS {
	
	function salvar($tabela) {
		$id = date('YmdHi');
		$tabelaJson = json_encode($tabela);
		file_put_contents("tabelas_inss/".$id."_tabela_inss.json", $tabelaJson);
	}

	function readTabelas() {
		$types = array('json');
		$path = 'tabelas_inss';
		$dir = new DirectoryIterator($path);
		$tabelas = array();
		foreach ($dir as $fileInfo) {
		    $ext = strtolower( $fileInfo->getExtension() );
		    if( in_array( $ext, $types ) ) $tabelas[] = $fileInfo->getFilename();
		}
		return $tabelas;
	}

	function readJson($tabelaNome) {
		$tabelaJson = @file_get_contents("tabelas_inss/".$tabelaNome);
		return $tabelaJson;
	}

	function read($tabelaNome) {
		$tabelaJson = $this->readJson($tabelaNome);
		if($tabelaJson) {
			return json_decode($tabelaJson, true);
		}
		return null;
	}

	function delete($tabelaNome) {
		unlink("tabelas_inss/".$tabelaNome);
	}

	function selecionar($tabelaNome) {
		$configuracaoJson = file_get_contents("../configuracoes/config.json");

        $configuracoes = array();
        if($configuracaoJson) {
            $configuracoes = json_decode($configuracaoJson, true);
        }

        $configuracoes['tabela_inss'] = $tabelaNome;
        $configuracoesJson = json_encode($configuracoes);
		file_put_contents("../configuracoes/config.json", $configuracoesJson);
	}
}