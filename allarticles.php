<?php require_once 'db.php'?>
 <?php require_once 'header.php'?>


<?php 
$sql = "SELECT * FROM articles INNER JOIN users ON articles.id_users=users.id_user";
$req = mysqli_query($connect, $sql);
?>
   
 <?php if($req) :?>
    <section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 border-end ">
                <ul>
                    <?php 
                    
                    if ($_SESSION['isAdmin'] == 2) {
                        
                    }
                        
                      ?>

                    <?php  if($_SESSION['isAdmin'] == 2) :  ?>
                        <h4><?=$_SESSION['user']?> (Admin)</h4>
                        <li><a  class="fs-4 " href="message.php">Mes Articles</a></li>
                        <li><a class="fs-4" href="write.php">Rédiger un article</a></li>
                        <li><a class="fs-4" href="user.php">Tout les utilisateurs</a></li>
                        <ul>
                            <h4>Espace Modération :</h4>
                            <li><a href="allarticles.php">Tout les articles</a></li>
                            
                        </ul>
                        

                        <?php elseif ($_SESSION['isAdmin'] == 1) : ?>
                            <li><?=$_SESSION['user']?> (Modo)</li>
                        <li><a  class="fs-4 " href="allarticles.php">Tout les Articles</a></li>
                        
                        
                        
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
                <?php  foreach($req as $data): ?>
                    <div class="container-fluid my-4 border border-dark rounded-3 bg-light">
                        <div class="row align-items-center">
                            <div class="col-2">
                                <h2><a href="#"><?= $data['title'] ?> </a></h2>
                            </div>
                            <div class="col-2">
                                <p class="fw-bold">User : <?=ucFirst($data['username'])?></p>
                            </div>
                            <div class="col-2">
                                  <p><?= $data['date'] ?></p>
                                  <?php echo "<img src='./image_bdd/".$data['image']."' width='150px' >" ?>
                            </div>
                            <div class="col-2">
                                <p>Contenu : <?= $data['content'] ?></p>
                            </div>
                            <div class="col-1">
                                <?php if($data['state'] == 1) :?>
                            <p>status: public</p>
                           <?php elseif($data['state'] == 2) :?>
                            <p>status: privée</p>
                           <?php elseif($data['state'] == 3) :?>
                            <p>status: cacher</p>
                            <?php endif; ?> 
                            </div>
                            <div class="col-3">
                                <a class="btn btn-primary m-1" href="modif.php?id=<?=$data['id']?>">Modifier</a>
                                <a class="btn btn-danger" href="check.php?action=supp&id=<?=$data['id']?>">Supprimer</a>
                                <?php if($_SESSION['isAdmin'] == 2 || $_SESSION['isAdmin'] == 1 ) :?>
                                    <a class="btn btn-primary" href="check.php?action=hide&id=<?=$data['id']?>">Cacher</a>
                                <?php endif; ?>
                                <a class="btn btn-primary" href="check.php?action=private&id=<?=$data['id']?>">Privée</a>
                               
                                <a class="btn btn-success" href="check.php?action=show&id=<?=$data['id']?>">Faire apparaitre</a>

                            </div>



                        </div>
                    </div>
                       
                        
                          
                            
                            
                            
                <?php endforeach ;?>
    <?php endif; ?>
                
            </div>
        </div>
    </div>
</section>
    

    <?php require_once 'footer.php' ?>