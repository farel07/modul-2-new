

<nav class="bg-purple-700">
        <div class="max-w-7xl">
          <div class=" flex h-16 items-center">

            <div class="flex flex-1 ">
              <div class="flex flex-shrink-0">
                <img class="h-8 w-auto" src="CareSelf.png" alt="Your Company" onclick="window.location.href = 'index.php';">
              </div>
            </div>

            <div class="flex flex-2 space-x-4">
   
              <a href="./index.php" class=" text-white hover:bg-gray-700 rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Home</a>
              <a href="./list_produk.php" class="text-white hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Product</a>

              <?php if(isset($_SESSION['login']) && $_SESSION['user']['role_id'] == 1) { ?>
              
              <a href="./dashboard.php" class="bg-gray-900 text-white hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Dashboard</a>

              <?php } ?>


              <?php if(isset($_SESSION['login'])) { ?>

              <a href="logout.php" class="bg-red-600 text-white hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Logout</a>

                <?php } else { ?>

              <a href="login.php" class="bg-green-600 text-white hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Login</a>

                  <?php } ?>
              </div>
                     
                </div>
      
                
                
              </div>
        </div>
      
       
      </nav>

        <script>
          var navItems = document.getElementById("navItems");
          var mobileNav = document.getElementById("mobileNav");
          var hamburger = document.getElementById("hamburger");

          function adjustNavbar() {
            screenWidth = parseInt(window.innerWidth);

            if (screenWidth < 541) {
              navItems.style.display = "none";
              hamburger.style.display = "flex";
            } else {
              navItems.style.display = "flex";
              hamburger.style.display = "none";
            }
          }

          adjustNavbar();

          window.addEventListener("resize", adjustNavbar);

          hamburger.addEventListener("click", function () {
            mobileNav.classList.toggle("left-[-70%]");
            hamburger.classList.toggle("fa-bars");
            hamburger.classList.toggle("fa-close");
          });
        </script>