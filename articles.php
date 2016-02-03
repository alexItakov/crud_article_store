  

<nav style="position: fixed; top: 0%; z-index: 5;" class="light-blue lighten-1" role="navigation">
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




<div id="tools">
	<div style="margin-top: 10%;" id="category">
		<a href="http://localhost/index.php/articles">Category All |</a>
		<a href="http://localhost/index.php/articlescategory/id/1">Category 1 |</a>
		<a href="http://localhost/index.php/articlescategory/id/2">Category 2 |</a>
		<a href="http://localhost/index.php/articlescategory/id/3">Category 3 </a>

	</div>

	<a id="new_article" href="addArticle">Add article</a>
</div>



<!-- НАЧАЛО ВЫВОДА СТАТЕЙ -->
<!-- НАЧАЛО ВЫВОДА СТАТЕЙ -->
<!-- НАЧАЛО ВЫВОДА СТАТЕЙ -->



<div  style="margin-top: 5%;
margin-bottom: 15%;" class="container">




<?php 

//  СКРИПТ ОПРЕДЕЛЕНИЯ КАТЕГОРИИИ СТАТЬЯ ДЛЯ ВЫВЕДЕНИЯ  



if (
	//!$Module or 
	$Module == 'articles' ) {

	$Param1 = "SELECT `article_id`, `title`,`autor`,`text`, `category`, `date`  
FROM `project1`.`articles` 
ORDER BY `article_id` DESC;"; 


}
else  if ($Module == 'articlescategory') {

	$Param1 = "SELECT `article_id`, `title`, `autor`,`text`,  `category`, `date`  
	FROM `project1`.`articles` 
	WHERE `category` = '$Param[id]'  
	 --   ЧЕ ТО Я НЕ ВРУБИЛСЯ КАК ЭТА ФИШКА ВЫЧИСЛЯЕТ ID
	 ORDER BY `article_id` DESC;"; 
	 

	}


//  СКРИПТ ОПРЕДЕЛЕНИЯ КАТЕГОРИИИ СТАТЕЙ ДЛЯ ВЫВЕДЕНИЯ  







	// CONNECT
	$dbh = new PDO('mysql:host=localhost;dbname=project1','root', 'root');
	$dbh->exec('SET NAMES utf8');


	$slct = $Param1;
	$assoc_res = $dbh->query($slct);
	$dbh = NULL;  //Закрыл соединение




	//$query = mysql_query($Param1);
// print_r($Param1);
// print_r($query);	

	while ( $row = $assoc_res->fetch(PDO::FETCH_ASSOC)) {

		?>
		
		<div class="col s12 m4 article_block">
			<div class="icon-block">
				<h2 class="center light-blue-text"><i class="material-icons">flash_on</i></h2>
				<h5 class="center"><a target="blank" href="http://localhost/index.php/viewArticle?id=<?php echo $row['article_id']; ?>">  <?php echo $row['title']; ?>  </a> </h5>

				<div id="article_text" class="light"> <?php echo $row['text']; ?></div>
			</div>
			<p id="article_autor" >Autor: <b><?php echo $row['autor']; ?> </b></p>
			<p id="article_cat" >Category: <b><?php echo $row['category']; ?> </b></p>
			<div id="article_date"><?php echo $row['date']; ?></div>

			<div id="del_article"> <a href="http://localhost/index.php/deleteArticle?id=<?php echo $row['article_id']; ?>"><img src="../img/ic_close_black_24dp_2x.png" height="24" width="24" alt=""></a>  </div>

			<div id="edit_article"> <a href="http://localhost/index.php/editArticle?id=<?php echo $row['article_id']; ?>"><img src="../img/pen-pencil-write-letter-512.png" height="18" width="18" alt=""></a>  </div>


			
		</div>




		<?php }  ?>



	</div>



	<!-- КОНЕЦ ВЫВОДА СТАТЕЙ -->
	<!-- КОНЕЦ ВЫВОДА СТАТЕЙ -->
	<!-- КОНЕЦ ВЫВОДА СТАТЕЙ -->













	<footer class="page-footer orange">
		<div class="container">
			<div class="row">
				<div class="col l6 s12">
					<h5 class="white-text">Company Bio</h5>
					<p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


				</div>
				<div class="col l3 s12">
					<h5 class="white-text">Articles</h5>
					<ul>
						<li><a class="white-text" href="#!">Article 1</a></li>
						<li><a class="white-text" href="#!">Article 2</a></li>
						<li><a class="white-text" href="#!">Article 3</a></li>
						<li><a class="white-text" href="#!">Article 4</a></li>
					</ul>
				</div>

				<div class="col l3 s12">
					<h5 class="white-text">Articles</h5>
					<ul>
						<li><a class="white-text" href="#!">Article 5</a></li>
						<li><a class="white-text" href="#!">Article 6</a></li>
						<li><a class="white-text" href="#!">Article 7</a></li>
						<li><a class="white-text" href="#!">Article 8</a></li>
					</ul>
				</div>
			<!-- <div class="col l3 s12">
			<h5 class="white-text">Connect</h5>
			<ul>
				<li><a class="white-text" href="#!">Link 1</a></li>
				<li><a class="white-text" href="#!">Link 2</a></li>
				<li><a class="white-text" href="#!">Link 3</a></li>
				<li><a class="white-text" href="#!">Link 4</a></li>
			</ul>
		</div> -->
	</div>
</div>
<div class="footer-copyright">
	<div class="container">
		Made by <a class="orange-text text-lighten-3" href="#">alex</a>
	</div>
</div>
</footer>


