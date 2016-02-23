
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


<div style="margin-top: 7%; width: 50%;"  class="container">

	<form method="post" action="http://localhost/index.php/addArticle">

		<h4>Title </h4> 
		<input style="font-size: 24px;" type="text"  name="title"> <br> <br>

		<h4>Your text </h4> 
		<textarea name="text" id="add_article_text" cols="80" rows="100"></textarea> <br> <br>

		<h4>Who autor</h4> 
		<input style="font-size: 20px;" type="text"  name="autor"> <br>
		<h4>Category</h4> 
		<input style="font-size: 20px;" type="text"  name="category"> <br>

		<input type="hidden"  name="date" value="<?php 	echo date ('m.d.y'); ?>">
		<input type="hidden"  name="time"  value="<?php 	echo date ('H:i'); ?>" >

		<input   class="reg_button reg2" type="submit" name="add" value="Add" >



	</form>

</div> 


<?php 
error_reporting(E_ALL & ~E_DEPRECATED); 
ini_set('display_errors', 'On'); 
restore_error_handler (); 


?>




<?php 

	// CONNECT
$dbh = new PDO('mysql:host=localhost;dbname=project1','root', 'root');
$dbh->exec('SET NAMES utf8');






?>

<?php 

	if(isset($_POST['add']))    #если кнопка нажата
	{


		$title = trim($_POST['title']);
		$text = trim($_POST['text']);
		$autor = trim($_POST['autor']);
		$category = trim($_POST['category']);
		$date = $_POST['date'];


		// mysql_query("INSERT INTO `project1`.`articles` (`title`, `text`, `autor`, `category`, `date`) 
		// 	VALUES ('$title', '$text', '$autor', '$category', '$date');");


		$insrt = "INSERT INTO articles (`title`, `text`, `autor`, `category`, `date`) 
		VALUES ('$title', '$text', '$autor', '$category', '$date');";
		$dbh->query($insrt);



		$dbh = NULL;  //Закрыл соединение

		header('Location: http://localhost/index.php/articles');





	}








	?>

