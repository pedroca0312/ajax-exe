<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        #conteudo{
            border: 1px solid black;
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
        $(document).ready(function(){
            $("#btLoad").click(function(){
                $("#conteudo").load('http://hawkman.fabricadesoftware.ifc.edu.br/~rafael/lojinha/ajax/categorias.php')
            });
            $("#btGet").click(function(){
                $.get('http://hawkman.fabricadesoftware.ifc.edu.br/~rafael/lojinha/ajax/produtos.php',
                    {categoria:1},
                    function(dadosRetornados){
                        $("#conteudo").html(dadosRetornados);
                    });
            });
            $("#btGet").click(function(){
                $.get('http://hawkman.fabricadesoftware.ifc.edu.br/~rafael/lojinha/ajax/produtos.php',
                    {categoria: $('input[name=categoria]').val()},
                    function(dadosRetornados){
                        $("#conteudo").html(dadosRetornados);
                    });
            });
            $("#btGet2").click(function(){
                $.get('http://hawkman.fabricadesoftware.ifc.edu.br/~rafael/lojinha/ajax/dados_json.php',
                    function(dadosRetornados){
                        $("#conteudo").append("<li>"+dadosRetornados.campus+"</li> <li>"+dadosRetornados.cursos+"</li> <li>"+dadosRetornados.endereco+"</li> <li>"+dadosRetornados.ies+"</li><li>"+dadosRetornados.municipio+"</li><li>"+dadosRetornados.uf+"</li>");
                    });
            });
            $("#btGet3").click(function(){
                $.get('http://hawkman.fabricadesoftware.ifc.edu.br/~rafael/lojinha/ajax/produtos_json.php',
                    function(dadosRetornados){

                        $.each(dadosRetornados, function(i, produto){
                            $("#conteudo").append("<li>"+produto.categoria+"</li> <li>"+produto.nome+"</li> <li>"+produto.descricao+"</li> <li>"+produto.foto+"</li> <li>"+produto.preco+"</li> <li>"+produto.id+"</li>");
                        });


                    });
            });


        });
    </script>

</head>
<body>

<h1>Teste AJAX JQuery - load()</h1>

<button id="btLoad">Load</button>

<button id="btGet">Get</button>

<button id="btGet2">Get2</button>

<button id="btGet3">Get3</button>

<input type="text" name="categoria">

<div id="conteudo"></div>

</body>
</html>