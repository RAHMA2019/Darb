<?php 

require_once "config.php";
require_once "session.php";

if (!isset($_SESSION['loggedin'])) {
	header('Location: addProduct.php');
	exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST['send-btn'])){
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $userID = $_SESSION['id'];

    $photo = $_FILES["photo"]["name"]; 
    $location = "uploads/";
    $path = $location . basename($_FILES['photo']['name']);

    $fileType  = strtolower(pathinfo($path,PATHINFO_EXTENSION));
    $allowTypes = array("jpg","jpeg","png","gif");

    if(in_array($fileType, $allowTypes)){ 

      move_uploaded_file($_FILES["photo"]["tmp_name"],$path);
        
      $result = mysqli_query($db, "INSERT INTO product (product_name,price,photo,userID) VALUES ('$product_name','$price','$photo','$userID')");
      //echo "<meta http-equiv='refresh' content='0'>"; 
           

    }
    
    else{
      echo 'لا يمكنك رفع ملف من هذا النوع..';
    }
    
  }
       
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
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   <link href="css/bootstrap-imageupload.css" rel="stylesheet">

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

    .column .button{
        width: 100%;
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
        padding-top:60px;
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
       <form method="POST" action="" id="login"  enctype="multipart/form-data">
        <h2 class="Title" >إضافة منتجات</h2>
        <input type="text"  name="product_name" placeholder="اسم المنتج" required >  
        <input type="number" name="price" placeholder="سعر المنتج"  required > 
        <div class="imageupload panel panel-default">
               <div class="panel-heading clearfix">
                  <h3 class="panel-title pull-center">صورة المنتج</h3>
               </div>
               <div class="file-tab panel-body">
                  <label class="btn btn-info btn-file">
                     <span>تصفح</span>
                     <input type="file" name="photo" accept="image/*" required>
                  </label>
               </div>
            </div>
        <input type="submit" name="send-btn" value="حفظ" class="button ">
        </form>
    </div>

    <div class="bigevents" >
    <h2 class="Title" >منتجاتي</h2>
    <div class="row">
    <?php
      $userID = $_SESSION['id'];
    
      $result2 = mysqli_query($db,"SELECT * FROM product WHERE userID = '$userID' ");
      while($row = mysqli_fetch_array($result2)){
    ?>
      <div class="column"><div class="imgCover"><img src="uploads/<?php echo $row['photo']?>"></div><h3><?php echo $row['product_name']?></h3><h4><?php echo $row['price'] . '  ريال '?></h4>
      <form method ="POST">
        <input type="hidden"  name="ID" value= "<?php echo $row['ID'];?>" readonly>
        <input type="submit"  name="del-btn"  class="button cart" value="حذف">
      </form>
    </div>
    <?php } ?>

    <?php
    if(isset($_POST["del-btn"])&& isset($_POST["ID"])) { 
    $query = mysqli_query($db,"DELETE FROM product WHERE ID = '".$_POST["ID"]."' ");
    echo "<meta http-equiv='refresh' content='0'>";
   }
   ?>

    
    </div>
    </div>


    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   <script src="js/bootstrap-imageupload.js"></script>
   <script>
      var $imageupload = $('.imageupload');
      $imageupload.imageupload();
   </script>
   
</body>

</html>
