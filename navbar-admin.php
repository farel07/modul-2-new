

<nav class="bg-purple-700">
        <div class="max-w-7xl">
          <div class=" flex h-16 items-center justify-between">

            <div class="flex  ">
              <div class="flex flex-shrink-0">
                <img class="h-8 w-auto" src="CareSelf.png" alt="Your Company" onclick="window.location.href = 'index.php';">
              </div>
            </div>

            <div class="flex">


              
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