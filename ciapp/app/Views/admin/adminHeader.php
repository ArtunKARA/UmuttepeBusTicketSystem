<!DOCTYPE HTML>
<html>

<head>
    <title>Umuttepe Turizm - Admin Panel</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/adminLogo.jpg" type="icon">

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/core.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <link rel="stylesheet" href="assets/icons/fontawesome/styles.min.css">
    <link rel="stylesheet" href="lib/css/chartist.min.css">

    <script type="text/javascript" src="lib/js/jquery.min.js"></script>
    <script type="text/javascript" src="lib/js/tether.min.js"></script>
    <script type="text/javascript" src="lib/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="lib/js/chartist.min.js"></script>
    <script type="text/javascript" src="assets/js/app.min.js"></script>
    <script type="text/javascript">
        $(function() {
            // Dashboard Sales Chart
            // ------------------------------------------------------------------

            var dataMain = {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                series: [
                    [5, 4, 3, 7, 5, 10, 3, 4, 8, 10, 6, 8],
                    [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4]
                ]
            };

            var optionsMain = {
                seriesBarDistance: 10
            };

            var responsiveOptionsMain = [
                ['screen and (max-width: 640px)', {
                    seriesBarDistance: 5,
                    axisX: {
                        labelInterpolationFnc: function (value) {
                            return value[0];
                        }
                    }
                }]
            ];
            var chart = new Chartist.Bar('.ct-chart-dashboard', dataMain, optionsMain, responsiveOptionsMain);
        });
    </script>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-toggleable-md">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav">
            <span>
                <i class="fa fa-code-fork"></i>
            </span>
        </button>

        <button class="navbar-toggler navbar-toggler-left" type="button" id="toggle-sidebar">
            <span>
               <i class="fa fa-align-justify"></i>
            </span>
        </button>

        <a class="navbar-brand logo" href="dashboard">
            <p style="color:azure">Admin Panel</p>
        </a>

        <div class="collapse navbar-collapse" id="navbarNav">
            <button class="sidebar-toggle btn btn-flat" id="toggle-sidebar-desktop">
                <span>
                    <i class="fa fa-align-justify"></i>
                </span>
            </button>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle nav-icon" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bell-o"></i>
                        <span class="hidden-lg-up position-right">Notifications</span>
                        <span class="badge bg-danger-4">8</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right width-300 list-notifications">
                        <ul class="list-unstyled">
                            <li class="media notif-unread">
                                You have 3 unread notifications!
                            </li>
                            <li class="media">
                                <div class="notif-icon bg-primary-4">
                                    <i class="fa fa-bell-o"></i>
                                </div>
                                <div class="media-body notif-text">
                                    You may want to check this!
                                </div>
                            </li>
                            <li class="media mr-2">
                                <div class="notif-icon bg-danger-4">
                                    <i class="fa fa-exclamation"></i>
                                </div>
                                <div class="media-body notif-text text-danger-4">
                                    Server Banshee is not responding.
                                </div>
                            </li>
                            <li class="media">
                                <div class="notif-icon bg-success-4">
                                    <i class="fa fa-check"></i>
                                </div>
                                <div class="media-body notif-text text-success-4">
                                    Backup completed successfully.
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle dropdown-has-after" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <img src="images/adminLogo.jpg" alt="" class="user-img"> Admin
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?php echo base_url('UmuttepeBusTicketSystem/ciapp/public'); ?>">
                            <i class="fa fa-sign-out"></i> <span>Çıkış Yap</span></a>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- /NAVBAR -->

    <div class="page-container">
        <div class="page-content">
            <!-- inject:SIDEBAR -->

            <div id="sidebar-main" class="sidebar sidebar-default">
    <div class="sidebar-content">
        <ul class="navigation">
            <li class="navigation-header">
                <span>Raporlamalar</span>
                <i class="icon-menu"></i>
            </li>

            <li>
                <a href="index.html"><i class="fa fa-home"></i> <span>Dashboard</span></a>
            </li>

            <li class="navigation-header">
                <span>Parametrik Ekranlar</span>
                <i class="icon-menu"></i>
            </li>

            <li>
                <a href="index.html"><i class="fa fa-user"></i> <span>Kullanıcı Tanımlamaları</span></a>
                <ul>
                    <li><a href="uye">Üyeler</a></li>
                </ul>
            </li>

            <li>
                <a href="index.html"><i class="fa fa-map-marker"></i> <span>Yolculuk Tanımlamaları</span></a>
                <ul>
                    <li><a href="inputs.html">Şehir</a></li>
                    <li><a href="sefer">Sefer</a></li>
                </ul>
            </li>

            <li>
                <a href="index.html"><i class="fa fa-bus"></i> <span>Araç Tanımlamaları</span></a>
                <ul>
                    <li><a href="otobus">Otobüs</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>

            <!-- inject:/SIDEBAR -->

