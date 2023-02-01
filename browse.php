<?php 

require_once "config.php";
require_once "session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
       header{
        border-bottom: 1px solid #eee;
      }
      .bigevents .row{
        display: flex;
        flex-direction: row;
        height: auto;
        width:100%;
        align-items: center;
        justify-content: center;
        flex-wrap:wrap;
    }
    .bigevents .column{
        display: flex;
        flex-direction: column;
        flex-wrap:nowrap;
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
      padding: 30px 20px;
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
    .bigevents .column h3{
      font-size: 18px;
      padding: 8px;
      margin:0;
      color: #d66b7d;
    }

    .bigevents .column h4{
      font-size: 16px;
      padding: 8px;
      margin:0;
    }
  
    .bigevents{
        display: flex;
        flex-direction: column;
        height: auto; 
        width:100%;
        padding: 40px 0px;
        padding-top:100px;
        align-items: center;
    }
    .bigevents .column:hover{
       transform: translate3D(0,-5px,0) scale(1.03);
       transition: all .4s ease; 
    }
    .bigevents .imgCover{
      height:50%;
      width:90%;
      padding:5px;
     
      border-radius: 12px;
    }
    .bigevents img{
      height:100%;
      width:100%;
    }
   

   .cart{
      padding: 9px 20px;
      text-decoration: none;
    }

    .cart:hover{
      background-color: #111;
      color: #fff;
      text-decoration: none;
    }

    @media (max-width: 1200px){
      .bigevents.row{
        flex-direction: row;
        height: auto; 
        width:80%; 
        flex-wrap:wrap;
      }
      .bigevents .column{
      flex-direction: column;
        height: 400px; 
        width:45%;
        padding:8px;
    }

    .bigevents{
        flex-direction: column;
        height: auto; 
    }
    .Title{
      font-size: 26px;
    }
    .bigevents .column h2{
      font-size: 18px;
    }
    .bigevents .imgCover{
      height:50%;
      width:80%;
    }


    }
    @media (max-width: 780px){
      
      .imageupload{
        width: 85%;
        text-align:center;
      }
      .bigevents  .row{
        flex-direction: column;
        height: auto; 
        width:100%;
        
    }
    .bigevents .column{
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
      font-size: 24px;
    }
    .bigevents .column h2{
      font-size: 17px;
    }
    .bigevents .imgCover{
      height:50%;
      width:80%;
    }
   
  }
        
  </style>
</head>

<body  onload="document.body.style.opacity='1' ">

  <!--menu-->
  <?php
    //menu that show when user is not login
     if (!isset($_SESSION['loggedin'])) {
    ?>
      <header class="header">
    <a href="index.php" class="logo">درب</a>
    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
    <ul class="menu">
      <li class="menu-choice"><a href="sellerinfo.php">انضم كبائع</a></li>
      <li class="menu-choice"><a href="buyerinfo.php">انضم كمشتري</a></li>
      <li class="menu-choice"><a href="contact.php">تواصل معنا</a></li>
      <li class="menu-choice social-top"><a href="login.php" >تسجيل الدخول</a></li>
    </ul>
  </header>
  <?php }
  else {
  //menu that show when user is login in
  $userID = $_SESSION['id'];
  $query2 = mysqli_query( $db,"SELECT * FROM user where ID =  '$userID' ");
  while($row = mysqli_fetch_array($query2)){
  $role = $row['role'];
  if($role == 'buyer'){
  ?>
  <header class="header">
    <a href="browse.php" class="logo">درب</a>
    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
    <ul class="menu">
    <li class="menu-choice"><a href="userinfo.php" >ملفي الشخصي</a></li>
    <li class="menu-choice"><a href="events.php" >طلباتي</a></li>
      <li class="menu-choice"><a href="bill.php" >فواتير</a></li>
      <li class="menu-choice"><a href="list">قائمتي المفضلة</a></li>
      <li class="menu-choice social-top"><a href="logout.php" >تسجيل الخروج</a></li>
    </ul>
  </header>
  <?php } 
    else if($role == 'seller'){
  ?>
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
  <?php } 
  else{
    echo 'no problem';
  }}}
  ?>


   <div class="bigevents" >
    <h2 class="Title" >تصفح المنتجات</h2>
    <div class="row">
    <?php
      $result = mysqli_query($db,"SELECT * FROM product ");
      while($row = mysqli_fetch_array($result)){
    ?>
    <div class="column"><div class="imgCover"><img src="uploads/<?php echo $row['photo']?>"></div><h3><?php echo $row['product_name']?></h3><h4><?php echo $row['price'] . '  ريال '?></h4><a href="more.php?link=<?php echo $row['ID']?>" class="button cart" >تفاصيل</a></div>

    <?php } ?>
    </div>
      </div>



</body>

</html>