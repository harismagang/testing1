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
  <body style="background-image:url(img/bg2.png);  color:#fff;  font-family: monospace;">

        <?php
            include "koneksi.php";

            $sql=mysqli_query($koneksi,"SELECT * FROM tbl_penyewaan_mobil, tbl_mobil_sewa, tbl_transaksi 
                                        WHERE tbl_penyewaan_mobil.id_plat_mobil_sewa = tbl_mobil_sewa.plat_mobil AND no_ktp='$_GET[kode]'");
            $data=mysqli_fetch_assoc($sql);

        ?>


      <!-- form -->
         <div class="container mt-5">
             <h1>Edit Data Penyewaan Mobil</h1>
            <form action="" method="post" class="mt-4">
                <table>
                    <tr>
                        <th>NO KTP</th>
                        <td style="position: absolute; left: 268px;">: <?php echo $data['no_ktp'];?></td>
                    </tr>
                    <tr>
                        <th>NAMA</th>
                        <td style="position: absolute; left: 268px;">: <?php echo $data['nama_penyewa'];?></td>
                    </tr>
                    <tr>
                        <th>NO TELP</th>
                        <td style="position: absolute; left: 268px;">: <?php echo $data['no_telp_penyewa'];?></td>
                    </tr>
                    <tr>
                        <th>PILIH MOBIL</th>
                        <td style="position: absolute; left: 268px;">: <?php echo "$data[nama_mobil]";?></td>
                    </tr>
                    <tr>
                        <th>Berapa Hari?</th>
                        <td style="position: absolute; left: 268px;">: <?php echo "$data[lma_swa_perhari]";?>
                        </td>
                    </tr>
                    <tr>
                        <th>Status Kendaraan</th>
                        <td>
                            <select name="status" id=""class="ml-4"  style="width: 207px;">
                                <option value="<?php echo "$data[status_kendaraan]"; ?>" ><?php echo "$data[status_kendaraan]"; ?></option>
                                <option value="">Hilang</option>
                                <option value="DiSewa">Di Sewa</option>
                                <option value="DiKembalikan">Di Kembalikan</option>
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
            mysqli_query($koneksi,"UPDATE tbl_penyewaan_mobil SET
            status_kendaraan ='$_POST[status]'
            WHERE no_ktp=$_GET[kode] ");
            

            echo "<script>alert('Data Penyewaan Mobil Berhasil di Simpan')</script>";
            echo "<meta http-equiv=refresh content=1;URL='barang-jahit.php'>";    
        }

      ?>
          
  </body>
</html>







