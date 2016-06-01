<html>
	<head>
		<link rel="shortcut icon" href="iconlogojcc.png" widht=""><!--ganti logo title--> 
		<title>TRACEABILITY</title>
			<link rel="stylesheet "href="style.css">
			<link rel="stylesheet "href="stylemenu.css">
	</head>
	<body>	

		<br><br><center><img src="logojcc.png" /></center>
			<div><br><br>
			
					<?php 
				include 'controller/connect.php';
					session_start();
					if(!isset($_SESSION['username'])) 
						header("location:login.php");
						?>
						
						<table>
							<tr>
								<td><h3>Granted</h3></td> <td><h3>:</h3></td> <td><h3><?php echo $_SESSION['username']; ?></h3></td>
							</tr>
							<tr>
								<td><h3>Username</h3></td> <td><h3>:</h3></td> <td><h3><?php echo$_SESSION['fname']." ".$_SESSION['lname'];?></h3></td>
							</tr>
							<tr>
								<td><h3>User Id</h3></td> <td><h3>:</h3></td> <td><h3> <?php echo $_SESSION['user_id']; ?> </h3></td> 
							</tr>
						</table>

					<?php 
				include ('controller/connect.php'); //connect database

				//baca data db dari table unusedmat
					$query = "select * from unusedmat where UnusedUsrNm = '".$_SESSION['username']."' ORDER BY UMatRecId DESC LIMIT 1";  
					
					$data = mysql_query($query) or die (mysql_error());
					
					while($row = mysql_fetch_array($data)){ //looping setiap tablenya
						$username = $row['UnusedUsrNm'];
						$barcode = $row['Barcode'];
						$percentagesisa = $row['UnusedQty'];
						$timedatestamp = $row['UnusedDt'];						
						} 	

				?> 			
				
				<br>
				<center><h2>SIMPAN MAKANAN JADI </h2></center>
				<div id="konten_atas">
					
					<form method="post" action="controller/dosimpanmakananjadi.php">
						

						<center><table>
							<tr>
								<td><font color="#ffffff" >Barcode <br><br></font></td>
								<td><font color="#ffffff" > :<br><br> </font></td>
								<td>&nbsp&nbsp&nbsp<font color="#ffffff">  

										<!--BARCODE-->
										<!--Barcode 3 digit terakhir : generate angka, auto increment tiap input item baru, 
										ulang dari awal jika data timedatestamp berubah -->
										
									<?php
										$sql = mysql_query("SELECT max(Barcode) + 1 as newbarcode FROM unusedmat");
										$row = mysql_fetch_array($sql);
										$newbarcode = $row["newbarcode"];

	 									$timedatestamp = isset($_GET['timedatestamp']) ? $_GET['timedatestamp'] : '';
										$tgl=date('ymd');


										include('bar128.php');
	
											if(isset($_POST['finalbarcode'])){
												$finalbarcode = $_POST['finalbarcode']; 
											}
												$finalbarcode=null;
												$digit = null;
												$digit = $newbarcode;
												$tglbarcode = substr($digit,1,6);
												$finalbarcode = $digit;
																								
													echo '<div style="border:3px double #ababab; padding:5px;margin:5px auto;width:144px;">'; 
													echo  bar128(stripslashes($finalbarcode));
													echo '</div>';
													echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
										?>
									
									<br><br>

									</font ></td>
							</tr>
 								<!--untk tampung data yang diinsert user, dan ditampung ke variable yang ada di dosimpanmakananjadi.php-->
							<input type="hidden" class="inputdata" name="username" value="<?php echo $username; ?>">
							<input type="hidden" class="inputdata" name="finalbarcode" value="<?php echo $finalbarcode; ?>">
							<input type="hidden" class="inputdata" name="percentagesisa" value="<?php echo $percentagesisa; ?>">
							<input type="hidden" class="inputdata" name="timedatestamp"? value="<?php echo $timedatestamp; ?>">
							<input type="hidden" class="inputdata" name="newbarcode"? value="<?php echo $newbarcode; ?>">
							<input type="hidden" class="inputdata" name="oldbarcode"? value="<?php echo $oldbarcode; ?>">
							<input type="hidden" class="inputdata" name="finalbarcode"? value="<?php echo $finalbarcode; ?>">
							<input type="hidden" class="inputdata" name="tglbarcode"? value="<?php echo $tglbarcode; ?>">
							<input type="hidden" class="inputdata" name="tgl"? value="<?php echo $tgl; ?>">
							<input type="hidden" class="inputdata" name="action" value="<?php echo $action; ?>"> <br>	
							<!--untk tampung data yang diinsert user, dan ditampung ke variable yang ada di dosimpanmakananjadi.php-->
							
							<tr>
								<td><font color="#ffffff">Order Number</font></td>
								<td><font color="#ffffff"> : </font></td>
								<td><font color="#ffffff"> <input type="text" class="inputdata" name="txtordernumber"/></font></td>
							</tr>	
							
							<tr>
								<td><font color="#ffffff">Nama Makanan</font></td>
								<td><font color="#ffffff"> : </font></td>
								<td><font color="#ffffff"><input type="text" class="inputdata" name="txtnamamakanan"/></font></td>
							</tr>																						
				</table>
			</center>
				</div>
				<div id="errmsg">
					<center>
						<font color="#CC1414">
						<?php
							if(isset($_REQUEST['msg'])){
										echo $_REQUEST['msg'];
									}	
							?>
						</font>
					</center></div>	
				
				<div id = "konten bawah">
					<center>
						<table>
							<tr>
								<td><center><a href="controller/dosimpanmakananjadi.php"><input id="tombol_konten" value="SUBMIT" name="submit" type="submit" ></a></center></td>
								</form>
								<form action="controller/view.php">

									<input type="hidden" class="inputdata" name="timedatestamp"? value="<?php echo $timedatestamp; ?>">
								<td><center><font color="#ffffff"><a href="controller/view.php"><input id="tombol_konten" value="VIEW" type="submit" ></a></font></center></td>	
							</form>

							</tr>
						</table>
						<br>
						<table>
							
							<tr>
								<td><center><font color="#ffffff"><a href="home.php"><input id="tombol_konten" value="BACK" type="submit" ></a></font></center></td>
								<td><center><a href="controller/dologout.php"><input id="tombol_konten" value="LOGOUT" type="submit" ></a></center></td>
							</tr>

						</table>
					</center>
					</div>
				</div>
			</center>
	</body>
</html>

