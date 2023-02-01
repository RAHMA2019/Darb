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
        flex-wrap:wrap;
    }
    table, tr{
        border: 1px solid #111;
        border-collapse: collapse;
        border-right:none;
        border-left:none;
        padding:12px;
    }
    table , td , th {
        padding :30px;
    }
    .column{
        display: flex;
        flex-direction: column;
        height: 400px; 
        width:18%;
        margin:12px;
        padding:12px;
        align-items: center;
        justify-content: center;
        background: rgb(255, 255, 255);
  box-shadow: 5px 5px 30px 15px rgba(218, 218, 218, 0.25), 
  -5px -5px 30px 15px rgba(211, 211, 211, 0.22);
  cursor:pointer;
    }
    .cart{
      padding: 25px 14px;
      color:#d66b7d;
    }
    .cart:hover{
      color:#d66b7d;
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
    .column:hover{
       transform: translate3D(0,-5px,0) scale(1.03);
       transition: all .4s ease; 
    }
    .imgWrapper{
      height:50%;
      width:90%;
      padding:5px;
     
      border-radius: 12px;
    }
    img{
      height:100%;
      width:100%;
    }
    .button{
       color:#fff;
       background-color: #111;
      padding:12px 60px;
      font-size:14px;  
      border:none;
    }
    #cart{
      font-size:22px;
      padding:20px;
      color: #F4D03F;
    }

    #cart-counter{
      color:#555;
      display:inline-block;
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
        height: 400px; 
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
      height:50%;
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
        height: 400px; 
        width:46%;
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
      height:50%;
      width:80%;
    }
    #cart-counter{
       display:none;
    }
    table{
        padding-top:50px;
        width:60%
     }
     table ,td ,th{
         padding:20px;
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
      <a href="cart.php" id="cart-counter"><span><i class="fas fa-shopping-cart " id="cart"></i></a></span>
      <li class="menu-choice social-top"><a href="logout.php" >تسجيل الخروج</a></li>
    </ul>
  </header>

   <!--Form-->
   <div class="bigevents" >
    <h2 class="Title" >جميع الطلبات</h2>

      <table>
          <tr>
              <th>المنتج</th>
              <th>السعر</th>
              <th>العدد</th>
              <th>الإجمالي</th>
          </tr>
          <td>توزيعات مواليد</td>
          <td>100 رس</td>
          <td>1</td>
          <td>100 رس</td>
      </table>

      <a href="#" class="button">إتمام الشراء</a>
  
  </div>

  <script>
    function addCart(){
      var Cartclick = document.getElementById('cart-counter');
      count = 0;
      Cartclick = count + 1;
     
    }
  
  </script>


</body>

</html>