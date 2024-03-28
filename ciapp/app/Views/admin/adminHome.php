<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Admin Panel</title>
    <!-- Chart.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }
        #guzergahPasta {
            max-width: 400px;
            margin: 20px auto;
            display: block;
        }
        
    </style>
</head>
<body>
    <div class="content-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="page-title">Dashboard <small>Control Panel</small></h3>
                </div>
            </div>
            <!--  kullanıcı çizgiGrafik -->
            <div class="row">
                <div class="col-lg-6">
                    <canvas id="barChart1"></canvas>
                </div>
         
                <!--  kullanıcı çizgiGrafik -->
                <!--  güzergah pastagrafik -->

                <div class="col-lg-6">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
            <!--  güzergah pastagrafik -->
            <!--  Rezerve histogram graf -->
            <hr>
        </gr><div class="row">
                <div class="col-lg-6">
                <canvas id="rezerveSatinAlinanChart"></canvas>
                </div>
            <!--  gRezerve histogram graf  -->
            <!-- biletTürü -->
                <div class="col-lg-6">
                <canvas id="biletTuruChart"></canvas>
                </div>
            </div>
            <!-- biletTürü -->
        </div>
    </div>
  
    <!--  kullanıcı çizgiGrafik script-->
    <script>
        // Veri
        var data = {
            labels: ['Aktif', 'Pasif'],
            datasets: [{
                label: 'Orobus Sayısı',
                backgroundColor: ['#36A2EB', '#FF6384'],
                borderColor: '#000',
                borderWidth: 1,
                data: [24, 6] // Örnek veri
            }]
        };

        // Grafik seçenekleri
        var options = {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Aktif ve Pasif Orobus Sayısı'
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        };

        // Grafik oluşturma
        var ctx = document.getElementById('barChart1').getContext('2d');
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    </script>

    <!-- güzergah pastagrafik -->
    <script>
        // Veri
					
        var data = {
            labels: ['İstanbul - İzmir', 'İzmir - İstanbul', 'Ankara - İstanbul', 'İstanbul - Ankara', 'İzmir - Ankara', 'Ankara - İzmir', 'İstanbul - Antalya', 'İzmir - Antalya', 'Ankara - Antalya', 'Antalya - İstanbul', 'Antalya - İzmir', 'Antalya - Ankara'],
            datasets: [{
                label: 'Sefer Doluluk Oranı',
               
                 backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#66FF99', '#9966FF', '#FF99CC', '#99FF99', '#FF6666', '#FFFF66', '#66FFFF', '#FF9900', '#009933'],data: [10, 20, 15, 5, 8, 12, 7, 9, 14, 18, 6, 11] // Örnek veri
            }]
        };

        // Grafik seçenekleri
        var options = {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Güzergah Dağılımı'
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        };

        // Grafik oluşturma
        var ctx = document.getElementById('pieChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: options
        });
    </script>
    <!-- Histogram grafiği script -->

    <script>
        // Veri
        var data = {
            labels: ['Rezerve Edilmiş', 'Satın Alınmış'],
            datasets: [{
                label: 'Bilet Durumu',
                backgroundColor: ['rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)'],
                borderColor: '#fff',
                borderWidth: 1,
                data: [70, 30] // Örnek veri
            }]
        };

        // Grafik seçenekleri
        var options = {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Rezerve ve Satın Alınmış Bilet Oranı'
            }
        };

        // Grafik oluşturma
        var ctx = document.getElementById('rezerveSatinAlinanChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: options
        });
    </script>

    <!-- Sütun Grafiği script -->
  
    <script>
        // Veri
        var data = {
            labels: ['Tam', '7 Yaş Altı (Ücretsiz)', '65 Yaş ve Üstüne (%15)', 'Memur (%15)', 'Güvenlik Güçleri (Ücretsiz)'],
            datasets: [{
                label: 'Bilet Türleri',
                backgroundColor: ['rgba(255, 99, 132, 0.5)', 'rgba(54, 162, 235, 0.5)', 'rgba(255, 206, 86, 0.5)', 'rgba(75, 192, 192, 0.5)', 'rgba(153, 102, 255, 0.5)'],
                borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)'],
                borderWidth: 1,
                data: [50, 30, 20, 15, 10] // Örnek veri
            }]
        };

        // Grafik seçenekleri
        var options = {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: false,
            },
            title: {
                display: true,
                text: 'Bilet Türü Dağılımı'
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        };

        // Grafik oluşturma
        var ctx = document.getElementById('biletTuruChart').getContext('2d');
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    </script>
</body>
</html>