<?php
    include_once 'Model.php';
    $model = new Model();

    $id_peminjaman = '';
    $id_member = '';
    $id_buku = '';
    $tgl_pinjam = '';
    $tgl_kembali = '';

    if (isset($_GET['id'])) {
        $id_peminjaman = $_GET['id'];
        $loan = $model->getLoanById($id_peminjaman);
        if ($loan) {
            $id_member = $loan['id_member'];
            $id_buku = $loan['id_buku'];
            $tgl_pinjam = $loan['tgl_pinjam'];
            $tgl_kembali = $loan['tgl_kembali'];
        }
    }

    if ($_POST) {
        if ($id_peminjaman) {
            $model->updateLoan($_POST['id_peminjaman'], $_POST['id_member'], $_POST['id_buku'], $_POST['tgl_pinjam'], $_POST['tgl_kembali']);
        } else {
            $model->addLoan($_POST['id_member'], $_POST['id_buku'], $_POST['tgl_pinjam'], $_POST['tgl_kembali']);
        }
        header('Location: Peminjaman.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Peminjaman</title>
</head>
<body>
    <h1><?php echo $id_peminjaman ? 'Edit' : 'Tambah'; ?> Peminjaman</h1>
    <form method="post">
        <input type="hidden" name="id_peminjaman" value="<?php echo $id_peminjaman; ?>">
        <label>ID Member:</label>
        <input type="number" name="id_member" value="<?php echo $id_member; ?>" required><br>
        <label>ID Buku:</label>
        <input type="number" name="id_buku" value="<?php echo $id_buku; ?>" required><br>
        <label>Tanggal Pinjam:</label>
        <input type="date" name="tgl_pinjam" value="<?php echo $tgl_pinjam; ?>" required><br>
        <label>Tanggal Kembali:</label>
        <input type="date" name="tgl_kembali" value="<?php echo $tgl_kembali; ?>" required><br>
        <input type="submit" value="Simpan">
    </form>
    <br>
    <a href="Peminjaman.php">Kembali</a>
</body>
</html>