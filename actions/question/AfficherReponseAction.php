<?php

require('actions/db.php'); //nous d'acceder au session start et a la BD avec $bdd
 
$getAllreponses = $bdd->prepare('SELECT id, pseudo_user, contenu FROM reponses WHERE id_question = ? ORDER BY id DESC LIMIT 0,5');
$getAllreponses->execute(array($questions_id));

    
?>