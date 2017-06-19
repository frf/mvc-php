<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">MVC</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li <?php if($aViewVar['nameController'] == "") { ?> class="active" <?php } ?>><a href="/" >Home</a></li>
                <li <?php if($aViewVar['nameController'] == "DocController") { ?> class="active" <?php } ?>><a href="/doc" >Doc</a></li>
                <li <?php if($aViewVar['nameController'] == "ApiTesteController") { ?> class="active" <?php } ?>><a href="/apiTeste" >API</a></li>
                <li <?php if($aViewVar['nameController'] == "ProdutoController") { ?> class="active" <?php } ?> class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Produtos <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/produto/index">Listar</a></li>
                        <li><a href="/produto/cadastrar">Cadastrar</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">