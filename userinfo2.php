<?php 

require_once "config.php";
require_once "session.php";

if (!isset($_SESSION['loggedin'])) {
	header('Location: userinfo2.php');
	exit;
}

/*update data */
if(isset($_POST['btn-send'])){
  
   if(!empty($_POST["fullName"])) {
        $fullName = $_POST["fullName"];
    }

    if(!empty($_POST["phone"])) {
        $phone = $_POST["phone"];
    }

    if(!empty($_POST["city"])) {
        $city = $_POST["city"];
    }

    if(!empty($_POST["address"])) {
        $address = $_POST["address"];
    }


    if(!empty($_POST["password"])) {
       $password = $_POST["password"];
    }

    if(!empty($_POST["shop_name"])) {
      $shop_name= $_POST["shop_name"];
    }
     
   if(!empty($_POST["shop_address"])) {
    $shop_address = $_POST["shop_address"];
   }
   
      
    $query = mysqli_query($db," UPDATE user SET fullName= '$fullName',phone='$phone' ,city='$city', address='$address' ,password= '$password' , shop_name='$shop_name', shop_address='$shop_address' WHERE  email =  '". $_SESSION['email']. "' ");
          
}
      


?>

<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="UTF8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.0/css/all.css">
  
  <title>درب</title>

  <!-- CSS here -->
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/about.css">

  <style>
      
      #login{
        padding: 40px 0px;
        padding-top: 66px;
        height:auto;
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

      header{
        border-bottom: 1px solid #eef;
      }
   
    </style>
</head>

<body  onload="document.body.style.opacity='1' ">

  <!--menu-->
  <header class="header">
    <a href="browse.php" class="logo">درب</a>
    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
    <ul class="menu">
    <li class="menu-choice"><a href="userinfo2.php" >ملفي الشخصي</a></li>
      <li class="menu-choice"><a href="addProduct.php" >إضافة منتجات</a></li>
      <li class="menu-choice"><a href="orderList.php">عرض الطلبات</a></li>
      <li class="menu-choice social-top"><a href="logout.php" >تسجيل الخروج</a></li>
    </ul>
  </header>

    <div class="userFom" id="login">
        <form method="POST" action="" id="login" name="login">
            <h2 class="Title" >ملفي الشخصي</h2>
       
            <?php if (!empty($msg)) {
                echo "<p class='error' style='color:indianred'>$msg</p>";
                } ?>
            <?php
            /*show  data*/
            $query = mysqli_query($db,"SELECT * FROM  user where email =  '". $_SESSION['email']."' ");
                while($row = mysqli_fetch_array($query)){
            ?>
            <input type="email"  name="email" placeholder="الإيميل"  class="forminput" value="<?php echo $row['email'] ?>" style="background-color:#eee" required  readonly>
            <input type="text"  name="fullName" placeholder="الاسم الثلاثي" value="<?php echo $row['fullName'] ?>" class="forminput"  required >  
            <input type="text"  name="phone" placeholder="رقم الجوال" value="<?php echo $row['phone'] ?>" class="forminput"  required >  
            <input type="text"  name="city" placeholder="المدينة" value="<?php echo $row['city'] ?>" class="forminput"  required >  
            <input type="text"  name="address" placeholder="العنوان" value="<?php echo $row['address'] ?>" class="forminput"  required >  
            <input type="text"  name="password" placeholder="كلمة المرور" minlength="8" value="<?php echo $row['password'] ?>" class="forminput" required  >
            <input type="text"   name="shop_name" placeholder="اسم المتجر" value="<?php echo $row['shop_name'] ?>" required >  
            <input type="text"   name="shop_address" placeholder="عنوان المتجر" value="<?php echo $row['shop_address'] ?>"  required >  
            <input type="submit" name="btn-send" value="رفع التعديل" class="button btn-send">
        </form> 
        <?php 
        }
        ?>
             
    </div>
  



</body>

</html>