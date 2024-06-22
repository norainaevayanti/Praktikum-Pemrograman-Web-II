<?php
include_once 'Model.php';
$model = new Model();
$books = $model->getBooks();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Buku</title>
</head>
<body>
    <h1>Data Buku</h1>
    <table border="1">
        <tr>
            <th>ID Buku</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Tahun Terbit</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($books as $book) { ?>
            <tr>
                <td><?php echo $book['id_buku']; ?></td>
                <td><?php echo $book['judul_buku']; ?></td>
                <td><?php echo $book['penulis']; ?></td>
                <td><?php echo $book['tahun_terbit']; ?></td>
                <td>
                    <a href="FormBuku.php?id=<?php echo $book['id_buku']; ?>">Edit</a>
                    <a href="deleteBuku.php?id=<?php echo $book['id_buku']; ?>" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <a href="FormBuku.php">Tambah Buku</a>
</body>
</html>