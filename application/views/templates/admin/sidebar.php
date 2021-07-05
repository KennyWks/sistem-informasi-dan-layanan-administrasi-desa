        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                    <img class="img-fluid" src="<?= base_url('assets/img/logo_topbar.jpg'); ?>">
                </div>
                <div class="sidebar-brand-text mx-3">SLIP Desa Oelatimo</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider mb-4">

            <!-- query menu -->
            <?php
            $role_id = $this->session->userdata('role_id');
            $queryMenu = "SELECT   `user_menu`.`id`, `menu`
                          FROM     `user_menu` JOIN `user_akses_menu`
                          ON       `user_menu`.`id` = `user_akses_menu`.`menu_id`
                          WHERE    `user_akses_menu`.`role_id` = $role_id
                          ORDER BY `user_akses_menu`.`menu_id` ASC";
            $menu = $this->db->query($queryMenu)->result_array();
            ?>

            <?php foreach ($menu as $m) { ?>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed py-0" href="#" data-toggle="collapse" data-target="#<?= $m['menu']; ?>" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-bars"></i>
                        <span><?= $m['menu']; ?></span>
                    </a>
                    <div id="<?= $m['menu']; ?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-1 collapse-inner rounded">

                            <!-- submenu sesuai menu -->
                            <?php
                            $menuId = $m['id'];
                            $querySubMenu = "SELECT * FROM `user_sub_menu`
                                 WHERE `menu_id` = $menuId
                                 AND `aktif` = 1 
                                ";
                            $subMenu = $this->db->query($querySubMenu)->result_array();
                            ?>

                            <?php foreach ($subMenu as $sm) : ?>
                                <?php if ($title == $sm['judul']) : ?>
                                    <a class="collapse-item active" href="<?= base_url($sm['url']); ?>"><i class="<?= $sm['icon']; ?>"></i> <?= $sm['judul']; ?></a>
                                <?php else : ?>
                                    <a class="collapse-item" href="<?= base_url($sm['url']); ?>"><i class="<?= $sm['icon']; ?>"></i> <?= $sm['judul']; ?></a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider mt-3">
            <?php } ?>

            <li class="nav-item">
                <a class="nav-link pb-0" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block mt-3">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->