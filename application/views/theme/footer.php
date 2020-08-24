<footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="http://mal.vn">mal.vn</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<!-- DataTables -->
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>

<!-- ChartJS -->
<script src="<?php echo base_url('assets/plugins/chart.js/Chart.min.js') ?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/plugins/sparklines/sparkline.js') ?>"></script>
<!-- JQVMap
<script src="<?php echo base_url('assets/plugins/jqvmap/jquery.vmap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') ?>"></script> -->
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/plugins/jquery-knob/jquery.knob.min.js') ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/plugins/moment/moment.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.js') ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
<!-- Summernote -->
<script src="<?php echo base_url('assets/plugins/summernote/summernote-bs4.min.js') ?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.js') ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php echo base_url('assets/dist/js/pages/dashboard.js') ?>"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- Sweat Alert -->
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="<?php echo base_url('assets/dist/js/demo.js') ?>"></script>
<script src="<?php echo base_url('assets/dist/js/app.js') ?>"></script>
<script>
  setTimeout(function(){
        var url = window.location.href;
    
        $("a[href='"+url+"']").closest('li.has-treeview').addClass('menu-open');
        $("a[href='"+url+"']").closest('.nav-link').addClass('active');
        $("a[href='"+url+"']").closest('a[href="#"]').addClass('active');

        $('.nav-link').each(function(){
          var $this = $(this);

          

          if(url.indexOf($this.attr('href').replace('/index',''))!==-1)

          {
              $this.addClass('active');
              $this.closest('a.nav-link').addClass('active');
              $this.closest('.has-treeview').addClass('menu-open');
          }

          if(url.indexOf('staff/create')!==-1)
          {
            if($this.attr('href').indexOf('staff/index')!==-1)

            {
                $this.removeClass('active');
                $this.closest('a.nav-link').removeClass('active');
                $this.closest('.has-treeview').removeClass('menu-open');
            }

          }
          if(url.indexOf('department/create')!==-1)
          {
            if($this.attr('href').indexOf('department/index')!==-1)

            {
                $this.removeClass('active');
                $this.closest('a.nav-link').removeClass('active');
                $this.closest('.has-treeview').removeClass('menu-open');
            }

          }
          

            
           
        });
        
        if(url.indexOf('department/store')!==-1)
        {
          var url_store = '<?php echo base_url('department/create'); ?>';

          $("a[href='"+url_store+"']").closest('li.has-treeview').addClass('menu-open');
          $("a[href='"+url_store+"']").closest('.nav-link').addClass('active');
          $("a[href='"+url_store+"']").closest('a[href="#"]').addClass('active');
        }
        if(url.indexOf('staff/store')!==-1)
        {
          var url_store = '<?php echo base_url('staff/create'); ?>';

          $("a[href='"+url_store+"']").closest('li.has-treeview').addClass('menu-open');
          $("a[href='"+url_store+"']").closest('.nav-link').addClass('active');
          $("a[href='"+url_store+"']").closest('a[href="#"]').addClass('active');
        }
    },1);


</script>
</body>
</html>