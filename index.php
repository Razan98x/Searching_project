<?php include 'dbcon.php'; ?>

<!DOCTYPE html>

<html lang="en">
<head>
	<link rel="stylesheet">
	<link rel="stylesheet" href='style.css'>
	<link rel="stylesheet" href="sty.css">
	
</head>
<body>
	
<header>
  <section>
<img class="Archive" src="images/datalogy.jpeg" style="width: 150px;">
  </section> 
<nav class="navi">
<a href="index.html">Home</a>
<a href="index.html">Search</a>
<a href="#footer">Contact</a>
<button class="btnlogin-popup">logout</button>
</nav>
</header>

	<div class="container1" style="margin-top:30px">
			<div class="row">
				<div class="col" >
				<strong>رفع الملف من جهازك</strong>
					<form method="post" enctype="multipart/form-data" >
						<?php
							// If submit button is clicked
							if (isset($_POST['submit']))
							{
							// get name from the form when submitted
							$name = $_POST['name'];

							if (isset($_FILES['pdf_file']['name']))
							{
							// If the ‘pdf_file’ field has an attachment
								$file_name = $_FILES['pdf_file']['name'];
								$file_tmp = $_FILES['pdf_file']['tmp_name'];

								// Move the uploaded pdf file into the pdf folder
								move_uploaded_file($file_tmp,"./pdf/".$file_name);
								// Insert the submitted data from the form into the table
								$insertquery =
								"INSERT INTO pdf_data(username,filename) VALUES('$name','$file_name')";

								// Execute insert query
								$iquery = mysqli_query($con, $insertquery);

									if ($iquery)
								{
						?>
									<div class=
									"alert alert-success alert-dismissible fade show text-center">
										<a class="close" data-dismiss="alert" aria-label="close" >
										×
										</a>
										<strong>تم تحميل الملف بنجاح.</strong>
									</div>
									<?php
									}
									else
									{
									?>
									<div class=
									"alert alert-danger alert-dismissible fade show text-center">
										<a class="close" data-dismiss="alert" aria-label="close">
										×
										</a>
										<strong>Failed!</strong> Try Again!
									</div>
									<?php
									}
								}
								else
								{
								?>
									<div class=
									"alert alert-danger alert-dismissible fade show text-center">
									<a class="close" data-dismiss="alert" aria-label="close">
										×
									</a>
									<strong>Failed!</strong> File must be uploaded in PDF format!
									</div>
								<?php
								}// end if
							}// end if
						?>

					<div class="form-input py-2">
						<div class="form-group" >
							<input type="text" class="form-control"
								placeholder="ادخل رقم المعاملة" name="name">
						</div>
						<div class="form-group4">
							<input type="file" name="pdf_file"
								class="form-control" accept=".pdf" required/>
						</div>
						<div class="form-group2">
							<input type="submit"
								class="btnRegister" name="submit" value="رفع الملف">
						</div>
					</div>
				</form>
			</div>

			<div class="col-lg-6 col-md-6 col-12">
			<div class="card">
				<div class="card-header text-center">
				<h2></h2>
				</div>
				<div class="card-body">
				<div class="table-responsive">
					<table>
						<thead>

							<th>رقم المعاملة</th>
							<th>ملف المعاملة</th>
							<th>التحميل</th>

						</thead>
						<tbody>
						<?php
							$selectQuery = "select * from pdf_data";
							$squery = mysqli_query($con, $selectQuery);
							while (($result = mysqli_fetch_assoc($squery))) {
						?>
						<tr>
							<td><?php echo $result['username']; ?></td>
							<td><?php echo $result['filename']; ?></td>
	            <td><a href="download.php?file=<?php echo $result['filename'] ?>">Download</a></td>
						<?php
							}
						?>
						</tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
