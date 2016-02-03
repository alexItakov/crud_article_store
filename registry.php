  <!DOCTYPE html>
  <html>   
  <head>
    <meta charset="UTF-8">

    <title>Registry</title>
    <link rel="stylesheet" href="css/screen.css">
    <link rel="stylesheet" href="css/style.css">
    
  </head> 

  <body> 


    <?php 
    // error_reporting(E_ALL & ~E_DEPRECATED); 
    // ini_set('display_errors', 'On'); 
    // restore_error_handler (); 


    ?> 


    <?php 

    // $connect = mysql_connect('localhost','root','root') or die (mysql_error('Соединение с базой данных неактивно =/'));
    // mysql_select_db('users');


    // mysql_query("SET NAMES 'utf8';"); 
    // mysql_query("SET CHARACTER SET 'utf8';"); 
    // mysql_query("SET SESSION collation_connection = 'utf8_general_ci';"); 

    
    $dbh = new PDO('mysql:host=localhost;dbname=project1','root', 'root');
    $dbh->exec('SET NAMES utf8');


    // $dsn = "mysql:host=localhost;dbname=project1;";
    // $opt = array(
    //   PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    //   PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    //   );

    // $user = 'root';
    // $pass = 'root';
    // $pdo = new PDO($dsn, $user, $pass, $opt);
    // $pdo->exec('SET NAMES utf8');



    ?>



    <?php 
    
//// Начало скрипта по нажатии САБМИТА    
//// Начало скрипта по нажатии САБМИТА


    if(isset($_POST['submit'])) {

      // Инициируем сессию
      session_start();


      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $login = $_POST['login']; 
      $email = $_POST['email'];
      $psword = $_POST['psword'];
      $repsword = $_POST['repsword'];

      $fname = $_POST['fname'];
      $regdate = $_POST['regdate'];
      $regtime = $_POST['regtime'];



      // Помещаем массив в сессию
      $arrSession = array($fname, $lname, $login, $email);
      $_SESSION['arr'] = $arrSession;
      
      // print_r($_SESSION['arr'][1]);
      // print_r($_SESSION['arr'][2]);
      // print_r($_SESSION['arr'][3]);


        //mysql_escape_string
      


      // ПРоверка на тип image 

      if (getimagesize($_FILES['avatar']['tmp_name']) == FALSE) {
        echo "plase select any image";
      }
      else {
        $avatar = addslashes($_FILES['avatar']['tmp_name']);
        $name = addslashes($_FILES['avatar']['name']);  
        $avatar = file_get_contents($avatar);
        $avatar = base64_encode($avatar);



      //Проверка Логина         
        $slctLog = "SELECT * FROM users WHERE login='$login';"; 
        $assoc_res = $dbh->query($slctLog);
        $allusers = $assoc_res->fetch(PDO::FETCH_ASSOC);
        if($login == $allusers['login'])  { 
          echo '<div id="login_taken">*this login is already in use, please select something else</div>'; 



        } 
        else { 


          //Проверка Email

          $slctEmail = "SELECT * FROM users WHERE email='$email';"; 
          $assoc_res = $dbh->query($slctEmail);
          $allusers = $assoc_res->fetch(PDO::FETCH_ASSOC);
          if($email == $allusers['email'])  { 
            echo '<div id="email_taken">* this email is already in use, please select something else or <a href="http://localhost/login.php">login</a> </div>'; 



          } 
          else {
            //Проверка пароля
            if ($psword == $repsword) {
              $psword = md5($psword);

              $insrt = "INSERT INTO users (`fname`, `lname`, `login`, `email`, `psword`, `regdate`, `regtime`,`avname`, `avimg`) VALUES ('$fname', '$lname', '$login', '$email',  '$psword', '$regdate', '$regtime', '$name', '$avatar');";
              $dbh->query($insrt);


              //Заносим ID последнего инсерта в сессию для передачи его на др страницу
              $lastid = $dbh->lastInsertId();
              $dbh=NULL; // Закрыли соединение
              $_SESSION['id'] = $lastid;


              header('Location: http://localhost/login.php');
               //header('Location: http://localhost/registry.php');

            }
            else {
              echo '<div id="ps_noy">*password do not match, please try again</div>'; 

            }


              //Заносим ID последнего инсерта в сессию для передачи его на др страницу
             //Проверка пароля




          }
          //Проверка Email          
        } 
      //Проверка Логина





      //Проверка Логина и Емаила
      }
       // ПРоверка на тип image 
    }

//// Конец скрипта по нажатии САБМИТА
//// Конец скрипта по нажатии САБМИТА



    ?>









    <div class="logo"></div>

    <form  id="regform"   method="post" action="registry.php" enctype="multipart/form-data" >
      <div class="login-block">
        <h1>Registration</h1>




        <div id="avatar">

          <img id="image">  </img>
          <p class="txt_avatar">Select <br>  image for you <br> avatar</p>
          <div id="upload"><img src="img/upload-2-512.png" alt=""></div>

          <input id="imgInput" class="av_button" type="file" value="selectimage" accept="image/jpeg,image/png,image/gif" placeholder="you avatar"  name="avatar"  required/>
        </div>

        <br> 






        <input type="text" value="<?php print_r($_SESSION['arr'][0]); ?>" placeholder="Your name" class="iconname" name="fname" minlength="2" required/>
        <input type="text" value="<?php print_r($_SESSION['arr'][1]); ?>" placeholder="Your surname" class="iconname" name="lname" required/>
        <input type="text" value="<?php print_r($_SESSION['arr'][2]); ?>" placeholder="Login" class="iconname" name="login" required/>
        <input type="email" value="<?php  print_r($_SESSION['arr'][3]);?>" placeholder="E-mail" class="iconname" name="email" required/>
        <input type="password" value="" placeholder="Password" class="lock" name="psword" required/>
        <input type="password" value="" placeholder="RePassword" class="lock" name="repsword" required/>
        <input type="hidden"  name="regdate" value="<?php  echo date ('Y-m-d'); ?>">
        <input type="hidden"  name="regtime"  value="<?php   echo date ('H:i'); ?>" >

        <input  class="reg_button" type="submit" name="submit" value="registry">
      </div>
    </form>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
    <script src="js/jquery.validate.js"></script> 
    <!-- Скрипт валидации -->

    <script>
      $('#regform').validate({

        rules: {
          fname: {
            required: true,
            minlength: 4
          },

          lname: {
            required: true,
            minlength: 4
          },

          login: {
            required: true,
            minlength: 3
          }
        },

        messages: {
          avatar: {
            required: "Please, browse any image"
          }
        }


      });

    </script>


    <!-- Скрипт валидации -->





    <!-- СКРИПТ ПРЕВЬЮ аватарки -->
    <script>



      function readURL(input) {

        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
            $('#image').attr('src', e.target.result);
          };

          reader.readAsDataURL(input.files[0]);
        }
      }

      $("#imgInput").change(function(){
        readURL(this);
      });



    </script>
    <!-- СКРИПТ ПРЕВЬЮ аватарки -->


  </body>

  </html>