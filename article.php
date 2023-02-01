<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="UTF8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.0/css/all.css">
  
  <title>سيما للتسويق الإلكتروني | المدونة</title>
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/about.css">
  <style>
    #protofilo{
      height: auto;
      padding:30px;
      padding-top:100px;
    }
    #protofilo .gallery{
      height:inherit;
    }
    #protofilo .images{ 
      height: 24%;
      width: 20%;
    }
    #protofilo .imgAd{
      height: 100%;
      width: 100%;
    }
    .button{
      padding:12px 20px;
      font-size:16px;
    }

    @media (max-width: 1170px){
      #protofilo{
        height: auto;
        padding-top:100px;
      }
      #protofilo .gallery{
        height:inherit;
      }
      #protofilo .images{ 
        height: 24%;
        width: 26%;
      }
 
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

      #protofilo{
        height: auto;
        padding-top:100px;
      }
      #protofilo .gallery{
        height:inherit;
        width:100%;
      }
      #protofilo .images{ 
        height: 18%;
        width: 80%;
        padding-top:0;
        margin-top:0;
        padding-bottom: 30px;
      }
      .button{
        padding:12px;
        font-size:14px;
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
      <li class="menu-choice"><a href="about.php">من نحن</a></li>
      <li class="menu-choice"><a href="protofilo.php">أعمالنا</a></li>
      <li class="menu-choice"><a href="article.php">المدونة</a></li>
      <li class="menu-choice"><a href="client.php">شركائنا</a></li>
      <li class="social-top"><a href="https://www.snapchat.com/add/simaaelec" class="fab fa-snapchat" target="_blank"></a></li>
      <li class="social-top"><a href="http://instagram.com/simaaelec" class="fab fa-instagram" target="_blank"></a></li>
      <li class="social-top"><a href="https://twitter.com/simaaelec" class="fab fa-twitter" target="_blank"></a></li>
      <li class="social-top"><a href="https://www.facebook.com/simaa.elec" class="fab fa-facebook" target="_blank"></a></li>
    </ul>
  </header>

  <!--Articls-->
  <div id="protofilo">
    <h1>مقالات</h1>
    <div class="gallery">
    
    <?php
      
      $query = mysqli_query($db,"SELECT * FROM links ");
      while($user = mysqli_fetch_row($query)){
      
    ?>
      <div class="images">
      <h3><?php echo $user[1];?></h3>
      <img class="imgAd" src='<?php echo $user[3];?>'>
      <a href="<?php echo $user[2];?>" class="button">قراءة المقالة</a>
      </div>
      <?php
        }
      ?>    
    </div> 
  </div>

 <!--footer-->
  <div  class="footer" id="footer">    
           
    <div class="middle">
      <h4>موقعنا الجغرافي</h4>
      <span><i class="fas fa-map-marker-alt icon"></i><a href="https://goo.gl/maps/E9Vo97TC7vSgTNcU8" target="_blank">طريق الملك عبدالله الفرعي، بئر عثمان</a></span>
    </div>

    <div class="middle">
      <h4>الإيميل</h4>
      <span><i class="far fa-envelope icon"></i><a href= "mailto:info@simaaelec.com">info@simaaelec.com</a></span>
    </div>

    <div class="middle">
      <h4>اتصل بنا</h4>
      <span><i class="fas fa-phone icon"></i><a href="https://wa.me/966569005172/?text=مرحبا⁩" target="_blank">0569005172⁩</a></span>
    </div>
   
    <div class="middle">
      <h3>تابعنا</h3>
      <div  class="social">
        <a href="https://www.facebook.com/simaa.elec" class="fab fa-facebook" target="_blank"></a>
        <a href="https://twitter.com/simaaelec" class="fab fa-twitter" target="_blank"></a>
        <a href="https://wa.me/966569005172/?text=مرحبا⁩" class="fab fa-whatsapp" target="_blank"></a>
        <a href="http://instagram.com/simaaelec" class="fab fa-instagram" target="_blank"></a>
        <a href="https://www.snapchat.com/add/simaaelec" class="fab fa-snapchat" target="_blank"></a>
      </div>
    </div>      
  </div>

  <div  class="copyright">
    <p> جميع الحقوق محفوظه &copy; <span id="year"></span>&nbsp;<a href="index.php">لسيما</a></p>
    <script>document.getElementById("year").innerHTML=(new Date().getFullYear())</script>
  </div>


</body>

</html>