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
    $tipos = array_map(fn($t) => $t['type']['name'], $dados['types']);
    $altura = $dados['height'] / 10; // metros
    $peso = $dados['weight'] / 10;  // kg

    echo "<h2>$nome (ID: $id)</h2>";
    echo "<img src='$imagem' alt='$nome'><br>";
    echo "<strong>Tipos:</strong> " . implode(', ', $tipos) . "<br>";
    echo "<strong>Altura:</strong> {$altura} m<br>";
    echo "<strong>Peso:</strong> {$peso} kg<br>";
} else {
    echo "Pokemon nao encontrado";
    }
}
?> 
