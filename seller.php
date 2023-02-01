<?php 

require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST['send-btn'])){
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $shop_name = $_POST['shop_name'];
    $shop_address = $_POST['shop_address'];
    $role= 'seller';

    $error = "";
    $check_email = mysqli_query($db, "SELECT email FROM user where email = '$email' ");
    if(mysqli_num_rows($check_email) > 0){
      $msg ="هذا الايميل موجود بالفعل يبدو أن لديك حساب سابق";
    }
    else{
      $result = mysqli_query($db, "INSERT INTO user (email,fullName,phone,city,address, password,shop_name,shop_address, role) VALUES ('$email','$fullName','$phone','$city','$address', '$password','$shop_name','$shop_address','$role')");
      $msg="تم إنشاء الحساب فقط قم بتسجيل الدخول "; 
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
  
  <title>سجل كبائع</title>

  <!-- CSS here -->
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/about.css">

  <style>
      
    #login{
      padding-top: 150px;
      height:1100px;
      border:none;
    }
    .forget{
      color:indianred;
      font-size:16px;
      text-align:right;
    }
    .Title{
      color:#d66b7d;
    }
    .error{
      color: indianred;
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
      <h2 class="Title" >التسجيل كبائع</h2>
      <?php if (!empty($msg)) {
        echo "<p class='error' style='color:indianred'>$msg</p>";
        } ?>
      <h3>البيانات الشخصية</h3>
      <input type="text" id="fullName"  name="fullName" placeholder="اسم الثلاثي"  required >
      <input type="email" id="email"  name="email" placeholder="الايميل"  required >
      <input type="text" id="phone"  name="phone" placeholder="رقم الجوال"  required >
      <input type="text" id="city"  name="city" placeholder="المدينة"  required >
      <input type="text" id="address"  name="address" placeholder="العنوان"  required >
      <input type="password" id="password"  name="password" placeholder="كلمة المرور"  required>
      <input type="password" id="confitm_password"  name="confitm_password" placeholder="تأكيد كلمة المرور"  required>
      <h3>بيانات المتجر</h3>
      <input type="text" id="shop_name"  name="shop_name" placeholder="اسم المتجر"  required >
      <input type="text" id="shop_address"  name="shop_address" placeholder="عنوان المتجر"  required >
      <input type="submit" name="send-btn" id="btn" value="إرسال">
    </form>
    <a href="buyer.php" class="forget">لست صاحب متجر..أود التسجيل كمشتري</a>
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