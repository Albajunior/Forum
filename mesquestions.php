<?php
require('actions/users/securite.php');
require('actions/question/mesquestionActions.php');
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

    </br></br>
    <div class="container">
        
     <!-- on fait une boucle sur sur tableau d'$$getMyquestion recuperer  -->
        <?php 
        while($question = $getMyquestion->fetch()){
        ?>

        <div class="card">
            <h5 class="card-header">
                <?php echo $question['title'] ?>
            </h5>
            <div class="card-body">
                <h5 class="card-title">
                    <?php echo $question['description'] ?>
                </h5>
                <p class="card-text">
                    <?php echo $question['contenu'] ?> 
                    <!-- ==<?= $question['contenu']; ?>  autre favon-->
                </p>
                <a href="editQuestion.php?id=<?= $question['id']; ?> " class="btn btn-primary">Modifier</a> 
                <a href="article.php?id=<?= $question['id']; ?> " class="btn btn-primary">Acceder a l'article</a>
                <a href="actions/question/deleteQuestionAction.php?id=<?= $question['id']; ?> " class="btn btn-danger">Supprimer</a>
            </div>
        </div>
        </br>

        <?php
        }
        ?>

    </div>
    
</body>

</html>