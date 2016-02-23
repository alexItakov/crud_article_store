




<?php  
error_reporting(E_ALL & ~E_DEPRECATED); 
ini_set('display_errors', 'On'); 
restore_error_handler (); 


?>








<nav style="position: fixed; top: 0%;" class="light-blue lighten-1" role="navigation">
	<div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Logo</a>
		<ul class="right hide-on-med-and-down">
			<li><a href="#">Navbar Link</a></li>
		</ul>

		<ul  id="nav-mobile" class="side-nav">
			<li><a href="#">Navbar Link</a></li>
		</ul>
		<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
	</div>
</nav>



<?php 


$id = $_GET['id'];



	// CONNECT
$dbh = new PDO('mysql:host=localhost;dbname=project1','root', 'root');
$dbh->exec('SET NAMES utf8');

$slct = "SELECT `title`, `text`, `autor`, `category`, `date`
FROM articles 
WHERE `article_id`='$id'";	

$assoc_res = $dbh->query($slct);
$dbh = NULL;  //Закрыл соединение

//$row = mysql_fetch_array($result);
$row = $assoc_res->fetch(PDO::FETCH_ASSOC);	

if(isset($_POST['save'])) {

	$title = trim($_POST['title']);
	$text = trim($_POST['text']);
	$autor = trim($_POST['autor']);
	$category = trim($_POST['category']);
	$date = $_POST['date'];

// CONNECT
	$dbh = new PDO('mysql:host=localhost;dbname=project1','root', 'root');
	$dbh->exec('SET NAMES utf8');

	$updt = "UPDATE `project1`.`articles` SET 
	`title`='$title', `text`='$text', `autor`='$autor', `category`='$category', `date`='$date'
	WHERE `article_id`='$id'";
	$dbh->query($updt);
	$dbh = NULL;  //Закрыл соединение


	header('Location: http://localhost/index.php/articles');

}



?>


<div style="margin-top: 7%; width: 50%;"  class="container">

	<form method="post" action="http://localhost/index.php/editArticle?id=<?php echo $id;  ?>" >

		<h4>Title </h4> 
		<input style="font-size: 24px;" type="text"  name="title" value="<?php echo $row['title'];?>" > <br> <br>

		<h4>Your text </h4> 
		<textarea name="text" id="add_article_text" cols="80" rows="100"><?php echo $row['text'];?></textarea> <br> <br>

		<h4>Who autor</h4> 
		<input style="font-size: 20px;" type="text"  name="autor"  value="<?php echo $row['autor'];?>" >   <br>
		<h4>Category</h4> 
		<input style="font-size: 20px;" type="text"  name="category"value="<?php echo $row['category'];?>" > <br>

		<input type="hidden"  name="date" value="<?php 	echo date ('m.d.y'); ?>">
		<input type="hidden"  name="time"  value="<?php 	echo date ('H:i'); ?>" >

		<input   class="reg_button reg2" type="submit" name="save" value="save" >



	</form>

</div>


<?php 
error_reporting(E_ALL & ~E_DEPRECATED); 
ini_set('display_errors', 'On'); 
restore_error_handler (); 


?>




<?php 

$connect = mysql_connect('localhost','root','root') or die (mysql_error('Соединение с базой данных неактивно =/'));

mysql_select_db('project1');


?>


<?php 

mysql_set_charset("utf-8");
mysql_query("SET NAMES 'utf8';"); 
mysql_query("SET CHARACTER SET 'utf8';"); 
mysql_query("SET SESSION collation_connection = 'utf8_general_ci';"); 





?>


