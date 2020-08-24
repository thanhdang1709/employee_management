<?php
defined('BASEPATH') OR exit('No direct script access allowed');



$CI =& get_instance();
$CI->load->model('Staff_model');


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


        showAlertHelper();

    ?>
  
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Staff List</h3><br>
                <button onclick="window.location.href='<?php echo base_url('staff/create'); ?>';" class="btn btn-outline btn-primary"><i class="fas fa-plus"></i> Add</button>
                <div class="card-tools" style="margin-right: 10px">
                  <!-- <label >Filter by Department</label> -->
                  <div class="input-group input-group-sm" style="width: 150px;margin-left: 20px">
                    <select id="filter_department" name="filter_department" class="form-control float-right">
                        <option value="0">Select Department</option>
                        <?php foreach ($departments as $key => $department):?>
                          
                        <option value="<?php echo $department->id; ?>"><?php echo $department->name; ?></option>
                        <?php endforeach ?>
                    </select>
                    <div class="input-group-append">
                      <button onclick="window.location.href='<?php echo base_url('staff') ?>';"  class="btn btn-default"><i class="fas fa-times ">  </i></button>
                    </div>
                  </div>
                  
                </div>

               <div class="card-tools">
                 <div class="input-group input-group-sm" style="width: 150px;">
                   <input type="text" name="staff_search" id="staff_search" class="form-control float-right" placeholder="Search">
               
                   <div class="input-group-append">
                     <button id="button_search" class="btn btn-default"><i class="fas fa-search"></i></button>
                   </div>
                 </div>
               </div>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <?php echo isset($count_result_search)?'<div class="alert-info"> Total Search Result: '.$count_result_search.'</div>' :'' ?>
                <table id="list_table"  class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Department</th>
                      <th>Image</th>
                      <th>Note</th>
                      <th>Created_at</th>
                      <th>Updated_at</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($staffs as $key => $staff): ?>

                    <tr>
                      <td><?php echo $staff->id; ?></td>
                      <td><?php echo $staff->name; ?></td>
                      <td><?php echo $staff->email; ?></td>
                      <td><?php echo $staff->phone; ?></td>
                      <td>
                        <?php  $department = $CI->Staff_model->staff_department($staff->id);
                          $colors = ['primary','success','info','warning','success','info',];
                          if(empty($department)){
                            echo '<span class="badge bg-danger">Empty Department</span>';
                          }else{
                            foreach ($department as $key => $department_row) {
                              echo '<span class="badge bg-'.$colors[array_rand($colors)].'">'.$department_row->department_name.'</span>';
                            }
                          }

                        ?>
                          
                        </span></td>
                      <td><img src="<?php echo $staff->image; ?>" height="50px" alt=""></td>
                      <td><?php echo $staff->note; ?></td>
                      <td><span class="tag tag-success"><?php echo $staff->created_at; ?></span></td>
                      <td><?php echo $staff->updated_at; ?></td>
                      <th><button  onclick="window.location.href='<?php echo base_url('staff/edit?id=').$staff->id ?>';"  class="btn" style="color: blue" ><i class="fas fa-pen"></i></button> <button id="_btn_delete" data-id="<?php echo $staff->id; ?>" class="btn btn-outline" style="color: red" ><i class="fas fa-trash"></i></button></th>
                    </tr>
                  <?php endforeach ?>
                  </tbody>
                </table>
                <nav aria-label="Page navigation example">
                <?php echo $links ?? '' ; ?>
              </nav>
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
      var staff_id = $(this).attr('data-id');
      swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this employee!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal("Poof! Your employee has been deleted!", {
              icon: "success",
            }).then((value)=>{

              if (value) {
                window.location.href="<?php echo base_url('staff/delete'); ?>"+"?id="+staff_id+"&timestamp=<?php $date = new DateTime();
echo $timestamp = $date->getTimestamp();?>"+"&secret=<?php echo md5($timestamp.'mal'); ?>";
                }
            });
          } else {
            swal("Your employee is safe!");
          }
        });
    });
    


    $('#filter_department').change(function(){

      var department_id = ($(this).val());
      window.location.href='<?php echo base_url('staff/').'?group=' ?>'+department_id;
    });

    $('#button_search').click(function(){
        var keyword = $('#staff_search').val();
        window.location.href='<?php echo base_url('staff/search') ?>'+'?search='+keyword;
    })

    $("#list_table").DataTable({
      "responsive": true,
      "autoWidth": true,
      "paging": false,
      "searching": false,
      "lengthChange": false,
      "info":false,
      "order":false
    });


  }
</script>