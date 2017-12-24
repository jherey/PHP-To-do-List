<?php
//including the database connection file
include_once("db.php");
include_once("header.html");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM list ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
<head>	
	<title>Homepage</title>
	<style>
		table, th, td {
		    border: none;
		}
		
	</style>
</head>

<body>
<a href="new.php" class="btn btn-success" style="margin-left: 10px";>Add New Todo</a><br/><br/>

<div class="container">
	<div class="jumbotron">
	<table style="width: 100%; margin: 0px auto;" class="table">

	<tr>
		<th>Title</th>
		<th>Date</th>
		<th></th>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['title']."</td>";
		echo "<td>".date($res['date'])."</td>";	
		echo "<td><a href=\"view.php?id=$res[id]\" class=\"btn btn-success btn-sm\"><span class=\"glyphicon glyphicon-info-sign\"></span> View</a>  <a href=\"edit.php?id=$res[id]\" class=\"btn btn-info btn-sm\"><span class=\"glyphicon glyphicon-edit\"></span> Edit</a>  <a href=\"delete.php?id=$res[id]\" class=\"btn btn-danger btn-sm\" onClick=\"return confirm('Are you sure you want to delete?')\"><span class=\"glyphicon glyphicon-trash\"></span> Delete</a></td>";		
	}
	?>
	</table>
	
	</div>
</div>
<?php
include_once("footer.html");
?>