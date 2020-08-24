<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">List</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <?php


        if ($this->session->flashdata('errors')){
            echo '<div class="alert alert-danger">';
            echo $this->session->flashdata('errors');
            echo "</div>";
        }elseif ($this->session->flashdata('error')){
            echo '<div class="alert alert-warning">';
            echo $this->session->flashdata('error');
            echo "</div>";
        }elseif ($this->session->flashdata('success')){
            echo '<div class="alert alert-success">';
            echo $this->session->flashdata('success');
            echo "</div>";
        }


    ?>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Department List</h3><br>
                <button onclick="window.location.href='<?php echo base_url('department/create'); ?>';" class="btn btn-outline btn-primary"><i class="fas fa-plus"></i> Add</button>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" id="department_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                       <button id="button_search" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      
                      <th>ID</th>
                      <th>Name</th>
                      <th>Note</th>
                      <th>Created_at</th>
                      <th>Updated_at</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($departments as $key => $department): ?>
                    <tr>

                      <td><?php echo $department->id; ?></td>
                      <td><?php echo $department->name; ?></td>
                      <td><?php echo $department->note; ?></td>
                      <td><span class="tag tag-success"><?php echo $department->created_at; ?></span></td>
                      <td><?php echo $department->updated_at; ?></td>
                      <th><button  onclick="window.location.href='<?php echo base_url('department/edit?id=').$department->id ?>';"  class="btn" style="color: blue" ><i class="fas fa-pen"></i></button> <button id="_btn_delete" data-id="<?php echo $department->id; ?>" class="btn btn-outline" style="color: red" ><i class="fas fa-trash"></i></button></th>
                    </tr>
                  <?php endforeach ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<script>
window.onload = function(){
  $(document).on('click','#_btn_delete',function(){
      var department_id = $(this).attr('data-id');
      swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this department!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal("Poof! Your department has been deleted!", {
              icon: "success",
            }).then((value)=>{
              if (value) {window.location.href="<?php echo base_url('department/delete'); ?>"+"?id="+department_id;}
            });
          } else {
            swal("Your department is safe!");
          }
        });
    });

  $('#button_search').click(function(){
        var keyword = $('#department_search').val();
        window.location.href='<?php echo base_url('department/search') ?>'+'?search='+keyword;
    })
}
</script>




