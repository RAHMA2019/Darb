<?php
    require_once "config.php";
    require_once "session.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if(isset($_POST['send-btn'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT ID,role FROM user WHERE email = '$email' and password = '$password'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
        $count = mysqli_num_rows($result);
        
        if($count == 1) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['id'] = $row['ID'];
            
            if($row["role"]=="buyer"){
               header("location:events.php");
            }

            else if($row["role"]=="seller"){
                header("location:orderList.php");
            }

            else if($row["role"]=="admin"){
                header("location:Dashboard.php");
            }
 
        }
        else {
          $msg="خطأ في الايميل أو في كلمة المرور تححق منها";
        } 

      }
    }
    
    $db->close();  

?>

<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="UTF8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.0/css/all.css">
  
  <title>سجل دخولك</title>

  <!-- CSS here -->
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/about.css">

  <style>
      
    #login{
      padding-top: 150px;
      height:700px;
      border:none;
    }
    .forget{
      color:indianred;
      font-size:16px;
      text-align:right;
    }
      
  </style>
</head>

<body  onload="document.body.style.opacity='1' ">

<!--menu-->
<header class="header">
    <a href="index.php" class="logo">درب</a>
    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
    <ul class="menu">
    <li class="menu-choice"><a href="index.php" class="active">الرئيسية</a></li>
      <li class="menu-choice"><a href="sellerinfo.php">انضم كبائع</a></li>
      <li class="menu-choice"><a href="buyerinfo.php">انضم كمشتري</a></li>
      <li class="menu-choice"><a href="contact.php">تواصل معنا</a></li>
      <li class="menu-choice social-top"><a href="login.php" >تسجيل الدخول</a></li>
    </ul>
  </header>

  <!--Form-->
  <div class="userForm" id="login">
    <form method="POST" action="" id="myForm">
      <h2 class="Title" >تسجيل دخول</h2>
      <?php if (!empty($msg)) {
        echo "<p class='error' style='color:indianred'>$msg</p>";
        } ?>
      <input type="email" id="email"  name="email" placeholder="الايميل"  required >
      <input type="password" id="password"  name="password" placeholder="كلمة المرور"  required>
      <input type="submit" name="send-btn" id="btn" value="إرسال">
    </form>
    <a href="buyer.php" class="forget">ليس لدي حساب</a><br/>
    <a href="forget.php" class="forget">نسيت كلمة المرور</a>
  </div>

  <!--footer-->
  <div  class="footer" id="footer">    

  <div class="middle">
  
  <div  class="social">
    <a href="https://www.facebook.com/%D8%BA%D9%84%D8%A7-Gala-112936327541018/" class="fab fa-facebook" target="_blank"></a>
    <a href="https://twitter.com/Gala_SA_1" class="fab fa-twitter" target="_blank"></a>
    <a href="#" class="fab fa-whatsapp" target="_blank"></a>
    <a href="https://www.instagram.com/gala_sa_1/" class="fab fa-instagram" target="_blank"></a>
  </div>
</div>      
</div>

  <div  class="copyright">
    <p> جميع الحقوق محفوظه &copy; <span id="year"></span>&nbsp;<a href="index.php">لدرب</a></p>
    <script>document.getElementById("year").innerHTML=(new Date().getFullYear())</script>
  </div>

</body>

</html>