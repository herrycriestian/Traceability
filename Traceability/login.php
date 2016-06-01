<html>
	<head>
		<link rel="shortcut icon" href="iconlogojcc.png" widht=""><!--ganti logo title--> 
			<link rel="stylesheet "href="style.css">
			<title>TRACEABILITY</title>
	</head>
	<body>
	<br><br><center><img src="logojcc.png" /></center>
		<div id="mainwrapper">
			<div id="header">
			<tr>
			&nbsp&nbsp&nbsp&nbsp&nbsp
			<td><strong>TRACEABILITY</strong></td>
			</tr>
			</div>
			<br>
			
			<center>
			<div id="bawah">
<form method="post" action="controller/dologin.php">
					<table>
						<tr> 
							<center><td> <input class="masuk" type="text" placeholder="Username" name="txtuser"></td> </center>
						</tr>
						<tr> 
							<td> <input class="masuk" type="password" placeholder="Password" name="txtpass" > </td>
						</tr>
						<tr> 
							<td colspan="2"> <input id ="tombol" type="submit" value="LOGIN"> </td> 
						</tr>
						<tr align="center">
							<td colspan="2">
								<font color="red">
									<br> 
									<?php
		if(isset($_REQUEST['login_msg'])){
			echo $_REQUEST['login_msg'];
		}		
									?>
								</font>	
							</td>
						</tr>
					</table>
				</form>
				<br>
				<br>
			</center>
		</div>
		</div>
	</body>
</html>