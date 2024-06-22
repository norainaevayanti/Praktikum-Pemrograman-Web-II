<?php
include_once 'Model.php';
$model = new Model();
$members = $model->getMembers();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Member</title>
</head>
<body>
    <h1>Data Member</h1>
    <table border="1">
        <tr>
            <th>ID Member</th>
            <th>Nama Member</th>
            <th>Nomor Member</th>
            <th>Tanggal Mendaftar</th>
            <th>Tanggal Terakhir Bayar</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($members as $member) { ?>
            <tr>
                <td><?php echo $member['id_member']; ?></td>
                <td><?php echo $member['nama_member']; ?></td>
                <td><?php echo $member['nomor_member']; ?></td>
                <td><?php echo $member['tgl_mendaftar']; ?></td>
                <td><?php echo $member['tgl_terakhir_bayar']; ?></td>
                <td>
                    <a href="FormMember.php?id=<?php echo $member['id_member']; ?>">Edit</a>
                    <a href="deleteMember.php?id=<?php echo $member['id_member']; ?>" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <a href="FormMember.php">Tambah Member</a>
</body>
</html>