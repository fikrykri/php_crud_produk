<?php
include('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>CRUD PRODUK</title>
</head>

<body>
  <center>
    <h1>Data Produk</h1>
  </center>
  <center><a href="tambah_produk.php">+ &nbsp; Tambah Produk</a></center>
  <br />
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Produk</th>
        <th>Deskripsi</th>
        <th>Harga Beli</th>
        <th>Harga Jual</th>
        <th>Gambar</th>
        <th>Action</th>
      </tr>
    </thead>

    <tbody>
      <?php
      // menampilkan semua data diurutkan secara ascending
      $query = "SELECT * FROM produk ORDER BY id ASC";
      $result = mysqli_query($koneksi, $query);
      //pengecekan error pada saat menjalankan query
      if (!$result) {
        die("Query Error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
      }

      $no = 1;
      while ($row = mysqli_fetch_assoc($result)) 
      {
      ?>
        <tr>
          <td><?= $no; ?></td>
          <td><?= $row['nama_produk']; ?></td>
          <td><?= substr($row['deskripsi'], 0, 20); ?></td>
          <td>Rp. <?= number_format($row['harga_beli'], 0, ',', '.'); ?></td>
          <td>Rp. <?= number_format($row['harga_jual'], 0, ',', '.'); ?></td>
          <td style="text-align: center;"><img src="gambar/<?= $row['gambar_produk']; ?>" style="width: 120px;"></td>
          <td>
            <a href="edit_produk.php?id=<?= $row['id']; ?>">Edit</a> |
            <a href="proses_hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
        </tr>
      <?php
        $no++;
        //untuk nomor urut terus bertambah 1
      }
      ?>
    </tbody>
  </table>

</body>

</html>