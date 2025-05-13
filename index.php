<form method="GET">
    <input type="text" name="pokemon" placeholder="Digite o nome ou número">
    <button type="submit">Buscar</button>
</form>

<?php

if (isset($_GET['pokemon'])){
    $nomePokemon = ($_GET['pokemon']);
    $url = "https://pokeapi.co/api/v2/pokemon/{$nomePokemon}";
    $resposta = file_get_contents($url);
   
    if ($resposta){ 
        $dados = json_decode($resposta, true);

    $nome = ucfirst($dados['name']);
    $id = $dados['id'];
    $imagem = $dados['sprites']['front_default'];
    

    echo "<h2>$nome (ID: $id)</h2>";
    echo "<img src='$imagem' alt='$nome'><br>";
} else {
    echo "Pokemon nao encontrado";
    }
}
?> 
