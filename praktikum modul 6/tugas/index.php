<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Produk - STITEK Store Admin</title>
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
        .stat-card {
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(226, 232, 240, 0.8);
            border-radius: 14px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.02);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.04);
        }
        .table-container {
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(226, 232, 240, 0.8);
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.03);
            padding: 2rem;
        }
        .table > :not(caption) > * > * {
            padding: 1.1rem 1rem;
            border-bottom-color: #f1f5f9;
        }
        .table-hover tbody tr:hover {
            background-color: #f8fafc;
        }
        .btn-premium-primary {
            background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
            border: none;
            color: white;
            border-radius: 10px;
            padding: 0.65rem 1.25rem;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.25s ease;
        }
        .btn-premium-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(79, 70, 229, 0.25);
            background: linear-gradient(135deg, #4338ca 0%, #2563eb 100%);
            color: white;
        }
        .btn-action-edit {
            border: 1px solid #e2e8f0;
            background: #fff;
            color: #4f46e5;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.2s ease;
        }
        .btn-action-edit:hover {
            background: #4f46e5;
            color: #fff;
            border-color: #4f46e5;
        }
        .btn-action-delete {
            border: 1px solid #e2e8f0;
            background: #fff;
            color: #ef4444;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.2s ease;
        }
        .btn-action-delete:hover {
            background: #ef4444;
            color: #fff;
            border-color: #ef4444;
        }
        .badge-habis {
            background-color: #fee2e2;
            color: #ef4444;
            font-weight: 600;
            border: 1px solid #fecaca;
        }
        .badge-menipis {
            background-color: #fef3c7;
            color: #d97706;
            font-weight: 600;
            border: 1px solid #fde68a;
        }
        .badge-tersedia {
            background-color: #dcfce7;
            color: #16a34a;
            font-weight: 600;
            border: 1px solid #bbf7d0;
        }
    </style>
