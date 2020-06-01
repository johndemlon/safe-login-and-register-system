<?php
if(isset($_POST["b"])){
$servername = "sql103.unaux.com";
$username = "unaux_25915225";
$password = "xc0rai";
$dbname = "unaux_25915225_a";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}
$a = $_POST["a"];
$stmt2 = $conn->prepare('SELECT * FROM a WHERE a = ?');
$stmt2->bind_param('s', $a);
$stmt2->execute();
$result2 = $stmt2->get_result();
if($row2 = $result2->fetch_assoc()){echo "name exists";}else{
$stmt = $conn->prepare('INSERT INTO a (a) VALUES (?)');
$stmt->bind_param('s', $a);
if($stmt->execute()){echo "New record created successfully";}else{echo "Erorr";}
}
$conn->close();
}
if(isset($_POST["d"])){
$servername = "sql103.unaux.com";
$username = "unaux_25915225";
$password = "xc0rai";
$dbname = "unaux_25915225_a";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}
$c = $_POST["c"];
$stmt = $conn->prepare('SELECT id FROM a WHERE a = ?');
$stmt->bind_param('s', $c);
$stmt->execute();
$result = $stmt->get_result();
if($row = $result->fetch_assoc()){echo "success";}else{echo "invalid name";}
$conn->close();
}
?>
<html>
<body>
<form method="post">
<div>register<br></div>
<div>name<br><input name="a"><br></div>
<div><button name="b">submit</button><br></div>
</form>
<form method="post">
<div>login<br></div>
<div>name<br><input name="c"><br></div>
<div><button name="d">submit</button><br></div>
</form>
</body>
</html>
