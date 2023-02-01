<?php 

require_once "config.php";
require_once "session.php";
if (!isset($_SESSION['loggedin'])) {
	header('Location: payinfo.php');
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
  
  <!--pwa-->
  <link rel="manifest" href="/manifest.json">
  <title>درب</title>
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/about.css">
</head>

<style>
    #ask{
    height :auto;
    padding: 150px 0px ;
   }
  .Title{
      color:#d66b7d;
      padding-bottom:30px;
      font-size:18px;
    }
    #smart-button-container{
        width:30%;
        font-size:16px;
    }
    .btn{
      padding: 12px 30px;
      
      text-decoration: none;
      border:none;
    }
    .btn:hover{
      background-color: #111;
      text-decoration: none;
    }

    @media(max-width:800px){
        #smart-button-container{
        width:70%;
        font-size:16px;
    }
    }
</style>

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
  

  <!--Form-->
  
  <div class="userForm" id="ask">
      <h2 class="Title" >اختر الطريقة المناسبة لك في الدفع وإتمام عمليات الشراء</h2>
      <form>
      <div id="smart-button-container">
      <div style="text-align: center;">
        <div id="paypal-button-container"></div>
      </div>
    </div>
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

  <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
  <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'gold',
          layout: 'vertical',
          label: 'paypal',
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"amount":{"currency_code":"USD","value":1}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            
            // Full available details
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

            // Show a success message within this page, e.g.
            const element = document.getElementById('paypal-button-container');
            element.innerHTML = '';
            element.innerHTML = '<h3>Thank you for your payment!</h3>';

            // Or go to another URL:  actions.redirect('thank_you.html');
            
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script>

</body>

</html>