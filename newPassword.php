<?php 

require_once "config.php";

$email = $_GET['email'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $result = mysqli_query($db, "UPDATE user SET pass = '$password' WHERE email = '$email'");
    
    header("Location: Active2.php");

}

?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>سيما للتسويق الإلكتروني | كلمة مرور جديدة</title>

   <!-- CSS here -->
   <link rel="stylesheet" href="css/main.css">
   <link rel="stylesheet" href="css/about.css">

</head>

<body>

  <!--menu-->
  <header class="header">
    <a href="index.php" class="logo">سيما</a>
    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
    <ul class="menu">
      <li class="menu-choice"><a href="index.php" class="active">الرئيسية</a></li>
      <li class="social-top"><a href="https://www.snapchat.com/add/simaaelec" class="fab fa-snapchat" target="_blank"></a></li>
      <li class="social-top"><a href="http://instagram.com/simaaelec" class="fab fa-instagram" target="_blank"></a></li>
      <li class="social-top"><a href="https://twitter.com/simaaelec" class="fab fa-twitter" target="_blank"></a></li>
      <li class="social-top"><a href="https://www.facebook.com/simaa.elec" class="fab fa-facebook" target="_blank"></a></li>
    </ul>
  </header>
	
    <div  id="banner">
        <div  class="wrapper">

            <form method="POST" action="" >
                <h2>كلمة مرور جديد</h2><br/>
                <p id="error" class="error"></p>
                <input type="password" id="password"  name="password" placeholder="كلمة المرور الجديد" minlength="8"  required>
                <input type="password" id="confirm_password"  name="confirm_password" placeholder=" تأكيد كلمة المرور" minlength="8"  required><br/>
                <input type="submit" id="confirm-btn" name="confirm-btn" value="تأكيد" onclick="check()">
            </form>
        
        </div>
    </div>
      <!--footer-->
  <div  class="footer" id="footer">    
           
    <div class="middle">
      <h4>موقعنا الجغرافي</h4>
      <span><i class="fas fa-map-marker-alt icon"></i><a href="https://goo.gl/maps/E9Vo97TC7vSgTNcU8" target="_blank">طريق الملك عبدالله الفرعي، بئر عثمان</a></span>
    </div>

    <div class="middle">
      <h4>الإيميل</h4>
      <span><i class="far fa-envelope icon"></i><a href= "mailto:info@simaaelec.com">info@simaaelec.com</a></span>
    </div>

    <div class="middle">
      <h4>اتصل بنا</h4>
      <span><i class="fas fa-phone icon"></i><a href="https://wa.me/966569005172/?text=مرحبا⁩" target="_blank">0569005172⁩</a></span>
    </div>
   
    <div class="middle">
      <h3>تابعنا</h3>
      <div  class="social">
        <a href="https://www.facebook.com/simaa.elec" class="fab fa-facebook" target="_blank"></a>
        <a href="https://twitter.com/simaaelec" class="fab fa-twitter" target="_blank"></a>
        <a href="https://wa.me/966569005172/?text=مرحبا⁩" class="fab fa-whatsapp" target="_blank"></a>
        <a href="http://instagram.com/simaaelec" class="fab fa-instagram" target="_blank"></a>
        <a href="https://www.snapchat.com/add/simaaelec" class="fab fa-snapchat" target="_blank"></a>
      </div>
    </div>      
  </div>

  <div  class="copyright">
    <p> جميع الحقوق محفوظه &copy; <span id="year"></span>&nbsp;<a href="index.php">لسيما</a></p>
    <script>document.getElementById("year").innerHTML=(new Date().getFullYear())</script>
  </div>

  <!--js code that check form validation-->

    <script>
        
    function check(){
    var password = document.getElementById('password');
    var confirm_password = document.getElementById('confirm_password');
    var error = document.getElementById('error');
        
    if(password.value==""){
        error.innerHTML ="**أدخل كلمة المرور**";
        return false; 
    }
    else if( confirm_password.value==""){
        error.innerHTML ="**أكد كلمة المرور**";
        return false; 
    }

    else if(password.value!= confirm_password.value){
       confirm_password.style.borderBottomColor = "indianred";
       confirm_password.style.backgroundColor = "lightpink";
       confirm_password.setCustomValidity("**كلمة المرور غير متطابقة**");
       error.innerHTML ="**كلمة المرور غير متطابقة**";
       return false;
    }

    else if(password.value == confirm_password.value){
        confirm_password.setCustomValidity('');
    }

    else {
        return true;
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;

   }
    </script>
</body>
</html>