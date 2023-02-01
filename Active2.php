<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title>سيما للتسويق الإلكتروني | استعادة الحساب</title>
  
   <!-- CSS here -->
   <style>
       a{
           font-size: 18px;
           padding-top:200px;
           text-align: center;
           display:flex;
           align-items: center;
           flex-direction: column; 
           justify-content: center;
           color: #354E71;
           text-align: center;
           font-size: 18px;
        }

        @media (max-width:780px){
            a{
              font-size: 16px;
              padding:200px 30px 0px 30px ;
            }

        }
   </style>
   
</head>

<body>
    
    <!-- start PHP code for sginup -->
    <?php
           
        session_start(); 
        echo $_SESSION["message"] ="<a href='hash.php'>تم التحديث..يمكنك تسجيل الدخول بكلمة المرور الجديدة</a>";                     
    ?>

    
</body>
</html>