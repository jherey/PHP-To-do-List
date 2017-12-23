<?php
//including the database connection file
include_once("db.php");

if(isset($_POST['Submit'])) {	
	$title = mysqli_real_escape_string($mysqli, $_POST['title']);
	$date = mysqli_real_escape_string($mysqli, $_POST['date']);
	$description = mysqli_real_escape_string($mysqli, $_POST['description']);
		
	// checking empty fields
	if(empty($title) || empty($date) || empty($description)) {
				
		if(empty($title)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
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