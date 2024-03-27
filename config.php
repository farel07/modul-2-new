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

    function hapusBahan($id){

        global $conn;
        mysqli_query($conn,"DELETE FROM persediaan WHERE id = $id");
        return mysqli_affected_rows($conn);
    
    }

?>