<html>
	<head>
			<link rel="stylesheet "href="style.css"> 
			<link rel="shortcut icon" href="iconlogojcc.png" widht=""><!--ganti logo title--> 

			<title>TRACEABILITY</title>
	</head>
	<body>		<br><br><center><img src="logojcc.png" /></center>
			<div><br><br>
				<!--
finish			1. Show data table unusedmat inputan terbaru berdasarkan tanggal terakhir diinput 
finish			2. $_SESSION['user_id'] tidak bisa di echo
finish		    3. $_SESSION['fdsafe'] = untuk mengecek user siapa yang boleh masuk ke traceability, buat kolom di msuser dgn nama fdsafe, setelah login dengan username
				dan pass yang benar, cek fdsafe isinya true/false jk true = bisa akses; jk false = tdk boleh akses
				4. upload file csv dan filenya disimpan di storage folder tertentu, dan nama file diganti dengan tgl hari ini
			-->
				<?php 
				include 'controller/connect.php';
					session_start();
					if(!isset($_SESSION['username'])) 
						header("location:login.php");
						?>
						
						<table>
							<tr>
								<td><h3>Granted</h3></td> <td><h3>:</h3></td> <td><h3> <?php echo $_SESSION['username']; ?> </h3></td>
							</tr>
							<tr>
								<td><h3>Username</h3></td> <td><h3>:</h3></td> <td><h3> <?php echo $_SESSION['fname']." ".$_SESSION['lname'];?> </h3></td>
							</tr>
							<tr>
								<td><h3>User Id</h3></td> <td><h3>:</h3></td> <td><h3> <?php echo $_SESSION['user_id']; ?> </h3></td> 
							</tr>
						</table>
				
				<br>
				<center><h2>TRACEABILITY MENU </h2></center>
				

				<div id = "konten_atas"> 

						<center><table>
					<tr><td><font color="#ffffff"><a href="uploadcsv.php"><input id="tombol" value="SYNCHRONIZE" type="submit"></a></font></td> </tr>
					<br><br><br><br>
					<tr><td><font color="#ffffff"><a href="simpanmakananjadi.php"><input id="tombol" value="SIMPAN MAKANAN JADI" type="submit" ></a></font></td> </tr>
					
					</table>
				</center>

				</div>

				<div id = "konten bawah">
					<tr>
					<br>
						<td>
							<center><a href="controller/dologout.php"><input id="tombol_konten" value="LOGOUT" type="submit" > </a></center>
						</td>
					</tr>
		</div>
				</div>
			</center>
	</body>
</html>