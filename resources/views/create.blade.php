<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="sidebar-main">
        <div class="main">            
            <div class="table-box">

            <h1 style="font-size: 22px"><i class="fa-solid fa-square-plus"></i> Create Mobil</h1>
            <div class="separator"></div>
            <!-- <button class="back" onclick="location.href='dashboard'">Back</button> -->

                <form action="create/store" method="POST" enctype="multipart/form-data">
                @csrf

                    <!-- merk -->
                    <input id="merk" type="text" name="merk" pattern=".*\S+.*" placeholder=" Merk" required
                    oninvalid="this.setCustomValidity('merk belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan merk voucher"><br>

                    <!-- model -->
                    <select name="model" id="model" required
                    oninvalid="this.setCustomValidity('model belum terisi!')" 
                    onInput="this.setCustomValidity('')" title="Silahkan pilih model">
                        <option value="" disabled selected>model</option>
                        <option value="Sedan">Sedan</option>
                        <option value="Hatchback">Hatchback</option>
                        <option value="SUV">SUV</option> 
                        <option value="Electric">Electric</option> 
                        <option value="Luxury">Luxury</option> 
                        <option value="Sport">Sport</option> 
                        <option value="Van">Van</option> 
                        <option value="Truck">Truck</option> 
                    </select><br>

                    <!-- plat -->
                    <input id="nomor_plat" type="text" name="nomor_plat" pattern=".*\S+.*" placeholder=" nomor_plat" required
                    oninvalid="this.setCustomValidity('nomor_plat voucher belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan nomor_plat voucher"><br>

                    <!-- plat -->
                    <input id="tarif_per_hari" type="text" name="tarif_per_hari" pattern=".*\S+.*" placeholder=" tarif_per_hari" required
                    oninvalid="this.setCustomValidity('tarif_per_hari voucher belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan tarif_per_hari voucher"><br>

                    <!-- foto -->
                    <label for="foto">Foto</label>                
                        <input id="foto" type="file" name="foto" accept="image/*"required
                            onchange="checkFileSize(this)">

                    <div id="fotoContainer" style="display:none;"><img src="" id="outputfoto" width="180"></div>  
                        
                    <input class="simpan" type="submit" name="submit" value="Submit">
                    
                    <br>

                </div>    
            
            </form>
            
        </div>

    </div>
    <script>
        function checkFileSize(input) {
            if (input.files.length > 0) {
                var fileSize = input.files[0].size / 1024; // Ukuran dalam KB
                if (fileSize > 1024) { // Maksimal 1 MB (1024 KB)
                    alert('Ukuran file tidak bisa melebihi batas maksimum (1 MB)');
                    input.value = ''; // Reset input file
                    document.getElementById('fotoContainer').style.display = 'none'; // Sembunyikan gambar
                } else {
                    document.getElementById('fotoContainer').style.display = 'block'; // Tampilkan gambar
                    document.getElementById('outputfoto').src = window.URL.createObjectURL(input.files[0]);
                }
            }
        }
    </script>
</body>
</html>