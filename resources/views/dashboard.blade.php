<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">    
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

    <div class="sidebar-main">

        <div class="sidebar">
            <h3>Model Mobil</h3>
            <ul>
                <li>
                    <a href="#sedan" class="smooth-scroll-food" data-count="{{ $mobilCounts['Sedan'] ?? 0 }}">
                        <div class="category-quantity">
                            <span>Sedan</span>
                            <span></span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#hatchback" class="smooth-scroll" data-count="{{ $mobilCounts['Hatchback'] ?? 0 }}">
                        <div class="category-quantity">
                            <span>Hatchback</span>
                            <span></span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#suv" class="smooth-scroll" data-count="{{ $mobilCounts['SUV'] ?? 0 }}">
                        <div class="category-quantity">
                            <span>SUV</span>
                            <span></span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#electric" class="smooth-scroll" data-count="{{ $mobilCounts['Electric'] ?? 0 }}">
                        <div class="category-quantity">
                            <span>Electric</span>
                            <span></span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#luxury" class="smooth-scroll" data-count="{{ $mobilCounts['Luxury'] ?? 0 }}">
                        <div class="category-quantity">
                            <span>Luxury</span>
                            <span></span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#sport" class="smooth-scroll" data-count="{{ $mobilCounts['Sport'] ?? 0 }}">
                        <div class="category-quantity">
                            <span>Sport</span>
                            <span></span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#van" class="smooth-scroll" data-count="{{ $mobilCounts['Van'] ?? 0 }}">
                        <div class="category-quantity">
                            <span>Van</span>
                            <span></span>
                        </div>
                    </a>
                </li>
                
            </ul>
                <div class="separator"></div>
                <ul> 
                    <button type="button" onclick="window.location.href='{{ url('/') }}'"><i class='bx bx-log-out'></i> <span>Logout</span></button>                 
                </ul>
        </div>

        <div class="main">
            <h1 id="food" style="font-size: 22px; margin-bottom: 15px;"><i class="fa-solid fa-car-side"></i>&nbsp All Cars</h1>
            <div class="separator"></div>
            @foreach ($sortedMobilsByModel  as $model => $mobil)
                <div class="category-box">
                    <h1 id="{{ strtolower($model) }}" style="font-size: 22px">
                        {{ $model }} Cars
                    </h1>
                    <div class="vouchers">
                        @foreach ($mobil as $mobil)
                            <div class="voucher-box" >
                                <img src="{{ asset('foto_mobil/'.$mobil->foto) }}" alt="">
                                <p class="nama-voucher">{{ $mobil->merk }}</p>
                                <div class="store-claim">
                                    <p class="status-voucher">Rp{{ number_format($mobil->tarif_per_hari, 0, ',', '.') }}/day</p>
                                    <a href="{{ route('rent', ['id' => $mobil->id]) }}">
                                        <button type="button">Sewa</button>
                                    </a>                                
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

    <!-- --------------------------------------- claim voucher ----------------------------------------- -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" 
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if (Session::has('success'))
        <script>
            swal("Success","{{ Session::get('success') }}", 'success',{
                button:true,
                button:"OK",
                timer:2500,
            });
        </script>
    @endif


    <!-- --------------------------------------- smooth scroll ----------------------------------------- -->
    <script>
    document.querySelectorAll('.smooth-scroll').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            const offsetPosition = targetElement.offsetTop - 125;

            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
            });
        });
    });
    </script>

    <script>
    document.querySelectorAll('.smooth-scroll-food').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            const offsetPosition = targetElement.offsetTop - 130;

            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
            });
        });
    });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const links = document.querySelectorAll('a[data-count]');
            links.forEach(link => {
                const count = link.getAttribute('data-count');
                const span = link.querySelector('.category-quantity span:last-child');
                span.textContent = count;
            });
        });
    </script>


</body>
</html>