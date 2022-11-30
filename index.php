
<?php
require_once 'header.php';

require_once 'db.php';
$sql = "SELECT * FROM articles INNER JOIN users ON articles.id_users=users.id_user AND NOT `state`=3 AND NOT `state`=2";
$req = mysqli_query($connect, $sql);
?>
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
        </div>
    </div>
            <?php endforeach ?>


<?php require_once 'footer.php'; ?>


