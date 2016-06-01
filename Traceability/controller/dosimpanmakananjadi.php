<?php 
	include 'connect.php';
	
	$ordernumber = $_REQUEST['txtordernumber']; /*ambil inputan dari  input type  <input type="hidden" class="inputdata" name="txtordernumber" value="<?php echo $username; ?>">*/
	$namamakanan = $_REQUEST['txtnamamakanan'];/*ambil inputan dari  input type  <input type="hidden" class="inputdata" name="txtnamamakanan" value="<?php echo $username; ?>">*/
	$username = $_REQUEST['username']; /*ambil inputan dari  input type  <input type="hidden" class="inputdata" name="username" value="<?php echo $username; ?>">*/
	$barcode = $_REQUEST['finalbarcode']; /*ambil inputan dari  input type  <input type="hidden" class="inputdata" name="finalbarcode" value="<?php echo $username; ?>">*/
	$percentagesisa = $_REQUEST['percentagesisa']; /*ambil inputan dari  input type  <input type="hidden" class="inputdata" name="percentagesisa" value="<?php echo $username; ?>">*/
	$timedatestamp = $_REQUEST['timedatestamp']; /*ambil inputan dari  input type  <input type="hidden" class="inputdata" name="timedatestamp" value="<?php echo $username; ?>">*/
	$tgl = $_REQUEST["tgl"];
	$tglbarcode = $_REQUEST["tglbarcode"];

	$barcodetoday = "9".$tgl."001";

//validasi pengisian form ordernumber dan namamakanan
	if (empty($ordernumber)) //jk ordernumber kosong
	{
		header('Location:../simpanmakananjadi.php?msg=Order Number must be filled !'); //cetak pesan error
	}
	else if (strlen($ordernumber) > 10) //jk panjang inputan ordernumber lebih dari 10
	{
		header('Location:../simpanmakananjadi.php?msg=Order Number must be less than 10 digit !'); //cetak pesan error	
	}
	else if (empty($namamakanan)) //jk nama makanan kosong
	{
		header('Location:../simpanmakananjadi.php?msg=Nama Makanan must be filled !');	//cetak pesan error	
	}	
	else{ //jika pengisian memenuhi validasi diatas


		if($tgl != $tglbarcode){
				$query1 = "insert into unusedmat(UMatRecId, DocNo, Barcode, FoodNm, UnusedUsrNm, UnusedDt) 
			values('','$ordernumber', '$barcodetoday', '$namamakanan', '$username', '$timedatestamp')"; //simpan makanan jadi tidak pakai percentage sisa (UnusedQty)?
			//2147483647 batas max nilai int, char tidak ada batas, karena itu barcode diganti menjadi varchar
		
			$sql = mysql_query($query1);
			if($sql === FALSE) { 
				    die(mysql_error()); 
				}
			if($sql){
				header('Location:../simpanmakananjadi.php?msg=Success Input Data'); //pesan jika inputan data berhasil
			}
			else{
				echo "Failed Input Data"; //pesan jika inputan data gagal
			}
		}
		else {
			//query insert data ke database
			$query = "insert into unusedmat(UMatRecId, DocNo, Barcode, FoodNm, UnusedUsrNm, UnusedDt) 
			values('','$ordernumber', '$barcode', '$namamakanan', '$username', '$timedatestamp')"; //simpan makanan jadi tidak pakai percentage sisa (UnusedQty)?
																								   //2147483647 batas max nilai int, char tidak ada batas, karena itu barcode diganti menjadi varchar
			$sql = mysql_query($query);
			if($sql === FALSE) { 
				    die(mysql_error()); 
				}
			if($sql){
				header('Location:../simpanmakananjadi.php?msg=Success Input Data'); //pesan jika inputan data berhasil
			}
			else{
				echo "Failed Input Data"; //pesan jika inputan data gagal
			}
		}
	}
?>