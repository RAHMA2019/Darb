<?php
include 'config.php';

if (isset($_GET['page_no']) && $_GET['page_no']!="") {
  $page_no = $_GET['page_no'];
}

else {
  $page_no = 1;
}

$total_records_per_page = 6;

$offset = ($page_no-1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";

$result_count = mysqli_query($db,"SELECT COUNT(*) As total_records FROM gallery ");
$total_records = mysqli_fetch_array($result_count);
$total_records = $total_records['total_records'];
$total_no_of_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_no_of_pages - 1; // total pages minus 1

$sql = "SELECT * FROM gallery  LIMIT $offset, $total_records_per_page";
$result = $db->query($sql);
$arr_users = [];

if ($result->num_rows > 0) {
  $arr_users = $result->fetch_all(MYSQLI_ASSOC);
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
 

  <!-- CSS here -->
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/about.css">
  <style>
    .button{
      padding:12px 30px;
    }
    .more{
      background-color: #111;
      padding:12px 60px;
    }
  </style>
  <title>سيما للتسويق الإلكتروني | عائلة سيما</title>
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
  
  <!--brief-->
  <div class="brief">
    <h2 class="bigTitle">من هم عائلة سيما</h2>
      <h3 class="Title">نحن مجموعة ناس رهيبة محبه للتسويق اجتمعنا هنا في سيما عشان نساعدكم تسوقوا لمنتجاتكم وخدماتكم بإسترتيجيات مختلفة 
        وبخطط مدروسة..طبعا عندنا فريق محترف متخصصين في العلامة التجارية يحللون حسابات منشأتكم 
        ويدرسون أدوات المنافسين..مو بس كذا كمان نجهز لكم محتوى ممتاز بأساليب متقنة ونقدمها بأفكار إبداعية 
        تناسب جمهوركم المستهدف..
      </h3>
  </div>

  <!--protofilo-->
  <div id="protofilo">
    <h1 class="bigTitle">أعمالنا</h1>
    <div class="gallery">
    
      <?php foreach($arr_users as $user) { ?>
      <div class="images">
      <h3><?php echo $user["title"];?><br/><span><?php echo $user["description"];?></span></h3><br/>
      <img class="imgAd" src='<?php echo $user["img"];?>'>
      <a href="<?php echo $user[4];?>" class="button">تفاصيل</a>
      </div>
      <?php
        }
      ?>    
    </div> 
    <a href="protofilo.php" class="button more" >المزيد</a>
  </div>

  <!--form-->
  <div class="userForm" id="about">
    <form method="POST" action="" id="myForm">
      <h2 class="Title">انضم لعائلتنا</h2>
      <input type="text" id="fullName" name="fullName" class="form-control form-control-lg" placeholder="الاسم الثلاثي"
        required>
      <input type="email" id="email" name="email" placeholder="البريد الإلكتروني" required>
      <input type="tel" id="phone" name="phone" placeholder="رقم الجوال" required>

      <input type="file" id="actual-btn" hidden />
      <label class="label" for="actual-btn">أرفق سيرتك الذاتية</label>
      <span id="file-chosen">لم يتم إختيار ملف</span><br />
      <input type="submit" id="btn" value="إرسال">
    </form>
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