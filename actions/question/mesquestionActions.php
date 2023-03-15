<?php

require('actions/db.php'); //nous d'acceder au session start et a la BD avec $bdd
 
$getMyquestion = $bdd->prepare('SELECT id, title, description, contenu FROM
                  questions WHERE id_user = ? ORDER BY id DESC');
$getMyquestion->execute(array($_SESSION['id']));

//$getMyquestidans  va contenir dans un tableau ttes les reponses 
?>