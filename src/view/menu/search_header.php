<?php
require_once 'shared.php'; 	
?>
<style>
    .input-group-text.search-header {
        background: #fff;
        border-radius: 40px 0 0 40px;
        padding: 10px;
        font-size: 2.5rem;
    }

    .search-header .icone-filtro {
        color: #696969;
        margin-left: 0.5em;
    }

    .input-search {
        border-left: none;
        border-radius: 0 40px 40px 0;
        padding: 10px;
        font-size: 2.5rem;
    }
    
    .container-fluid.search-header {
        margin-top: 1em;
    }

    .navbar-top {
        background-color: <?=$bodyBgCor?>;
        padding-top: 2.5rem;
        padding-bottom: 3rem;
    }

    .navbar-top .container-fluid {
        width: 95% !important;
    }

</style>
<nav class="navbar navbar-top fixed-top navbar-light">
    <div class="container-fluid search-header">
        <div class="container-fluid">
            <div class="input-group">
                <span class="input-group-text search-header" id="basic-addon1"><i class="fa fa-search icone-filtro"></i></span>
                <input id="input-search" type="text" class="form-control input-search" placeholder="Qual treino deseja ver?" 
                aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>
    </div>
</nav>

<script>
    $('.input-search').keyup(function() {
      filter()
    });

    $('.input-search').change(function() {
      filter()
    });

    $(".input-search").bind("paste", function(e){
        filter()
    });
    

    function filter()
    {
        $('.card-exercicio').hide()
        $('.card-exercicio').data("quantidade-palavras-encontradas", 0)
        $(".card-exercicio .palavras-encontradas").empty();

        var cardsExercicios = document.querySelectorAll(".card-exercicio");
        var cardsExerciciosLista = Array.prototype.slice.call(cardsExercicios).map(function(element) {
            return {quantidadePalavrasEncontradas: 0, id: element.id, title: stringSemAcentoEMinuscula($(element).data("search"))};
        });

        let fraseProcurada = $("#input-search").val();
        let fraseProcuradaSemAcentoEMinuscula = stringSemAcentoEMinuscula(fraseProcurada);
        //console.log("frase:", fraseProcuradaSemAcentoEMinuscula);
        let palavrasFraseProcurada = fraseProcuradaSemAcentoEMinuscula.split(/(\s+)/).filter( e => e.trim().length > 0)
        //console.log("frase list:", palavrasFraseProcurada);

        if(palavrasFraseProcurada.length == 0) {
            $('.card-exercicio').show()
            return
        }

        let cardsExerciciosListaFiltrada = cardsExerciciosLista.filter(card => {
            let listaPalavrasEncontradas = palavrasFraseProcurada.filter(palavra => card.title.includes(palavra))
            //console.log(element.title, ":", listaPalavrasEncontradas);
            card.quantidadePalavrasEncontradas = listaPalavrasEncontradas.length
            $("#"+card.id).data("quantidade-palavras-encontradas", card.quantidadePalavrasEncontradas)
            $("#"+card.id + " .palavras-encontradas").html("Pesquisa: " + listaPalavrasEncontradas.join(', '))
            return listaPalavrasEncontradas.length > 0
        });
        //console.log(cardsExerciciosListaFiltrada);

        $idsCardsFiltrados = cardsExerciciosListaFiltrada.map(card => "#"+card.id).join(', ')
        //console.log($idsCardsFiltrados)

        $($idsCardsFiltrados).show()

        ordenarExerciciosFiltrados()

    }

    function stringSemAcentoEMinuscula(frase) 
    {
        return frase.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase()
    }

    function ordenarExerciciosFiltrados()
    {

        let conteudo = $('#conteudo-exercicios')
        let cards = conteudo.children('.card-exercicio');

        cards.detach().sort(function(a, b) {
            var aq = $(a).data('quantidade-palavras-encontradas');
            var bq = $(b).data('quantidade-palavras-encontradas')
            return aq > bq ? -1 : 1;
        });
        
        conteudo.append(cards);


    }
</script>