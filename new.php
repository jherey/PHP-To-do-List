<?php
	include_once("header.html");
?>

<html>
<head>
	<title>Add Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>

	<form action="store.php" method="POST" name="form1">
		<table width="50%">
			<tr> 
				<td>Title</td>
				<td><input type="text" name="title"></td>
			</tr>
			<tr> 
				<td>Date</td>
				<td><input type="date" name="date"></td>
			</tr>
			<tr> 
				<td>Description</td>
				<td><input type="text" name="description"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="Submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php
include_once("footer.html");
?>