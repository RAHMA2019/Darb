<?php 

require_once "config.php";
require_once "session.php";

require_once('autoload.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    
    $error = "";
    $check_email = mysqli_query($db, "SELECT email FROM user where email = '$email' ");
    if(mysqli_num_rows($check_email) > 0){
        //email sending
        $mail = new PHPMailer;
        $mail->CharSet = "utf-8";
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = 'info@simaaelec.com';
        $mail->Password = 'Si2021Ma@Elec';
        $mail->From='info@simaaelec.com';
        $mail->FromName='سيما للتسويق الإلكتروني';
        $mail->AddAddress($email);
        $mail->Subject  =  'سيما للتسويق الإلكتروني ( تعديل كلمة المرور )';
        $mail->IsHTML(true);
        $mail->Body   = 
       '<html>
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
        #confirm {
            width: 100%;
            text-align: center;
            background: white;
            border-radius: 10px 10px 10px 10px;
            box-shadow: 5px 5px 30px 15px rgba(138, 138, 138, 0.25), 
            -5px -5px 30px 15px rgba(145, 145, 145, 0.22);
        }
        #confirm p{
            color:#555;
            font-size:18px;
        }
        
        #confirm a{
            padding: 9px 50px;
            margin: 12px 30px;
            background-color:#111;
            border-radius: 5px 5px 5px 5px;
            border:none;
            text-decoration: none;
            color:white;
            font-size: 16px;
            cursor:pointer;
        }
        #confirm a:hover{
            opacity:0.7;
            background-color:rgb(255, 140, 159);
        }
        
        *:focus{
            outline: none;
        }
        </style>
        </head>
        <body>
        <div id="confirm">
        <p>قم بالضغط على تأكيد للاستمرار وتعديل كلمة المرور</p>
        <a href="https://www.simaaelec.com/newPassword.php?email='.$email.'">تأكيد</a>
        </div>
        </body>
        </htm>';
        if($mail->Send()){
            echo "<p class='error'>قمنا بإرسال رساله على الايميل..في حال لم تصلك على البريد الوارد..ابحث عنها في الرسائل الغير المرغوب فيها</p>";
        }
        else{
            echo "Mail Error - >".$mail->ErrorInfo;
        }

    }

    else{
       echo $_SESSION["message"]="<p class='error'>هذا الايميل غير موجود..تأكد من كتابتها بالشكل الصحيح</p>"; 
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

    <title>سيما للتسويق الإلكتروني | نسيت كلمة المرور</title>

    <!-- CSS here -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/about.css">
    <style>
        .error{
            color: indianred;
            text-align: center;
            padding:0px 50px;
            padding-top: 100px;
            padding-bottom: 0px;
            margin-bottom:0px;
        }
        #banner{
            height: 400px;
            padding-top:140px;
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
      <li class="social-top"><a href="https://www.snapchat.com/add/simaaelec" class="fab fa-snapchat" target="_blank"></a></li>
      <li class="social-top"><a href="http://instagram.com/simaaelec" class="fab fa-instagram" target="_blank"></a></li>
      <li class="social-top"><a href="https://twitter.com/simaaelec" class="fab fa-twitter" target="_blank"></a></li>
      <li class="social-top"><a href="https://www.facebook.com/simaa.elec" class="fab fa-facebook" target="_blank"></a></li>
    </ul>
  </header>

    <div id="banner">
        <div  class="wrapper">
            <form method="POST" action="" >
              <h2>نسيت كلمة المرور</h2><br/>
                <input type="email" id="email"  name="email" placeholder="الإيميل"  required>
                <input type="submit" id="email-send-btn" name="email-send-btn" value="إرسال" >
            </form>  
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