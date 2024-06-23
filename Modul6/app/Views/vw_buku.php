<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<style>
    body,
    html {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        height: 100%;
        display: flex;
        flex-direction: column;
        background-color: #121212;
        color: #ececec;
        position: relative;
        overflow: hidden;
    }

    body::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('https://images.unsplash.com/photo-1661097410573-16d926ec1ec7?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
        background-size: cover;
        background-position: center;
        opacity: 0.1;
        z-index: 1;
    }

    .navbar {
        z-index: 2;
        position: relative;
    }

    .container,
    .card {
        z-index: 2;
        position: relative;
    }

    .navbar {
        background-color: #1f1f1f !important;
        border-bottom: 1px solid #37474f;
    }

    .navbar-brand,
    .nav-link {
        color: #00bfa5 !important;
    }

    .card {
        background: #1f1f1f;
        color: #ececec;
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        border-radius: 10px;
    }

    .card-header {
        background-color: #00bfa5;
        border-bottom: 1px solid #37474f;
    }

    .btn {
        background-color: #00bfa5;
        color: white;
        border: none;
    }

    .btn:hover {
        background-color: #008e76;
    }

    .table thead {
        background-color: #37474f;
    }

    .table th,
    .table td {
        border: 1px solid #37474f;
        color: #fff; /* Change table headers and content text color to white */
    }

    .pagination li a {
        background-color: #1f1f1f !important;
        color: #00bfa5 !important;
        border: 1px solid #00bfa5 !important;
    }

    .pagination li a:hover {
        background-color: #00bfa5 !important;
        color: #1f1f1f !important;
    }

    .alert {
        background-color: rgba(255, 138, 101, 0.1);
        color: #ffab40;
        border: 1px solid #ffab40;
    }
</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('/') ?>">My Library</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <?php if (session()->get('logged_in')) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Welcome, <?= session()->get('username'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('login/logout'); ?>">Logout</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('login'); ?>">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('register'); ?>">Register</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h5 class="mb-0">List Buku</h5>
                    <a href="<?= base_url('buku/create'); ?>" class="btn btn-sm float-right">Tambah Data</a>
                </div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success">
                            <?= session()->getFlashdata('success'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('error'); ?>
                        </div>
                    <?php endif; ?>

                    <table class="table table-bordered table-striped table-hover">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">Judul</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">Penerbit</th>
                                <th scope="col">Tahun Terbit</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($posts) && is_array($posts)) : ?>
                                <?php foreach ($posts as $row) : ?>
                                    <tr>
                                        <td><?= $row['judul']; ?></td>
                                        <td><?= $row['penulis']; ?></td>
                                        <td><?= $row['penerbit']; ?></td>
                                        <td><?= $row['tahun_terbit']; ?></td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="<?= base_url('buku/delete/' . $row['id']); ?>" method="POST">
                                                <input type="hidden" name="{csrf_token}" value="{csrf_hash}">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <a href="<?= base_url('buku/edit/' . $row['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="5" class="text-center">No post found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        <?= $pager->links(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('extra-js') ?>
<script>
    $(document).ready(function() {
        $('.pagination li').addClass('page-item');
        $('.pagination li a').addClass('page-link');
    });
</script>
<?= $this->endSection() ?>
