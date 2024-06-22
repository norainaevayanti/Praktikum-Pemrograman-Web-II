<?php
    include_once 'Model.php';
    $model = new Model();

    $id_buku = '';
    $judul_buku = '';
    $penulis = '';
    $tahun_terbit = '';

    if (isset($_GET['id'])) {
        $id_buku = $_GET['id'];
        $book = $model->getBookById($id_buku);
        if ($book) {
            $judul_buku = $book['judul_buku'];
            $penulis = $book['penulis'];
            $tahun_terbit = $book['tahun_terbit'];
        }
    }

    if ($_POST) {
        if ($id_buku) {
            $model->updateBook($_POST['id_buku'], $_POST['judul_buku'], $_POST['penulis'], $_POST['tahun_terbit']);
        } else {
            $model->addBook($_POST['judul_buku'], $_POST['penulis'], $_POST['tahun_terbit']);
        }
        header('Location: Buku.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Buku</title>
</head>
<body>
    <h1><?php echo $id_buku ? 'Edit' : 'Tambah'; ?> Buku</h1>
    <form method="post">
        <input type="hidden" name="id_buku" value="<?php echo $id_buku; ?>">
        <label>Judul Buku:</label>
        <input type="text" name="judul_buku" value="<?php echo $judul_buku; ?>" required><br>
        <label>Penulis:</label>
        <input type="text" name="penulis" value="<?php echo $penulis; ?>" required><br>
        <label>Tahun Terbit:</label>
        <input type="text" name="tahun_terbit" value="<?php echo $tahun_terbit; ?>" required><br>
        <input type="submit" value="Simpan">
    </form>
    <br>
    <a href="Buku.php">Kembali</a>
</body>
</html>