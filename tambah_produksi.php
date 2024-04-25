<?php 

require 'config.php';
session_start();

if(!isset($_SESSION['login'])){
  header('Location: login.php');
   die;
}


if( $_SESSION['user']['role_id'] != 1){
 header('Location: index.php');
 die;
}


$bahan = ambilData("SELECT * FROM persediaan");
$produk = ambilData("SELECT * FROM produk");

if(isset($_POST['submit'])){


  if(tambahProduksi($_POST) > 0){

    $_SESSION['flash_message'] = '<div class="p-4 mb-4 text-sm text-grey-800 rounded-lg bg-grey-50 dark:bg-green-200            dark:text-grey-400" role="alert">
    <span class="font-medium">Data berhasil ditambahkan</span> </div>';

  } else {

    echo "<script>
        alert('Data gagal ditambahkan')
    </script>";
    echo mysqli_error($conn);

  }

  echo "
    <script>
        document.location.href = 'data_produksi.php';
    </script>
    ";


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <title>Dashboard</title>
</head>
<body>
<!--Dashboard-->
<script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />

<!-- page -->
<main class="min-h-screen w-full bg-gray-200 text-gray-700" x-data="layout">


        
        



    </header> -->

    <?php include('navbar-admin.php') ?>

      

    <div class="flex">
        <!-- aside -->
        <!-- tailwind.config.js -->
<!-- component -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>


 <!-- main content page -->
 <div class="mx-auto p-4 h-screen">
  <div class="w-auto overflow-auto max-h-96" >

    <div class="max-w-xs my-3">
  <h2 class="font-semibold text-2xl">Tambah Produksi</h2>
  </div>
  
  <table class="min-w-full divide-y divide-gray-300">
                <thead>
                  <tr class="border-b-2 border-slate-500">
                    <td scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm front-semibold text-black sm:pl-0">Bahan</td>
                    <td scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-black">Nama</td>
                    <td scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-black">Jumlah Bahan</td>
                </thead>
                <tbody class="">
                  <tbody class="">

                    
                  <?php foreach($bahan as $b): ?>

    <form action="" method="post">

        <tr>  
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-black sm:pl-0"><?= $b['nama_persediaan']; ?></td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-black"><div class="relative">
  <input required="" type="text" name="name" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm" >
</div></td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-black"><div class="relative">
  <input required="" type="text" name="jumlah_bahan" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm">
</div></td>

<input type="hidden" name="bahan_id" value="<?= $b['id'] ?>">
<input type="hidden" name="stok" value="<?= $b['stok'] ?>">
<input type="hidden" name="jumlah_keluar" value="<?= $b['jumlah_keluar'] ?>">

                <td class="whitespace-nowrap px-3 py-4 text-sm text-black"><input type="submit" name="submit" value="Tambah Produksi" class="rounded-lg bg-purple-700 hover:bg-gray-700 px-5 py-3 text-sm font-medium text-white cursor-pointer mr-4"></td>
              </tr>

</form>

<?php endforeach; ?>
               


                </tbody> 
              </table>
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