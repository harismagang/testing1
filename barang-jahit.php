<html>
    <!-- KONEKSI php ke database -->
    <?php  include "koneksi.php"; ?>

    <head>
        <title>Tugas 14 Januari</title>
        <!-- script datatables css -->
        <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
        <!-- script datatables -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <!-- bootstrap css -->
        <link rel="stylesheet" type="text/css"  href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
        <!-- link css -->
        <link rel="stylesheet" href="komponen.css">

    </head>
    <body style="background-image: url(img/bg1.png); font-family: monospace;">
        
        <!-- Data Penyewaan mobil -->
            <div class="container-fluid mt-5">
                <table id="example" class="table table-striped table-bordered" >
                    <thead>
                        <tr class="bg-info text-center">
                            <th>NO</th>
                            <th colspan="2">Aksi</th>
                            <th>NO KTP</th>
                            <th>NAMA PENYEWA</th>
                            <th>NO TELP</th>
                            <th style="width: 65px;">NAMA MOBIL</th>
                            <th>WARNA MOBIL</th>
                            <th>TEMPAT DUDUK</th>
                            <th>HARGA PERHARI</th>
                            <th>LAMA SEWA PERHARI</th>
                            <th style="width: 100px;">TOTAL</th>
                            <th>STATUS KENDARAAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $ambildata1= mysqli_query($koneksi,"SELECT tbl_penyewaan_mobil.no_ktp, tbl_penyewaan_mobil.nama_penyewa, tbl_penyewaan_mobil.no_telp_penyewa, tbl_mobil_sewa.nama_mobil,  tbl_mobil_sewa.warna_mobil,  tbl_mobil_sewa.kapasitas_tempat_ddk,  tbl_mobil_sewa.harga_mobil_sewa, tbl_transaksi.lma_swa_perhari, tbl_penyewaan_mobil.status_kendaraan
                                                                FROM  tbl_penyewaan_mobil 
                                                                INNER JOIN  tbl_mobil_sewa ON tbl_penyewaan_mobil.id_plat_mobil_sewa = tbl_mobil_sewa.plat_mobil INNER JOIN tbl_transaksi ON tbl_penyewaan_mobil.id_transaksi = tbl_transaksi.id_transaksi ORDER BY id_penyewa DESC "); ?>
                        <?php $no=1; ?>
                    
                        <?php while ($tampil = mysqli_fetch_assoc($ambildata1)): ?>
                            <?php
                                $lma_swa_perhari =  $tampil['lma_swa_perhari'];
                                $harga_mobil_sewa = $tampil['harga_mobil_sewa'];
                                $hasil = $harga_mobil_sewa * $lma_swa_perhari;
                            ?>
                            <?php
                                $status_kendaraan = $tampil["status_kendaraan"];
                            ?>
                            <tr>
                            
                                <td><?=$no++;?>
                                </td>
                                <td><?php echo"<a href='?kode=$tampil[no_ktp]'>
                                                    <input type='button' value='Hapus' class=' btn-danger'> 
                                               </a>";?></td>
                                <td><?php echo "<a href='Edit-sewa.php?kode=$tampil[no_ktp]'> 
                                                    <input type='button' value='Edit' class='btn-primary'>
                                                </a>"; ?></td>
                                <td><?= $tampil["no_ktp"]; ?></td>
                                <td><?= $tampil["nama_penyewa"]; ?></td>
                                <td><?= $tampil["no_telp_penyewa"]; ?></td>
                                <td><?= $tampil["nama_mobil"]; ?></td>
                                <td class="text-center"><?= $tampil["warna_mobil"]; ?></td>
                                <td class="text-center"><?= $tampil["kapasitas_tempat_ddk"]; ?></td>
                                <td class="text-center">Rp.<?= number_format( $tampil["harga_mobil_sewa"]); ?></td>
                                <td class="text-center"><?= $tampil["lma_swa_perhari"]; ?></td>
                                <td>Rp. <?= number_format( $hasil ) ?></td>
                                <td class="text-center">
                                    <?php 
                                        if ( $status_kendaraan == "DiSewa"){
                                            echo"<span class='badge badge-warning'> DiSewa </span>";
                                        }elseif($status_kendaraan == "DiKembalikan"){
                                            echo"<span class='badge badge-primary'> DiKembalikan </span>";
                                        }else{
                                            echo"<span class='badge badge-danger'> Hilang </span>";
                                        }        
                                    ?>
                                </td>

                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>


                <!-- delet -->
                    <?php
                        if(isset($_GET['kode'])){

                            mysqli_query($koneksi,"DELETE FROM tbl_penyewaan_mobil WHERE no_ktp='$_GET[kode]'");

                            echo"<script>alert('Data Telah Terhapus')</script>";
                            echo "<meta http-equiv=refresh content=2;URL='barang-jahit.php'>";
                        } 
                    ?>
                <!-- akhir delet -->


            </div>
            <!-- script datatable -->
                    <script>
                        $(document).ready(function() {
                            $('#example').DataTable();
                        } );
                    </script>
            <!-- akhir script datatables --> 
        <!-- Akhir dta penyewaan -->
    </body>
</html>
