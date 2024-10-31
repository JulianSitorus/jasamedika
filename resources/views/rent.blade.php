<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="{{ asset('css/rent.css') }}">    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Cars</title>

</head>
<body>
    <header>
        <a href="/profile" style="text-decoration: none; color: inherit;">
            <div class="user-profile" style="cursor: pointer;">
                <i class="fa-solid fa-circle-user" style="color: #0F75BD;"></i>
                <div class="name-email">
                    <p class="name" style="font-size:17px">{{ Auth::user()->nama }}</p>
                    <p class="gmail">{{ Auth::user()->nomor_telepon }}</p>
                </div>
            </div>
        </a>

        <div class="judul">
            <img src="{{ asset('foto/logo.png') }}" style="width:110px; height:110px">
            <h3 style="font-weight:700"><span style="color: #0F75BD;">Car</span>Rental.</h3>
        </div>

        <div class="history-button">
            <button onclick="location.href='{{ Auth::user()-> id}}/history'"> <i class="fa-solid fa-key"></i>&nbsp Peminjaman</button>
        </div>
    </header>
    
    <div class="main">
        <!-- <h1 id="food" style="font-size: 22px; margin-bottom: 15px;"><i class="fa-solid fa-car-side"></i>&nbsp {{ $mobil->merk }}</h1> -->
        <img src="{{ asset('foto_mobil/'.$mobil->foto) }}" alt="" style="width: 40%">
        <!-- <div class="separator"></div> -->
    </div>
</body>
</html>