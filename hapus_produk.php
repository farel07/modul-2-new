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



$id = $_GET['id'];


$foto = ambilData("SELECT foto FROM produk WHERE id = $id")[0];


if(hapusProduk($id) > 0){

  if($foto == ""){

    unlink($foto['foto']);
  }
    $_SESSION['flash_message'] = '<div class="p-4 mb-4 text-sm text-grey-800 rounded-lg bg-grey-50 dark:bg-green-200            dark:text-grey-400" role="alert">
    <span class="font-medium">Data berhasil dihapus</span> </div>';

  } else {

    echo "<script>
        alert('Data gagal dihapus')
    </script>";
    echo mysqli_error($conn);

  }

  echo "
    <script>
        document.location.href = 'data_product.php';
    </script>
    ";


?>