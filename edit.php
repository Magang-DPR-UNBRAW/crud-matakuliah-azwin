<?php
include 'config.php';

$id = $_GET['id'];
$result = $mysqli->query("SELECT * FROM mata_kuliah WHERE id = $id");
$row = $result->fetch_assoc();


if (isset($_POST['submit'])) {
    $kode_mk = $_POST['kode_mk'];
    $nama_mk = $_POST['nama_mk'];
    $jenis_mk = $_POST['jenis_mk'];
    $sks = $_POST['sks'];


    $stmt = $mysqli->prepare("UPDATE mata_kuliah SET kode_mk=?, nama_mk=?, jenis_mk=?, sks=? WHERE id=?");
    $stmt->bind_param('sssii', $kode_mk, $nama_mk, $jenis_mk, $sks, $id);
    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-warning text-white">
                <h4 class="card-title">Edit Mata Kuliah</h4>
            </div>
            <div class="card-body">
                <!-- Form untuk mengedit data mata kuliah -->
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="kode_mk" class="form-label">Kode Mata Kuliah</label>
                        <input type="text" name="kode_mk" class="form-control" value="<?= $row['kode_mk']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_mk" class="form-label">Nama Mata Kuliah</label>
                        <input type="text" name="nama_mk" class="form-control" value="<?= $row['nama_mk']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_mk" class="form-label">Jenis Mata Kuliah</label>
                        <select name="jenis_mk" class="form-control" id="jenis_mk" required>
                            <option value="Umum" <?php if ($row['jenis_mk'] == 'Umum')
                                echo 'selected'; ?>>Umum</option>
                            <option value="Khusus" <?php if ($row['jenis_mk'] == 'Khusus')
                                echo 'selected'; ?>>Khusus
                            </option>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="sks" class="form-label">SKS</label>
                        <input type="number" name="sks" class="form-control" value="<?= $row['sks']; ?>" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                    <a href="index.php" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>