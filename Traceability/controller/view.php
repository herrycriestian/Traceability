<html>
<head>
    <title>TRACEABILITY</title>
    <link rel="shortcut icon" href="../iconlogojcc.png" widht="">
    <link rel="stylesheet "href="../style.css">
</head>
<body>
 <br><br><center><img src="../logojcc.png" /></center>
            <div><br><br>
            
            <!--Print user yang sedang login-->
                <?php 
                include 'connect.php';

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

    <center><br><br><br>
    <table border=1 width="50%" height="30%">
        <tr>
            <th>NO</th>
            <th>ORDER NUMBER</th>
            <th>BARCODE</th>
            <th>NAMA MAKANAN</th>
            <th>USERNAME</th>
            <th>UNUSED DATE</th>
        </tr>
        
        <?php

         include('connect.php');
            $timedatestamp = $_REQUEST['timedatestamp'];

            $query=("SELECT * FROM unusedmat WHERE UnusedDt = '$timedatestamp' ");

            $data = mysql_query($query);
            $no=1;
            while ($row = mysql_fetch_row($data)) { ?>
            
        <tr>
            <td><center><?php echo $no;?></center></td>
            <td><center><?php echo $row[1];?></center></td>
            <td><center><?php echo $row[2];?></center></td> <!--Barcode-->
            <td><center><?php echo $row[3];?></center></td> <!--Nama Makanan-->
            <td><center><?php echo $row[6];?></center></td> <!--Username-->
            <td><center><?php echo $row[7];?></center></td> <!--Unused Date-->
        </tr>
        <?php $no++; } ?>
    </table> <br><br>

    <table>
   <tr>
    
    <td><font color="#ffffff"><a href="../simpanmakananjadi.php"><input id="tombol_konten" value="BACK" type="submit" ></a></font> <br> </td>
    <td><font color="#ffffff"><a href="../home.php"><input id="tombol_konten" value="MAIN MENU" type="submit" ></a></font> <br> </td>

   </tr>
</table>


</body>
</html>