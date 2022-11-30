<?php require_once 'functions.php'; ?>
<?php require_once 'db.php' ?>
<?php require_once 'header.php'; ?>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 border-end ">
                <ul>

                    <?php  if($_SESSION['isAdmin'] == 2) :  ?>
                        <li><?=$_SESSION['user']?> (Admin)</li>
                        <li><a  class="fs-4 " href="message.php">Mes articles</a></li>
                        <li><a class="fs-4" href="write.php">Rédiger un article</a></li>
                        <li><a class="fs-4" href="user.php">Tout les utilisateurs</a></li>
                        <ul>
                            <h4>Espace Modération :</h4>
                            <li><a href="allarticles.php">Tout les articles</a></li>
                        </ul>
                        
                        

                        <?php elseif ($_SESSION['isAdmin'] == 1) : ?>
                            <li><?=$_SESSION['user']?> (Modo)</li>
                        <li><a  class="fs-4 " href="message.php">Articles</a></li>
                        
                        
                        
                        <?php elseif ($_SESSION['isAdmin'] == 0) : ?>
                            <li><?=$_SESSION['user']?> (User)</li>
                        <li><a  class="fs-4 " href="message.php">Articles</a></li>
                        <li><a class="fs-4" href="write.php">Rédiger un article</a></li>

                            <?php endif ?>
                </ul>
            </div>
            <div class="col-10">
                <div class="input text-center">
                    <label class="bg-primary p-3" for="">Rechercher</label>
                    <input class="w-50 p-2" placeholder="Rechercher" type="search">
                </div>
               
                <?php
                $sql = "SELECT * FROM users ";
$req = mysqli_query($connect, $sql);
?>

<?php if($req): ?>
    <?php foreach($req as $data): ?>
        <div class="row m-4">
            <div class="col-2 text-start">User : <?= ucFirst($data['username'])?></div>
            <?php if($data['isAdmin'] == 2): ?>
            <div class="col-2 text-start">role : Admin</div>
            <?php elseif($data['isAdmin'] == 1): ?>
            <div class="col-2 text-start">role : Modérateurs</div>
            <?php elseif($data['isAdmin'] == 0): ?>
            <div class="col-2 text-start">role : utilisateur</div>
            <div class="col-4">
                <a class="btn btn-primary" href="check.php?action=user_hide&id=<?=$data['id_user']?>">Privée</a>
                <a class="btn btn-success" href="check.php?action=user_show&id=<?=$data['id_user']?>">Faire apparaitre</a>
                <a class="btn btn-danger" href="check.php?action=user_supp&id=<?=$data['id_user']?>">supprimer</a>
                
            </div>
            <?php if($data['user_state'] == 2): ?>
            <div class="col-2 text-start">Status : Privée</div>
            <?php elseif($data['user_state'] == 1): ?>
            <div class="col-2 text-start">Status : Public</div>
            <?php elseif($data['user_state'] == 3): ?>
            <div class="col-2 text-start">Status : Cacher</div>
           
        </div>
             <?php endif;?>
    
        <?php endif;?>
        
           

        <?php endforeach; ?>
<?php endif;?>
               
            </div>
        </div>
    </div>
</section>

<?php





    
