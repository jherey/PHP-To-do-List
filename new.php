<?php
	include_once("db.php");
	include_once("header.html");

	if(isset($_POST['Submit'])) {	
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
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
		//insert data to database
		$result = mysqli_query($mysqli, "INSERT INTO `list` (`id`, `title`, `date`, `description`) VALUES (NULL, '{$_POST["title"]}', '{$_POST["date"]}', '{$_POST["description"]}')");
		//Get the last user_id
		$last_id = $mysqli->insert_id;
		//redirectig to the view page
		header("Location: view.php?id=$last_id");
	}
}
?>

<html>
<head>
	<title>Add Data</title>
</head>

<body>
	<a href="index.php" style="margin-left: 10px; font-size: 1.3em;">Home</a>
	<br/><br/>
	<div>
		
			<form action="new.php" method="POST" name="form1">
				<table width="30%" align="center" style="border: 1px solid black;">
					<tr> 
						<td>Title:</td>
						<td><input type="text" name="title"></td>
					</tr>
					<tr> 
						<td>Date:</td>
						<td><input type="date" name="date"></td>
					</tr>
					<tr> 
						<td>Description:</td>
						<td><textarea name="description" rows="8" cols="30"></textarea></td>
					</tr>
					<tr> 
						<td></td>
						<td><input class="btn-success btn-lg" style="border: none;" type="Submit" name="Submit" value="Add"></td>
					</tr>
				</table>
			</form>
		
	</div>
	
<?php
	include_once("footer.html");
?>