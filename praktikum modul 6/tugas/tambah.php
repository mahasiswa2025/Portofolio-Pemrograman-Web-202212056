<?php
include 'koneksi.php';

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitasi input teks
    $nama = trim($_POST['nama_produk']);
    $harga = isset($_POST['harga']) ? (int)$_POST['harga'] : 0;
    $stok = isset($_POST['stok']) ? (int)$_POST['stok'] : 0;

    // Validasi input
    if (empty($nama)) {
        $error = "Nama produk tidak boleh kosong!";
    } elseif ($harga < 0) {
        $error = "Harga produk tidak boleh negatif!";
    } elseif ($stok < 0) {
        $error = "Stok produk tidak boleh negatif!";
    } else {
        // Menggunakan Prepared Statement untuk menghindari SQL Injection dan error karakter khusus
        $stmt = $conn->prepare("INSERT INTO produk (nama_produk, harga, stok) VALUES (?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("sii", $nama, $harga, $stok);
            if ($stmt->execute()) {
                $stmt->close();
                $conn->close();
                header("Location: index.php");
                exit();
            } else {
                $error = "Gagal menyimpan produk: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $error = "Gagal mempersiapkan query: " . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - STITEK Store Admin</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f6f8fb 0%, #e9edf4 100%);
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
        }
        .navbar {
            background: rgba(255, 255, 255, 0.85) !important;
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
        }
        .navbar-brand {
            color: #1e293b !important;
            font-weight: 700;
            letter-spacing: -0.5px;
        }
        .navbar-brand i {
            background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .form-container {
            max-width: 580px;
            margin: 4rem auto;
        }
        .card-premium {
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(226, 232, 240, 0.8);
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.03);
            padding: 2.5rem;
        }
        .form-label {
            font-weight: 600;
            color: #334155;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }
        .form-control {
            border-radius: 10px;
            padding: 0.75rem 1rem;
            border: 1px solid #cbd5e1;
            font-size: 0.95rem;
            transition: all 0.25s ease;
            background-color: #fff;
        }
        .form-control:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
            outline: 0;
        }
        .input-group-text {
            border-radius: 10px 0 0 10px;
            border: 1px solid #cbd5e1;
            background-color: #f8fafc;
            color: #64748b;
            font-weight: 500;
        }
        .input-group > .form-control {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }
        .btn-premium-primary {
            background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
            border: none;
            color: white;
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.25s ease;
        }
        .btn-premium-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(79, 70, 229, 0.25);
            background: linear-gradient(135deg, #4338ca 0%, #2563eb 100%);
            color: white;
        }
        .btn-premium-secondary {
            background: #fff;
            border: 1px solid #e2e8f0;
            color: #475569;
            border-radius: 10px;
            padding: 0.5rem 1rem;
            font-weight: 600;
            font-size: 0.875rem;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
        }
        .btn-premium-secondary:hover {
            background: #f8fafc;
            color: #1e293b;
            border-color: #cbd5e1;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <i class="bi bi-shop-window fs-4 me-2"></i>
                <span class="fs-5">STITEK Store Admin</span>
            </a>
        </div>
    </nav>

    <!-- Form Container -->
    <div class="container">
        <div class="form-container">
            <div class="card-premium">
                <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-4">
                    <h2 class="h4 mb-0 text-dark fw-bold">Tambah Produk Baru</h2>
                    <a href="index.php" class="btn-premium-secondary text-decoration-none">
                        <i class="bi bi-arrow-left me-1.5"></i> Kembali
                    </a>
                </div>

                <?php if ($error !== null): ?>
                    <div class="alert alert-danger border-0 shadow-sm rounded-3 d-flex align-items-center" role="alert">
                        <i class="bi bi-exclamation-triangle-fill fs-5 me-3"></i>
                        <div><?php echo htmlspecialchars($error); ?></div>
                    </div>
                <?php endif; ?>

                <form action="tambah.php" method="POST" class="needs-validation" novalidate>
                    <!-- Nama Produk -->
                    <div class="mb-4">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" required 
                               placeholder="Masukkan nama produk lengkap (contoh: Laptop Asus ROG)">
                        <div class="invalid-feedback">
                            Silakan masukkan nama produk.
                        </div>
                    </div>
                    
                    <!-- Harga -->
                    <div class="mb-4">
                        <label for="harga" class="form-label">Harga Produk</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" id="harga" name="harga" required min="0" 
                                   placeholder="0">
                            <div class="invalid-feedback">
                                Silakan masukkan harga produk yang valid (minimal 0).
                            </div>
                        </div>
                    </div>

                    <!-- Stok -->
                    <div class="mb-4">
                        <label for="stok" class="form-label">Stok Awal</label>
                        <input type="number" class="form-control" id="stok" name="stok" required min="0" 
                               placeholder="0">
                        <div class="invalid-feedback">
                            Silakan masukkan jumlah stok produk yang valid (minimal 0).
                        </div>
                    </div>

                    <!-- Button Simpan -->
                    <div class="d-grid mt-4 pt-2">
                        <button type="submit" class="btn btn-premium-primary py-2.5">
                            <i class="bi bi-plus-circle me-2"></i> Simpan Produk
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS and Validation Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (() => {
            'use strict'
            const forms = document.querySelectorAll('.needs-validation')
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>
</html>
