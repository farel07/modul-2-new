<?php

// localhost
$hostName = 'localhost';
$username = 'root';
$password = '';
$database_name = 'manage_perusahaan';

$conn = new mysqli($hostName, $username, $password, $database_name);

if($conn->connect_error){
    die("Connection failed ". $conn->connect_error);
}

// $password = password_hash('123', PASSWORD_DEFAULT);
// $query = "INSERT INTO account VALUES('','admin','admin','admin@gmail.com','$password');";

// if ($conn->query($query) === TRUE) {
//     echo "New record created successfully";
//   } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
//   }

//   $conn->close();

function registrasiAkun($data){
    global $conn;

    $name = $data['name'];
    $username = $data['username'];
    $email = $data['email'];
    $password = password_hash($data['password'], PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO account VALUES('', '$name', '$username', '$email', '$password', '1')");

    $feedback = mysqli_affected_rows($conn);
    
        return $feedback;
}

$error_message = '';
$success_message = '';


function ambilData($data){

    global $conn;
    $hasil = mysqli_query($conn,$data);
    $penammpung = [];

    while ( $perData = mysqli_fetch_assoc($hasil) ){

        $penammpung[] = $perData;

    }
     return $penammpung;

}

function tambahBahan($data){
        global $conn;
    
        // tambah data 
        $tanggal = date("Y/m/d");
        $jenis = $data['jenis'];
        $nama_persediaan = $data['nama_persediaan'];
        $jumlah_masuk = $data['jumlah_masuk'];
        $jumlah_keluar = $data['jumlah_keluar'];
        $stok = $data['stok'];

    
        // query data
        mysqli_query($conn, "INSERT INTO persediaan VALUES
        ('', '$tanggal', '$jenis', '$nama_persediaan', '$jumlah_masuk', '$jumlah_keluar', '$stok')
        ");
    
        $feedback = mysqli_affected_rows($conn);
    
        return $feedback;
    
    }
    
    function tambahProduk($data){

        global $conn;
    
        // tambah data 
        $tanggal = date("Y/m/d");
        $nama_produk = $data['nama_produk'];
        $harga = $data['harga'];
        $stok = $data['stok'];
        $produk_terjual = $data['produk_terjual'];
        $deskripsi = $data['deskripsi'];

    
        // query data
        mysqli_query($conn, "INSERT INTO produk VALUES
        ('', '$tanggal', '$nama_produk', '$harga', '$stok', '$produk_terjual', '$deskripsi', '')
        ");
    
        $feedback = mysqli_affected_rows($conn);
    
        return $feedback;

    }

    function tambahProduksi($data){
        global $conn;

        $produk_id = $data['produk_id'];
        $tanggal = date("Y/m/d");
        $bahan_id = $data['bahan_id'];
        $jumlah_bahan = $data['jumlah_bahan'];
        $jumlah_produksi = $data['jumlah_produksi'];

         // query data
         mysqli_query($conn, "INSERT INTO produksi VALUES
         ('','$produk_id', '$tanggal', '$bahan_id', '$jumlah_bahan', '$jumlah_produksi')
         ");

         $produk = ambilData("SELECT * FROM produk WHERE id=$produk_id")[0];
         $stok = $produk['stok'] + $jumlah_produksi;
    
         mysqli_query($conn, "UPDATE produk SET stok = '$stok' WHERE id=$produk_id");

        $feedback = mysqli_affected_rows($conn);
            
        return $feedback;
    }


    function editBahan($data, $id){
        global $conn;
        // tambah data 
        $tanggal = date("Y/m/d");
        $jenis = $data['jenis'];
        $nama_persediaan = $data['nama_persediaan'];
        $jumlah_masuk = $data['jumlah_masuk'];
        $jumlah_keluar = $data['jumlah_keluar'];
        $stok = $data['stok'];

        mysqli_query($conn, "UPDATE persediaan SET
            jenis = '$jenis',
            nama_persediaan = '$nama_persediaan',
            jumlah_masuk = '$jumlah_masuk',
            jumlah_keluar = '$jumlah_keluar',
            stok = '$stok' 
            WHERE id = $id;
        ");

        $feedback = mysqli_affected_rows($conn);
            
        return $feedback;
    }

    function editProduk($data, $id){
        global $conn;
    
        // tambah data 
        $nama_produk = $data['nama_produk'];
        $harga = $data['harga'];
        $stok = $data['stok'];
        $produk_terjual = $data['produk_terjual'];
        $deskripsi = $data['deskripsi'];

    
        mysqli_query($conn, "UPDATE produk SET
            nama_produk = '$nama_produk',
            harga = '$harga',
            stok = '$stok',
            produk_terjual = '$produk_terjual',
            deskripsi = '$deskripsi' 
            WHERE id = $id;
        ");
    
        $feedback = mysqli_affected_rows($conn);
    
        return $feedback;
    }

    function hapusBahan($id){

        global $conn;
        mysqli_query($conn,"DELETE FROM persediaan WHERE id = $id");
        return mysqli_affected_rows($conn);
    
    }

    function hapusProduk($id){

        global $conn;
        mysqli_query($conn,"DELETE FROM produk WHERE id = $id");
        return mysqli_affected_rows($conn);
    
    }

    function hapusProduksi($id){

        global $conn;
        
        $produksi = ambilData("SELECT * FROM produksi WHERE id=$id")[0];
        mysqli_query($conn,"DELETE FROM produksi WHERE id = $id");

        $produk_id = $produksi['produk_id']; 
         $produk = ambilData("SELECT * FROM produk WHERE id=$produk_id")[0];
         $stok = $produk['stok'] - $produksi['jumlah_produksi'];
    
         mysqli_query($conn, "UPDATE produk SET stok = $stok WHERE id=$produk_id");

        return mysqli_affected_rows($conn);
    
    }

?>