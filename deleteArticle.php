 
<?php 
error_reporting(E_ALL & ~E_DEPRECATED); 
ini_set('display_errors', 'On'); 
restore_error_handler (); 


?> 




<?php 

$dbh = new PDO('mysql:host=localhost;dbname=project1','root', 'root');
$dbh->exec('SET NAMES utf8');
?>







<?php 
$id = $_GET['id'];


$del = "DELETE FROM `project1`.`articles` WHERE `article_id`='$id';";
$dbh->query($del);
$dbh = NULL;  //Закрыл соединение
header('Location: http://localhost/index.php/articles');


?> 
