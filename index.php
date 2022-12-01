<?php
  require 'koneksi.php'; 
  session_start();

  $tampil  = "SELECT * FROM tb_produk ";
  $hasil    = mysqli_query($db, $tampil);
  $jumlah  = mysqli_num_rows($hasil);

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6acc3fbd7c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="icon" href="https://www.freepnglogos.com/uploads/honda-logo-png/honda-motorcycles-logo-wing-10.png">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Produk</title>
</head>
<html>
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
    <li><a href="compact_view.php">Compact View</a></li>
    <img class ="logo" src="gambar/cel.png" alt="gambarnya logonya" width="200px">
    </ul> 
  </nav>

    <p class="info">Produk</p>

    <div class="container-card">
    <?php
      if($jumlah > 0){
        while($row = mysqli_fetch_assoc($hasil)){
    ?>

    <div class="card" style="width: 18rem;">
      <div class="row">
        <img class="card-img-top" src="gambar/<?=$row['gambar']?>" alt="gambar_produk" width="50px">
        <div class="card-body">
            <h5 class="card-title"><?= $row['kategori'] ?></h5>
            <p class="card-text">Rp.<?= $row['harga']?></p>
            <p class="card-text"><?= $row['desk']?></p>
            <a href="login.php" class="btn btn-primary"><i class="fa-solid fa-cart-plus"></i> Add</a>
            <a href="login.php" class="btn btn-warning">Check out</a>
        </div>
      </div>
    </div>  
      <!-- <div class="card">
            <img  src="img/<?=$row['gambar']?>" alt="gambar_produk" width="200px">
            <h1><?= $row['kategori'] ?></h1>
            <p class="price">Rp.<?= $row['harga']?></p>
            <p><?= $row['desk']?></p>
            <a href="login.php"class="masukan"><i class="fa-solid fa-cart-plus"></i></a>
            <a href="login.php"><button class="cekout">Beli</button></a>
        </div> -->
    <?php
        }
    }
    ?>
    </div>
<div class="footer">
    <div class="footer-list">
        <ul>
            <li><a href="https://wa.me/6281254424739"><i class="fa1 fas fa-phone"></i> Contact</a></li>
            <li><a href="https://twitter.com/Cnoxerr12345"><i class="fa1 fa-brands fa-twitter"></i> Twiter</a></li>
            <li><a href="https://www.instagram.com/ash4rr/"><i class="fa1 fa-brands fa-instagram"></i> Instagram</a></li>
            <img class ="logo2" src="gambar/vel.png" alt="gambarnya logonya"   width="200px">
        </ul>
    </div>
</div>

<script src="">
</script>
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
.container-card{
  display: flex;
  flex-wrap: wrap;
}
.card {
  flex: 0 1 24%;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  margin-bottom:35px;
  text-align: center;
}
.price {
  color: grey;
  font-size: 22px;
}
.masukan {  
  border: none;
  outline: 0;
  padding: 10px;
  color: white;
  background-color: #145ba3;
  cursor: pointer;
  width: 50%;
  margin-left: 65px;
  font-size: 18px;
}

.cekout {  
  border: none;
  outline: 0;
  padding: 10px;
  color: white;
  background-color: #2f302f;
  text-align: center;
  cursor: pointer;
  width: 40%;
  height:45px;
  margin-left: -0px;
  margin-bottom:-0px;
  font-size: 18px;
}

input[type=text] {
  margin-right:-65px;
  padding: 3.5px;
  margin-top: 8px;
  font-size: 15px;
  font-family: 'Poppins', sans-serif;
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


.tombol{
  float:right;
}
button{
  text-decoration: none;
  display: inline-block;
  margin: 35px 69px;
    

}


.info{
  color:black;
  font-size:22px;
  padding-left:22px;
  margin-top:100px;
}

.footer ul {
  background-color: rgb(46, 44, 44);
  color: white;
  margin-top: 120px;
  height: 95px;
  padding: 12px;
}
.footer-list li a {
  margin-top:7px;
  color:white;
  cursor: pointer;
  float: right;
}

table {
  border-collapse: collapse;
  width: 90%;
  margin: auto;}

th, td {
  text-align: left;
  padding: 8px;
  border-bottom:1px solid #cad1db;

}

th {
  background-color: #242020;
  color: white;
}
@media (max-width: 638px) {
  .masukan {  
  border: none;
  outline: 0;
  padding: 10px;
  color: white;
  background-color: #145ba3;
  cursor: pointer;
  margin-left: -15px;
  font-size: 18px;
}
}
@media (max-width: 757px) {
  .masukan {  
  border: none;
  outline: 0;
  padding: 10px;
  color: white;
  background-color: #145ba3;
  cursor: pointer;
  margin-left: -15px;
  font-size: 18px;
}
}

@media (max-width: 1021px) {
  .masukan {  
  border: none;
  outline: 0;
  padding: 10px;
  color: white;
  background-color: #145ba3;
  cursor: pointer;
  margin-left: -15px;
  font-size: 18px;
}
}
@media (min-width: 1194px) {
  .logo{
    margin-top: -39px;
    margin-left:-22px;
  }
}
@media (min-width: 377px) {
  .logo{
    margin-top: -99px;
    margin-left:-22px;
  }
  .info{
    font-size:22px;
  padding-left:22px;
  margin-top:100px;
  }
  .masukan {  
  border: none;
  outline: 0;
  padding: 10px;
  color: white;
  background-color: #145ba3;
  cursor: pointer;
  margin-left: -12px;
  font-size: 18px;
}

.tombol{
  float:right;
}


}

@media (min-width: 916px) {
  .logo{
    margin-top: -30px;
    margin-left:12px;
  }   
}
@media (min-width: 529px) {
  .logo{
    margin-top: -42px;
    margin-left:12px;
  }   
}

@media (min-width: 377px) {
.footer-list li a {
  flex-wrap: wrap;
  color:white;
  font-size:15px;
  cursor: pointer;
  float: right;
}
}
@media (min-width: 1187px) {
.footer-list li a {
  flex-wrap: wrap;
  color:white;
  font-size:19px;
  cursor: pointer;
  float: right;
}
}
</style>