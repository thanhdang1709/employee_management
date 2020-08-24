<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('welcome'); ?>" class="brand-link">
      <img src="<?php echo base_url('assets/dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Employee Management</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo getUserNameHelper(); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


          

         <li class="nav-item   has-treeview">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-copy"></i>
             <p>
               Department
               <i class="fas fa-angle-left right"></i>
               <span class="badge badge-info right">0</span>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="<?php echo base_url('department/index'); ?>" class="nav-link ">
                 <i class="far fa-circle nav-icon"></i>
                 <p>List</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?php echo base_url('department/create'); ?>" class="nav-link ">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Add</p>
               </a>
             </li>
           </ul>
         </li>

         <li class="nav-item has-treeview ">
           <a href="#" class="nav-link ">
             <i class="nav-icon fas fa-user"></i>
             <p>
               Staff
               <i class="fas fa-angle-left right"></i>
               <span class="badge badge-info right">0</span>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="<?php echo base_url('staff/index'); ?>" class="nav-link ">
                 <i class="far fa-circle nav-icon"></i>
                 <p>List</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?php echo base_url('staff/create'); ?>" class="nav-link ">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Add</p>
               </a>
             </li>
           </ul>
         </li>
         <li class="nav-item has-treeview" >
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-cog"></i>
             <p>
               Profile
             </p>
           </a>
         </li>
         <li class="nav-item has-treeview" >
           <a href="<?php echo base_url('Auth/logOut'); ?>" class="nav-link">
             <i class="nav-icon fas fa-times"></i>
             <p>
               Logout
             </p>
           </a>
         </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

  </aside>


  <script></script>