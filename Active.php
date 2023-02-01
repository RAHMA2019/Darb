<?php 

require_once "config.php";
require_once "session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    <title>غلا</title>
  
   <!-- CSS here -->
   <link rel="stylesheet" href="css/about.css">
   <style>
    .column{
        display: flex;
        flex-direction: column;
        flex-wrap:nowrap;
        height: 600px; 
        padding:12px;
        align-items: center;
        justify-content:center;
    }
       p{
           font-size: 18px;
           padding-top:200px;
           color:indianred;
           text-align: center;
           display:flex;
           align-items: center;
           flex-direction: column; 
           justify-content: center;
           color: #111;
        }


    .btn{
      padding: 12px 30px;
      background-color: #d66b7d;
      color: #fff;
      text-decoration: none;
      border:none;
    }
    .btn:hover{
      background-color: #111;
      text-decoration: none;
    }

    .cart{
        background-color: #111;
        padding: 12px 30px;
        color: #fff;
        text-decoration: none;
        border:none;
    }

    .btn:hover{
      background-color: #d66b7d;
      text-decoration: none;
    }


        @media (max-width:780px){
            p{
              font-size: 16px;
              padding:200px 30px 0px 30px ;
            }

           a{
               font-size: 16px;
            }

        }
   </style>
   
</head>

<body>
    <div class="column">
    <?php
      $productID = $_GET["link"]; 
      $result = mysqli_query($db,"SELECT * FROM product WHERE product.ID =  '$productID' ");
      while($row = mysqli_fetch_array($result)){
    ?>
    <?php
    //menu that show when user is not login
     if (!isset($_SESSION['loggedin'])) {
    ?>
    <a href="buyer.php" class="button btn">انشئ حساب جديد لإتمام عملية الشراء </a>
    <a href="login.php" class="button btn">لدي حساب سابق</a>
    <a href="browse.php" class="button cart">أريد متابعة التسوق</a>
    <?php  } else { ?>
    <a href="payment.php?link=<?php echo $row['ID']?>" class="button btn">اضغط للمتابعة</a>
    <a href="browse.php" class="button cart">أريد متابعة التسوق</a>
    <?php } } ?>
    </div>

    
</body>
</html>