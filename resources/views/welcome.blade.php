<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">    
    <title>Car Rental</title>
</head>
<body>
    <nav>
        <div class="logo_nama">
            <img src="{{ asset('foto/logo.png') }}" style="width:30%">
            <h1 class="nama"><span style="color: #0F75BD;">Car</span>Rental.</h1>
        </div>
        <ul>
            <li><i class='bx bxl-whatsapp'></i></li><p>085248565420</p>
            <li><i class='bx bxl-instagram'></i></li><p>@car_rental</p>
            <li><i class='bx bx-envelope'></i></li><p>carrental@gmail.com</p>
        </ul>
    </nav>

    <div class="main" id="main">
        <div id="particles"></div>
        <div class="left">
            <h5>PLAN YOUR DESTINATION</h5>
            <h3>Temukan mobil terbaik untuk liburan nyaman dan bebas repot!</h3>
            <p>Perjalanan seru dimulai dengan mobil pilihan yang siap menemani</p>
            <div class="cv">
                <a href="{{ route('login') }}">Pesan Mobil Anda</a>
            </div>
        </div>
        <div class="right">
            <img src="{{ asset('foto/mobil_welcome.png') }}" style="width:160%">
        </div>
        
    </div>
</body>
</html>