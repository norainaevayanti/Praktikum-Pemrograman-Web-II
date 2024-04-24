<!DOCTYPE html>
<html>
<head>
    <title>Form Mahasiswa</title>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Nama: <input type="text" name="nama">
        <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($_POST['nama'])) { ?>
            <span style="color:red">*nama tidak boleh kosong</span>
        <?php } 
        ?>
        <br>

        NIM: <input type="text" name="nim">
        <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($_POST['nim'])) { ?>
            <span style="color:red">*nim tidak boleh kosong</span>
        <?php } 
        ?>
        <br>

        Jenis Kelamin: <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($_POST['jenis_kelamin'])) { ?>
            <span style="color:red">*jenis kelamin tidak boleh kosong</span>
        <?php } ?><br>
        
        <input type="radio" name="jenis_kelamin" value="Laki-laki">Laki-laki <br>
        <input type="radio" name="jenis_kelamin" value="Perempuan">Perempuan<br>
        
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $jenis_kelamin = $_POST['jenis_kelamin'];

        if (!empty($nama) && !empty($nim) && !empty($jenis_kelamin)) {
            echo "<br>$nama <br>";
            echo "$nim <br>";
            echo "$jenis_kelamin";
        }
    }
    ?>
</body>
</html>