<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>CRUD Produk dengan gambar - Gilacoding</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  	<script type="text/javascript" src="js/jquery.js"></script>
  	<script type="text/javascript" src="js/bootstrap.js"></script>
  </head>
  <body>
  <div class="container">
        <h1>Form Tambah Berita</h1>
      <form method="POST" action="proses-tambah.php" enctype="multipart/form-data" >
      <section class="base">

        <div class="form-group">
          <label for="nama" >Judul</label>
          <input placeholder="Masukan judul berita" class="form-control" type="text" name="judul_berita" autofocus="" required="" />
        </div>

        <div class="custom-file">
          <label class="custom-file-label" for="contohupload2">Pilih Photo</label>
          <input class="custom-file-input" type="file" name="foto" required="" />
        </div>
        
        <div class="form-group">
          <label >Tanggal Posting</label>
         <input class="form-control" type="date" name="tanggal_posting" required="" />
        </div>

        <div class="form-group">
          <label>Isi Berita</label>
         <textarea placeholder="Masukan Isi berita" class="form-control" type="text" name="isi_berita" required="" ></textarea>
        </div>

        <div class="form-group">
          <label>Penulis</label>
          <input placeholder="Masukan Penulis" class="form-control" type="text" name="penulis" />
        </div>
        <div>
         <button class="btn btn-primary" type="submit">Simpan Berita</button>
        </div>
        </section>
      </form>
</div>
  </body>
</html>