</head>
<body>
    <?php
    include 'koneksi.php';

    // Ambil data untuk statistik dashboard
    $total_produk = 0;
    $total_stok = 0;
    $produk_habis = 0;

    $stat_res = $conn->query("SELECT COUNT(*) as count_p, SUM(stok) as sum_s FROM produk");
    if ($stat_res) {
        $stat_row = $stat_res->fetch_assoc();
        $total_produk = (int)$stat_row['count_p'];
        $total_stok = isset($stat_row['sum_s']) ? (int)$stat_row['sum_s'] : 0;
    }

    $habis_res = $conn->query("SELECT COUNT(*) as count_h FROM produk WHERE stok <= 0");
    if ($habis_res) {
        $habis_row = $habis_res->fetch_assoc();
        $produk_habis = (int)$habis_row['count_h'];
    }
    ?>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <i class="bi bi-shop-window fs-4 me-2"></i>
                <span class="fs-5">STITEK Store Admin</span>
            </a>
        </div>
    </nav>

    <div class="container py-5">
        <!-- Statistik Dashboard -->
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="stat-card p-4 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted d-block mb-1 fw-medium small">Total Jenis Produk</span>
                        <h3 class="fw-bold text-dark mb-0"><?php echo $total_produk; ?></h3>
                    </div>
                    <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-3">
                        <i class="bi bi-box-seam fs-3"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card p-4 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted d-block mb-1 fw-medium small">Total Jumlah Stok</span>
                        <h3 class="fw-bold text-dark mb-0"><?php echo number_format($total_stok, 0, ',', '.'); ?></h3>
                    </div>
                    <div class="bg-success bg-opacity-10 text-success rounded-3 p-3">
                        <i class="bi bi-layers fs-3"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card p-4 d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted d-block mb-1 fw-medium small">Produk Stok Habis</span>
                        <h3 class="fw-bold text-dark mb-0"><?php echo $produk_habis; ?></h3>
                    </div>
                    <div class="<?php echo $produk_habis > 0 ? 'bg-danger bg-opacity-10 text-danger' : 'bg-secondary bg-opacity-10 text-secondary'; ?> rounded-3 p-3">
                        <i class="bi bi-exclamation-octagon fs-3"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Produk -->
        <div class="table-container">
            <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
                <div>
                    <h2 class="h4 mb-0 text-dark fw-bold">Daftar Produk</h2>
                    <span class="text-muted small">Kelola ketersediaan produk toko online Anda</span>
                </div>
                <a href="tambah.php" class="btn btn-premium-primary text-decoration-none">
                    <i class="bi bi-plus-lg me-1.5"></i> Tambah Produk Baru
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr class="text-secondary fw-semibold bg-light">
                            <th scope="col" class="text-center" style="width: 8%">ID</th>
                            <th scope="col" style="width: 37%">Nama Produk</th>
                            <th scope="col" class="text-end" style="width: 20%">Harga</th>
                            <th scope="col" class="text-center" style="width: 15%">Stok</th>
                            <th scope="col" class="text-center" style="width: 20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $sql = "SELECT id_produk, nama_produk, harga, stok FROM produk ORDER BY id_produk DESC"; 
                        $result = $conn->query($sql); 
              
                        if ($result && $result->num_rows > 0) { 
                            while ($row = $result->fetch_assoc()) { 
                                $stok = (int)$row['stok'];
                                if ($stok <= 0) {
                                    $stokBadge = "<span class='badge badge-habis rounded-pill px-3 py-1.5'>Habis</span>";
                                } elseif ($stok < 10) {
                                    $stokBadge = "<span class='badge badge-menipis rounded-pill px-3 py-1.5'>$stok (Menipis)</span>";
                                } else {
                                    $stokBadge = "<span class='badge badge-tersedia rounded-pill px-3 py-1.5'>$stok Unit</span>";
                                }

                                echo "<tr>"; 
                                echo "<td class='text-center fw-medium text-secondary'>#" . $row["id_produk"] . "</td>"; 
                                echo "<td class='fw-semibold text-dark'>" . htmlspecialchars($row["nama_produk"]) . "</td>"; 
                                echo "<td class='text-end fw-bold text-dark'>Rp " . number_format($row["harga"], 0, ',', '.') . "</td>"; 
                                echo "<td class='text-center'>$stokBadge</td>"; 
                                echo "<td class='text-center'>";
                                echo '<a href="edit.php?id=' . $row['id_produk'] . '" class="btn btn-sm btn-action-edit px-2.5 py-1.5 me-2"><i class="bi bi-pencil me-1"></i> Edit</a>';
                                echo '<a href="hapus.php?id=' . $row['id_produk'] . '" onclick="return confirm(\'Apakah Anda yakin ingin menghapus produk ini? Tindakan ini tidak dapat dibatalkan.\')" class="btn btn-sm btn-action-delete px-2.5 py-1.5"><i class="bi bi-trash me-1"></i> Hapus</a>';
                                echo "</td>"; 
                                echo "</tr>"; 
                            } 
                        } else { 
                            echo "<tr><td colspan='5' class='text-center py-5 text-muted'>";
                            echo "<div class='py-4'>";
                            echo "<i class='bi bi-inbox fs-1 d-block mb-3 text-secondary bg-opacity-10 bg-secondary rounded-circle p-3 mx-auto' style='width: max-content;'></i>";
                            echo "<h5 class='fw-bold text-dark'>Belum Ada Produk</h5>";
                            echo "<p class='small text-muted'>Tambahkan produk pertama Anda untuk melihat daftarnya di sini.</p>";
                            echo "<a href='tambah.php' class='btn btn-sm btn-premium-primary mt-2'><i class='bi bi-plus-lg me-1'></i> Tambah Sekarang</a>";
                            echo "</div>";
                            echo "</td></tr>"; 
                        } 
                        $conn->close(); 
                        ?> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
