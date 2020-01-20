<?php
  // memanggil file koneksi.php untuk membuat koneksi
include 'koneksi.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM tb_berita WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>CRUD Edit News</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  	<script type="text/javascript" src="js/jquery.js"></script>
  	<script type="text/javascript" src="js/bootstrap.js"></script>
  </head>
  <body>
  <div class="container">
        <h1>Form Edit Berita</h1>
      <form method="POST" action="proses-edit.php" enctype="multipart/form-data" >
        <!-- menampung nilai id tb_berita yang akan di edit -->
        <input name="id" value="<?php echo $data['id']; ?>"  hidden />
        <div class="form-group">
          <label for="nama">Judul</label>
          <input class="form-control" type="text" name="judul_berita" value="<?php echo $data['judul_berita']; ?>" autofocus="" required="" />
        </div>
        <div class="custom-file">
          <label class="custom-file-label" for="contohupload2">Pilih Photo Baru</label>
          <!-- <img src="images/<?php echo $data['foto']; ?>" style="width: 120px;float: left;margin-bottom: 5px;"> -->
          <input class="custom-file-input" type="file" name="foto" />
          <!-- <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar tb_berita</i> -->
        </div>
        <div  class="form-group">
          <label>Tanggal</label>
          <input class="form-control" type="date" name="tanggal_posting" required="" value="<?php echo $data['tanggal_posting']; ?>">
        </div>
        <div  class="form-group">
          <label>Isi berita</label>
          <textarea  class="form-control" name="isi_berita" rows="4" cols="49" required="" value=""><?php echo $data['isi_berita']; ?></textarea>
        </div>
        <div class="form-group">
          <label>Penulis</label>
          <input class="form-control"  type="text" name="penulis" value="<?php echo $data['penulis']; ?>">
        </div>
        <div>
         <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
        </div>
      </form>
</div>
  </body>
</html>