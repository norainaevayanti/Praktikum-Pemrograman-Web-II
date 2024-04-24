<!DOCTYPE html>
<html>
<head>
    <title>Sorting Names</title>
</head>
<body>

<h2>Inputkan 3 nama:</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Nama 1: <input type="text" name="nama1"><br>
    Nama 2: <input type="text" name="nama2"><br>
    Nama 3: <input type="text" name="nama3"><br>
    <input type="submit" name="submit" value="Urutkan">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama1 = $_POST['nama1'];
    $nama2 = $_POST['nama2'];
    $nama3 = $_POST['nama3'];

    if ($nama1 <= $nama2 && $nama1 <= $nama3) {
        if ($nama2 <= $nama3) {
            $sorted_names = "$nama1<br> $nama2<br> $nama3<br>";
        } else {
            $sorted_names = "$nama1<br> $nama3<br> $nama2<br>";
        }
    } elseif ($nama2 <= $nama1 && $nama2 <= $nama3) {
        if ($nama1 <= $nama3) {
            $sorted_names = "$nama2<br> $nama1<br> $nama3<br>";
        } else {
            $sorted_names = "$nama2<br> $nama3<br> $nama1<br>";
        }
    } else {
        if ($nama1 <= $nama2) {
            $sorted_names = "$nama3<br> $nama1<br> $nama2<br>";
        } else {
            $sorted_names = "$nama3<br> $nama2<br> $nama1<br>";
        }
    }

    echo "<p>$sorted_names</p>";
}
?>

</body>
</html>