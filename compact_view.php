<?php
//index.php
 require 'koneksi.php';
 session_start();

function make_query($db)
{
 $query = "SELECT * FROM tb_produk ORDER BY id_produk ASC";
 $result = mysqli_query($db, $query);
 return $result;
}

function make_slide_indicators($db)
{
 $output = ''; 
 $count = 0;
 $result = make_query($db);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'" class="active"></li>
   ';
  }
  else
  {
   $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'"></li>
   ';
  }
  $count = $count + 1;
 }
 return $output;
}

function make_slides($db)
{
 $output = '';
 $count = 0;
 $result = make_query($db);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '<div class="item active">';
  }
  else
  {
   $output .= '<div class="item">';
  }
  $output .= '
   <img src="gambar/'.$row["gambar"].'" alt="'.$row["nama"].'" />
   <div class="carousel-caption">
    <h3>'.$row["nama"].'</h3>
   </div>
  </div>
  ';
  $count = $count + 1;
 }
 return $output;
}

?>

<!DOCTYPE html>
<html>
 <head>
  <title>Compact View</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
 <nav>
    <ul>
        <?php if(isset($_SESSION['username'])){
        }if(@$_SESSION['username']){
            echo "<li><a href='logout.php'>Logout</a></li>";
        }
    else {
      echo "<li><a href='login.php'>Login</a></li>";
    }
    ?>
    
    <li><a href="about.php">About</a></li>
    <li><a href="user/keranjang.php">Keranjang</a></li>
    <li><a href="index.php">Full View</a></li>
    <img class ="logo" src="gambar/cel.png" alt="gambarnya logonya" width="200px">
    </ul> 
  </nav>
  <br />
  <div class="container">
   <h2 align="center">Compact View</h2>
   <br />
   <div id="dynamic_slide_show" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
    <?php echo make_slide_indicators($db); ?>
    </ol>

    <div class="carousel-inner">
     <?php echo make_slides($db); ?>
    </div>
    <a class="left carousel-control" href="#dynamic_slide_show" data-slide="prev">
     <span class="glyphicon glyphicon-chevron-left"></span>
     <span class="sr-only">Previous</span>
    </a>

    <a class="right carousel-control" href="#dynamic_slide_show" data-slide="next">
     <span class="glyphicon glyphicon-chevron-right"></span>
     <span class="sr-only">Next</span>
    </a>

   </div>
  </div>
 </body>
</html>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

*{
    margin: 0;
    padding: 0;
}
body{
    font-family: 'Poppins', sans-serif;

}
.logo{
    margin-top: -30px;
    margin-left:12px;
}

.logo2{
    margin-top: 25px;
    margin-left:12px;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  font-size:20px;
  overflow: hidden;
}

li {
  float: right;
}

li a {
  font: size 27px;
  display: block;
  color:black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}