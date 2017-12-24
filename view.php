<?php
include_once("db.php");
include_once("header.html");
?>

<html>
<head>
	<title>Add Data</title>
</head>

<body>
	<a href="index.php" style="margin-left: 10px;">Home</a>
	<br/><br/>

	<div class="container">
		<div class="jumbotron">
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

				echo "$title"."<br >";
				echo "$description";
				echo "$date";
			?>
		</div>
	</div>


<?php
include_once("footer.html");
?>