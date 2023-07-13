<?php
	// calling db connection file
	include_once('../db_connect.php');

	// data from url
	$id = $_GET["id"];

	// query data
	$result = $pdo->query("SELECT book_lending.id AS lend_id, book_lending.books_id, lending.id AS id
    FROM book_lending
    JOIN lending ON book_lending.lending_id = lending.id 
    WHERE lending.id = ".$id);

    $books = $pdo->query("SELECT id, title FROM books");

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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

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

        
    <h1>Books Choice</h1>

    <div class="content">

            <form action="../process/lending_books.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data" class="was-validated">

            <tr>
            <div class="col-auto">
                <label for="validationTextarea" class="form-label" style="float: left; font-weight: bolder; color: black; font-size: 20px;">Book's Title</label>
                <br />
                <br />

                <div class="wraps">
                
                <select id="title" name="books_id" class="custom-select">
                <?php while($res = $books->fetch(\PDO::FETCH_ASSOC)):?>

                    <option value=""></option>

                    <option value="<?php echo $res['id']; ?>"><?php echo $res['title']; ?></option>

                    <?php endwhile;?>
                    </select>
                    	
                </div>
                <div class="invalid-feedback">
                    This field must be filled.
                    </div>
                    <br />

                <div class="mb-3">
                <button name="save" value="save" class="btn" type="submit">Add</button>
            </div>
            </div>
        </div>
    </div>

    <script src="sidebar/js/jquery.min.js"></script>
    <script src="sidebar/js/popper.js"></script>
    <script src="sidebar/js/bootstrap.min.js"></script>
    <script src="sidebar/js/main.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script>

        $(document).ready(function () {

            $("#title").select2({

                
                placeholder: "Choose the book's title"

            });

        });


    </script>


    

  </body>

</html>