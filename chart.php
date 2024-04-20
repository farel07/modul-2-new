<?php 
session_start();
require 'config.php';
// if(!isset($_SESSION['login'])){
//     header('Location: login.php');
//      die;
// }


if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
};

$i = 0;
foreach($_SESSION['cart'] as $c){
    $produk[] = ambilData("SELECT * FROM produk WHERE id = $c")[0];
    $produk[$i]['cart_index'] = $c;
    $i++;
}




function set_subtotal(){
    global $produk;
    $subtotal = 0;

    foreach($produk as $p){
        $subtotal += $p['harga'];
    }
    return $subtotal;
}

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}

?>
<!DOCTYPE html>
<html class="border-l" lang="en">
<head>
     <title>Form Pemesanan</title>
    <meta charset="UTF-8">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        fieldset label span {
            min-width: 125px;
        }
        fieldset .select::after {
            content: '';
            position: absolute;
            width: 9px;
            height: 5px;
            right: 20px;
            top: 50%;
            margin-top: -2px;
            background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='9' height='5' viewBox='0 0 9 5'><title>Arrow</title><path d='M.552 0H8.45c.58 0 .723.359.324.795L5.228 4.672a.97.97 0 0 1-1.454 0L.228.795C-.174.355-.031 0 .552 0z' fill='%23CFD7DF' fill-rule='evenodd'/></svg>");
            pointer-events: none;
        }
    </style>
</head>
<body>

        <script>

