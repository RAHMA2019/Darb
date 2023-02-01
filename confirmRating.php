<?php

require_once "config.php";
require_once "session.php";

/*if (!isset($_SESSION['loggedin'])) {
	header('Location: confirmRating.php');
	exit;
}*/

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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <title>سيما للتسويق الإلكتروني | تأكيد الآراء</title>

    <!-- CSS here -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/about.css">
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            color: #333;
        }

        .header .social-top a{
            font-size: 16px;
        }
        
        .userForm{
            padding-top: 120px;
            height:auto;
        }

        .userForm .imageupload > img{
            width: 100%;
            height:100%;
        }
        .panel-heading{
            border-radius: 20px;
        }

        .userForm label{
            background-color: rgb(255, 140, 159);
            color:#fff;
        }
        .userForm .imageupload {
            margin: 20px;
            text-align: center;
            padding:0px;
            width:80%;
            height: 50%;
            border-radius: 20px;
        }

        #protofilo{
           height: auto;
           padding:30px;
           padding-top:120px;
        }

        #protofilo .gallery{
            height:inherit;
        }
        #protofilo .images{
            font-size:16px;
        }
        #protofilo #up-btn{
        float:right;
        }

        #protofilo #del-btn{
        float:left;
        }


        @media (max-width: 850px){
      /*menu*/
      .header ul{
        display: block;
      }

      .header .menu-icon{
        display: inline-block;
        float:left;
      }

      .header .menu-btn:checked ~ .menu {
        max-height: auto;
      }
     
      .header li a:hover,
      .header .menu-choice a:hover {
        color:#fff;
      }

      .header .social-top {
        display: block;
       }
   
      #protofilo .images{ 
        height: 18%;
        width: 80%;
        padding-top:0;
        margin-top:0;
      }
    }



    </style>

</head>
<body>
    <!--menu-->
    <header class="header">
        <a href="index.php" class="logo">سيما</a>
        <input class="menu-btn" type="checkbox" id="menu-btn" />
        <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
        <ul class="menu">
        <li class="menu-choice"><a href="index.php" class="active">الرئيسية</a></li>
           <li class="menu-choice"><a href="updateGallery.php">إضافة أعمالي</a></li>
           <li class="menu-choice"><a href="updateLinks.php">إضافة مقالة</a></li>
           <li class="menu-choice"><a href="addPartner.php">إضافة شركاء</a></li>
           <li class="menu-choice"><a href="confirmRating.php">تأكيدالآراء</a></li>
           <li class="social-top"><a href="logout.php" >تسجيل الخروج</a></li>
        </ul>
   </header>
 
    
        <!--protofilo show-->
        <div id="protofilo">
        <h2 class="bigTitle">تأكيد الآراء</h2><br/>
            <div class="gallery">
    
            <?php
           
              $query = mysqli_query($db,"SELECT * FROM rating  WHERE Active = 0");
              while($row = mysqli_fetch_row($query)){

            ?>

           <div class="images">
               <p><?php echo $row[1];?></p>
               <p><?php echo $row[3];?></p>
               <form method ="POST">
                   <input type="hidden"  name="ID" value= "<?php echo $row[0];?>" readonly>
                   <input type="submit" id="up-btn" name="up-btn"  class="button" value="رفع">
                   <input type="submit" id="del-btn" name="del-btn"  class="button" value="حذف">
               </form>
            </div>
             
        <?php
        }
        ?>
        </div>
       
    <div>

<?php
if(isset($_POST["up-btn"]) && isset($_POST["ID"])) { 
    $query = mysqli_query($db,"UPDATE rating SET Active = 1 WHERE ID = '".$_POST["ID"]."' ");
    echo "<meta http-equiv='refresh' content='0'>";
}

if(isset($_POST["del-btn"])&& isset($_POST["ID"])) { 
   $query = mysqli_query($db,"DELETE FROM rating WHERE ID = '".$_POST["ID"]."' ");
   echo "<meta http-equiv='refresh' content='0'>";
}
?>

</body>
</html>