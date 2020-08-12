
<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;

text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<table>
<tr>
<th>Id</th>
<th>name</th>
<th>Email</th>
<th>Batch</th>
<th>Passing Year</th>
<th>Working Comp./Inst.</th>
<th>Work Location</th>
<th>Joining Year</th>
<th>Current Post</th>
<th>Gate Rank/Score</th>
<th>Thoughts</th>
</tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "bikener");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, name, email,batch,py,company,location,jy,post,gate,yapl FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr>
<td>" . $row["id"]. "</td>
<td>" . $row["name"] . "</td>
<td>". $row["email"]. "</td>
<td>". $row["batch"]. "</td>
<td>". $row["py"]. "</td>
<td>". $row["company"]. "</td>
<td>". $row["location"]. "</td>
<td>". $row["jy"]. "</td>
<td>". $row["post"]. "</td>
<td>". $row["gate"]. "</td>
<td>". $row["yapl"]. "</td>
</tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>