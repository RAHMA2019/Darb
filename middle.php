<?php 
/*
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $shop_name = $_POST['sohp_name'];
    $shop_address = $_POST['shop_address'];
    $role= 'seller';

    $error = "";
    $check_email = mysqli_query($db, "SELECT email FROM user where email = '$email' ");
    if(mysqli_num_rows($check_email) > 0){
       
        session_start();
        $_SESSION["message"]="<p>هذا الايميل موجود بالفعل يبدو أن لديك حساب سابق</p>";
        $_SESSION["forget"]="<a href='forget.php'>ربما نسيت كلمة المرور</a><br/><br/>";
        $_SESSION["undo"]="<a href='seller.php'>لا ليس لدي حساب ربما أخطأت في كتابة العنوان أحاول مرة أخرى</a>"; 
        header("Location: Active.php");
    }
    else{
        $result = mysqli_query($db, "INSERT INTO user (name,email,phone, password, role) VALUES ('$name','$email','$phone', '$password','$role')");
        $result2 = mysqli_query($db, "INSERT INTO shop_info (shop_name,shop_address) VALUES ('$shop_name','$shop_address')");
       
        $_SESSION["message"]="<p> تم إنشاء الحساب فقط قم بتسجيل الدخول </p>"; 
        $_SESSION["forget"]="<a style='display:none;'></a>";
        $_SESSION["undo"]="<a href='login.php'>تسجيل الدخول</a>"; 
        header("Location: Active.php");
        

    }
   
}

$db->close();

*/
?>

<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="UTF8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.0/css/all.css">
  
  <title>مواليد</title>

  <!-- CSS here -->
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/about.css">

  <style>
    .row{
        display: flex;
        flex-direction: row;
        height: 500px; 
        width:100%;
        align-items: center;
        justify-content: center;
    }
    .column{
        display: flex;
        flex-wrap:nowrap;
        flex-direction: column;
        height: 400px; 
        width:20%;
        margin:12px;
        align-items: center;
        justify-content: center;
        background: rgb(255, 255, 255);
  box-shadow: 5px 5px 30px 15px rgba(218, 218, 218, 0.25), 
  -5px -5px 30px 15px rgba(211, 211, 211, 0.22);
    }

    .Title{
      color:#d66b7d;
      text-align: center;
      font-size: 30px;
    }
    .column h3{
      font-size: 20px;
    }
   
    .bigevents{
        display: flex;
        flex-direction: column;
        height: 800px; 
        width:100%;
        padding-top:100px;
        align-items: center;
    }
    #col1{
      background:url('./img/background1.jpg') no-repeat center ;
      
    }
    #col2{
      background:url('./img/background1.jpg') no-repeat center ;
    }
    #col3{
      background:url('./img/background1.jpg') no-repeat center ;
    }
    .button{
        border:none;
    }
    
    @media (max-width: 1200px){
      .row{
        flex-direction: row;
        height: auto; 
        width:80%; 
        flex-wrap:wrap;
      }
    .column{
      flex-direction: column;
        height: 300px; 
        width:60%;
        padding:8px;
    }

    .bigevents{
        flex-direction: column;
        height: auto; 
    }
    .Title{
      font-size: 26px;
    }
    .column h2{
      font-size: 18px;
    }
    .imgWrapper{
      height:60%;
      width:80%;
    }
    

    }
    @media (max-width: 780px){
      .row{
        flex-direction: column;
        height: auto; 
        width:100%;
        
    }
    .column{
      flex-direction: column;
        height: 300px; 
        width:70%;
        padding:8px;

    }

    .bigevents{
        flex-direction: column;
        height: auto; 
    }
    .Title{
      font-size: 24px;
    }
    .column h2{
      font-size: 16px;
    }
    .imgWrapper{
      height:60%;
      width:80%;
    }

    }
  </style>
</head>

<body  onload="document.body.style.opacity='1' ">

  <!--menu-->
  <header class="header">
    <a href="events.php" class="logo">غلا</a>
    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
    <ul class="menu">
    <li class="menu-choice"><a href="#" >الملف الشخصي</a></li>
      <li class="menu-choice"><a href="events.php" class="active">مناسبات</a></li>
      <li class="menu-choice"><a href="#">قائمتي</a></li>
      <li class="menu-choice"><a href="#">نقاطي</a></li>
      <li class="menu-choice social-top"><a href="logout.php" >تسجيل الخروج</a></li>
    </ul>
  </header>


   <div class="bigevents" >
    <h2 class="Title" >تصنيفات</h2>
    <div class="row">
       <div class="column" id="col1"><h3><a href="baby.php" class="button">منتجات</a></h3></div>
       <div class="column" id="col2"><h3><a href="#" class="button">باقات</a></h3></div>
       <div class="column" id="col3"><h3><a href="#" class="button">خدمات</a></h3></div>
    </div>
  </div>



</body>

</html>