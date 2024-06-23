<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<style>
    body {
        background-image: url('https://images.unsplash.com/photo-1661097410573-16d926ec1ec7?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size: cover;
        color: #ececec;
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

    .btn-success {
        background-color: #00bfa5;
        border: none;
    }

    .btn-success:hover {
        background-color: #008e76;
    }

    .btn-secondary {
        background-color: #000000;
        border: none;
    }

    .btn-secondary:hover {
        background-color: #333333;
    }

    .alert {
        background-color: rgba(255, 138, 101, 0.1);
        color: #ffab40;
        border: 1px solid #ffab40;
    }

    .form-control {
        background-color: #2e2e2e;
        color: #ececec;
        border: 1px solid #37474f;
    }

    .form-control::placeholder {
        color: #bdbdbd;
    }

    label {
        color: #ececec;
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h4>Edit</h4>
                </div>
                <div class="card-body">

                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('error'); ?>
                        </div>
                    <?php endif; ?>

                    <?= validation_list_errors() ?>

                    <?= form_open('buku/update/' . $post['id']); ?>
                    <input type="hidden" name="_method" value="PUT">

                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul" value="<?= $post['judul'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="penulis">Penulis</label>
                        <input type="text" class="form-control" id="penulis" name="penulis" placeholder="Masukkan Penulis" value="<?= $post['penulis'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="penerbit">Penerbit</label>
                        <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Masukkan Penerbit" value="<?= $post['penerbit'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="tahun_terbit">Tahun Terbit</label>
                        <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" placeholder="Masukkan Tahun Terbit" value="<?= $post['tahun_terbit'] ?>">
                    </div>
                    <div class="form-group text-right">
                        <button class="btn btn-success">Update</button>
                        <a href="<?= base_url('home') ?>" class="btn btn-secondary">Kembali</a>
                    </div>
                    <?= form_close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('extra-js') ?>
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-bs4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#post_content').summernote({
            tabsize: 2,
            height: 500
        });
    });
</script>
<?= $this->endSection() ?>
