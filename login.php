<!DOCTYPE html>
<html> 
<head>
  <meta charset="UTF-8">

  <title>Login</title>
  <link rel="stylesheet" href="../css/style.css">
  
</head>

<style> 
  h4 {
    color: #3DA4BE;
  }
</style>

<body> 

  <?php 
  // error_reporting(E_ALL & ~E_DEPRECATED); 
  // ini_set('display_errors', 'On'); 
  // restore_error_handler (); 


  ?> 


  <?php 

  // $connect = mysql_connect('localhost','root','root') or die (mysql_error('Соединение с базой данных неактивно =/'));
  // mysql_select_db('users');
  $dbh = new PDO('mysql:host=localhost;dbname=project1','root', 'root');
  $dbh->exec('SET NAMES utf8');



  ?>



  <?php  

  if(isset($_POST['enter'])) {

    $login_email = $_POST['login_email'];
    $email = $_POST['email'];
    $psword = md5($_POST['psword']);

    
    # $regdate = $_POST['regdate'];
    # $regtime = $_POST['regtime'];

    // $query = mysql_query("SELECT * FROM `project1`.`users` WHERE `login` = '$login';");
    // $user_data = mysql_fetch_array($query);


    $slct = "SELECT * FROM users  WHERE `login` = '$login_email' OR `email`= '$login_email';";
    $assoc_res = $dbh->query($slct);
    $dbh = NULL;
    $user_data = $assoc_res->fetch(PDO::FETCH_ASSOC);




    if ($user_data['psword'] == $psword) {
      echo "<h4>Успех!</h4>";
      header('Location: http://localhost/index.php/articles');

    }
    else {
     echo "<h4>Что то не сошлось =|</h4>";
   }


 }

 ?>







 <div class="logo"></div>

 <form method="post" action="login.php">
  <div class="login-block">
    <h1>Login</h1>



    <div id="avatar">

      <!-- Выведение аватарки в Ячейку Логина    -->  

      <?php 

      session_start();      
      // отображение картинки из базы данных
      function displayAvatar() {
        $id = $_SESSION['id'];
        $dbh = new PDO('mysql:host=localhost;dbname=project1','root', 'root');

        $slct = "SELECT * FROM users  WHERE `id` = '$id';";
        $assoc_res = $dbh->query($slct);

        $dbh = NULL;
        $row = $assoc_res->fetch(PDO::FETCH_ASSOC);


        // $query = mysql_query("SELECT * FROM `project1`.`users` WHERE `id` = '$id';");    
        // $row = mysql_fetch_assoc($query);

        echo '<img height="160" width="150" src="data:image;base64,'.$row['avimg'].' ">';

      }

      displayAvatar();
      // отображение картинки из базы данных





      ?>
      <!-- Выведение аватарки в Ячейку Логина    -->  



    </div>
    <br>





    <input type="text" value="" placeholder="Login" class="iconname" name="login_email" />
    <input type="text" value="" placeholder="E-mail" class="iconname" name="email" />
    <input type="password" value="" placeholder="Password" class="lock" name="psword" />


      <!-- <input type="hidden"  name="regdate" value="<?php  echo date ('Y-m-d'); ?>">
      <input type="hidden"  name="regtime"  value="<?php   echo date ('H:i'); ?>" >  

      МОЖНО ли как то дату и время привязать к посещению?????  -->

      <input class="reg_button" type="submit" name="enter" value="enter">
    </div>
  </form>

</body>

</html>