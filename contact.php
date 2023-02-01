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
</head>
<style>
    #ask{
    height :600px;
    padding-top: 150px;
   }
  .Title{
      color:#d66b7d;
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
      <li class="menu-choice"><a href="#ask">تواصل معنا</a></li>
      <li class="menu-choice social-top"><a href="login.php" >تسجيل الدخول</a></li>
    </ul>
  </header>

  <!--Form-->
  <div class="userForm" id="ask">
    <form method="POST" action="" id="myForm">
      <h2 class="Title" >تواصل معنا</h2>
      <input type="text" id="fullName"  name="fullName" placeholder="اسمك"  required >
      <input type="text" id="phone"  name="phone" placeholder="رقم الجوال"  required>
      <textarea rows="3" id="sev" name="sev" placeholder="رسالتك"  required></textarea>
      <input type="submit" id="btn" value="إرسل">
    </form>
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