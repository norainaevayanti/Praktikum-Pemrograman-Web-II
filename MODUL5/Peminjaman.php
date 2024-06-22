<?php
include_once 'Model.php';
$model = new Model();
$loans = $model->getLoans();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Peminjaman</title>
</head>
<body>
    <h1>Data Peminjaman</h1>
    <table border="1">
        <tr>
            <th>ID Peminjaman</th>
            <th>ID Member</th>
            <th>ID Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($loans as $loan) { ?>
            <tr>
                <td><?php echo $loan['id_peminjaman']; ?></td>
                <td><?php echo $loan['id_member']; ?></td>
                <td><?php echo $loan['id_buku']; ?></td>
                <td><?php echo $loan['tgl_pinjam']; ?></td>
                <td><?php echo $loan['tgl_kembali']; ?></td>
                <td>
                    <a href="FormPeminjaman.php?id=<?php echo $loan['id_peminjaman']; ?>">Edit</a>
                    <a href="deletePeminjaman.php?id=<?php echo $loan['id_peminjaman']; ?>" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <a href="FormPeminjaman.php">Tambah Peminjaman</a>
</body>
</html>