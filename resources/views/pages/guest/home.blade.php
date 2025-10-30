<!DOCTYPE html>
<html>
<head>
    <title>Guest - Monitoring Proyek</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #f8fafc 0%, #c9e7fa 50%, #f6d6e1 100%);
            font-family: 'Segoe UI', Arial, sans-serif;
            padding: 0;
            margin: 0;
        }
        .glass {
            background: rgba(255,255,255,0.7);
            border-radius: 18px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.18);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255,255,255,0.3);
            margin-bottom: 32px;
            animation: fadeInUp 1s;
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(40px);}
            to { opacity: 1; transform: translateY(0);}
        }
        .section-title {
            font-weight: 700;
            font-size: 2rem;
            color: #5a189a;
            letter-spacing: 1px;
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .info-label {
            font-weight: 600;
            color: #4361ee;
        }
        .table {
            background: rgba(255,255,255,0.85);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(44,62,80,0.07);
        }
        th {
            background: #e0bbf7 !important;
            color: #5a189a;
        }
        img {
            max-width: 320px; /* sebelumnya 180px */
            margin: 8px 0;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(90,24,154,0.10);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        img:hover {
            transform: scale(1.07) rotate(-2deg);
            box-shadow: 0 6px 24px rgba(90,24,154,0.18);
        }
        .icon-circle {
            background: linear-gradient(135deg, #b8c0ff 0%, #f7b2ff 100%);
            color: #fff;
            border-radius: 50%;
            padding: 12px;
            font-size: 1.5rem;
            box-shadow: 0 2px 8px rgba(90,24,154,0.10);
        }
        .gradient-bar {
            height: 6px;
            border-radius: 3px;
            background: linear-gradient(90deg, #4361ee 0%, #b8c0ff 50%, #f7b2ff 100%);
            margin-bottom: 24px;
            animation: gradientMove 2s infinite alternate;
        }
        @keyframes gradientMove {
            0% { background-position: 0%;}
            100% { background-position: 100%;}
        }
        .card {
            border: none;
            background: transparent;
        }
        .navbar {
            background: rgba(255,255,255,0.85);
            box-shadow: 0 2px 12px rgba(90,24,154,0.08);
            backdrop-filter: blur(6px);
        }
        .navbar-brand {
            font-weight: bold;
            color: #5a189a !important;
            letter-spacing: 2px;
            font-size: 1.4rem;
        }
        .footer {
            text-align: center;
            color: #8d99ae;
            margin-top: 40px;
            margin-bottom: 16px;
            font-size: 1rem;
        }
        @media (max-width: 768px) {
            .section-title { font-size: 1.3rem; }
            img { max-width: 180px; } /* sebelumnya 100px */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg mb-4">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="bi bi-bar-chart-steps"></i> Monitoring Proyek</a>
        </div>
    </nav>
    <div class="container py-3">
        <div class="gradient-bar"></div>
        <div class="glass p-4">
            <div class="section-title"><span class="icon-circle"><i class="bi bi-building"></i></span> Data Proyek</div>
            <div class="row align-items-center">
                <div class="col-md-8">
                    <p><span class="info-label">Kode Proyek:</span> {{ $proyek['kode_proyek'] }}</p>
                    <p><span class="info-label">Nama Proyek:</span> {{ $proyek['nama_proyek'] }}</p>
                    <p><span class="info-label">Tahun:</span> {{ $proyek['tahun'] }}</p>
                    <p><span class="info-label">Lokasi:</span> {{ $proyek['lokasi'] }}</p>
                    <p><span class="info-label">Anggaran:</span> <span class="badge bg-gradient" style="background:linear-gradient(90deg,#b8c0ff,#f7b2ff);color:#5a189a;">Rp {{ number_format($proyek['anggaran'],0,',','.') }}</span></p>
                    <p><span class="info-label">Sumber Dana:</span> {{ $proyek['sumber_dana'] }}</p>
                    <p><span class="info-label">Deskripsi:</span> {{ $proyek['deskripsi'] }}</p>
                </div>
                <div class="col-md-4 text-center">
                    <span class="info-label">Dokumen Proyek:</span><br>
                    <img src="{{ asset($proyek['dokumen']) }}" alt="Dokumen Proyek">
                </div>
            </div>
        </div>

        <div class="glass p-4">
            <div class="section-title"><span class="icon-circle"><i class="bi bi-list-task"></i></span> Tahapan Proyek</div>
            <div class="table-responsive">
                <table class="table table-bordered align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Nama Tahap</th>
                            <th>Target %</th>
                            <th>Tgl Mulai</th>
                            <th>Tgl Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tahapan_proyek as $tahap)
                        <tr>
                            <td>{{ $tahap['nama_tahap'] }}</td>
                            <td>
                                <span class="badge rounded-pill" style="background:linear-gradient(90deg,#f7b2ff,#b8c0ff);color:#5a189a;">
                                    {{ $tahap['target_persen'] }}%
                                </span>
                            </td>
                            <td>{{ $tahap['tgl_mulai'] }}</td>
                            <td>{{ $tahap['tgl_selesai'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="glass p-4">
            <div class="section-title"><span class="icon-circle"><i class="bi bi-graph-up-arrow"></i></span> Progres Proyek</div>
            <div class="table-responsive">
                <table class="table table-bordered align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Persen Real</th>
                            <th>Tanggal</th>
                            <th>Catatan</th>
                            <th>Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($progres_proyek as $progres)
                        <tr>
                            <td>
                                <span class="badge rounded-pill" style="background:linear-gradient(90deg,#b8c0ff,#f7b2ff);color:#5a189a;">
                                    {{ $progres['persen_real'] }}%
                                </span>
                            </td>
                            <td>{{ $progres['tanggal'] }}</td>
                            <td>{{ $progres['catatan'] }}</td>
                            <td><img src="{{ asset($progres['foto']) }}" alt="Foto Progres"></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="glass p-4">
            <div class="section-title"><span class="icon-circle"><i class="bi bi-geo-alt"></i></span> Lokasi Proyek</div>
            <div class="row align-items-center">
                <div class="col-md-8">
                    <p><span class="info-label">Latitude:</span> {{ $lokasi_proyek['lat'] }}</p>
                    <p><span class="info-label">Longitude:</span> {{ $lokasi_proyek['lng'] }}</p>
                    <p><span class="info-label">GeoJSON:</span> {{ $lokasi_proyek['geojson'] }}</p>
                </div>
                <div class="col-md-4 text-center">
                    <span class="info-label">Peta:</span><br>
                    <img src="{{ asset($lokasi_proyek['peta']) }}" alt="Peta Lokasi">
                </div>
            </div>
        </div>

        <div class="glass p-4">
            <div class="section-title"><span class="icon-circle"><i class="bi bi-person-badge"></i></span> Kontraktor</div>
            <p><span class="info-label">Nama:</span> {{ $kontraktor['nama'] }}</p>
            <p><span class="info-label">Penanggung Jawab:</span> {{ $kontraktor['penanggung_jawab'] }}</p>
            <p><span class="info-label">Kontak:</span> {{ $kontraktor['kontak'] }}</p>
            <p><span class="info-label">Alamat:</span> {{ $kontraktor['alamat'] }}</p>
        </div>
        <div class="gradient-bar"></div>
        <div class="footer">
            <i class="bi bi-c-circle"></i> {{ date('Y') }} Monitoring Proyek | Design by <span style="color:#5a189a;font-weight:600;">WanRania</span>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
