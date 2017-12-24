<?php
	include_once("db.php");
	include_once("header.html");
?>

<html>
<head>
	<title>Add Data</title>
</head>

<body>
	<a href="index.php" style="margin-left: 10px; font-size: 1.3em;">Home</a>
	<br/><br/>

	<div class="container">
		<div class="jumbotron" style="width: 70%; margin: auto;">
			<?php
				//getting id from url
				$id = $_GET['id'];
				//selecting data associated with this particular id
				$result = mysqli_query($mysqli, "SELECT * FROM list WHERE id=$id");

				while($res = mysqli_fetch_array($result))
				{
					//$id = $res['id'];
					$title = $res['title'];
					$date = $res['date'];
					$description = $res['description'];
				}

				echo "<h2 style=\"font-weight: bold;\" class=\"title\">"."$title"."</h2>"."<hr>";
				echo "<p class=\"description\">"."$description"."</p>";
				echo "<p class=\"date\">"."$date"."</p>";

				echo "<td><a href=\"edit.php?id=$id\" class=\"btn btn-info btn-md\"><span class=\"glyphicon glyphicon-edit\"></span> Edit</a>  <a href=\"delete.php?id=$id\" class=\"btn btn-info btn-md\" onClick=\"return confirm('Are you sure you want to delete?')\"><span class=\"glyphicon glyphicon-trash\"></span> Delete</a></td>";	
			?>
		</div>
	</div>


<?php
	include_once("footer.html");
?>