<style>
    /* Global Styles */
    body {
        font-family: Arial, sans-serif;
        background-color: #f7f7f7;
    }

    /* Navbar */
    .navbar {
        background-color: #f8f9fa;
        padding: 1rem;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* Card Styling */
    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        overflow: hidden;
        transition: transform 0.2s, box-shadow 0.2s;
        background-color: #ffffff;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }
    .card-header {
        background-color: #76b7b2;
        color: #ffffff;
        padding: 0.8rem;
        text-align: center;
        font-weight: bold;
    }

    /* Button Styling */
    .btn-custom {
        background: linear-gradient(135deg, #5D9C92, #A7C4BC);
        color: #fff;
        font-weight: bold;
        border-radius: 25px;
        padding: 0.6rem 1.2rem;
        transition: background-color 0.2s;
    }
    .btn-custom:hover {
        background: linear-gradient(135deg, #4b817a, #96b1a6);
    }

    /* Responsive Adjustments */
    .d-flex {
        flex-wrap: wrap;
        gap: 10px;
    }
    .col-sm-4 {
        flex: 1 1 calc(33.333% - 20px);
        max-width: calc(33.333% - 20px);
    }
    @media (max-width: 768px) {
        .col-sm-4 {
            flex: 1 1 calc(50% - 20px);
            max-width: calc(50% - 20px);
        }
    }
    @media (max-width: 576px) {
        .col-sm-4 {
            flex: 1 1 100%;
            max-width: 100%;
        }
    }
</style>

<!-- Dashboard Layout -->

<!-- Search & Add Section -->
<div class="d-flex flex-wrap justify-content-between my-3">
    <nav class="navbar navbar-expand-lg navbar-light">
        <form action="index.php" method="GET" class="form-inline d-flex">
            <input class="form-control me-2" type="search" autocomplete="off" name="key-search" placeholder="Cari.." />
            <button class="btn btn-custom mx-2" name="search">Search</button>
        </form>
    </nav>

    <?php if (isset($_SESSION["akun-admin"])) { ?>
        <nav class="navbar">
            <a class="btn btn-custom fw-bold mx-2" href="tambah.php">+ Tambah Menu Masakan</a>
        </nav>
    <?php } ?>
</div>

<!-- Order Form -->
<form action="index.php" method="POST" class="my-3">
    <div class="d-flex">
        <input class="form-control mx-2 my-2 w-auto" type="text" name="pelanggan" placeholder="Nama & Meja Pelanggan" required autocomplete="off" />
        <button class="btn btn-custom my-2 mx-2" name="pesan">Pesan</button>
    </div>

    <!-- Menu Cards -->
    <div class="row">
        <?php 
        $i = 1;
        foreach ($menu as $m) { ?>
            <div class="col-sm-4 mx-auto my-3">
                <div class="card">
                    <h5 class="card-header"><?= $m["nama"]; ?></h5>
                    <div class="card-body text-center">
                        <p><img class="rounded" src="src/img/<?= $m["gambar"]; ?>" width="150"></p>
                        <input type="hidden" name="kode_menu<?= $i; ?>" value="<?= $m["kode_menu"]; ?>" />
                        <table class="table table-borderless mt-3">
                            <tr>
                                <td><strong>Harga</strong></td>
                                <td>: Rp<?= $m["harga"]; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Kategori</strong></td>
                                <td>: <?= $m["kategori"]; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Status</strong></td>
                                <td>: <?= $m["status"]; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Qty</strong></td>
                                <td><input class="form-control" min="0" type="number" name="qty<?= $i; ?>" style="width: 80px;"/></td>
                            </tr>
                        </table>

                        <!-- Admin Only Actions -->
                        <?php if (isset($_SESSION["akun-admin"])) { ?>
                            <p class="mt-2">
                                <a class="btn btn-warning" title="Edit" href="edit.php?id_menu=<?= $m["id_menu"]; ?>">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <a class="btn btn-danger" title="Hapus" href="hapus.php?id_menu=<?= $m["id_menu"]; ?>" onclick="return confirm('Ingin Menghapus Menu?')">
                                    <i class="bi bi-trash3-fill"></i>
                                </a>
                            </p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php $i++; } ?>
    </div>
</form>
