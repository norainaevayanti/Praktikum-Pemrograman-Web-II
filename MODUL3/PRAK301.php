<!DOCTYPE html>
<html>
<head>
    <title>Jumlah Peserta</title>
</head>
<body>

<form method="post" action="">
    <label for="jumlah_peserta">Jumlah Peserta:</label>
    <input type="text" id="jumlah_peserta" name="jumlah_peserta" min="1" required><br>
    <button type="submit">Cetak</button><br>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jumlah_peserta = $_POST['jumlah_peserta'];
    $counter = 1;

    while ($counter <= $jumlah_peserta) {
        $color = ($counter % 2 != 0) ? 'red' : 'green';
        echo '<span style="color: ' . $color . '; font-family: \'Times New Roman\', Times, serif;"><br>Peserta ke-' . $counter . '</span><br>';
        $counter++;
    }
}
?>
</body>
</html>