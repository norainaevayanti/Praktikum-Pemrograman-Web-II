<!DOCTYPE html>
<html>
<head>
    <title>membaca ejaan dari bilangan cacah</title>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Nilai : <input type="text" name="angka"><br>
    <button type="submit">Konversi</button>
</form>

<?php
    function konversiAngkaKeHuruf($angka) {
        if ($angka == 0) {
            return 'Nol';
        } elseif ($angka >= 1 && $angka <= 10) {
            return 'Satuan';
        } elseif ($angka >= 11 && $angka <= 19) {
            return 'Belasan';
        } elseif ($angka >= 20 && $angka <= 99) {
            return 'Puluhan';
        } elseif ($angka >= 100 && $angka <= 999) {
            return 'Ratusan';
        } else {
            return 'Anda Menginput Melebihi Limit Bilangan';
        }
    }
    
    $angka = isset($_POST['angka']) ? $_POST['angka'] : '';
    
    if (!empty($angka)) {
        $hasilKonversi = konversiAngkaKeHuruf($angka);
    }

    echo "<b>Hasil: $hasilKonversi</b>"
?>

</body>
</html>