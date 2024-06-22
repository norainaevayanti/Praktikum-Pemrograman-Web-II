<?php
    include_once 'Model.php';
    $model = new Model();

    $id_member = '';
    $nama_member = '';
    $nomor_member = '';
    $tgl_mendaftar = '';
    $tgl_terakhir_bayar = '';

    if (isset($_GET['id'])) {
        $id_member = $_GET['id'];
        $member = $model->getMemberById($id_member);
        if ($member) {
            $nama_member = $member['nama_member'];
            $nomor_member = $member['nomor_member'];
            $tgl_mendaftar = $member['tgl_mendaftar'];
            $tgl_terakhir_bayar = $member['tgl_terakhir_bayar'];
        }
    }

    if ($_POST) {
        if ($id_member) {
            $model->updateMember($_POST['id_member'], $_POST['nama_member'], $_POST['nomor_member'], $_POST['tgl_mendaftar'], $_POST['tgl_terakhir_bayar']);
        } else {
            $model->addMember($_POST['nama_member'], $_POST['nomor_member'], $_POST['tgl_mendaftar'], $_POST['tgl_terakhir_bayar']);
        }
        header('Location: Member.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Member</title>
</head>
<body>
    <h1><?php echo $id_member ? 'Edit' : 'Tambah'; ?> Member</h1>
    <form method="post">
        <input type="hidden" name="id_member" value="<?php echo $id_member; ?>">
        <label>Nama Member:</label>
        <input type="text" name="nama_member" value="<?php echo $nama_member; ?>" required><br>
        <label>Nomor Member:</label>
        <input type="text" name="nomor_member" value="<?php echo $nomor_member; ?>" required><br>
        <label>Tanggal Mendaftar:</label>
        <input type="date" name="tgl_mendaftar" value="<?php echo $tgl_mendaftar; ?>" required><br>
        <label>Tanggal Terakhir Bayar:</label>
        <input type="date" name="tgl_terakhir_bayar" value="<?php echo $tgl_terakhir_bayar; ?>" required><br>
        <input type="submit" value="Simpan">
    </form>
    <br>
    <a href="Member.php">Kembali</a>
</body>
</html>