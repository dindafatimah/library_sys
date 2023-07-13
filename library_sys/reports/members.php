<?php
include'../db_connect.php';

    // query data
    $result = $pdo->query("SELECT id, name, email FROM members");

    $chart = $pdo->query("SELECT domicile, COUNT (name) AS domicile_total
    FROM members 
    GROUP BY domicile
    ORDER BY domicile");

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
                        <a class="nav-link" href="../forms/book_lending.php">BOOK LENDING</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../forms/newMembers.php">New Member</a>
                    </li>
                </ul>
            </div>
            </div>
        </nav>

    <!-- Page Content  -->

    <div class="d-flex flex-column" style="padding: 10px;">
        <div class="card">
        <div class="card-body">
        <h1 class="card-title" align="center">Memberships Report</h1>
            <div id="container" style="max-width: 98%;"></div>
            <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/data.js"></script>
        <script src="https://code.highcharts.com/modules/drilldown.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
		<script>
            Highcharts.chart('container', {
                chart: {
                    type: 'column'
                },
                title: {
                    align: 'left',
                    text: 'Comparison of Total Number of Memberships by Their Domiciles'
                },
                subtitle: {
                    align: 'left',
                    text: ''
                },
                accessibility: {
                    announceNewData: {
                        enabled: true
                    }
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: 'Total Number of Citizens'
                    }

                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:.0f}'
                        }
                    }
                },

                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b> of total<br/>'
                },

                series: [
                    {
                        name: 'Members',
                        colorByPoint: true,
                        data: [
                            <?php while($res = $chart->fetch(\PDO::FETCH_ASSOC)):?>
                        {
							name: '<?php echo $res["domicile"]?>',
							y: <?php echo $res["domicile_total"]?>,
                            selected: true
						},
						<?php endwhile?>
                    ]
				}]
			});
		</script>

        </div>

        </div>
        </div>
    
    <div class="d.flex justify-content-center" >
    <div class="card">
        <div class="card-body">
        <div class="content">
            <h3>Members' Details</h3>
            <a href="../prints/members.php" target="_blank" style="font-size: large">Print Table</a>
            <br />
            <br />
            <a class="btn" href="../CRUD/members.php" style="font-size: larger">Edit Membership Details</a>
        </div>
        <br />
        <br />


    <div class="d.flex justify-content-center" >
			<div class="card">
			  <div class="card-body">
				<table id="dataTables" class="table table-striped" style="width:100%;">
                <thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>e-mail</th>
						</tr>
					</thead>
		
        <tbody>
        <?php while($row = $result->fetch(\PDO::FETCH_ASSOC)):?>
				<tr>
					<td><?php echo $row["id"];?></td>
					<td><?php echo $row["name"];?></td>
                    <td><?php echo $row["email"];?></td>
        	
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