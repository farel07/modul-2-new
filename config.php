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
    $role_id = 2;

    mysqli_query($conn, "INSERT INTO account VALUES('', '$name', '$username', '$email', '$password', '$role_id')");

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

    function tambahOrder($data){
        global $conn;

        $tanggal = date("Y/m/d");
        $name = $data['name'];
        $email = $data['email'];
        $nomer = $data['number'];
        $adress = $data['adress'];
        $shipping_method = $data['shipping_method'];
        $harga = $data['harga'];
        $status = 0;
        
        $upload_foto = upload();
        if ( !$upload_foto ){
            return false;
        }
        $foto = 'img/' . $upload_foto;

        mysqli_query($conn, "INSERT INTO orders VALUES
        ('', '$tanggal', '$name', '$email', '$nomer', '$adress', '$shipping_method', '$harga', '$status', '$foto');
        ");

        $feedback = mysqli_affected_rows($conn);
            
        return $feedback;
    }

    function tambahDetailOrder($data){
        global $conn;

        $order_id = $data['order_id'];
        $produk_id = $data['produk_id'];
        $qty = $data['qty'];

        $i = 0;
        foreach($produk_id as $p){
            mysqli_query($conn, "INSERT INTO detail_order VALUES
            ('$order_id', '$p', '$qty[$i]')
            ");
            $i++;
        }

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
        $upload_foto = upload();
        if ( !$upload_foto ){
            return false;
        }
        $foto = 'img/' . $upload_foto;

    
        // query data
        mysqli_query($conn, "INSERT INTO produk VALUES
        ('', '$tanggal', '$nama_produk', '$harga', '$stok', '$produk_terjual', '$deskripsi', '$foto')
        ");
    
        $feedback = mysqli_affected_rows($conn);
    
        return $feedback;

    }

        function updateProduk($data){
            global $conn;
        
            $harga = $data['harga'];
            $deskripsi = $data['deskripsi'];
            $id = $data['id'];
            $stok = $data['stok'];

            $upload_foto = upload();
                if ( !$upload_foto ){
                    return false;
                }
                $foto = 'img/' . $upload_foto;
        
            mysqli_query($conn, "UPDATE produk SET 
                harga = '$harga',
                deskripsi = '$deskripsi',
                stok = '$stok',
                sts = '1',
                foto = '$foto' WHERE id = $id
            ");
        
            $feedback = mysqli_affected_rows($conn);
                
            return $feedback;
        }

    function upload(){

        $namaFile = $_FILES['foto']['name'];
        $ukuranFile = $_FILES['foto']['size'];
        $error = $_FILES['foto']['error'];
        $tmpFile = $_FILES['foto']['tmp_name'];
      
    
        // cek apakah tidak ada gambar yang diupload
       if( $error === 4 ){
            echo "<script>
                alert('gambar harus diisi!')
            </script>";
            return false;
    }
    
        // cek apakah yang diupload oleh user adalah file gambar
        $eksGambarValid = ['jpg','png','jpeg'];
        $eksGambar = explode('.',$namaFile);
        $eksGambar = strtolower(end($eksGambar));
    
        // jika yang diupload bukan gambar
        if ( !in_array($eksGambar, $eksGambarValid) ){
    
            echo "<script>
            alert('yang anda upload bukan gambar!')
        </script>";
        return false;
    
        }
    
        // jika ukuran gambar terlalu besar
        else if( $ukuranFile > 2500000 ){
            echo "<script>
            alert('gambar yang anda upload ukuran nya terlalu besar!')
        </script>";
        return false;
        }
    
        // ubah nama file
        $namaBaru = uniqid();
        $namaBaru.='.';
        $namaBaru.=$eksGambar;
    
        // ketika lolos seleksi
        move_uploaded_file($tmpFile,'img/'.$namaBaru);
        return $namaBaru;
    
    }

    // function tambahProduksi($data){
    //     global $conn;

    //     $produk_id = $data['produk_id'];
    //     $tanggal = date("Y/m/d");
    //     $bahan_id = $data['bahan_id'];
    //     $jumlah_bahan = $data['jumlah_bahan'];
    //     $jumlah_produksi = $data['jumlah_produksi'];

    //      // query data
    //      mysqli_query($conn, "INSERT INTO produksi VALUES
    //      ('','$produk_id', '$tanggal', '$bahan_id', '$jumlah_bahan', '$jumlah_produksi', '0')
    //      ");

    //     //  $produk = ambilData("SELECT * FROM produk WHERE id=$produk_id")[0];
    //     //  $stok = $produk['stok'] + $jumlah_produksi;
    
    //     //  mysqli_query($conn, "UPDATE produk SET stok = '$stok' WHERE id=$produk_id");

    //     $feedback = mysqli_affected_rows($conn);
            
    //     return $feedback;
    // }

    function tambahProduksi($data){
        global $conn;

    $bahan_id = $data['bahan_id'];
    $tanggal = date('Y/m/d');
    $nama = $data['name'];
    $jumlah_bahan = $data['jumlah_bahan'];
    $jumlah_keluar = $data['jumlah_keluar'] += $data['jumlah_bahan'];
    $stok = $data['stok'] -= $data['jumlah_bahan'];

    mysqli_query($conn, "INSERT INTO produk VALUES('', '$tanggal', '$nama', '$bahan_id', '$jumlah_bahan', '', '', '', '', '', '0')");
    mysqli_query($conn, "UPDATE persediaan SET jumlah_keluar = '$jumlah_keluar', stok = '$stok' WHERE id = $bahan_id");

    $feedback = mysqli_affected_rows($conn);
    
    return $feedback;
    }


    function jualProduksi($id){
        global $conn;

        $produksi = ambilData("SELECT * FROM produksi WHERE id = $id")[0];

        $produk_id = $produksi['produk_id'];

         $produk = ambilData("SELECT * FROM produk WHERE id=$produk_id")[0];

        $stok = $produk['stok'] += $produksi['jumlah_produksi'];

        
        mysqli_query($conn, "UPDATE produk SET stok = '$stok' WHERE id=$produk_id"); 
        mysqli_query($conn, "UPDATE produksi SET sts = '1' WHERE id=$id"); 
        

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

    function editStatusOrder($id, $status){
        global $conn;

        mysqli_query($conn, "UPDATE orders SET status = '$status' WHERE id = $id");

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

    function hapsDataPesanan($id){

        global $conn;
        mysqli_query($conn,"DELETE FROM orders WHERE id = $id");
        return mysqli_affected_rows($conn);
    
    }

    function hapusProduksi($id){

        global $conn;
        
        // $produksi = ambilData("SELECT * FROM produksi WHERE id=$id")[0];
        // mysqli_query($conn,"DELETE FROM produksi WHERE id = $id");

        $produk_id = $id;
        //  $produk = ambilData("SELECT * FROM produk WHERE id=$produk_id")[0];
        mysqli_query($conn,"DELETE FROM produk WHERE id = $id");

        //  $stok = $produk['stok'] - $produksi['jumlah_produksi'];
    
        //  mysqli_query($conn, "UPDATE produk SET stok = $stok WHERE id=$produk_id");

        return mysqli_affected_rows($conn);
    
    }

?>