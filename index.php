<?php
include 'config.php';

// Ambil semua data mata kuliah dari database
$result = $mysqli->query("SELECT * FROM mata_kuliah");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> <!-- Untuk icon -->
</head>
<body>
    <div class="container mt-5">
        <!-- Card untuk tampilan yang lebih menarik -->
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title">Daftar Mata Kuliah</h4>
            </div>
            <div class="card-body">
                <a href="tambah.php" class="btn btn-success mb-3">
                    <i class="fas fa-plus"></i> Tambah Mata Kuliah
                </a>
                <table class="table table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Kode MK</th>
                            <th>Nama MK</th>
                            <th>SKS</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Nomor urut dinamis -->
                        <?php $nomor_urut = 1; while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= $nomor_urut++; ?></td> <!-- Nomor urut dinamis -->
                                <td><?= $row['kode_mk']; ?></td>
                                <td><?= $row['nama_mk']; ?></td>
                                <td><?= $row['sks']; ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <!-- Tombol untuk memicu modal konfirmasi hapus -->
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $row['id']; ?>">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>

                                    <!-- Modal konfirmasi hapus -->
                                    <div class="modal fade" id="deleteModal<?= $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus mata kuliah <strong><?= $row['nama_mk']; ?></strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>