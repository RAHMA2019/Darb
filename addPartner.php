<?php

require_once "config.php";
require_once "session.php";

/*if (!isset($_SESSION['loggedin'])) {
	header('Location: addPartner.php');
	exit;
}*/


if(isset($_POST['upload-btn'])){
    $name = $_FILES['ad']['name'];
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["ad"]["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");

    // Check extension
    if( in_array($imageFileType,$extensions_arr) ){
 
    // Convert to base64 

        try{
            $image_base64 = base64_encode(file_get_contents($_FILES['ad']['tmp_name']) );
            $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
            // Insert record
            $query = "insert into gallery(title,description,path) values('".$title."', '".$description."','".$image."')";
            mysqli_query($db,$query);
                     
        }

        catch (Exception $e) {
           move_uploaded_file($_FILES['ad']['tmp_name'],$target_dir.$name);
           echo "image uploaded";
        }
   
    }
 
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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="css/bootstrap-imageupload.css" rel="stylesheet">

    <title>سيما للتسويق الإلكتروني | إضافة  شركاء</title>

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
            width:40%;
            height: 50%;
            border-radius: 20px;
        }

        #protofilo{
           height: auto;
           padding:30px;
        }

        #protofilo .gallery{
            height:inherit;
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

       .userForm .imageupload {
            margin: 20px;
            text-align: center;
            padding:0px;
            width:80%;
            height: 50%;
            border-radius: 20px;
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
    
   <!--form-->
    <div class="userForm">
        <form method="POST" enctype="multipart/form-data">
        <h2 class="bigTitle">إضافة شركاء</h2><br/>
            <div class="imageupload panel panel-default">
               <div class="panel-heading clearfix">
                  <h3 class="panel-title pull-center">تحميل صورة</h3>
               </div>
               <div class="file-tab panel-body">
                  <label class="btn btn-dark btn-file">
                     <span>تصفح</span>
                     <input type="file" name="ad" accept="image/*">
                  </label>
               </div>
            </div>

            <input type="submit" value="رفع" id="upload-btn" name="upload-btn" class="button">
        </form>
       </div>
        
        <!--protofilo show-->
        <div id="protofilo">
            <div class="gallery">
    
            <?php
           
              $query = mysqli_query($db,"SELECT * FROM client ");
              while($row = mysqli_fetch_row($query)){

            ?>

           <div class="images">
               <img class="imgAd" src='<?php echo $row[1];?>'>
               <form method ="POST">
                   <input type="hidden"  name="ID" value= "<?php echo $row[0];?>" readonly>
                   <input type="submit" id="del-btn" name="del-btn"  class="button" value="حذف">
               </form>
            </div>
             
        <?php
        }
        ?>
        </div>
       
    <div>

    
   <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   <script src="js/bootstrap-imageupload.js"></script>
   <script>
      var $imageupload = $('.imageupload');
      $imageupload.imageupload();
   </script>

<?php

if(isset($_POST["del-btn"])&& isset($_POST["ID"])) { 
   $query = mysqli_query($db,"DELETE FROM client WHERE ID = '".$_POST["ID"]."' ");
   echo "<meta http-equiv='refresh' content='0'>";
}
?>

</body>
</html>