function format_rupiah(nStr) {
		if (nStr === null) {
			return 'Rp. 0';
		}
		nStr += '';
		x = nStr.split(',');
		x1 = x[0];
		x2 = x.length > 1 ? ',' + x[1] : '';
		var rgx = /(\d+)(\d{3})/;
		while (rgx.test(x1)) {
			x1 = x1.replace(rgx, '$1' + ',' + '$2');
		}
		return 'Rp. ' + x1 + x2;
}


        </script>

    <header class="">
        <nav class="flex  bg-gray-50 text-gray-600">
            <div class="w-full xl:px-12 py-6 px-5 flex space-x-12 items-center justify-between">
                <div>
                    <a class="text-2xl font-bold" href="./index.php">
                        <img src="CareSelf.png" alt="CareSelf" srcset="" class="w-1/2">
                    </a>
                </div>
                <!-- <div class=" xl:flex  text-gray-600 space-x-5">
                   
                    <a class="flex items-center hover:text-gray-900" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="absolute flex ml-4 -mt-5">
                            <span class="h-3 w-3 animate-ping absolute inline-flex rounded-full bg-pink-500 opacity-75"></span>
                            <span class="h-3 w-3 relative inline-flex rounded-full bg-pink-600"></span>
                        </span>
                    </a>

                    <a class="hover:text-gray-900" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </a>
                </div> -->
        </nav>
    </header>
    <div class="justify-center">
        <input type="hidden" name="" id="total_barang" value="<?= count($_SESSION['cart']) ?>">
        <div class="w-1/2 bg-white lg:block  m-auto">
            <h1 class="py-6 border-b-4 text-xl text-gray-600 px-8">Order Summary</h1>
            <ul class="py-6 border-b space-y-8 px-8">
                <?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) != 0) : ?>

                    <?php $i = 0; foreach($produk as $p) : ?>
                <li class="grid grid-cols-7 gap-2 border-b-1">
                    <div class="col-span-1 self-center">
                        <img src="<?= ($p['foto'] == '') ? 'img/default.png' : $p['foto']; ?>" alt="Product" class="rounded w-full">
                    </div>
                    <div class="flex flex-col col-span-3 pt-2">
                        <span class="text-gray-600 text-md font-semi-bold"><?= $p['nama_produk']; ?></span>
                        <span class="text-gray-400 text-sm inline-block pt-2"><?= $p['deskripsi']; ?></span>
                    </div>
                    <div class="col-span-3 pt-3">
                        <div class="flex items-center space-x-2 text-sm justify-between">
                            <span class="text-gray-400">

                            <input type="text" id="qty-<?= $i ?>" class="flex-shrink-0 text-gray-900 dark:text-white border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 w-5 text-center" placeholder="" value="1" required onchange="set_total(<?= $i ?>)" />

                            </span>
                            <span class="text-gray-400"><?= rupiah($p['harga']) ?></span>
                            <input type="hidden" name="" id="harga_satuan-<?= $i ?>" value="<?= $p['harga'] ?>">
                            
                        <script>

                            var qty = document.getElementById('qty-' + <?= $i ?>).value
                            var harga_satuan = document.getElementById('harga_satuan-' + <?= $i ?>).value
                            // console.log(harga_satuan)
                        </script>

                            <span class="text-pink-400 font-semibold inline-block"><p id="total-<?= $i ?>"></p></span>
                            <span class="text-red-400 font-semibold text-xs inline-block"><a href="remove_cart.php?id=<?= $p['cart_index'] ?>">Delete</a></span>

                            <script>
                            document.getElementById("total-<?= $i ?>").innerHTML = format_rupiah(qty * harga_satuan) + ',00'

                            </script>
                        </div>
                    </div>
                </li>
                <?php $i++; endforeach; ?>

                    <?php else : ?>
                
                <?php endif; ?>

            </ul>
            <div class="px-8 border-b">
                <div class="flex justify-between py-4 text-gray-600">
                    <span>Subtotal</span>
                <?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) != 0) : ?>
                    <span class="font-semibold text-pink-500"><p id="subtotal"><?= rupiah(set_subtotal()); ?></p></span>
                    <?php else : ?>
                    <span class="font-semibold text-pink-500"><p id="subtotal">Rp. 0</p></span>
                    <?php endif; ?>
                </div>
                <div class="flex justify-between py-4 text-gray-600">
                    
                        
                    <form action="formorder2.php" method="post">

                    <div class="form-group">
                        <label for="shipping_method">Shipping Method:</label>
                        <select id="shipping_method" name="shipping_method">
                            <option value="reguler" data-harga="10.000">Reguler (2-3 hari) - Rp 10.000</option>
                            <option value="express" data-harga="15.000">Express (1 hari) - Rp 15.000</option>
                            <option value="instant" data-harga="20.000">Instant (6 jam) - Rp 20.000</option>
                            </select>
                    </div>
                    
                                <button class="flex items-center text-gray-700 text-sm font-medium rounded hover:underline focus:outline-none">
                    <a href="list_produk.php">← Batal</a>
                    </button>

                    <?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) != 0) : ?>
                    <?php $i = 0; foreach($produk as $p) : ?>

                        <input type="hidden" name="qty[]" id="qty_form-<?= $i ?>" value="1">

                        <?php $i++; endforeach; ?>


                        

                    <button class="rounded-full bg-purple-700 mt-10 p-3 text-white" type="submit">Order Now</button>
                    <?php else : ?>
                    <button class="rounded-full bg-purple-200 mt-10 p-3 text-white" disabled type="submit">Order Now</button>
                    <?php endif; ?>

                    </form>

            </div>
            
        </div>
        
    </div>
   
    </div>

    <script>
        
    function set_total(id){
        var qty = document.getElementById('qty-' + id).value
        var harga_satuan = document.getElementById('harga_satuan-' + id).value
        document.getElementById("total-" + id).innerHTML = format_rupiah(qty * harga_satuan) + ',00'
        document.getElementById("qty_form-" + id).value = qty
        var total_barang = document.getElementById('total_barang').value
        var subtotal = 0;
        for(i = 0; i < total_barang; i++){
            var qty = document.getElementById('qty-' + i).value
            var harga_satuan = document.getElementById('harga_satuan-' + i).value
            subtotal += qty * harga_satuan
        }

        document.getElementById('subtotal').innerHTML = format_rupiah(subtotal, 'Rp. ') + ',00';

    }

    </script>
    
</body>

</html>