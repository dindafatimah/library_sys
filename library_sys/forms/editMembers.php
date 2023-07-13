<?php
	// calling db connection file
	include_once('../db_connect.php');

	// data from url
	$id = $_GET["id"];

	// query data
	$result = $pdo->query("SELECT id, name, email, domicile FROM members WHERE id = ".$id);
	$row = $result->fetch(\PDO::FETCH_ASSOC);
	?>

<!doctype html>
<html lang="en">
<head>
  	<title>Library Administration System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <link rel="icon" href="../images/icon.png" type="image/icon type">

        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

		<link rel="stylesheet" href="../sidebar/css/style.css">
        <link rel="stylesheet" href="../style.css">

  </head>
  <body>
		
  <div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="active" style="background-color: #AF5353;">
				<h1><a href="../index.php" class="logo">
          <img src="../images/icon.png"
                style="width:60%">
        </a></h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="../index.php"><span class="fa fa-home"></span>Home</a>
          </li>
          <li>
              <a href="../reports/members.php"><span class="bi bi-person-lines-fill"></span>Members</a>
          </li>
          <li>
              <a href="../reports/books.php"><span class="bi bi-collection-fill"></span>Collections</a>
          </li>
          <li>
              <a href="../reports/report.php"><span><i class="bi bi-file-earmark-bar-graph-fill"></i></span>Report</a>
          </li>
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
        <div class="footer">
          <p style="font-weight: bolder;">Library Administration System</p>
        </div>
    	</nav>

        <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn">
                <i class="fa fa-bars" style="color: white"></i>
                <span class="sr-only">Toggle Menu</span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Hi, Admin!</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="forms/book_lending.php">BOOK LENDING</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="forms/newMembers.php">New Member</a>
                    </li>
                </ul>
            </div>
            </div>
        </nav>

    <!-- Page Content  -->

        
    <h1>Edit <?php echo $row['name']; ?>'s Details</h1>

    <div class="content">

            <form action="../process/members-update.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data" class="was-validated">

            <tr>
            <div class="col-auto">
                <label for="validationTextarea" class="form-label" style="float: left; font-weight: bolder; color: black; font-size: 20px;">ID</label>
                <input type="text" class="form-control is-valid" id="validationTextarea" name="id" value="<?php echo $row['id']; ?>" readonly="readonly"></input>
                <br />
                <label for="validationTextarea" class="form-label" style="float: left; font-weight: bolder; color: black; font-size: 20px;">Name</label>
                <input type="text" class="form-control is-invalid" id="validationTextarea" name="name" value="<?php echo $row['name']; ?>" required></input>
                <br />
                <label for="validationTextarea" class="form-label" style="float: left; font-weight: bolder; color: black; font-size: 20px;">e-mail</label>
                <input type="email" class="form-control is-invalid" id="validationTextarea" name="email" value="<?php echo $row['email']; ?>" required></input>
                <div class="invalid-feedback">
                This field cannot be empty.
                </div>
                <br />
                <label for="validationTextarea" class="form-label" style="float: left; font-weight: bolder; color: black; font-size: 20px;">Domicile</label>
                <input type="text" class="form-control is-invalid" id="validationTextarea" name="domicile" value="<?php echo $row['domicile']; ?>" required></input>
                <br />

                <div class="mb-3">
                <button name="save" value="save" class="btn" type="submit" onclick = "return confirm ('Is all the data correct?')">Edit</button>
                <p>  </p>
                <a class="btn-delete" href="../process/members-delete.php?id=<?php echo $id?>" onclick = "return confirm ('Are you sure?')">Delete</a>
            </div>
            </div>
        </div>
    </div>

    <script src="sidebar/js/jquery.min.js"></script>
    <script src="sidebar/js/popper.js"></script>
    <script src="sidebar/js/bootstrap.min.js"></script>
    <script src="sidebar/js/main.js"></script>


    

  </body>

</html>