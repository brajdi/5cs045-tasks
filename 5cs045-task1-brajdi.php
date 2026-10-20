<?php
// 1. database connection
$conn = new mysqli("localhost", "root", "", "books");

if ($conn->connect_error) {
	die("Connection Failed: " . $conn->connect_error);
}

// get info from database

$result = $conn->query("SELECT * FROM books");
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Books</title>
</head>
<body>
	<h1>Book List </h1>
	<table border="1" cellpadding="5">
		<tr>
			<th>Bookname</th>
			<th>Genre</th>
			<th>Price</th>
			<th>Date of release</th>
		</tr>
		<?php
		// loop through each row and print
		while ($row = $result->fetch_assoc()){
			echo "<tr>";
			echo "<td>" . $row ['Book_name'] . "</td>";
			echo "<td>" . $row ['Genre'] . "</td>";
			echo "<td>£" . number_format($row['Price'], 2 ) . "</td>";
			echo "<td>" . $row['Date_of_release'] . "</td>";
			echo "</tr>";
		}
		?>
	</table>
</body>
</html>
<?php $conn->close(); ?>