<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="fw-bold text-primary mb-0">Tambah Barang Baru</h5>
                </div>
                <div class="card-body">
                    <form action="<?= BASEURL; ?>/item/store" method="POST">
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Barang</label>
                            <input type="text" name="name" class="form-control" placeholder="Contoh: Laptop Gaming" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Kategori</label>
                            <input type="text" name="category" class="form-control" placeholder="Contoh: Elektronik" required>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Harga</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" name="price" class="form-control" placeholder="0" required>
                                </div>
                                <small class="text-muted">Masukkan angka tanpa titik.</small>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Stok</label>
                                <input type="number" name="stock" class="form-control" placeholder="0" required>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-3">
                            <a href="<?= BASEURL; ?>/item" class="btn btn-secondary me-2">Kembali</a>
                            <button type="submit" class="btn btn-success px-4">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>