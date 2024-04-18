<?php 
session_start();
require 'config.php';

if(!isset($_SESSION['login'])){
  header('Location: login.php');
   die;
}

if(!isset($_POST['shipping_method'])){
  header('Location: chart.php');
  
}

$i = 0;
foreach($_SESSION['cart'] as $c){
    $produk[] = ambilData("SELECT * FROM produk WHERE id = $c")[0];
    $produk[$i]['qty'] = $_POST['qty'][$i];
    $i++;
}

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}
?>

<?php if($_POST['shipping_method'] == 'reguler') : $harga_ongkir = 10000; ?>
              <?php elseif($_POST['shipping_method'] == 'express') : $harga_ongkir = 15000 ?>
                <?php elseif($_POST['shipping_method'] == 'instant') : $harga_ongkir = 20000 ?>
                  <?php endif; ?>

<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Checkout</title>
<style>/* ! tailwindcss v3.4.1 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}:host,html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";font-feature-settings:normal;font-variation-settings:normal;-webkit-tap-highlight-color:transparent}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-feature-settings:normal;font-variation-settings:normal;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}dialog{padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.absolute{position:absolute}.relative{position:relative}.inset-x-0{left:0px;right:0px}.bottom-0{bottom:0px}.top-0{top:0px}.mx-auto{margin-left:auto;margin-right:auto}.my-4{margin-top:1rem;margin-bottom:1rem}.mt-2{margin-top:0.5rem}.mt-6{margin-top:1.5rem}.mt-8{margin-top:2rem}.block{display:block}.flex{display:flex}.h-2{height:0.5rem}.w-fit{width:-moz-fit-content;width:fit-content}.w-full{width:100%}.w-screen{width:100vw}.max-w-lg{max-width:32rem}.max-w-screen-xl{max-width:1280px}.cursor-pointer{cursor:pointer}.items-center{align-items:center}.justify-center{justify-content:center}.justify-between{justify-content:space-between}.gap-8{gap:2rem}.space-y-0 > :not([hidden]) ~ :not([hidden]){--tw-space-y-reverse:0;margin-top:calc(0px * calc(1 - var(--tw-space-y-reverse)));margin-bottom:calc(0px * var(--tw-space-y-reverse))}.space-y-0\.5 > :not([hidden]) ~ :not([hidden]){--tw-space-y-reverse:0;margin-top:calc(0.125rem * calc(1 - var(--tw-space-y-reverse)));margin-bottom:calc(0.125rem * var(--tw-space-y-reverse))}.space-y-4 > :not([hidden]) ~ :not([hidden]){--tw-space-y-reverse:0;margin-top:calc(1rem * calc(1 - var(--tw-space-y-reverse)));margin-bottom:calc(1rem * var(--tw-space-y-reverse))}.overflow-hidden{overflow:hidden}.overflow-x-auto{overflow-x:auto}.rounded{border-radius:0.25rem}.rounded-lg{border-radius:0.5rem}.border{border-width:1px}.border-gray-100{--tw-border-opacity:1;border-color:rgb(243 244 246 / var(--tw-border-opacity))}.bg-gray-50{--tw-bg-opacity:1;background-color:rgb(249 250 251 / var(--tw-bg-opacity))}.bg-neutral-900{--tw-bg-opacity:1;background-color:rgb(23 23 23 / var(--tw-bg-opacity))}.bg-purple-700{--tw-bg-opacity:1;background-color:rgb(20 184 166 / var(--tw-bg-opacity))}.p-4{padding:1rem}.p-8{padding:2rem}.px-4{padding-left:1rem;padding-right:1rem}.px-5{padding-left:1.25rem;padding-right:1.25rem}.py-2{padding-top:0.5rem;padding-bottom:0.5rem}.py-8{padding-top:2rem;padding-bottom:2rem}.text-center{text-align:center}.\!text-base{font-size:1rem !important;line-height:1.5rem !important}.text-2xl{font-size:1.5rem;line-height:2rem}.text-sm{font-size:0.875rem;line-height:1.25rem}.text-xl{font-size:1.25rem;line-height:1.75rem}.font-bold{font-weight:700}.font-medium{font-weight:500}.text-gray-700{--tw-text-opacity:1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity:1;color:rgb(17 24 39 / var(--tw-text-opacity))}.text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.shadow{--tw-shadow:0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);--tw-shadow-colored:0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.transition{transition-property:color, background-color, border-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-text-decoration-color, -webkit-backdrop-filter;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-text-decoration-color, -webkit-backdrop-filter;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.hover\:bg-teal-700:hover{--tw-bg-opacity:1;background-color:rgb(15 118 110 / var(--tw-bg-opacity))}.hover\:underline:hover{-webkit-text-decoration-line:underline;text-decoration-line:underline}.focus\:outline-none:focus{outline:2px solid transparent;outline-offset:2px}@media (min-width: 640px){.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:py-4{padding-top:1rem;padding-bottom:1rem}}@media (min-width: 1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}</style></head>
<body>


<!--Pemastian order-->
<div class="overflow-x-auto max-w-screen-xl px-4 py-8 mt-6 mx-auto sm:px-6 sm:py-4 lg:px-8">
    <h2 class="text-center text-2xl font-bold text-gray-900">Pesanan</h2>
    <div class="mx-auto w-fit">
      <div class="bg-gray-50 mt-6 flex items-center justify-center relative block overflow-hidden rounded-lg border border-gray-100 p-8">
      <h4 class="absolute inset-x-0 top-0 text-xl font-bold text-gray-900 text-center my-4">Data Kamu</h4>
      <div class="w-screen max-w-lg space-y-4 mt-8">
        <dl class="space-y-0.5 text-sm text-gray-700">
          <div class="flex justify-between">
              <dt>Name</dt>
              <dd> <?php echo $_POST['name'] ?> </dd>
          </div>
          <div class="flex justify-between">
              <dt>Email</dt>
              <dd> <?php echo $_POST['email'] ?> </dd>
          </div>
          <div class="flex justify-between">
              <dt>Number</dt>
              <dd> <?php echo $_POST['number'] ?> </dd>
          </div>
          <div class="flex justify-between">
              <dt>Address</dt>
              <dd> <?php echo $_POST['adress'] ?> </dd>
          </div>
        </dl>
      </div>
      <span class="absolute inset-x-0 bottom-0 h-2 bg-neutral-900"></span>
      </div>
  
      <div class="bg-gray-50 mt-2 flex items-center justify-center relative block overflow-hidden rounded-lg border border-gray-100 p-8">
      <h4 class="absolute inset-x-0 top-0 text-xl font-bold text-gray-900 text-center my-4">Produk</h4>
      <div class="w-screen max-w-lg space-y-4 mt-8">
        <dl class="space-y-0.5 text-sm text-gray-700">
          <?php foreach($produk as $p) : ?>
        <div class="flex justify-between">
            <dt><?= $p['nama_produk']; ?></dt>
            <dd><?= rupiah($p['harga']); ?> </dd>
            <dd>x <?= $p['qty']; ?> </dd>
            <?php $harga_produk[] = $p['harga'] * $p['qty'] ?>
          </div>
          <?php endforeach; ?>
          <hr>
          <br>
          <!-- harga -->
          <div class="flex justify-between">
            <dt>Subtotal untuk produk</dt>
            <dd> <?php echo rupiah(array_sum($harga_produk)) ?> </dd>
          </div>
          <!-- ongkir -->
          <div class="flex justify-between">
            <dt>Subtotal pengiriman</dt>
            <dd><?= rupiah($harga_ongkir); ?></dd>
          </div>
          <!-- total -->
          <div class="flex justify-between !text-base font-medium">
            <dt>Total</dt>
            <dd> <?= rupiah(array_sum($harga_produk) + $harga_ongkir); ?> </dd>
          </div>
        </dl>
      </div>
      <span class="absolute inset-x-0 bottom-0 h-2 bg-purple-700"></span>
      </div>

      <div class="mt-2 flex items-center justify-between relative block overflow-hidden gap-8 text-center">
          <!-- kode pembayaran -->
          <div class="bg-gray-50 border border-gray-100 rounded-lg p-4 w-full shadow">
            <?php if($_POST['payment_method'] == 'bca') : ?>
              <p>No Rekening A/N Budi Anjasmara:</p>
              <p class="font-bold text-xl">71092123991</p>

              <?php elseif($_POST['payment_method'] == 'mandiri') : ?>
                <p>No Rekening A/N Budi Anjasmara:</p>
              <p class="font-bold text-xl">71092123991</p>

              <?php elseif($_POST['payment_method'] == 'shopeepay') : ?>
                <p>No Telo A/N Budi Anjasmara:</p>
              <p class="font-bold text-xl">08521345261</p>

              <?php elseif($_POST['payment_method'] == 'dana') : ?>
                <p>No Telo A/N Budi Anjasmara:</p>
              <p class="font-bold text-xl">08521345261</p>

                <?php endif; ?>
          </div>


          <form action="proses_order.php" method="post" enctype="multipart/form-data">

          <!-- input tersembunyi ke database -->
          <!-- tabel order -->
          <input type="hidden" name="name" value="<?= $_POST['name'] ?>">
          <input type="hidden" name="email" value="<?= $_POST['email'] ?>">
          <input type="hidden" name="number" value="<?= $_POST['number'] ?>">
          <input type="hidden" name="adress" value="<?php echo $_POST['adress'] ?>">
          <input type="hidden" name="shipping_method" value="<?= $_POST['shipping_method'] ?>">
          <input type="hidden" name="harga" value="<?= array_sum($harga_produk) + $harga_ongkir; ?>">


          <!-- tabel detail order -->
          <?php foreach($produk as $p) : ?>
          <input type="hidden" name="id_produk[]" value="<?= $p['id'] ?>">
          <input type="hidden" name="qty[]" value="<?= $p['qty'] ?>">
          <?php endforeach; ?>
                
          <!-- bukti pembayaran -->
          <div class="bg-gray-50 border border-gray-100 rounded-lg p-4 w-full shadow">
          <p>Bukti Pembayaran:
            <input required="" type="file" name="foto" accept="image/png, image/jpg, image/jpeg" class="text-sm cursor-pointer bg-purple-700 text-white rounded" placeholder="Masukkan gambar">
          </p>
          </div>
      </div>

      <div class="flex items-center justify-between mt-2">
        <!-- tombol kembali -->
        <button class="flex items-center text-gray-700 text-sm font-medium rounded hover:underline focus:outline-none">
          <a href="list_produk.php">← Batal</a>
        </button>
        <span class="flex items-center">
            <input  type="submit"  name="submit" value="Order" class="block rounded bg-purple-700 px-5 py-2 text-sm text-white transition hover:bg-purple-900 cursor-pointer"> 
        </span>
                  </div>
                  </div>
        </div>
          
    </div>
    </div>
  </div>

</form>
<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative p-4 w-full max-w-2xl max-h-full">
      <!-- Modal content -->
      <div class="rounded-3xl shadow-2xl w-1/2 m-auto bg-white fixed z-50 left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2">
        <div class="p-8 text-center sm:p-12">
          <p class="text-sm font-semibold uppercase tracking-widest text-purple-700">
            Your order is on process
          </p>
        
          <h2 class="mt-6 text-3xl font-bold">
            Thanks for your order!
          </h2>
        
          <a class="mt-8 inline-block w-full rounded-full bg-purple-700 py-4 text-sm font-bold text-white shadow-xl" href="./index.php">
            Check Our Other Product 
          </a>
        </div>
        </div>
</div>
</div>

</body>
</html>