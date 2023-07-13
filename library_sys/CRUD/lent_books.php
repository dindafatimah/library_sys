<?php
include'../db_connect.php';

    $id = $_GET["id"];

    // query data
    $result = $pdo->query("SELECT book_lending.id AS lend_id, book_lending.books_id, books.id AS books_id, books.title AS title, books.isbn AS isbn, lending.id AS id
    FROM book_lending
    JOIN books ON book_lending.books_id = books.id
    JOIN lending ON book_lending.lending_id = lending.id 
    WHERE lending.id = ".$id);

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

		<!-- import jquery -->
		<script
			src="https://code.jquery.com/jquery-3.6.4.js"
			integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
			crossorigin="anonymous"></script>
		
		<!-- import datatables js -->
		
		<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
		<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

		<!-- import datatables css -->
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" />
		<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
		
		<!-- datatable config -->
		<script>
			$(document).ready(function () {
			$('#dataTables').DataTable();
		});
		</script>


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
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collaps4" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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

  <div class="d.flex justify-content-center" >
    <div class="card">
        <div class="card-body">
        <div class="content">
            <h1>Lent Books</h1>
            <h3>ID: <?php echo $id;?></h3>
                <a class=btn href="../forms/lending_books.php?id=<?php echo $id;?>">Add New Data</a>
        </div>
        <br />
        <br />


    <div class="d.flex justify-content-center" >
			<div class="card">
			  <div class="card-body">
				<table id="dataTables" class="table table-striped" style="width:100%;">
					<thead>
						<tr>
                            <th>Books Lent</th>
                            <th> </th>
                            <th>Action</th>
						</tr>
					</thead>
		
        <tbody>
        <?php while($row = $result->fetch(\PDO::FETCH_ASSOC)):?>
				<tr>
                <td>
                    <?php 

                    $isbn = $row["isbn"];

                    //parameter
                    $bibkeys = 'ISBN:' . $isbn;


                    // API get city data
                    $curl_books= curl_init();
                    curl_setopt_array($curl_books, array(
                    CURLOPT_URL => "https://openlibrary.org/api/books?bibkeys=" . $bibkeys . "&jscmd=data&format=json",
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(

                    ),
                    CURLOPT_RETURNTRANSFER => true,
                    ));
                    $json_books = curl_exec($curl_books);
                    curl_close($curl_books);

                    //convert json response into php array
                    $response_books = json_decode($json_books, TRUE);

                    // get city key
                    $books_key = $response_books[$bibkeys]['cover']['medium'];
                    //end of API city


                    ?>
                    <img src= <?php echo $books_key;?>

                    ></td>
                    <td><?php echo $row["title"];?></td>
                    <td><a class=btn btn-outline-danger href="../process/lending-delete.php?lend_id=<?php echo $row['lend_id'] ?>">Remove</td>

                    <?php endwhile;?>			
		        </tr>

        </tbody>		
	</table>
</div>


      </div>
		</div>

    <script src="sidebar/js/jquery.min.js"></script>
    <script src="sidebar/js/popper.js"></script>
    <script src="sidebar/js/bootstrap.min.js"></script>
    <script src="sidebar/js/main.js"></script>


    

  </body>

</html>