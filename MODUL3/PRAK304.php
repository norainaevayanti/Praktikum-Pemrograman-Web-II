<!DOCTYPE html>
<html>
<head>
    <title>Banyak Gambar Bintang</title>
</head>
<body>

    <?php
    session_start();
    
    if (!isset($_SESSION['jumlah_bintang'])) {
        $_SESSION['jumlah_bintang'] = 1;
    }
    
    function tampilkanBintang($jumlah) {
        for ($i = 0; $i < $jumlah; $i++) {
            echo '<img src="bintang.png" alt="Bintang" width="50" height="50">';
        }
    }
    
    if (isset($_POST['submit'])) {
        $_SESSION['jumlah_bintang'] = $_POST['jumlah_bintang'];
    }
    
    if (isset($_POST['tambah'])) {
        $_SESSION['jumlah_bintang']++;
    }
    
    if (isset($_POST['kurang']) && $_SESSION['jumlah_bintang'] > 1) {
        $_SESSION['jumlah_bintang']--;
    }
    ?>

    <?php
    if (!isset($_POST['submit']) && !isset($_POST['tambah']) && !isset($_POST['kurang'])) {
        ?>
        <form method="post">
            <label for="jumlah_bintang">Jumlah bintang</label>
            <input type="text" id="jumlah_bintang" name="jumlah_bintang" min="1" value="<?php echo $_SESSION['jumlah_bintang']; ?>"><br>
            <button type="submit" name="submit">Submit</button>
        </form>
        <?php
    }
    ?>

    <?php
    if (isset($_POST['submit']) || isset($_POST['tambah']) || isset($_POST['kurang'])) {
        echo "<p>Jumlah bintang " . $_SESSION['jumlah_bintang'] . "</p>";
        tampilkanBintang($_SESSION['jumlah_bintang']);
    }
    ?>

    <?php
    if (isset($_POST['submit']) || isset($_POST['tambah']) || isset($_POST['kurang'])) {
        ?>
        <form method="post">
            <button type="submit" name="tambah">Tambah</button>
            <button type="submit" name="kurang">Kurang</button>
        </form>
        <?php
    }
    ?>
</body>
</html>