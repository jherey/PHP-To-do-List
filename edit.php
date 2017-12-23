<?php
// including the database connection file
include_once("db.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$title = mysqli_real_escape_string($mysqli, $_POST['title']);
	$date = mysqli_real_escape_string($mysqli, $_POST['date']);
	$description = mysqli_real_escape_string($mysqli, $_POST['description']);	
	
	// checking empty fields
	if(empty($title) || empty($date) || empty($description)) {	
			
		if(empty($title)) {
			echo "<font color='red'>Title field is empty.</font><br/>";
		}
		
		if(empty($date)) {
			echo "<font color='red'>Date field is empty.</font><br/>";
		}
		
		if(empty($description)) {
			echo "<font color='red'>Description field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE list SET title='$title',date='$date',description='$description' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM list WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$title = $res['title'];
	$date = $res['date'];
	$description = $res['description'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="POST" action="edit.php">
		<table border="0">
			<tr> 
				<td>Title</td>
				<td><input type="text" name="title" value="<?php echo $title;?>"></td>
			</tr>
			<tr> 
				<td>Date</td>
				<td><input type="date" name="date" value="<?php echo $date;?>"></td>
			</tr>
			<tr> 
				<td>Description</td>
				<td><input type="text" name="description" value="<?php echo $description;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>