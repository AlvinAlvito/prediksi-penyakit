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
        @if ($errors->any())
            <div class="alert alert-danger p-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form style="display: flex; width: 100%;" action="{{ route('diagnosa.store') }}" method="POST">
            @csrf
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

                <!-- Step 1 -->
                <div class="formStep">
                    <h1 class="formTitle">Data Diri</h1>
                    <div class="formDescription">
                        Sihlakan Masukan Identitas Data Diri Anda.
                    </div>
                    <div class="formInputs mb-0">
                        <label for="name" class="inputLabel">Jenis Kelamin</label>
                        <div class="formInputs m-0">
                            <div class="radioOptions">
                                <div class="option">
                                    <input type="radio" name="jenis_kelamin" value="Pria" class="input-plan"
                                        checked />
                                    <span class="bg-primary text-light rounded-pill fs-5 px-2 py-1"><i
                                            class="bi bi-person-standing"></i></span>
                                    <div class="optionName">Pria</div>
                                </div>
                                <div class="option">
                                    <input type="radio" name="jenis_kelamin" value="Wanita" class="input-plan"
                                        value="advanced" />
                                    <span class="bg-danger-subtle text-danger rounded-pill fs-5 px-2 py-1"><i
                                            class="bi bi-person-standing-dress"></i></span>

                                    <div class="optionName">Wanita</div>
                                </div>
                            </div>
                        </div>

                        <div class="inputBlock" field="name">
                            <label for="nama_pasien" class="inputLabel">Nama</label>
                            <label for="nama_pasien" class="inputMessage"></label>
                            <input class="formInput" required type="text" name="nama_pasien" id="input-name"
                                placeholder="Udin Petot" value="Udin Petot" />
                        </div>

                        <div class="inputBlock" field="phone">
                            <label for="usia">Usia</label>
                            <label for="usia"class="inputMessage"></label>
                            <input class="formInput" required type="tel" name="usia" id="input-usia"
                                placeholder="56" value="56" />
                        </div>

                    </div>
                </div>
                <!-- close step 1 -->

                <!-- step 2 -->
                <div class="formStep">
                    <h1 class="formTitle">Pilih Gejala Dasar</h1>
                    <div class="formDescription">
                        Sihlakan Pilih gejala Dasar yang Anda Alami Saat ini.
                    </div>
                    <div class="formInputs">
                        <div class="checkboxOptions">
                            @foreach ($gejala_dasar as $gejala)
                                <div class="option">
                                    <input type="checkbox" name="gejala_dasar[]" class="input-addons"
                                        value="{{ $gejala->id }}" />
                                    <div class="optionCheckbox"></div>
                                    <div class="optionTitle">{{ $gejala->nama }}</div>
                                    <div class="optionDescription">({{ $gejala->kode }})</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- close step 2 -->

                <!-- step 3 -->
                <div class="formStep">
                    <h1 class="formTitle">Pilih Gejala Spesifik Anda</h1>
                    <div class="formDescription">
                        Sihlakan Pilih gejala Spesifik yang Anda Alami Saat ini.
                    </div>
                    <div class="formInputs">
                        <div class="checkboxOptions">
                            @foreach ($gejala_lanjutan as $gejala)
                                <div class="option">
                                    <input type="checkbox" name="gejala_lanjutan[]" class="input-addons"
                                        value="{{ $gejala->id }}" />
                                    <div class="optionCheckbox"></div>
                                    <div class="optionTitle">{{ $gejala->nama }}</div>
                                    <div class="optionDescription">({{ $gejala->kode }})</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- close step 3 -->

                <div class="formStep thanks">
                    <span class="bg-danger-subtle text-danger rounded-pill fs-2 px-3 py-1"><i
                            class="bi bi-check2"></i></span>
                    <h1>Hasil Analisis Penyakit</h1>

                    @if (isset($hasil) && isset($diagnosa))
                        <article>
                            <p><strong>Nama Pasien:</strong> {{ $diagnosa['nama_pasien'] }}</p>
                            <p><strong>Usia:</strong> {{ $diagnosa['usia'] }} tahun</p>
                            <p><strong>Jenis Kelamin:</strong> {{ $diagnosa['jenis_kelamin'] }}</p>
                            <hr>
                            <h4>Persentase Penyakit:</h4>
                            <ul>
                                @foreach ($hasil as $penyakit => $persen)
                                    <li>{{ $penyakit }}: <strong>{{ $persen }}%</strong></li>
                                @endforeach
                            </ul>
                            <hr>
                            <p><strong>Penyakit Tertinggi:</strong> {{ $diagnosa['hasil_penyakit'] }}
                                ({{ $diagnosa['persentase'] }}%)</p>
                        </article>
                    @else
                        <article>
                            <p>Belum ada analisis. Silakan isi form terlebih dahulu.</p>
                        </article>
                    @endif
                </div>



                <div class="stepButtons">
                    <div class="button ghost back">
                        <input class="stepRadio" value="1" step="2" type="radio" name="step" />
                        <input class="stepRadio" value="2" step="3" type="radio" name="step" />
                        <input class="stepRadio" value="3" step="4" type="radio" name="step" />
                    </div>
                    <div class="button submit">
                        <input class="stepRadio" step="1" value="2" type="radio" name="step" />
                        <input class="stepRadio" step="2" value="3" type="radio" name="step" />
                        <input class="stepRadio" step="3" value="submit" type="radio" name="step"
                            onclick="submitForm()" />

                        <input class="stepRadio" step="4" value="submit" type="radio" name="step" />

                        <input class="stepCheck" step="1" type="checkbox" />
                        <input class="stepCheck" step="2" type="checkbox" />
                        <input class="stepCheck" step="3" type="checkbox" />
                        <input class="stepCheck" step="4" type="checkbox" />
                    </div>
                </div>
            </div>
            <!-- Ini tombol submit tersembunyi -->
            <button type="submit" id="real-submit-button" style="display: none;"></button>

        </form>
    </main>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
</script>
<script>
    function submitForm() {
        console.log('Submit triggered'); // ← Cek apakah ini muncul di console
        document.getElementById('real-submit-button').click();
    }
</script>
<script>
    function submitForm() {
        const nama = document.querySelector('input[name="nama_pasien"]');
        const usia = document.querySelector('input[name="usia"]');
        const jk = document.querySelector('input[name="jenis_kelamin"]:checked');
        const gejalaDasar = document.querySelectorAll('input[name="gejala_dasar[]"]:checked');

        let errors = [];

        if (!nama.value.trim()) {
            errors.push("Nama pasien wajib diisi.");
        }

        if (!usia.value.trim() || isNaN(usia.value) || usia.value <= 0) {
            errors.push("Usia harus diisi dengan benar.");
        }

        if (!jk) {
            errors.push("Jenis kelamin wajib dipilih.");
        }

        if (gejalaDasar.length === 0) {
            errors.push("Minimal satu gejala dasar harus dipilih.");
        }

        if (errors.length > 0) {
            alert("Form belum lengkap:\n\n" + errors.join("\n"));
            return; // Jangan submit
        }

        // Semua valid, jalankan submit
        document.getElementById('real-submit-button').click();
    }
</script>


</html>
