<?php
include'../db_connect.php';

    // query data
    $result = $pdo->query("SELECT books.id, books.title, books.isbn, books.author, genre.name AS genre
    FROM books 
    JOIN genre ON books.genre_id = genre.id
    ORDER BY genre.name ASC, books.title ASC");
?>

<link rel="stylesheet" type="text/css" href="../style.css">
<h3>Membership Data</h3></div>
<div id="content">
<table border="1" id="tabel-tampil">
<thead>
						<tr>
							<th>ID</th>
							<th>Title</th>
                            <th>ISBN</th>
                            <th>Author</th>
							<th>Genre</th>
						</tr>
					</thead>
		
        <tbody>
        <?php while($row = $result->fetch(\PDO::FETCH_ASSOC)):?>
				<tr>
					<td><?php echo $row["id"];?></td>
					<td><?php echo $row["title"];?></td>
                    <td><?php echo $row["isbn"];?></td>
                    <td><?php echo $row["author"];?></td>
                    <td><?php echo $row["genre"];?></td>
        	
                    <?php endwhile;?>			
		        </tr>

        </tbody>			

	</table>
	<script>
		window.print();
	</script>
</div>
