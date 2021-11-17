<?php
require_once 'shared.php'; 	
?>
<style>
    .menu-footer.justify-content-center {
        margin: 0 auto;
    }

    .menu-footer.row {
        width: 100%;
    }

    .menu-footer .nav-link {
        text-align: center;
        color: <?=$corMenuFooter?>;
        cursor: pointer;
    }
    
    .menu-footer .nav-link.active, .menu-footer .nav-link:hover{
        color: <?=$corMenuFooterAtivo?>;
    }

    .menu-footer .nav-link .label {
        margin-top: 0.5em;
        font-size: 1.75em;
    }


    .menu-footer .col {
        width: 20%;
        margin-bottom: -10px;
    }

    .menu-footer .icon {
        font-size: 3.5em;
    }

    .menu-footer .icon.meio {
        font-size: 4.5em;
    }

    .navbar-footer {
        border-top: solid 1px <?= $bgFooterBorda ?>;
        background-color: <?= $bgFooter ?> !important;
        padding-top: 1em !important;
        padding-bottom: 2em !important;
    }
</style>

<nav class="navbar fixed-bottom navbar-light navbar-footer">
    <div class="row justify-content-center menu-footer">
        <div class="col">
            <span class="nav-link" aria-current="page" data-page="treinos">
                <i class="icon dripicons-rocket"></i>
                <div class="label">Treinos</div>
            </span>
        </div>
        <div class="col">
            <span class="nav-link" aria-current="page" data-page="favoritos">
                <i class="icon dripicons-star"></i>
                <div class="label">Favoritos</div>
            </span>
        </div>
        <div class="col">
            <span class="nav-link active" aria-current="page" data-page="inicio">
                <i class="icon meio dripicons-home"></i>
                <div class="label">Início</div>
            </span>
        </div>
        <div class="col">
            <span class="nav-link" aria-current="page" data-page="hoje">
                <i class="icon dripicons-brightness-max"></i>
                <div class="label">Hoje</div>
            </span>
        </div>
        <div class="col">
            <span class="nav-link" aria-current="page" data-page="historico">
                <i class="icon dripicons-stopwatch"></i>
                <div class="label">Histórico</div>
            </span>
        </div>
    </div>
</nav>

<script>
    $(".nav-link").click(function(){
        let page = $(this).data("page");
        redirecionarParaPagina(page);
        $(".nav-link").removeClass("active");
        $(this).addClass("active");
    });

    function redirecionarParaPagina(page) {
        //alert("IR PARA:" + page);
    }
</script>