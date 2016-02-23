
<?php 
error_reporting(E_ALL & ~E_DEPRECATED); 
ini_set('display_errors', 'On'); 
restore_error_handler (); 


?> 



<?php 

// Инициируем сессию
session_start();
echo $_SESSION['user_id'];



$dbh = new PDO('mysql:host=localhost;dbname=project1','root', 'root');
$dbh->exec('SET NAMES utf8');


if(isset($_GET['type'], $_GET['id'])) {

	$type  = $_GET['type'];
	$id  =  (int)$_GET['id'];


	switch ($type) {
		case 'article':
		$insrtMega = "INSERT INTO rate (`user`, `article`) 
		SELECT  {$_SESSION['user_id']}, {$id} 
		FROM articles 
		WHERE EXISTS (
			SELECT article_id 
			FROM articles
			WHERE article_id = {$id})
AND NOT EXISTS (
	SELECT id 
	FROM rate
	WHERE user = {$_SESSION['user_id']}
	AND article = {$id})

LIMIT 1";

$dbh->query($insrtMega);

header('Location: http://localhost/index.php/articles');
break;

default:
 			# code...
break;
}



}


$dbh = NULL;  //Закрыл соединение





?>