<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- displays site properly based on user's device -->

    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png" />

    <link rel="stylesheet" href="/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <title>Prediksi Penyakit</title>
</head>

<body>
    <main>

        <!-- Sidebar -->
        <div class="sidebar">
            <div class="step">
                <input class="stepRadio" step="1" value="1" type="radio" name="step" checked />
                <div class="stepNumber">1</div>
                <div class="stepCaption">Step 1</div>
                <div class="stepName">Data Diri</div>
            </div>
            <div class="step">
                <input class="stepRadio" step="2" value="2" type="radio" name="step" />
                <div class="stepNumber">2</div>
                <div class="stepCaption">Step 2</div>
                <div class="stepName">Gejala Dasar</div>
            </div>
            <div class="step">
                <input class="stepRadio" step="3" value="3" type="radio" name="step" />
                <div class="stepNumber">3</div>
                <div class="stepCaption">Step 3</div>
                <div class="stepName">Gejala Spesifik</div>
            </div>
            <div class="step">
                <input class="stepRadio" step="4" value="4" type="radio" name="step" />
                <div class="stepNumber">4</div>
                <div class="stepCaption">Step 4</div>
                <div class="stepName">Hasil Analisis Penyakit</div>
            </div>
        </div>
        <!-- colse sidebar -->


        <!-- Form -->
        <div class="form">



            <div class="formStep thanks">
                <div class="card shadow-lg border-0">
                    <div class="card-body mb-5">
                        <div class="text-center mb-4">
                            <span class="bg-success text-white rounded-circle p-3 fs-3">
                                <i class="bi bi-check-circle-fill"></i>
                            </span>
                            <h2 class="mt-3">Hasil Analisis Penyakit</h2>
                        </div>

                        @if (isset($hasil) && isset($diagnosa))
                            <div class="mb-4">
                                <h5 class="text-primary">Informasi Pasien</h5>
                                <ul class="list-group list-group-flush mb-3">
                                    <li class="list-group-item"><strong>Nama</strong> {{ $diagnosa['nama_pasien'] }}
                                    </li>
                                    <li class="list-group-item"><strong>Usia</strong> {{ $diagnosa['usia'] }} tahun
                                    </li>
                                    <li class="list-group-item"><strong>Jenis Kelamin</strong>
                                        {{ $diagnosa['jenis_kelamin'] }}</li>
                                </ul>
                            </div>

                            <div class="mb-4">
                                <h5 class="text-primary">Persentase Kemungkinan Penyakit</h5>
                                <ul class="list-group">
                                    @foreach ($hasil as $penyakit => $persen)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            {{ $penyakit }}
                                            <span
                                                class="badge bg-info text-dark rounded-pill">{{ $persen }}%</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="alert alert-warning mt-4 text-center">
                                <strong>Penyakit Tertinggi:</strong>
                                <span class="text-danger">{{ $diagnosa['hasil_penyakit'] }}</span>
                                dengan kemungkinan
                                <span class="badge bg-danger text-white">{{ $diagnosa['persentase'] }}%</span>
                            </div>
                            @if ($penyakitUtama)
                                <div class="mt-4">
                                    <h5 class="text-primary">Informasi Penyakit {{ $penyakitUtama->nama }}</h5>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <strong>Deskripsi</strong><br>{{ $penyakitUtama->deskripsi }}</li>
                                        <li class="list-group-item"><strong>Pertolongan
                                                Pertama</strong><br>{{ $penyakitUtama->pertolongan_pertama }}</li>
                                        <li class="list-group-item"><strong>Saran
                                                Lanjut</strong><br>{{ $penyakitUtama->saran_lanjut }}</li>
                                    </ul>
                                </div>
                            @endif
                        @else
                            <div class="alert alert-secondary">
                                Belum ada analisis. Silakan isi form terlebih dahulu.
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="stepButtons ">
                <div class="button submit mt-2" id="submit-button" onclick="handleFinishClick()">
                    Selesai <i class="bi bi-check-circle-fill"></i>
                </div>

            </div>

        </div>

    </main>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
</script>
<script>
    function handleFinishClick() {
        // Arahkan ke halaman sebelumnya dan refresh
        if (document.referrer) {
            window.location.href = document.referrer;
        } else {
            window.location.reload(); // fallback jika tidak ada referrer
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        const btn = document.getElementById("submit-button");
        if (btn) {
            btn.classList.remove("submit"); // hilangkan class yang menyebabkan ::before
            btn.innerHTML = 'Selesai <i class="bi bi-check-circle-fill"></i>';
            btn.addEventListener("click", handleFinishClick); // tambahkan event listener
        }
    });
</script>






</html>
