<?php
include_once("db.php");
?>

<html>
<head>
	<title>Add Data</title>
</head>

<body>
	<a href="index.php">Go Home!</a>
	<br/><br/>

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
?>

</body>
</html>