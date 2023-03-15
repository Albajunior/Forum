<?php
require('actions/users/securite.php');
require('actions/question/AddquestionActions.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'includes/head.php'; 
    ?>
</head>

<body>
    <?php include 'includes/navbar.php';  ?> 
    <br>
    <form class="container" method="POST">

        <?php 
         if (isset($ErrorMsg)){
             echo '<p>' . $ErrorMsg . '</p>'; 
         }elseif (isset($Successpublication)) {
            echo '<p>' . $Successpublication . '</p>'; 
         } 
        ?>

        <div class="form-row">
            <label for="inputEmail4">Titre publication</label>
            <input type="text" class="form-control" name="title" placeholder="#title">
        </div>
        <div class="form-row">
            <label for="inputEmail4">Description</label>
            <input type="text" class="form-control" name="description" >
        </div>
        <div class="form-group">
            <label for="inputAddress">Contenu </label>
            <textarea type="text" class="form-control" name="contenu" placeholder="..."></textarea>
        </div>

        <br>
        <button type="submit" class="btn btn-primary" name="validate">Publier</button>
        
    </form>
    
    
</body>

</html>