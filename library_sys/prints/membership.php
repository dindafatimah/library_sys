<?php
include'../db_connect.php';
{
	$id_member=$_GET['id'];
    $result = $pdo->query("SELECT id, name, email, domicile FROM members
                           WHERE id='$id_member'");
?>

<div id="label-page">
</div>
<div id="content" style="margin-top: 100px">
    <?php while($row = $result->fetch(\PDO::FETCH_ASSOC)):?>
	<table style="border: 5px solid; border-radius: 10px; padding: 10px; font-size: 60px">
		<thead>
			<td><h3>Membership Card</h3></td>
		</thead>
		<tr>
			<td>Member's ID</td>
			<td> : </td> 
			<td><?php echo $row['id']; ?></td>
		</tr>
		<tr>
			<td>Name</td>
			<td> : </td>
			<td><?php echo $row['name']; ?></td>
		</tr>
		<tr>
			<td>e-mail</td>
			<td> : </td>
			<td><?php echo $row['email']; ?></td>
		</tr>
		<tr>
			<td>Domicile</td>
			<td> : </td>
			<td><?php echo $row['domicile']; ?></td>
		</tr>
	</table>

    <?php endwhile;?>
</div>
<script>
	window.print();
</script>

<?php
}

?>