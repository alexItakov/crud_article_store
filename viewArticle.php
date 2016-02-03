 

<style>

	h4 {

		

	}

	#txt_wrap	{

	}
	p {
		text-align: left;
		width: 450px;
		margin: 0 auto;
		position: relative;
		margin-bottom: 10px;
		
	}


</style>


<?php  
error_reporting(E_ALL & ~E_DEPRECATED); 
ini_set('display_errors', 'On'); 
restore_error_handler (); 


?>


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


?>





<nav style="position: fixed; top: 0%; z-index: 5;" class="light-blue lighten-1" role="navigation">
	<div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Logo</a>
		<ul class="right hide-on-med-and-down">
			<li><a href="http://localhost/index.php/articles">Back</a></li>
		</ul>

		<ul  id="nav-mobile" class="side-nav">
			<li><a href="#">Navbar Link</a></li>
		</ul>
		<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
	</div>
</nav> 



<div style="margin-top: 12%; width: 600px; text-align: center;"  class="container">


	<h4> <a href=""><?php echo $row['title'];?></a> </h4>
	<br>
	<br> 

	<div id="txt_wrap">
		<p><?php echo $row['text'];?></p>

		<br>

		<p id="article_autor" >Autor: <b><?php echo $row['autor']; ?> </b></p>
		<p id="article_cat" >Category: <b><?php echo $row['category']; ?> </b></p>
		<p id="article_date"><?php echo $row['date']; ?></p>

	</div>



</div>