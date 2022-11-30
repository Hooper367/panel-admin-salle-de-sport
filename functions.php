
<?php 

function allArticles() {
require_once 'db.php';

$sql = 'SELECT * FROM articles';
$req = mysqli_query($connect, $sql);
if($req){
    $result =  $result = mysqli_fetch_assoc($req);
}
return $result;
}

?>
 

