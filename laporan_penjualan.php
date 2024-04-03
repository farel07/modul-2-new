<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Laporan Penjualan</title>
</head>
<body>
<!--Dashboard-->
<script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />

<!-- page -->
<main class="min-h-screen w-full bg-white text-gray-700" x-data="layout">
    <!-- header page -->
    

     <!-- Navbar -->
     <?php include('navbar.php') ?>
    <!-- End Navbar -->

        <!-- aside -->
        <!-- tailwind.config.js -->
<!-- component -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<div class="bg-gray-200 font-sans">
    <div class="flex flex-col sm:flex-row sm:justify-around">
        <div class="w-64 h-screen bg-white">
         <div class="flex flex-col sm:flex-row sm:justify-around">
        <div class="w-64 h-screen bg-white"> 

          <!-- Sidebar -->
    <?php include('sidebar.php') ?>
    <!-- Sidebar End -->
        </div>
         </div>
        </div>
        <!-- main content page -->
        <div class="w-full overflow-auto">
            <!-- component -->
            <div class="w-full p-4 bg-gray-200 overflow-auto">
                <h1 class="text-2xl font-bold text-align-left mb-4">Laporan Penjualan</h1>
                <div class="w-auto max-h-96">
                <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm item">
                  <thead class="ltr:text-left rtl:text-right">
                      <tr>
                      <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">ID Beli</th>
                      <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Tanggal Pesan</th>
                      <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Nama Customer</th>
                      <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">No. Telepon</th>
                      <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Alamat Pengiriman</th>
                      <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Email</th>
                      <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Nama Produk</th>
                      <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Metode Pengiriman</th>
                      <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Ongkir Harga</th>
                      <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Total Harga</th>
                      <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Bukti Pembayaran</th>
                      <th class="px-1 py-2"></th>
                      </tr>
                    </thead>
                
                    <tbody class="divide-y divide-gray-200 text-center">
                      
                      <tr>
                      <td class="whitespace-nowrap px-3 py-2 text-gray-700">2090</td>
                      <td class="whitespace-nowrap px-3 py-2 font-medium text-gray-900">2024-03-12</td>
                      <td class="whitespace-nowrap px-3 py-2 text-gray-700">1</td>
                      <td class="whitespace-nowrap px-3 py-2 text-gray-700">1</td>
                      <td class="whitespace-nowrap px-3 py-2 text-gray-700">1</td>
                      <td class="whitespace-nowrap px-3 py-2 text-gray-700">1</td>
                      <td class="whitespace-nowrap px-3 py-2 text-gray-700">minuman segar</td>
                      <td class="whitespace-nowrap px-3 py-2 text-gray-700">Regular</td>
                      <td class="whitespace-nowrap px-3 py-2 text-gray-700">7000</td>
                      <td class="whitespace-nowrap px-3 py-2 text-gray-700">100</td>
                      <td class="whitespace-nowrap px-3 py-2 text-gray-700">7100</td>
                      <td class="whitespace-nowrap px-3 py-2 text-gray-700">
                        <img class="h-48 w-full object-cover object-center" src="asset/IMG-65f051eea8d742.63763139.jpeg">
                      </td>
                      <td class="whitespace-nowrap px-3 py-2 "></td>
                      </tr>
                      
                      
                      <tr>
                      <td class="whitespace-nowrap px-3 py-2 text-gray-700">2089</td>
                      <td class="whitespace-nowrap px-3 py-2 font-medium text-gray-900">2024-03-12</td>
                      <td class="whitespace-nowrap px-3 py-2 text-gray-700">hh</td>
                      <td class="whitespace-nowrap px-3 py-2 text-gray-700">88</td>
                      <td class="whitespace-nowrap px-3 py-2 text-gray-700">jhjh</td>
                      <td class="whitespace-nowrap px-3 py-2 text-gray-700">yy</td>
                      <td class="whitespace-nowrap px-3 py-2 text-gray-700">k</td>
                      <td class="whitespace-nowrap px-3 py-2 text-gray-700">Regular</td>
                      <td class="whitespace-nowrap px-3 py-2 text-gray-700">7000</td>
                      <td class="whitespace-nowrap px-s3 py-2 text-gray-700">99</td>
                      <td class="whitespace-nowrap px-3 py-2 text-gray-700">7099</td>
                      <td class="whitespace-nowrap px-3 py-2 text-gray-700">
                        <img class="h-48 w-full object-cover object-center" src="asset/IMG-65f03309dbe113.91251057.jpg">
                      </td>
                      <td class="whitespace-nowrap px-3 py-2 "></td>
                      </tr>
                      
                              
                    </tbody>
                  </table>
              
                  </div>
                
                </div>
    </div> 
  </div>
        </div>
</main>

<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("layout", () => ({
            profileOpen: false,
            asideOpen: true,
        }));
    });
</script>
<!--dashboard selesai-->
</body>
</html>