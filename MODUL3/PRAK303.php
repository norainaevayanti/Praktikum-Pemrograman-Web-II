<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deret Bilangan dengan Gambar Bintang</title>
</head>
<body>
    <form method="post">
        Batas Bawah : <input type="text" name="batas_bawah" required><br>
        Batas Atas : <input type="text" name="batas_atas" required><br>
        <input type="submit" name="submit" value="Cetak">
    </form><br>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $batas_bawah = $_POST['batas_bawah'];
        $batas_atas = $_POST['batas_atas'];
        $bilangan = $batas_bawah;
        do {
            if (($bilangan + 7) % 5 == 0) {
                echo '<img src="bintang.png" alt="Bintang" width="20" height="20">';
            } else {
                echo $bilangan . " ";
            }
            $bilangan++;
        } while ($bilangan <= $batas_atas);
    }
    ?>
</body>
</html>