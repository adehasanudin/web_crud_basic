<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  ?>
  <!DOCTYPE html>
  <html>
  <head>
  	<title>UAS CRUD Portal Berita</title>
  	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  	<script type="text/javascript" src="js/jquery.js"></script>
  	<script type="text/javascript" src="js/bootstrap.js"></script>
  </head>
  <body>
  	<div class="container">
  		<h1>List Berita</h1>
  		<a class="btn btn-info btn-sm" href="tambah.php">Tambah Berita</a>
  	</br></br>
  	<table  class="table table-bordered table-striped">
  		<tr>
        <th>No</th>
  			<th>Foto</th>
  			<th>Judul</th>
  			<th>Tanggal</th>
  			<th>Isi</th>
  			<th>Penulis</th>
  			<th width="150px">Action</th>
  		</tr>
  		<?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
  		$query = "SELECT * FROM tb_berita ORDER BY id ASC";
  		$result = mysqli_query($koneksi, $query);
      //mengecek apakah ada error ketika menjalankan query
  		if(!$result){
  			die ("Query Error: ".mysqli_errno($koneksi).
  				" - ".mysqli_error($koneksi));
  		}

      //buat perulangan untuk element tabel dari data mahasiswa
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($row = mysqli_fetch_assoc($result))
      {
      	?>
      	<tr>
      		<td><?php echo $no; ?></td>
          <td style="text-align: center;"><img src="images/<?php echo $row['foto']; ?>" style="width: 120px;"></td>
      		<td><?php echo $row['judul_berita']; ?></td>
      		<td><?php echo $row['tanggal_posting']; ?></td>
      		<td><?php echo substr($row['isi_berita'], 0, 20); ?>...</td>
      		<td><?php echo $row['penulis']; ?></td>
      		<td>
      			<a class='btn btn-warning btn-sm' href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
      			<a class='btn btn-danger btn-sm' href="proses-hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
				  
			</td>
      	</tr>
      	
      	<?php
        $no++; //untuk nomor urut terus bertambah 1
    }
    ?>
</table>
</div>
</body>
</html>