<html>
<html>
<head>
  <link rel="shortcut icon" href="iconlogojcc.png" widht=""><!--ganti logo title--> 
    <link rel="stylesheet "href="style.css">
    <title> TRACEABILITY</title>
</head>
<body>

    <br><br><center><img src="logojcc.png" /></center>
            <div><br><br>
            
            <!--Print user yang sedang login-->
               <?php 
        include 'controller/connect.php'; //connect ke database traceability
          session_start();
          if(!isset($_SESSION['username'])) 
            header("location:login.php");
            ?>
            
            <table>
              <tr>
                <td><h3>Granted</h3></td> <td><h3>:</h3></td> <td><h3><?php echo $_SESSION['username']; ?></h3></td> <!--Print username yang diizinkan-->
              </tr>
              <tr>
                <td><h3>Username</h3></td> <td><h3>:</h3></td> <td><h3><?php echo$_SESSION['fname']." ".$_SESSION['lname'];?></h3></td> <!--Print firstname dan lastname dari username yang diizinkan-->
              </tr>
              <tr>
                <td><h3>User Id</h3></td> <td><h3>:</h3></td> <td><h3> <?php echo $_SESSION['user_id']; ?> </h3></td> <!--Print userid yang diizinkan--> 
              </tr>
            </table>
    <center>
