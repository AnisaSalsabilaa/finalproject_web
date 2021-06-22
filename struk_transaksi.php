<?php
include 'koneksi.php';
mysqli_select_db($koneksi, 'layanan');

require_once "./mpdf_v8.0.3-master/vendor/autoload.php";
$mpdf = new \Mpdf\Mpdf();
ob_start();
?>
<!DOCTYPE html>  
<html>   
<head>   
  <title>Kwitansi</title>   
</head>   
<body>   
   <?php  
   include 'koneksi.php';
   $tp = mysqli_query($koneksi, "SELECT * FROM transaksi t JOIN pelanggan p ON t.ID_PELANGGAN = p.ID_PELANGGAN JOIN layanan l ON t.ID_LAYANAN = l.ID_LAYANAN  WHERE t.ID_TRANSAKSI = '".$_GET['id']."'");
   while ($r = mysqli_fetch_array($tp)){
   $no   = $r['ID_TRANSAKSI']; 
   $nama  = $r['NAMA_PELANGGAN'];  
   $pembayaran = $r['NAMA_LAYANAN'];    
   $kota  = 'Surabaya';   
   $tanggal = $r['TANGGAL_TRANSAKSI'];   
   $tgl = date("d - M - Y", strtotime($tanggal));
   $nominal = $r['HARGA_LAYANAN'] * $r['BERAT_TRANSAKSI'];    
   $uang = number_format($nominal, 0, ',','.') ."</br>";   
   $terbilang = ucwords(''.Terbilang($nominal).'')." Rupiah";   
   }   
   ?>  
   <h2>KWITANSI CLEAN-UP LAUNDRY</h2>  
   <hr>
   <table width="800" border="0" cellpadding="4" cellspacing="0" style="border: 1px solid #000;">  
       <tr>  
         <td rowspan="6" width="120" style="border-right:1px solid #000;"> </td>  
         <td width="150" valign="top" > No </td>  
         <td valign="top" > : <?php echo $no;?> </td>  
     </tr>  
     <tr>  
         <td valign="top" > Telah Diterima Dari </td>  
         <td valign="top" > : <?php echo $nama;?> </td>  
     </tr>  
     <tr>  
         <td valign="top" > Uang Sejumlah </td>  
         <td valign="top" > : <?php echo $terbilang;?></td>  
     </tr>  
     <tr>  
         <td valign="top" > Untuk Pembayaran </td>  
         <td valign="top" > : <?php echo $pembayaran;?></td>  
     </tr>  
     <tr>  
         <td valign="bottom"> <h3>Rp <?php echo $uang;?> </h3> </td>  
         <td valign="top" align="right" height="100"> <?php echo "$kota, $tgl";?> </td>  
     </tr>  
 </table>  
 <style>  
   a { text-decoration: none; color: #0903E8; font-family: verdana; }  
   a:hover { color: #FA3C3C; }  
</style>  
<br>
<br>
<br>
<a href="transaksi.php">Kembali</a>  
</body>   
</html>   
<?php  
function Terbilang($x)   
{   
  $bilangan = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");   
  if ($x < 12)   
     return " " . $bilangan[$x];   
 elseif ($x < 20)   
     return Terbilang($x - 10) . "belas";   
 elseif ($x < 100)   
     return Terbilang($x / 10) . " Puluh" . Terbilang($x % 10);   
 elseif ($x < 200)   
     return " seratus" . Terbilang($x - 100);   
 elseif ($x < 1000)   
     return Terbilang($x / 100) . " Ratus" . Terbilang($x % 100);   
 elseif ($x < 2000)   
     return " seribu" . Terbilang($x - 1000);   
 elseif ($x < 1000000)   
     return Terbilang($x / 1000) . " Ribu" . Terbilang($x % 1000);   
 elseif ($x < 1000000000)   
     return Terbilang($x / 1000000) . " Juta" . Terbilang($x % 1000000);    
}   
?>   
<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();
?>