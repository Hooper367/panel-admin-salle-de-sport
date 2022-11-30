<?php require_once 'header.php' ?>


<?php if(isset($_GET['con'])) :
     $con = $_GET['con'] ;?> 
    <?php if($con == 1) :?>
        <div>
            <p class="text-warning text-center">Identifiant ou mot de passe incorrect</p>
        </div>
    <?php endif ;?>
<?php endif ;?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <form  action="check.php" method="post" id="connexion" class="formlogin text-center mt-5" >
                    <div class="input-group justify-content-center">
                        <span class="input-group justify-content-center">Nom d'utilisateur : </span>
                            <input class="input-group-text"  name="username" type="text">

                    </div>
                    <div class="input-group mt-4 justify-content-center">

                        <span class="input-group justify-content-center ">Mot de passe :</span>
                        <input class="input-group-text" name="password" type="text">
                    </div>
                    
                    <input class="btn btn-primary mt-4" type="submit" name="login" value="Connexion">
                </form>

            </div>
        </div>
    </div>
    
  

    <?php require_once 'footer.php' ?>