<?php
//error_reporting(0); //jika dihilangkan, ada error timedatestamp undefine, tetapi fungsi input file csv masih bisa
include ('controller/connect.php');
//validasi jika tidak diinput file csv , tetapi  disubmit
//jika ada file dan di submit
    if(isset($_POST['submit'])){ //jika tombol submit diklik

  if($_FILES["filename"]["error"] > 0){ //jika tombol submit diklik tapi tidak ada file yang di upload 
      echo "<h1>"."FILE MUST BE FILLED !" ."</h1>"; //print pesan error "FILE MUST BE FILLED !"
      echo "<a href='uploadcsv.php'><input type='submit' name='submit' value='BACK' id='tombol_konten'></a>"; //tombol back ke form upload file csv
        }

        else{
        /*inisialisasi untuk jika tanggal berganti, nama file csv yang di upload 2 digit terakhir dari 01 lagi, autoincrement cth, 15041701,15041701, ketika berganti 
           tanggal menjadi 15041801, 15041802, 15041803  */
        
        $timedatestamp = date("ymd"); //me mbaca tanggal sekarang dan ditampung di variable $timedatestamp;
        $datenow = $timedatestamp; //data tgl yang sudah terbaca di tampung di variable $datenow;
        $nextdate = date("ymd"); //membaca tanggal sekarang dan ditampung di variable $nextdate;


/*penjelasan code dari line 53 - 100*/
/*jika data tanggal pada $nextdate sama dengan $datenow, berarti data tanggal $nextdate dan $datenow adlah hari ini
maka code yang dieksekusi adalah code setelah else line 80, yaitu upload csv, lalu nama file berganti menjadi date hari ini + 2 digit format yymmddxx terakhir autoincrement, contoh 15041701,15041702, 15041703, dst.

tetapi jika data pada $nextdate dan $datenow tidak sama, code yang dieksekusi adalah code if line 59, artinya data nextdate adalah date hari ini, dan data $datenow adalah date kemarin, jadi ketika file csv diupload, nama file berganti menjadi date hari ini dan 2 digit terakhir berulang dari 01 lagi , cth 15041703, 15041801, 15041802, 15041803, dst. 
 */
        if($nextdate != $datenow){ //check jika date $nextdate dengan date $datenow sama atau tidak 

        $namafile = $_FILES['filename']['name']; //membaca nama file yang diupload dan ditampung ke variable $namafile
        $timedatestamp = date("ymd"); //membaca date hari ini untuk rename file yang sudah diupload menjadi tgl hari ini
        $newname = $timedatestamp."01"; // penamaan file menjadi tgl hari ini, dan 2 digit terakhir mulai dari 01, cth 15041701
        $target_Dir = "data/".$newname.".csv"; //store nama setelah penamaan di folder "data"

        $path="dataupload/".$namafile; //membaca path folder file csv sebelum di upload

          $no = 1; //inisialisasi penomoran 2 digit terakhir rename file csv yang di upload

          while(file_exists($target_Dir)){ //jika file yang di upload ada
        $angka = substr($newname, 7); // baca 2 digit terakhir dari tgl yang sudah menjadi nama dgn substr 7 array terakhir pd nama file, & ditampung di variable $angka
        $newname = $timedatestamp."0".($angka + $no); // data tanggal menjadi nama file (150417) + 0 + string $angka
        
        $target_Dir = "data/".$newname.".csv";  //target store data file csv yang sudah di upload 
        }

        move_uploaded_file($_FILES['filename']['tmp_name'], $target_Dir); //fungsi php memindahkan file yang di upload
          
          echo "<h1>" . "File ". $newname ." Has Been Uploaded" . "</h1>"; //print file berhasil di upload
          echo "<a href='uploadcsv.php'><input type='submit' name='submit' value='BACK' id='tombol_konten'></a>"; //tombol back ke form upload file 

        }
        else{

       $namafile = $_FILES['filename']['name']; //membaca nama file yang diupload dan ditampung ke variable $namafile
        $timedatestamp = date("ymd");//membaca date hari ini untuk rename file yang sudah diupload menjadi tgl hari ini
        $newname = $timedatestamp."01";  // penamaan file menjadi tgl hari ini, dan 2 digit terakhir mulai dari 01, cth 15041701
        $target_Dir = "data/".$newname.".csv"; //store nama setelah penamaan di folder "data"

        $path="dataupload/".$namafile;//membaca path folder file csv sebelum di upload

  $no = 1;//inisialisasi penomoran 2 digit terakhir rename file csv yang di upload


  while(file_exists($target_Dir)){ //jika file yang di upload ada
        $angka = substr($newname, 7); // baca 2 digit terakhir dari tgl yang sudah menjadi nama dgn substr 7 array terakhir pd nama file, & ditampung di variable $angka
        $newname = $timedatestamp."0".($angka + $no); // data tanggal menjadi nama file (150417) + 0 + string $angka
        
        $target_Dir = "data/".$newname.".csv"; //target store data file csv yang sudah di upload 
        }

        move_uploaded_file($_FILES['filename']['tmp_name'], $target_Dir);//fungsi php memindahkan file yang di upload
          
          echo "<h1>" . "File ". $newname ." Has Been Uploaded" . "</h1>";//print file berhasil di upload
          echo "<a href='uploadcsv.php'><input type='submit' name='submit' value='BACK' id='tombol_konten'></a>"; //tombol back ke form upload file    

      }

      unlink($path); //fungsi php delete file original setelah diupload

      
    //Import uploaded file ke Database
   $row = 1; //ambil data setelah baris header

   if(($handle = fopen($target_Dir, "r")) !== FALSE){ // dia buka lokasi dir si file csv nya  tanda r = read
     fgetcsv($handle); //ambil data setelah baris header ini jgn diilangin

    while (($isi = fgetcsv($handle, 1000, ",")) !== FALSE) {
         


      //$num = count($row);

        //logika buat pecah data di kolom Time Date Stamp yang isi data dan formatnya 1/1/2009 13:00 AM
        $pecah = explode(" ", $isi[4]); //pisah string yg dipisahkan dengan karakter space
        $date = $pecah[0]; //data date adlah variable pecah array ke 0
        $pecahdate =  explode("/",$date); //pecah data date yg string datanya dipisahkan dengan karakter '/'

        $tanggal  = $pecahdate[0]; //tgl array ke 0
        $bulan    = $pecahdate[1]; //bln array ke 1
        $tahun    = $pecahdate[2]; //bln array ke 2

        $date = $tahun.$bulan.$tanggal; // string tgl bulan tahun digabung menjadi satu, contoh hasil data 200911 = 1 januari 2009

         $angka = $date; //ditampung ke variable $angka
 
                 $total = strlen($angka);  //hitung panjang angka($date) 
                 //format = tahun bulan tgl --> yyyymmdd
                 /*validasi panjang data angka yang terinsert ke dari csv file setelah di explode dan digabung menjadi format yyyymd atau yyyymmd atau yyyymmdd
                 sementara data tanggal yang harus dimasukkan ke UnusedDt adalah format yyyymmdd, sehingga terbaca di generate barcode pada halaman simpanmakananjadi.php
                 adalah 9yymmddxxx */

                  //jika panjang string date csv setelah explode adalah 6 digit
                  if($total == 6){
                    $tahun   = substr($angka, -6, -2); //misal data adalah 200911 , mk data dihitung dari blakang sebanyak 6x sampai angka 2, lalu digeser 2 kebelakang, string yang terambil jadi '2009'
                    $bulan   = substr($angka, 4, 1); //misal data adalah 200911 , mk data dihitung dari blakang sampai angka 0, lalu digeser 1 kebelakang, string yang terambil jadi '9'
                    $bulan   = '0'.$bulan; //string yang sudah di substr diatas ditambah 0 didepannya , menjadi 01
                    $tanggal = substr($angka, 5);//misal data adalah 200911 , mk data dihitung dari blakang sampai angka 0, lalu digeser 1 kebelakang, string yang terambil jadi '9'
                    $tanggal = '0'.$tanggal;//string yang sudah di substr diatas ditambah 0 didepannya , menjadi 01
                    $date = $tahun.''.$bulan.''.$tanggal; //string yg sudah di substr diatas digabung menjadi 1 dan ditampung di $date
                 }
                 //jika panjang string date csv setelah explode adalah 7 digit
                 if($total == 7){
                   $tahun   = substr($angka, -7, -3);//misal data adalah 2009121(1 desember 2009) , mk data dihitung dari blakang sebanyak 7x sampai angka 2, lalu 3 digit terakhir dibuang
                   $bulan   = substr($angka, 4, -1); //misal data adalah 2009121 (1 desember 2009) , mk data dihitung dari depan sampai angka 9 dan dibuang,lalu 1 digit belakang dibuang
                   $tanggal = substr($angka, 6);//misal data adalah 2009121 (1 desember 2009) , mk data dihitung dari depan sampai angka 2 dan dibuang
                   $tanggal = '0'.$tanggal;// string diatas ditambah 0 didepannya
                   $date = $tahun.''.$bulan.''.$tanggal; //gabung string diatas yang sudah di substr
                 }
                 //jika panjang string date csv setelah explode adalah 8 digit
                 if($total == 8){
                    $tahun   = substr($angka, -8, -4); //misal data adalah 20091213(13 desember 2009) , mk data dihitung dari blakang sebanyak 8x sampai angka 2, lalu 4 digit terakhir dibuang
                    $bulan   = substr($angka, 4, -2); //misal data adalah 20091213(13 desember 2009) , mk data dihitung dari depan sebanyak 4x sampai angka 9, lalu 2 digit terakhir dibuang
                    $tanggal = substr($angka, 6); //misal data adalah 20091213(13 desember 2009) , mk data dihitung dari depan sebanyak 6x sampai angka 2 dan dibuang.
                    $date = $tahun.''.$bulan.''.$tanggal; //gabung string diatas yang sudah di substr
                 }

      $timestamp = $date; //validasi panjang digit angka diatas ditampung ke variable $timestamp
        //insert data ke table materialout
      $import = "INSERT INTO materialout( MatOutRecId, DocNo, IssuedDt, AlcNm) VALUES ('', '$isi[0]', '$timestamp','$isi[5]')";
        //insert data ke table unusedmat
      $import2 = "INSERT INTO unusedmat(DocNo, Barcode, UnusedUsrNm, UnusedQty, UnusedDt) VALUES ('$isi[0]', '$isi[1]', '$isi[2]','$isi[3]', '$timestamp')";
        //insert data ke table materialoutitem
      $import3 = "INSERT INTO materialoutitem(MatOutItRecId, Barcode) VALUES ('','$isi[1]')"; 


        //validasi insert jika data Barcode di file csv atau  data action di file csv berisi Gunakan Makanan Jadi atau Gunakan Sisa Bahan
        if($isi[1] && $isi[5] == "Gunakan Sisa Bahan" || $isi[5]== "Gunakan Makanan Jadi"){ /*jika isi kolom action file csv "Gunakan Sisa Bahan" atau "Gunakan Makanan Jadi"*/

        mysql_query($import); //lakukan query insert $import
        mysql_query($import3); //lakukan query insert $import3
        $row++; //ulang sebanyaka data yang ada di file csv
       }
       //validasi insert jika data action di file csv berisi Simpan Sisa Bahan
       else if($isi[5] == "Simpan Sisa Bahan") 
       {
        mysql_query($import2); //lakukan query insert $import3
        $row++; //ulang sebanyak data yang ada di file csv
       }
        
    }
    fclose($handle); //Menutup CSV file
    } 
  }
}
     

else { //Jika belum menekan tombol submit, form muncul.. ?>

<!-- Form Untuk Upload File CSV-->
  <h2><strong>CHOOSE CSV FILE</strong></h2> 

  <div id="konten_atas">
   <table>
   <form enctype='multipart/form-data' action="" method='post'> 
    
     <br><br><br><br><br>

         <input type='file' name='filename' size='100'>
         <br><br><br><br>
         
           
        </table>

        <table>
          <tr>
        <td><input type='submit' name='submit' value='UPLOAD' id="tombol_konten"></td> <!--tombol konten-->         
    </form>
    
    
             
        <td><a href="home.php"><input type='submit' value='BACK' id="tombol_konten"></a></td> <!--link tombol back ke menu utama-->

    </tr>
  </table>
</div>

<?php } mysql_close(); //Menutup koneksi SQL
    
    if(isset($_REQUEST['sukses'])){
            print "<img src = uploadedimg/".$_REQUEST['sukses']." widht = 500 height = 200></img> ";
          }
?>
</center>
</body>
</html> 

