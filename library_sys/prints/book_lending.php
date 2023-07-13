<?php
include'../db_connect.php';

    // query data
    $result = $pdo->query("SELECT lending.id, lending.lending_date, members.name AS name, lending.return_date, lending.status
    FROM lending
    JOIN members ON lending.members_id = members.id");

?>

<link rel="stylesheet" type="text/css" href="../style.css">
<h3>Data Buku</h3></div>
<div id="content">
<table border="1" id="tabel-tampil">
<thead>
						<tr>
							<th>ID</th>
							<th>Lending Date</th>
                            <th>Member's Name</th>
                            <th>Book's Title</th>
							<th>Return Date</th>
                            <th>Status</th>
						</tr>
					</thead>
		
        <tbody>
        <?php while($row = $result->fetch(\PDO::FETCH_ASSOC)):?>
				<tr>
					<td><?php echo $row["id"];?></td>
					<td><?php echo $row["lending_date"];?></td>
                    <td><?php echo $row["name"];?></td>
                    <td><?php echo $row["title"];?></td>
                    <td><?php echo $row["return_date"];?></td>
                    <td><span style="<?= $row['status'] == 'Returned' ? 'color: #7FC27F' : ($row['status'] == 'Not-Returned' ? 'color: #C80039' : '') ?>">
                    <?= $row['status'] ?></span></td>

        	
                    <?php endwhile;?>			
		        </tr>

        </tbody>		

	</table>
	<script>
		window.print();
	</script>
</div>
