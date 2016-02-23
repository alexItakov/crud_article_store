<!DOCTYPE html>
<html>    
<head>  
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

	<title>Intro</title>
	
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="../../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="../../../../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link rel="stylesheet" href="../../css/style.css">
	<link rel="stylesheet" href="../../css/articles.style.css">
	<link rel="stylesheet" href="../../../../css/articles.style.css">

	<link rel="stylesheet" href="/css/style.css">





</head> 

<body> 

	<?php 
	error_reporting(E_ALL & ~E_DEPRECATED); 
	ini_set('display_errors', 'On'); 
	restore_error_handler (); 


	?>

	<!-- Подключение к БД -->
	<?php 

	// $connect = mysql_connect('localhost','root','root') or die (mysql_error('Соединение с базой данных неактивно =/'));

	// mysql_select_db('articles');
	// mysql_set_charset("utf-8");
	// mysql_query("SET NAMES 'utf8';"); 
	// mysql_query("SET CHARACTER SET 'utf8';"); 
	// mysql_query("SET SESSION collation_connection = 'utf8_general_ci';"); 

	
	?>

	<?php
	include_once 'setting.php';
	session_start();


	if ($_SERVER['REQUEST_URI'] == '/') {
		$Page = 'index';
		$Module = 'index';	
	} else {
		$URL_Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
		$URL_Parts = explode('/', trim($URL_Path, '/'));
		$Page = array_shift($URL_Parts);   // <==== index.php часть пути		
		$Module = array_shift($URL_Parts); // <====  часть пути  после index.php/
		// print_r($Module);		

		//$Module = array_shift($URL_Parts);


		if (!empty($Module)) {
			$Param = array();
			for ($i = 0; $i < count($URL_Parts); $i++) {
				$Param[$URL_Parts[$i]] = $URL_Parts[++$i];
			}	
		}
	}




///типо роутер

	if ($Page == 'index') include('start.php');
	else if ($Page == 'login') include('login.php');
	else if ($Module == 'registry') include('registry.php');
	else if ($Module == 'addArticle') include('addArticle.php');
	else if ($Module == 'deleteArticle') include('deleteArticle.php');
	else if ($Module == 'editArticle') include('editArticle.php');
	else if ($Module == 'viewArticle') include('viewArticle.php');
	else if ($Page == 'account') include('account.php');
	else if ($Module == 'articles') include('articles.php');
	else if ($Module == 'articlescategory') include('articles.php');
	?>

	




	
</body>
</html>


