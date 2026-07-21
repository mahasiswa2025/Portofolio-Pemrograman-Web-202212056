<?php
// Inisialisasi variabel untuk menampung input dan status
$nama = "";
$email = "";
$pesan = "";
$errors = [];
$success = false;

// Memproses data jika form dikirimkan via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil dan membersihkan spasi di awal/akhir input
    $nama = isset($_POST['nama']) ? trim($_POST['nama']) : "";
    $email = isset($_POST['email']) ? trim($_POST['email']) : "";
    $pesan = isset($_POST['pesan']) ? trim($_POST['pesan']) : "";

    // Validasi input Nama Lengkap
    if (empty($nama)) {
        $errors['nama'] = "Nama Lengkap wajib diisi.";
    }

    // Validasi input Email
    if (empty($email)) {
        $errors['email'] = "Alamat Email wajib diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Format Alamat Email tidak valid.";
    }

    // Validasi input Pesan
    if (empty($pesan)) {
        $errors['pesan'] = "Pesan atau komentar wajib diisi.";
    }

    // Jika tidak ada error, proses berhasil
    if (empty($errors)) {
        $success = true;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu Digital STITEK Bontang</title>
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* Reset dan styling dasar */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: #f3f4f6;
            background-image: 
                radial-gradient(at 0% 0%, hsla(253,16%,7%,0) 0, transparent 50%), 
                radial-gradient(at 50% 0%, hsla(225,39%,30%,0.08) 0, transparent 50%), 
                radial-gradient(at 100% 0%, hsla(339,49%,30%,0.05) 0, transparent 50%);
            min-height: 100vh;
            color: #1f2937;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        /* Container utama */
        .container {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
        }

        /* Header Card */
        header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        header h1 {
            font-size: 2.25rem;
            font-weight: 800;
            background: linear-gradient(135deg, #1e40af, #0891b2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
        }

        header p {
            color: #4b5563;
            font-size: 1rem;
            font-weight: 500;
        }

        /* Grid Layout */
        .layout-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        @media (min-width: 768px) {
            .layout-grid {
                grid-template-columns: 1.2fr 1fr;
            }
        }

        /* Card Styling */
        .card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.05);
            border: 1px solid #e5e7eb;
            padding: 2rem;
            transition: transform 0.3s ease;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1e3a8a;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            border-bottom: 2px solid #f3f4f6;
            padding-bottom: 0.75rem;
        }

        /* Form Controls */
        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-group label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background-color: #f9fafb;
            color: #1f2937;
            transition: all 0.2s ease;
            outline: none;
        }

        .form-control:focus {
            border-color: #3b82f6;
            background-color: #fff;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        /* Validation Alerts */
        .error-message {
            color: #dc2626;
            font-size: 0.825rem;
            margin-top: 0.35rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            font-weight: 500;
            display: flex;
            align-items: flex-start;
            gap: 0.50rem;
        }

        .alert-error {
            background-color: #fef2f2;
            color: #991b1b;
            border: 1px solid #fca5a5;
        }

        .alert-success {
            background-color: #f0fdf4;
            color: #166534;
            border: 1px solid #86efac;
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 0.85rem 1.5rem;
            font-size: 1rem;
            font-weight: 600;
            color: #ffffff;
            background: linear-gradient(135deg, #1d4ed8, #06b6d4);
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(29, 78, 216, 0.2), 0 2px 4px -1px rgba(6, 182, 212, 0.2);
        }

        .btn:hover {
            opacity: 0.95;
            transform: translateY(-1px);
            box-shadow: 0 10px 15px -3px rgba(29, 78, 216, 0.3), 0 4px 6px -2px rgba(6, 182, 212, 0.3);
        }

        .btn:active {
            transform: translateY(1px);
        }

        /* Tampilan Data/Hasil */
        .placeholder-box {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #9ca3af;
            padding: 4rem 1rem;
            border: 2px dashed #e5e7eb;
            border-radius: 12px;
        }

        .placeholder-box svg {
            width: 48px;
            height: 48px;
            margin-bottom: 1rem;
            stroke: #cbd5e1;
        }

        .result-box {
            animation: fadeIn 0.4s ease-out;
        }

        .result-header {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .badge {
            background-color: #dcfce7;
            color: #14532d;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            text-transform: uppercase;
        }

        .result-field {
            margin-bottom: 1.25rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #f3f4f6;
        }

        .result-label {
            font-size: 0.75rem;
            font-weight: 700;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.25rem;
        }

        .result-value {
            font-size: 1rem;
            color: #111827;
            word-break: break-word;
        }

        .result-value-pesan {
            background-color: #f9fafb;
            padding: 1rem;
            border-radius: 8px;
            border-left: 4px solid #3b82f6;
            white-space: pre-wrap;
            color: #374151;
            font-style: italic;
        }

        /* Footer */
        footer {
            margin-top: 3rem;
            text-align: center;
            color: #6b7280;
            font-size: 0.85rem;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

<div class="container">
    <header>
        <h1>Buku Tamu Digital</h1>
        <p>Program Studi Teknik Informatika - STITEK Bontang</p>
    </header>

    <div class="layout-grid">
        <!-- Kolom Form Input -->
        <div class="card">
            <div class="card-title">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                </svg>
                Isi Buku Tamu
            </div>

            <!-- Pesan Error Global jika ada validasi yang gagal -->
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($errors)): ?>
                <div class="alert alert-error">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                    <span>Pengiriman gagal. Silakan periksa kembali isian form Anda.</span>
                </div>
            <?php endif; ?>

            <!-- Pesan Sukses Global -->
            <?php if ($success): ?>
                <div class="alert alert-success">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Terima kasih! Pesan Anda telah berhasil dikirimkan.</span>
                </div>
            <?php endif; ?>

            <form method="POST" action="tugas_bukutamu.php" novalidate>
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama lengkap Anda" value="<?php echo htmlspecialchars($nama); ?>">
                    <?php if (isset($errors['nama'])): ?>
                        <div class="error-message">
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <?php echo $errors['nama']; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="nama@email.com" value="<?php echo htmlspecialchars($email); ?>">
                    <?php if (isset($errors['email'])): ?>
                        <div class="error-message">
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <?php echo $errors['email']; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="pesan">Pesan / Komentar</label>
                    <textarea id="pesan" name="pesan" class="form-control" placeholder="Tuliskan pesan atau kesan Anda di sini..."><?php echo htmlspecialchars($pesan); ?></textarea>
                    <?php if (isset($errors['pesan'])): ?>
                        <div class="error-message">
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <?php echo $errors['pesan']; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="margin-right: 0.5rem;" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                    </svg>
                    Kirim Pesan
                </button>
            </form>
        </div>

        <!-- Kolom Tampilan Data Kiriman -->
        <div class="card">
            <div class="card-title">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                </svg>
                Data Tamu Terbaru
            </div>

            <?php if ($success): ?>
                <div class="result-box">
                    <div class="result-header">
                        <h3 style="font-size: 1.1rem; font-weight:600; color:#111827;">Terkirim</h3>
                        <span class="badge">Baru Saja</span>
                    </div>

                    <div class="result-field">
                        <div class="result-label">Nama Lengkap</div>
                        <div class="result-value"><?php echo htmlspecialchars($nama); ?></div>
                    </div>

                    <div class="result-field">
                        <div class="result-label">Alamat Email</div>
                        <div class="result-value"><?php echo htmlspecialchars($email); ?></div>
                    </div>

                    <div class="result-field">
                        <div class="result-label">Pesan / Komentar</div>
                        <div class="result-value-pesan"><?php echo htmlspecialchars($pesan); ?></div>
                    </div>
                </div>
            <?php else: ?>
                <div class="placeholder-box">
                    <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </svg>
                    <p style="font-weight: 500;">Belum Ada Kiriman Data</p>
                    <p style="font-size: 0.85rem; margin-top: 0.25rem;">Isi form disamping untuk melihat data tamu yang terkirim secara dinamis di sini.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <footer>
        <p>Praktikum Pemrograman Web &copy; 2026 | Yudha Achmad M. (NIM: 202212056)</p>
    </footer>
</div>

</body>
</html>
