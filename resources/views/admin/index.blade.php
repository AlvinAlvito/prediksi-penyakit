@extends('layouts.main')
@section('content')
    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>

            <img src="/images/profil.png" alt="">
        </div>
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="text">Total Penyakit</span>
                        <span class="number">40</span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-comments"></i>
                        <span class="text">Total Pasien</span>
                        <span class="number">43</span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-share"></i>
                        <span class="text">Total Gejala</span>
                        <span class="number">16</span>
                    </div>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Grafik Diagram</span>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-sm-12 mb-4">
                        <span class="h5 d-block text-center mb-2">Jumlah Diagnosa per Penyakit</span>
                        <div id="chartPenyakit"></div>
                    </div>
                    <div class="col-lg-6 col-sm-12 mb-4">
                        <span class="h5 d-block text-center mb-2">Jumlah Pasien per Bulan</span>
                        <div id="chartPasien"></div>
                    </div>
                    <div class="col-lg-6 col-sm-12 mb-4">
                        <span class="h5 d-block text-center mb-2">Top 5 Gejala yang Paling Sering Muncul</span>
                        <div id="chartGejala"></div>
                    </div>
                    <div class="col-lg-6 col-sm-12 mb-4">
                        <span class="h5 d-block text-center mb-2">Diagnosa Berdasarkan Jenis Kelamin</span>
                        <div id="chartGender"></div>
                    </div>
                    <div class="col-lg-12 col-sm-12 mb-4">
                        <span class="h5 d-block text-center mb-2">Kekuatan Bobot Gejala per Penyakit</span>
                        <div id="chartRadar"></div>
                    </div>


                </div>

            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        // Chart 1: Donut Chart Penyakit
        var chartPenyakit = new ApexCharts(document.querySelector("#chartPenyakit"), {
            chart: {
                type: 'donut'
            },
            series: [40, 25, 20, 15],
            labels: ["Hipertensi", "Diabetes", "Jantung", "Stroke"]
        });
        chartPenyakit.render();


        // Chart 2: Line Chart Pasien per Bulan
        var chartPasien = new ApexCharts(document.querySelector("#chartPasien"), {
            chart: {
                type: 'line'
            },
            series: [{
                name: "Pasien",
                data: [12, 18, 25, 30, 22, 28]
            }],
            xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun"]
            }
        });
        chartPasien.render();

        // Chart 3: Bar Chart Gejala
        var chartGejala = new ApexCharts(document.querySelector("#chartGejala"), {
            chart: {
                type: 'bar'
            },
            series: [{
                name: "Jumlah",
                data: [55, 42, 39, 30, 28]
            }],
            xaxis: {
                categories: ["Nyeri dada", "Pusing", "Lelah", "Sesak napas", "Mual"]
            }
        });
        chartGejala.render();

        // Chart 4: Donut Chart Gender
        var chartGender = new ApexCharts(document.querySelector("#chartGender"), {
            chart: {
                type: 'donut'
            },
            series: [60, 40],
            labels: ["Pria", "Wanita"]
        });
        chartGender.render();

        // Radar Chart - Bobot Gejala per Penyakit (Contoh)
        var optionsRadar = {
            chart: {
                type: 'radar',
                height: 350
            },
            series: [{
                    name: 'Hipertensi',
                    data: [0.6, 0.3, 0.5, 0.2, 0.4] // Contoh bobot gejala
                },
                {
                    name: 'Diabetes',
                    data: [0.2, 0.8, 0.3, 0.6, 0.4]
                },
                {
                    name: 'Jantung',
                    data: [0.7, 0.6, 0.4, 0.3, 0.5]
                }
            ],
            xaxis: {
                categories: ['Nyeri Dada', 'Sesak Napas', 'Pusing', 'Kelelahan', 'Mual']
            },
            stroke: {
                width: 2
            },
            fill: {
                opacity: 0.1
            },
            markers: {
                size: 4
            }
        };

        var chartRadar = new ApexCharts(document.querySelector("#chartRadar"), optionsRadar);
        chartRadar.render();
    </script>
@endsection
