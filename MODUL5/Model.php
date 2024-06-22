<?php
include_once 'Koneksi.php';

class Model {
    private $conn;

    public function __construct() {
        $database = new Koneksi();
        $this->conn = $database->getConnection();
    }

    private function executeQuery($query, $params = []) {
        $stmt = $this->conn->prepare($query);
        foreach ($params as $param => $value) {
            $stmt->bindValue($param, $value);
        }
        return $stmt->execute();
    }

    public function getMembers() {
        $query = "SELECT * FROM member";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addMember($nama_member, $nomor_member, $tgl_mendaftar, $tgl_terakhir_bayar) {
        $query = "INSERT INTO member (nama_member, nomor_member, tgl_mendaftar, tgl_terakhir_bayar) VALUES (:nama_member, :nomor_member, :tgl_mendaftar, :tgl_terakhir_bayar)";
        return $this->executeQuery($query, [
            ':nama_member' => $nama_member,
            ':nomor_member' => $nomor_member,
            ':tgl_mendaftar' => $tgl_mendaftar,
            ':tgl_terakhir_bayar' => $tgl_terakhir_bayar
        ]);
    }

    public function updateMember($id_member, $nama_member, $nomor_member, $tgl_mendaftar, $tgl_terakhir_bayar) {
        $query = "UPDATE member SET nama_member = :nama_member, nomor_member = :nomor_member, tgl_mendaftar = :tgl_mendaftar, tgl_terakhir_bayar = :tgl_terakhir_bayar WHERE id_member = :id_member";
        return $this->executeQuery($query, [
            ':id_member' => $id_member,
            ':nama_member' => $nama_member,
            ':nomor_member' => $nomor_member,
            ':tgl_mendaftar' => $tgl_mendaftar,
            ':tgl_terakhir_bayar' => $tgl_terakhir_bayar
        ]);
    }

    public function deleteMember($id_member) {
        $query = "DELETE FROM member WHERE id_member = :id_member";
        return $this->executeQuery($query, [':id_member' => $id_member]);
    }

    public function getBooks() {
        $query = "SELECT * FROM buku";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addBook($judul_buku, $penulis, $tahun_terbit) {
        $query = "INSERT INTO buku (judul_buku, penulis, tahun_terbit) VALUES (:judul_buku, :penulis, :tahun_terbit)";
        return $this->executeQuery($query, [
            ':judul_buku' => $judul_buku,
            ':penulis' => $penulis,
            ':tahun_terbit' => $tahun_terbit
        ]);
    }

    public function updateBook($id_buku, $judul_buku, $penulis, $tahun_terbit) {
        $query = "UPDATE buku SET judul_buku = :judul_buku, penulis = :penulis, tahun_terbit = :tahun_terbit WHERE id_buku = :id_buku";
        return $this->executeQuery($query, [
            ':id_buku' => $id_buku,
            ':judul_buku' => $judul_buku,
            ':penulis' => $penulis,
            ':tahun_terbit' => $tahun_terbit
        ]);
    }

    public function deleteBook($id_buku) {
        $query = "DELETE FROM buku WHERE id_buku = :id_buku";
        return $this->executeQuery($query, [':id_buku' => $id_buku]);
    }

    public function getLoans() {
        $query = "SELECT * FROM peminjaman";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addLoan($id_member, $id_buku, $tgl_pinjam, $tgl_kembali) {
        $query = "INSERT INTO peminjaman (id_member, id_buku, tgl_pinjam, tgl_kembali) VALUES (:id_member, :id_buku, :tgl_pinjam, :tgl_kembali)";
        return $this->executeQuery($query, [
            ':id_member' => $id_member,
            ':id_buku' => $id_buku,
            ':tgl_pinjam' => $tgl_pinjam,
            ':tgl_kembali' => $tgl_kembali
        ]);
    }

    public function updateLoan($id_peminjaman, $id_member, $id_buku, $tgl_pinjam, $tgl_kembali) {
        $query = "UPDATE peminjaman SET id_member = :id_member, id_buku = :id_buku, tgl_pinjam = :tgl_pinjam, tgl_kembali = :tgl_kembali WHERE id_peminjaman = :id_peminjaman";
        return $this->executeQuery($query, [
            ':id_peminjaman' => $id_peminjaman,
            ':id_member' => $id_member,
            ':id_buku' => $id_buku,
            ':tgl_pinjam' => $tgl_pinjam,
            ':tgl_kembali' => $tgl_kembali
        ]);
    }

    public function deleteLoan($id_peminjaman) {
        $query = "DELETE FROM peminjaman WHERE id_peminjaman = :id_peminjaman";
        return $this->executeQuery($query, [':id_peminjaman' => $id_peminjaman]);
    }
}
?>