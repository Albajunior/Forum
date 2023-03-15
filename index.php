<?php
// require('actions/users/securite.php') pas d control le site est accessible a all
session_start();
require('actions/question/AllquestionAction.php');
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php';  ?>

<body>
    <?php include 'includes/navbar.php';  ?>  
    <br><br>

    <div class="container">

        <form method="GET">
            <!-- avec la method GET on envoi direct la valeur saisi dans l'url -->
            <div class="form-group row">

                <div class="col-8"> 
                    <input type="search" name="search"  class="form-control" placeholder="Search">
                </div>
                <div class="col-4"> 
                    <button class="btn btn-success" name="searchbtn">Search</button>
                </div>

            </div>            
        </form>

        <br>

        <?php
           while($allquestion = $getAllQuestion->fetch()){
            ?>

            <div class="card">
                <div class="card-header">
                    <a href="article.php?id=<?= $allquestion['id']; ?> ">
                      <?php echo $allquestion['title'] ?>
                    </a>
                </div>

                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo $allquestion['description'] ?>
                    </h5>
                    
                    <h7 class="card-footer">
                       Publier par <?php echo $allquestion['pseudo_user'] ?> le <?php echo $allquestion['datepub'] ?>
                    </h7>
                </div>
            </div>

           </br>
            <?php
           }
        ?>
    </div>

</body>
</html>


