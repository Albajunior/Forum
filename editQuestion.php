<?php
require('actions/users/securite.php');
require('actions/question/getInfoquestionEdit.php');
require('actions/question/editQuestionAction.php');
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php';  ?>

<body>
    <?php include 'includes/navbar.php';  ?>  
    <div class="container">

     <?php 
       if (isset($ErrorMsg)){  echo '<p>' . $ErrorMsg . '</p>';    }
     ?>
     <!-- si tt les conditions sont reunis on affiche le formulaire avec les values -->
     <?php 
       if (isset($question_contenu)){
     ?>
       <form method="POST">

            <div class="form-row">
                <label for="inputEmail4">Titre publication</label>
                <input type="text" class="form-control" name="title" value="<?= $question_title ?>">
            </div>
            <div class="form-row">
                <label for="inputEmail4">Description</label>
                <input type="text" class="form-control" name="description" value="<?= $question_description ?>" >
            </div>
            <div class="form-group">
                <label for="inputAddress">Contenu </label>
                <textarea type="text" class="form-control" name="contenu" ><?= $question_contenu ?>   
                </textarea>
            </div>

            <br>
            <button type="submit" class="btn btn-primary" name="validate">Modifier la question</button>
            
        </form> 
     <?php
       }   
     ?>
        
    </div>

   <!-- <?php include 'includes/footer.php'; ?> -->

</body>
</html>
