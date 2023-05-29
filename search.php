

<?php

$con = new PDO("mysql:host=localhost;dbname=geeksforgeeks",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `pdf_data` WHERE username = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>

    		<head>
    		    <meta charset="UTF-8">
    		    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    		    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    		    <title>البحث</title>
						<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
 					 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
 					 <link rel ="stylesheet" href="searchstyle.css">
           <link rel ="stylesheet" href="style.css">

    		</head>
<body>
	<header>
	  <section>
	<img class="Archive" src="images/logo.png" style="width: 150px;">
	  </section>
	<nav class="navi">
	<a href="index.php">Services</a>
	<a href="index.html">Search</a>
	<a href="#footer">Contact</a>
	<button class="btnlogin-popup">logout</button>
	</nav>
	</header>

    <div class="container1">
	<div class="row">
				<div class="col" >

		<br><br><br>
		<table>
			<tr>
				<th>رقم المعاملة</th>
				<th>ملف المعاملة</th>
			</tr>
			<tr>

				<td><?php echo $row->username; ?></td>
			  <td><?php echo $row->filename; ?></td>
				<td><a href="download.php?file=<?php echo $row->filename; ?>">تحميل</a></td>

			</tr>

		</table>
		</div>
		</div>
 </div>
</body>

<?php
	}


		else{
			echo "Name Does not exist";
		}


}

?>
