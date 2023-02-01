<?php 

require_once "config.php";
require_once "session.php";

if (!isset($_SESSION['loggedin'])) {
	header('Location: events.php');
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
      
      #login{
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
        border-bottom: 1px solid #eee;
      }

      .imageupload{
        width: 37%;
        text-align:center;
      }
      .panel-title{
        text-align:center;
      }

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
        height: auto; 
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
      padding: 20px;
      width:100%;
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
        padding:130px 0px;
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
      padding: 20px;
      width:100%;
      text-decoration: none;
    }

    .column .button{
        width: 100%;
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
        height: auto; 
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
        height: auto; 
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
<header class="header">
    <a href="browse.php" class="logo">درب</a>
    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
    <ul class="menu">
      <li class="menu-choice"><a href="userinfo.php" >ملفي الشخصي</a></li>
      <li class="menu-choice"><a href="payinfo.php" >بيانات الدفع</a></li>
      <li class="menu-choice"><a href="events.php" >طلباتي</a></li>
      <li class="menu-choice"><a href="bill.php" >فواتير</a></li>
      <li class="menu-choice"><a href="#">قائمتي المفضلة</a></li>
      <li class="menu-choice social-top"><a href="logout.php" >تسجيل الخروج</a></li>
    </ul>
  </header>

   <div class="bigevents" >
    <h2 class="Title" >طلباتي المنتهية</h2>
    <div class="row">
    <?php
   
      $userID = $_SESSION['id'];
      $result = mysqli_query($db,"SELECT * FROM product, user_order WHERE product.ID = user_order.productID AND  buyerID = '$userID'");
      while($row = mysqli_fetch_row($result)){
    ?>
      <div class="column">
        <div class="imgCover">
          <img src="uploads/<?php echo $row[3]?>">
        </div>
          <h3><?php echo $row[1]?></h3>
          <h4><?php echo $row[2] . " ريال " ?></h4>
          <h4><?php echo $row[7] . " قطع " ?></h4>
          <h4><?php echo "  الإجمالي  " . $row[8] . " ريال " ?></h4>
          <form method ="POST">
            <input type="hidden"  name="ID" value= "<?php echo $row[6];?>" readonly>
            <input type="submit"  name="del-btn"  class="button cart" value="حذف">
         </form>
        </div>

    <?php } ?>
    <?php
    if(isset($_POST["del-btn"])&& isset($_POST["ID"])) { 
    $query = mysqli_query($db,"DELETE FROM user_order WHERE ID = '".$_POST["ID"]."' ");
    echo "<meta http-equiv='refresh' content='0'>";
   }
   ?>
   
    </div>
      </div>



</body>

</html>