<?php
include'../db_connect.php';

    // query data
    $result = $pdo->query("SELECT id, name, email, domicile FROM members");

?>

<link rel="stylesheet" type="text/css" href="../style.css">
<h3>Membership Data</h3></div>
<div id="content">
<table border="1" id="tabel-tampil">
<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>e-mail</th>
							<th>domicile</th>
						</tr>
					</thead>
		
        <tbody>
        <?php while($row = $result->fetch(\PDO::FETCH_ASSOC)):?>
				<tr>
					<td><?php echo $row["id"];?></td>
					<td><?php echo $row["name"];?></td>
                    <td><?php echo $row["email"];?></td>
					<td><?php echo $row["domicile"];?></td>
        	
                    <?php endwhile;?>			
		        </tr>

        </tbody>			

	</table>
	<script>
		window.print();
	</script>
</div>
