<div class="row mb-4 align-items-center">
    <div class="col-md-6">
        <h4 class="fw-bold text-primary mb-0">Daftar Inventaris</h4>
        <p class="text-muted small mb-0">Kelola data barang masuk dan keluar</p>
    </div>
    <div class="col-md-6 text-md-end mt-3 mt-md-0">
        <?php if($_SESSION['role'] == 'admin'): ?>
            <a href="<?= BASEURL; ?>/item/create" class="btn btn-primary shadow-sm">
                + Tambah Data
            </a>
        <?php endif; ?>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-12">
        <div class="card border-0 shadow-sm p-3">
            <form action="<?= BASEURL; ?>/item" method="POST" class="d-flex w-100">
                <input type="text" name="keyword" class="form-control border-0 bg-light me-2" placeholder="Cari nama barang atau kategori..." autocomplete="off">
                <button type="submit" class="btn btn-success px-4">Cari</button>
                <button type="submit" name="reset" class="btn btn-secondary ms-2">Reset</button>
            </form>
        </div>
    </div>
</div>

<div class="table-container">
    <?php if(empty($data['items'])): ?>
        <div class="text-center py-5">
            <h5 class="text-muted">Data tidak ditemukan 😔</h5>
        </div>
    <?php else: ?>
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th class="py-3 ps-3 rounded-start">No</th>
                    <th class="py-3">Nama Barang</th>
                    <th class="py-3">Kategori</th>
                    <th class="py-3">Harga</th>
                    <th class="py-3">Stok</th>
                    <?php if($_SESSION['role'] == 'admin'): ?>
                        <th class="py-3 rounded-end text-center" width="150">Aksi</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 + (($data['page']-1) * 5); ?>
                <?php foreach($data['items'] as $item): ?>
                <tr>
                    <td class="ps-3 fw-bold text-muted"><?= $no++; ?></td>
                    <td>
                        <span class="fw-bold text-dark"><?= $item['name']; ?></span>
                    </td>
                    <td>
                        <span class="badge bg-light text-secondary border">
                            <?= $item['category']; ?>
                        </span>
                    </td>
                    <td class="fw-bold text-success">
                        Rp <?= number_format($item['price'], 0, ',', '.'); ?>
                    </td>
                    <td>
                        <?php if($item['stock'] < 10): ?>
                            <span class="text-danger fw-bold"><?= $item['stock']; ?> (Low)</span>
                        <?php else: ?>
                            <span class="text-dark"><?= $item['stock']; ?></span>
                        <?php endif; ?>
                    </td>
                    
                    <?php if($_SESSION['role'] == 'admin'): ?>
                    <td class="text-center">
                        <a href="<?= BASEURL; ?>/item/edit/<?= $item['id']; ?>" class="btn btn-sm btn-warning text-white me-1">
                            Edit
                        </a>
                        <a href="<?= BASEURL; ?>/item/delete/<?= $item['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                            Hapus
                        </a>
                    </td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<div class="d-flex justify-content-end mt-4">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <?php for($i=1; $i<=$data['pages']; $i++): ?>
                <li class="page-item <?= ($i == $data['page']) ? 'active' : ''; ?>">
                    <a class="page-link shadow-sm" href="<?= BASEURL; ?>/item?page=<?= $i; ?>">
                        <?= $i; ?>
                    </a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
</div>