<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- javascript -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
     <!-- link css -->
     <link rel="stylesheet" href="komponen.css">

    <title>Hello, world!</title>
    
  </head>
  <body class="b1" style="font-family: monospace;">
      <!-- form -->
         <div class="container mt-5">
             <h1>Konfirmasi Data Penyewa Mobil</h1>
            <form action="" method="post" class="mt-4">
                <table>
                    <tr>
                        <th>NO KTP</th>
                        <td><input type="number" name="no_ktp"  class="ml-4" style="width: 207px;" placeholder="Masukan..."></td>
                    </tr>
                    <tr>
                        <th>NAMA</th>
                        <td><input type="text" name="nama"  class="ml-4"  style="width: 207px;" placeholder="Masukan..."></td>
                    </tr>
                    <tr>
                        <th>NO TELP</th>
                        <td><input type="number" name="no_telp"  class="ml-4"  style="width: 207px;" placeholder="Masukan..."></td>
                    </tr>
                    <tr>
                        <th>PILIH MOBIL</th>
                        <td>
                            <select name="pilih_mobil" id="" class="ml-4"  style="width: 207px;">
                                <option value="">---</option>
                                <?php 
                                    include "koneksi.php";

                                    $query= mysqli_query($koneksi,"SELECT * FROM tbl_mobil_sewa");
                                    while ($data = mysqli_fetch_assoc($query)) {
                                        echo "<option value='$data[plat_mobil]'>$data[nama_mobil]</option>";
                                    } 
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Berapa Hari?</th>
                        <td>
                            <select name="berapa_hari" id="" class="ml-4"  style="width: 207px;">
                                <option value="">---</option>
                                <?php 
                                    include "koneksi.php";

                                    $query= mysqli_query($koneksi,"SELECT * FROM tbl_transaksi");
                                    while ($data = mysqli_fetch_assoc($query)) {
                                        echo "<option value='$data[id_transaksi]'>$data[lma_swa_perhari] Hari</option>";
                                    } 
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Status Kendaraan</th>
                        <td>
                            <select name="status" id=""class="ml-4"  style="width: 207px;">
                                <option value="DiSewa">Di Sewa</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                         <td></td>
                         <td><input type="submit" value="KIRIM" name="kirim" class="ml-4 mt-2 btn-success"></td>
                    </tr>
                </table>
            </form>
         </div>
      <!-- akhir form -->

      <?php
      
        include "koneksi.php";

        if (isset($_POST['kirim'])){
            mysqli_query($koneksi,"INSERT INTO tbl_penyewaan_mobil SET 
            no_ktp = '$_POST[no_ktp]',
            nama_penyewa = '$_POST[nama]',
            no_telp_penyewa = '$_POST[no_telp]',
            id_plat_mobil_sewa = '$_POST[pilih_mobil]',
            id_transaksi ='$_POST[berapa_hari]',
            status_kendaraan ='$_POST[status]'");
            

            echo "<script>alert('Data Penyewaan Mobil Berhasil di Simpan')</script>";
            echo "<br><br>";
            echo "<br><br>";
            echo "<center><p class='btn-info' style='font: size 2em; font-family:Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;'><b><i>SEMOGA PERJALANAN ANDA MENYENANGKAN & SELAMAT SAMPAI TUJUAN<i></b><p></center>";
            
        }

      ?>
  </body>
</html>