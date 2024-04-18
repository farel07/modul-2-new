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

if(editStatusOrder($_GET['id'], 2) > 0){

    $_SESSION['flash_message'] = '<div class="p-4 mb-4 text-sm text-grey-800 rounded-lg bg-grey-50 dark:bg-green-200            dark:text-grey-400" role="alert">
    <span class="font-medium">Pesanan berhasil diselesaikan</span> </div>';

  } else {

    echo "<script>
        alert('Data gagal dikonfirmasi')
    </script>";
    echo mysqli_error($conn);

  }

  echo "
    <script>
        document.location.href = 'data_pesanan.php';
    </script>
    ";

?>