<?php
  require '..\koneksi.php'; 
  session_start();
  


  $id_user = $_SESSION['pelanggan']['id_user'];
  
  $data = $db->query("SELECT tb_pembelian.id_pembelian ,tb_pembelian.tanggal, 
                    tb_produk.gambar, tb_user.username,tb_pembelian.jumlah, tb_pembelian.harga,
                    tb_produk.desk,tb_produk.kategori FROM tb_pembelian
                    LEFT JOIN tb_user on tb_pembelian.id_user = tb_user.id_user
                    LEFT JOIN tb_produk on tb_pembelian.id_produk = tb_produk.id_produk
                    WHERE tb_pembelian.id_user = '$id_user'");
                    
  $tampil = "SELECT * FROM tb_pembelian ";

  if( isset($_POST["cari"])){
    $nama_dicari = $_POST["keyword"];
    $tampil = "SELECT *FROM tb_pembelian WHERE jumlah      LIKE '%$nama_dicari%' OR
                                               tanggal     LIKE '%$nama_dicari%' OR
                                               harga       LIKE '%$nama_dicari%' ";
}

?>  
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6acc3fbd7c.js" crossorigin="anonymous"></script>
    <title>Histori Pembelian</title>
    <link rel="icon" href="https://www.freepnglogos.com/uploads/honda-logo-png/honda-motorcycles-logo-wing-10.png">
</head>
<html>
<body>

    <div class="links">
        <a href="profil_user.php"><p class="balik"><i class="fa-solid fa-angle-left"></i> Kembali</p></a>
    </div>
    <div class="tombol">
      <form method="POST" >
        <input type="text" name="keyword" style="height: 30px;" placeholder="Masukan keyword pencarian">
        <button  class="create" type="submit" name="cari"><i class="fas fa-search"></i>Cari Kata</button>
      </form>
    </div>
    <table>
        <tr>
              <th>NoBeli</th>
              <th>Gambar</th>
              <th>Username</th>
              <th>Jumlah</th>
              <th>Harga</th>  
              <th>Tanggal</th>
              <th>Desk</th>  
              <th>Kategori</th>
        </tr>
        <?php foreach ($data as $hasil) { ?>
        <tr>
          <td><?php echo $hasil ['id_pembelian']?></td>
            <td><img src="../img/<?=$hasil['gambar']?>" alt="" width="100px"></td>
            <td><?php echo $hasil ['username']?></td>
            <td><?php echo $hasil ['jumlah']?></td>
            <td>Rp.<?php echo number_format ($hasil ['harga'])?></td>
            <td><?php echo $hasil ['tanggal']?></td>
            <td><?php echo $hasil ['desk']?></td>
            <td><?php echo $hasil ['kategori']?></td>
        </tr>
        <?php
        }
        ?>	
    </table>



</body>
</html>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');


body{
    font-family: 'Poppins', sans-serif;

}
.links a{
    text-decoration:none;
}

.balik{
  margin-top:12px;
  margin-left:5px;
  font-size:22px;
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
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  cursor:pointer;
  background-color: #04AA6D;
}

.tombol{
  float:right;
}
* {
    margin: 0;
    padding: 0;
}
button{
  background-color: #4CAF50; 
  border: 4px;
  color: white;
  padding: 12px 17px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-bottom:75px;
  margin-top:78px;
  margin-right:75px;
  margin-left:75px;
  cursor: pointer;

}


table {
  overflow-x:autp;
  border-collapse: collapse;
  width: 90%;
  margin: auto;
}

th, td {
  text-align: left;
  padding: 8px;
  border-bottom:1px solid #cad1db;
  

}

th {
  background-color: #242020;
  color: white;
}

.ubah{
    height:24px;
    width:24px;
    text-decoration: none;
    color:green;
}
.hapus{
  text-decoration: none;
  color:red;
}

.jumlahdata{
    text-align:center;
}
</style>


