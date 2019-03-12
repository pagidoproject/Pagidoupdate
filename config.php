<?php 
$conn = mysqli_connect("localhost","root","","contact");
  
  // Check connection
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
  $sql = "SELECT id, name, email, phone, enquiry, message FROM testenquiry";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"] . "</td><td>"
. $row["email"]. "</td></td>". $row["phone"]. "</td><td>" . $row["enquiry"] . "</td><td>"
. $row["message"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>