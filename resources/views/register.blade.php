<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Register CarRental</title>

    <style>
        body {
            background-color: #F0F0F0;
        }
    </style>

</head>
<body>

    <section class="">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="/" class="flex items-center ml-56 text-3xl font-bold dark:text-gray-900">
                <img src="{{ asset('foto/logo.png') }}" style="width:20%">
                <span style="color:#0F75BD;">Car</span>Rental.    
            </a>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-xl xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Register account
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Anda</label>
                                <input type="text" name="nama" id="nama" placeholder="John Doe" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div>
                                <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Anda</label>
                                <input type="text" name="alamat" id="alamat" placeholder="Jl. Ahmad Yani " required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div>
                                <label for="nomor_telepon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Telepon Anda</label>
                                <input type="text" name="nomor_telepon" id="nomor_telepon" placeholder="0859xxxxxxxx" pattern="[0-9]*" 
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="13" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div>
                                <label for="nomor_sim" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor SIM Anda</label>
                                <input type="password" name="nomor_sim" id="nomor_sim" placeholder="••••••••" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                        </div>
                        <button type="submit" 
                            class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Regist
                        </button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Already have an account? <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Sign in</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- alert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if (Session::has('success'))
        <script>
            swal("Success","{{ Session::get('success') }}", 'success',{
                button:true,
                button:"OK",
                timer:2500,
            });
        </script>
    @endif

    
</body>
</html>