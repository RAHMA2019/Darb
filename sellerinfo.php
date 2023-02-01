<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="UTF8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.0/css/all.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
  
  <!--pwa-->
  <link rel="manifest" href="/manifest.json">
  <title>درب</title>
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/about.css">
</head>
<style>
    body {
        opacity: 0;
        transition: opacity 3s;
    }
    h3{
        color: #444;
        padding:0px;
    }
    h2{
      color:#d66b7d;
    }
    .info{
       background-color:#fff;
       border-bottom:1px solid #ddd;
    }
    .info .button{
        padding: 12px 40px;
        font-size: 18px;
        background-color:#d66b7d;
        border: none;
        color: #fff;
        z-index: 1
    }
    .info .button:hover{
        background-color:#111 ;
    }
    .info{
        height: 600px;
    }

    .black{
        display: flex;
       flex-direction: column;
       align-items: center;
       justify-content: center;
        width:52%;
        height:100px;
        margin-top:50px;
        border-radius:50px;
        background-color:#fff;
        z-index:1;
    }
   
    .vedio_title{
        font-size:35px;
        color:#111;
    }

 
    .info video{
       object-fit: cover;
       width: 100%;
       height: 100%;
       position:absolute;
       opacity: 1;
    }

   .conter{
      display: flex;
       flex-direction: row;
       align-items: center;
       justify-content: center;
       height:300px;
       width:100%;
    }
    .numbers{
       display: flex;
       flex-direction: column;
       align-items: center;
       justify-content: center;
       height:100px;
       width:22%;
       color:#F4D03F;
    }
    .line{
       padding-bottom: 0px;
       margin-bottom: 0px;
    }
    .serv{
        height: auto;
        padding: 60px 0px
    }

    .bigexample{
        display: flex;
       flex-direction:row;
       align-items: center;
       justify-content: center;
       height:400px;
       width:100%;
       padding:4px 70px;
    }
    .example{
       display: flex;
       flex-direction: column;
       align-items: center;
       justify-content: center;
       height:100px;
       width:25%;
    }
    .fas{
      font-size: 50px;
      color: #F4D03F;
    }
    .ex{
        font-size: 18px;
        color: #666;
    }
    @media(max-width:900px){
      .info{
        height: 450px;
      }
      .black{
        width:90%;
        height:70px;
        margin-top:50px;
        padding:10px;
        border-radius:50px;
        z-index:1;
    }

    .vedio_title{
        font-size:24px;
    }
    .info video{
       object-fit: cover;
       width: 100%;
       height: 80%;
       position:absolute;
       opacity: 1;
    }
    .info .button{
        padding: 14px 40px;
        font-size: 16px;
    }
    .h2{
      font-size:24px;
    }
    .serv{
        height: auto;
    }

    .bigexample{
        display: flex;
       flex-direction:column;
       align-items: center;
       justify-content: center;
       height:700px;
       width:100%;
       padding:4px;
    }
    .example{
       display: flex;
       flex-direction:column;
       align-items: center;
       justify-content: center;
       height:700px;
       width:100%;
    }
    .fas , .fab{
      font-size: 35px;
    }
    .ex{
        font-size: 16px;
    }
    .info .button{
        padding: 12px 30px;
        font-size: 16px;
    }
    .h2{
      font-size:24px;
    }

    .conter{
      display: flex;
       flex-direction: column;
       align-items: center;
       justify-content: center;
       height:500px;
       width:100%;
    }
    .numbers{
       display: flex;
       flex-direction: column;
       align-items: center;
       justify-content: center;
       height:200px;
       width:60%;
       color:#F4D03F;
    }

    .number h1{
      font-size:40px;
    }

    .number h3{
      font-size:40px;
    }

  
    
  }
</style>

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
      <li class="menu-choice"><a href="contact.php">تواصل معنا</a></li>
      <li class="menu-choice social-top"><a href="login.php" >تسجيل الدخول</a></li>
    </ul>
  </header>

  
  <div class="info">
  <video autoplay muted loop src="https://res.cloudinary.com/dyu3t4zmc/video/upload/v1616658969/flower_klp6ek.mp4"></video>
  <div  class="black">
     <h2 class="vedio_title">نجاح مضمون النتائج</h2>
  </div>
    
    <a href="seller.php"  class="button">انضم لشبكتنا</a>
  </div>

  <div class="info serv">
    <h2>لماذا تختار درب كشريك نجاح؟</h2>
    <h3>بشبكتنا اغلى ماعندنا هم انتم ، عملائنا يهمنا رضاكم وحريصين الاختيار الأفضل لكم وجعل مناسبتكم مميزه وذكرى لاتنسى ، لان المناسبه هي أجمل حدث بالحياة انضم لنا الان</h3>
    <div class="conter">
      <div class="numbers">
      <h1  class="line">+24</h1>
      <h3>خدمة</h3>
      </div>
      <div class="numbers">
      <h1 class="line">+49</h1>
      <h3>متجر</h3>
      </div>
      <div class="numbers">
      <h1 class="line">+190</h1>
      <h3>عملاء</h3>
      </div>
    
    </div>

  </div>

  <div class="info serv">
  <h2>طريقة التسجيل</h2>
      <div class="bigexample">
      <div class="example">
      <i class="fas fa-sign-in-alt"></i>
      <h4 class="ex">سجل دخولك كبائع</h4>
      </div>
      <div class="example">
      <i class="fas fa-file-signature"></i>
      <h4 class="ex">توقيع العقد مع درب</h4>
      </div>
      <div class="example">
      <i class="fas fa-shopping-cart"></i>
      <h4 class="ex">أعرض منتجاتك و خدماتك</h4>
      </div>
      <div class="example">
      <i class="fas fa-bullhorn"></i>
      <h4 class="ex">نسوق لمنتجاتك وخدماتك</h4>
      </div>
    
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