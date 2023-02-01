<?php 

require_once "config.php";
require_once "session.php";

if (!isset($_SESSION['loggedin'])) {
	header('Location: orderList.php');
	exit;
}

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

    table, tr{
        border: 1px solid #111;
        border-collapse: collapse;
        border-right:none;
        border-left:none;
        padding:12px;
    }
    table , td , th {
        padding :12px 20px;
    }
    th{
        color:#111;
    }

    td{
        color:#999;
    }

    .Title{
      color:#d66b7d;
      text-align: center;
      font-size: 30px;
    }
  
    .bigevents{
        display: flex;
        flex-direction: column;
        height: auto; 
        width:100%;
        padding-top:130px;
        align-items: center;
    }

    @media (max-width: 1200px){

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
   

    }
    @media (max-width: 780px){

    .bigevents{
        flex-direction: column;
        height: auto; 
    }
    .Title{
      font-size: 24px;
    }
    
    table{
        padding-top:50px;
        width:80%
     }
     table ,td ,th{
         padding:9px;
     }
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


  <div class="bigevents" >
        <h2 class="Title" >عرض الطلبات</h2>
        <table>
            <tr>
                <th>المنتج</th>
                <th>السعر</th>
                <th>العدد</th>
                <th>الإجمالي</th>
                <th>تاريخ الشراء</th>
            </tr>
            <?php
            $userID = $_SESSION['id'];
            $result = mysqli_query($db,"SELECT * FROM product, user_order WHERE product.ID = user_order.productID AND  product.userID = '$userID'");
            while($row = mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $row['product_name']?></td>
                <td><?php echo $row['price']?></td>
                <td><?php echo $row['quantity']?></td>
                <td><?php echo $row['price'] * $row['quantity']?></td>
                <td><?php echo $row['Update_Time']?></td>
            </tr>
            <?php } ?>
        </table>
    </div>



</body>

</html>