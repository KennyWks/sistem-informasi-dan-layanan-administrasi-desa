     <!-- Content Wrapper -->
     <div id="content-wrapper" class="d-flex flex-column">

         <!-- Main Content -->
         <div id="content">
             <!-- Begin Page Content -->
             <div class="container-fluid mt-5">

                 <!-- 404 Error Text -->
                 <div class="text-center">
                     <div class="error mx-auto" data-text="403">403</div>
                     <p class="lead text-gray-800 mb-5">Akses tidak diizinkan</p>
                     <p class="text-gray-500 mb-0">Maaf, anda tidak dapat mengakses halaman ini</p>
                     <a href="<?= base_url('admin'); ?>">&larr; Kembali</a>
                 </div>

             </div>
             <!-- /.container-fluid -->

         </div>
         <!-- End of Main Content -->

     </div>

     </body>

     </html>

     <!-- preloading animate -->
     <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

     <script>
         $(window).load(function() {
             // Animate loader off screen
             $(".se-pre-con").fadeOut("slow");;
         });
     </script>