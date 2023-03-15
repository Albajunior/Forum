<?php
require('actions/db.php'); 

//recuprer all question
$getAllQuestion = $bdd->query('SELECT * FROM questions ORDER BY id DESC LIMIT 0,5');
//avec query le requete n'est pas executer, different d prepare

//verifier si une recherche a ete faite, get-search renvoi la valeur dans l'url
if(isset($_GET['search']) AND !empty($_GET['search'])){

    //la recherche
    $valSearch = $_GET['search'];

    //on prend chak question qui contient le valeur de la recherche dans son title
    $getAllQuestion = $bdd->query("SELECT * FROM questions WHERE title LIKE '%".$valSearch."%' ORDER BY id DESC");

   
}
?>