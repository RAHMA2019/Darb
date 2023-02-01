<?php 
require_once "config.php";
?>
<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="UTF8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.0/css/all.css">
  
  <!--pwa-->
  <link rel="manifest" href="/manifest.json">
  <title>درب</title>
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/about.css">
  <style>
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

    .btn{
      padding: 15px 30px;
      background-color: #111;
      color: #fff;
      text-decoration: none;
      border:none;
    }
    .btn:hover{
      background-color: #d66b7d;
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
    <a href="index.php" class="logo">درب</a>
    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
    <ul class="menu">
    <li class="menu-choice"><a href="index.php" class="active">الرئيسية</a></li>
      <li class="menu-choice"><a href="sellerinfo.php">انضم كبائع</a></li>
      <li class="menu-choice"><a href="buyerinfo.php">انضم كمشتري</a></li>
      <li class="menu-choice"><a href="#about">عن درب</a></li>
      <li class="menu-choice"><a href="contact.php">تواصل معنا</a></li>
      <li class="menu-choice social-top"><a href="login.php" >تسجيل الدخول</a></li>
    </ul>
  </header>

  <!--cover-->
  <div class="cover">
    <div class="forimg">
    <img src="img/cover2.jpg">
    </div>
    <div class="fortitle">
    <h1 class="bigTitle">في درب تجد منتجات ذات جودة عالية صنعت يدويا وبأسعار مناسبة</h1>
    <a href="#join" class="button">انضم لشبكتنا</a>
    </div>
  </div>


  <div class="bigevents" >
    <h2 class="Title" >تصفح المنتجات</h2>
    <div class="row">
    <?php
      $result = mysqli_query($db,"SELECT * FROM product ORDER BY ID DESC LIMIT 4  ");
      while($row = mysqli_fetch_array($result)){
    ?>
    <div class="column"><div class="imgCover"><img src="uploads/<?php echo $row['photo']?>"></div><h3><?php echo $row['product_name']?></h3><h4><?php echo $row['price'] . '  ريال '?></h4><a href="more.php?link=<?php echo $row['ID']?>" class="button cart" >تفاصيل</a></div>
    <?php } ?>
    
      </div>
      <a href="browse.php" class="button btn">متابعة التسوق</a>
    </div>


  <!--services-->
  <div id="join" class="services">
    <div class="detailes">
      <div id="serv">
        <div class="serv_card ">
          <img src="img/sell.jpg">
          <div  class="content"> 
            <h3>إشترك كبائع</h3>
            <div class="tooltip">صاحب متجر وتريد عرض منتجاتك أو خدماتك..<br/>
              يمكنك الإشتراك من هنا..</div>
            <a href="sellerinfo.php" class="button">إشترك</a>
          </div>
        </div>
      </div> 
    </div>

    <div class="detailes">
      <div id="serv">
        <div class="serv_card ">
          <img src="img/buy.jpg">
          <div  class="content"> 
            <h3>إشترك كمشتري</h3>
            <div class="tooltip">هل تبحث عن خدمات ومنتجات فريدة؟</div>
            <div class="tooltip">تجد هنا تشكيلة واسعة  من المنتجات والخدمات </div>
            <a href="buyerinfo.php" class="button">إشترك</a>
          </div>
        </div>
      </div> 
    </div>
  
  </div>

  <!--ourparteners-->
  <div class="partener" id="partener">
    <h1 class="Title">شركائنا<h1>
    <div class="imgWrapper">
      <img src="img/t1.png">
    </div>

  </div>



  <!--footer-->
  <div  class="footer" id="footer">    

    <div class="middle">
      
      <div  class="social">
        <a href="https://www.facebook.com/%D8%BA%D9%84%D8%A7-Gala-112936327541018/" class="fab fa-facebook" target="_blank"></a>
        <a href="https://twitter.com/Gala_SA_1" class="fab fa-twitter" target="_blank"></a>
        <a href="#" class="fab fa-whatsapp" target="_blank"></a>
        <a href="https://www.instagram.com/gala_sa_1/" class="fab fa-instagram" target="_blank"></a>
      </div>
    </div>      
  </div>

  <div  class="copyright">
    <p> جميع الحقوق محفوظه &copy; <span id="year"></span>&nbsp;<a href="index.php">لشركة درب</a></p>
    <script>document.getElementById("year").innerHTML=(new Date().getFullYear())</script>
  </div>


</body>

</html>