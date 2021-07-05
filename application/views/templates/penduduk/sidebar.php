         <!-- Sidebar -->
         <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

             <!-- Sidebar - Brand -->
             <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('penduduk'); ?>">
                 <div class="sidebar-brand-icon">
                     <img class="img-fluid" src="<?= base_url('assets/img/logo_topbar.jpg'); ?>">
                 </div>
                 <div class="sidebar-brand-text mx-3">SLIP Desa Oelatimo</div>
             </a>

             <!-- Divider -->
             <hr class="sidebar-divider">

             <!-- Heading -->
             <div class="sidebar-heading">
                 User
             </div>

             <!-- Nav Item - Dashboard -->
             <li class="nav-item">
                 <a class="nav-link" href="<?= base_url('penduduk'); ?>">
                     <i class="fas fa-fw fa-user"></i>
                     <span>Profil saya</span></a>
             </li>

             <!-- Divider -->
             <hr class="sidebar-divider">

             <!-- Heading -->
             <div class="sidebar-heading">
                 Administrasi
             </div>

             <!-- Nav Item - Dashboard -->
             <li class="nav-item">
                 <a class="nav-link buatsk" href="#" data-toggle="modal" data-target="#exampleModal">
                     <i class="fas fa-fw fa-file-alt"></i>
                     <span>Buat SK</span></a>
             </li>

             <!-- Nav Item - Dashboard -->
             <li class="nav-item">
                 <a class="nav-link" href="<?= base_url('penduduk/riwayatsk'); ?>">
                     <i class="fas fa-fw fa-history"></i>
                     <span>Riwayat Pembuatan SK</span></a>
             </li>

             <!-- Divider -->
             <hr class="sidebar-divider d-none d-md-block">

             <li class="nav-item">
                 <a class="nav-link pb-0" href="#" data-toggle="modal" data-target="#logoutModal">
                     <i class="fas fa-fw fa-sign-out-alt"></i>
                     <span>Keluar</span></a>
             </li>

             <!-- Divider -->
             <hr class="sidebar-divider d-none d-md-block mt-3">

             <!-- Sidebar Toggler (Sidebar) -->
             <div class="text-center d-none d-md-inline">
                 <button class="rounded-circle border-0" id="sidebarToggle"></button>
             </div>

         </ul>
         <!-- End of Sidebar -->