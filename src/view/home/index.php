<?php
    require_once __DIR__."/../../class/Exercicio.php"; 	
    require_once __DIR__."/../../class/Musculo.php"; 	
    $exercio = new Exercicio();
    $exercicios = $exercio->read();
    $musculo = new Musculo();
    $musculos = $musculo->readMapArray();
    $pathImg = $base."/assets/img/exercicios/";
?>
<div id="conteudo-exercicios">
    <?php foreach($exercicios as $exercioElemento): ?>
    <?php 
        $musculosExercicio = array_map(function($musculoExercicio) use ($musculos) {
            return $musculos[$musculoExercicio];
        }, $exercioElemento["musculos"]);
        
        $musculosExercicioDescricao = implode(", ", $musculosExercicio);
    ?>
        <div id="exercicio<?=$exercioElemento['id'] ?>" class="card mb-5 card-exercicio" 
            data-search="<?=$exercioElemento['titulo'] ?> <?=$musculosExercicioDescricao?>" 
            data-quantidade-palavras-encontradas="0">
            <img src="<?=$pathImg.$exercioElemento['execucao']?>" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text text-right"><small class="text-muted"><?= $musculosExercicioDescricao ?></small></p>
                <h3 class="card-title text-center"><?=$exercioElemento['titulo'] ?></h3>
                <p class="card-text"><small class="text-muted palavras-encontradas"></small></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<style>
    #conteudo-exercicios {
        margin-top: 14em;
        margin-bottom: 18em;
    }

    #conteudo-exercicios img {
        width: 50%;
        margin: 0 auto;
    }

    #conteudo-exercicios .card {
        border-radius: 1em;
    }

    #conteudo-exercicios .card-title {
        border-top: solid 1px #ccc;
        padding-top: 0.9em;
        font-size: 20pt;
    }
</style>