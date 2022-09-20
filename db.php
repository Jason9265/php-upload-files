<!DOCTYPE html>
<html>
<head>
<title>File upload</title>
</head>
<body>

	<form method="post" enctype="multipart/form-data">
		<lable>file upload</lable>
		<input type="File" name="file"> <input type="submit" name="submit">
	</form>

</body>
</html>

<?php
$localhost = "localhost";
$dbsuername = "root";
$dbpassword = "root";
$dbname = "test";

$conn = mysqli_connect($localhost, $dbsuername, $dbpassword, $dbname);

if (isset($_POST["submit"])) {

    // restrict file type
    $file_type = $_FILES['file']['type'];
    if ($file_type == 'application/pdf' || $file_type == 'image/jpeg' || $file_type == 'image/png') {
        // file information
        $file_name = $_FILES["file"]["name"];
        $upload_time = date('Y-m-d H:i:s');
        $file_size = $_FILES['file']['size'];

        // db.sql
        $sql = "insert into files(file_name, upload_time, file_size) values ('$file_name', '$upload_time', '$file_size')";

        // upload to database
        if (mysqli_query($conn, $sql)) {
            echo "File Sucessfully uploaded<br><br>";
        } else {
            echo "Error<br><br>";
        }
    } else {
        echo "Wrong file type<br><br>";
    }
}

// show uploaded files
$sql1 = "select * from files ";
$result = $conn->query($sql1);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "file_id: " . $row["file_id"] . "\t file_name: " . $row["file_name"] . "\t upload_time: " . $row["upload_time"] . "\t file_size: " . $row["file_size"] . "bytes; <br>";
    }
} else {
    echo "no result";
}

?>
