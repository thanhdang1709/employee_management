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
            <h1 class="m-0 text-dark">Create</h1>
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


          <div class="col-md-12">
            
         
          <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Create Staff</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <?php echo form_open_multipart('staff/store', ['class' => 'form-signin', 'role' => 'form','id'=>'form-create']); ?>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" required placeholder="Name" name="name" value="<?php echo set_value('name'); ?>">
                      </div>
                    </div>
                     <div class="col-md-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" required placeholder="Email" id="input_email" name="email" value="<?php echo set_value('email'); ?>">
                        <div class="alert" id="error_email" style="display:none;padding:2px"></div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" id="input_phone" required placeholder="Phone" name="phone" value="<?php echo set_value('phone'); ?>">
                        <div class="alert" id="error_phone" style="display:none;padding:2px"></div>
                      </div>
                    </div>
                     <div class="col-md-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="picture" class="form-control" placeholder="Image" accept="image/png, image/jpeg">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" class="form-control" required placeholder="Description" name="note"><?php echo set_value('note'); ?></textarea>
                      </div>
                    </div>
              
                    <div class="col-md-6">
                      <div class="form-group">
                        <label > Department</label>
                        <select required name="department[]" id="department" class="form-control" multiple="multiple">

                          <?php foreach ($departments as $key => $department):?>
                              <option value="<?php echo $department->id; ?>"><?php echo $department->name; ?></option>

                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label >Submit</label>
                        <i class="fas fa-plus"></i><input type="submit" name="submit" value="Submit" class="btn btn-block btn-outline btn-success">
                      </div>
                    </div>
                  </div>
                  <?php echo form_close(); ?>
               </div>

                
              </div>
              <!-- /.card-body -->
             </div>
    






        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <style>
    .error{
      color: red
    }
  </style>


<script>var department = [];</script>
<?php
$department = set_value('department');
  if(empty($department)){
    $json = json_encode([]);
  }else{
    $json = json_encode($department);
    
  }
?>

<script>
  var jArray = <?php echo $json; ?>;

window.onload = function() {
  $('#department').val(jArray).change();

  $('#input_email').change(function(){
          var email = $(this).val();
          $.post('<?php echo base_url('api/checkEmail');?>', {email: email}, function(result){
            if (result.error === 0) {
              $('#error_email').css('display','block').removeClass('alert-danger').addClass('alert-success').html('').html('Email availible!');

              $('form').submit( function(ev) {
                ev.preventDefault();
              });
            }
            else
            {

              $('#error_email').css('display','block').removeClass('alert-success').addClass('alert-danger').html('').html('Email already exit!');
              $('form').submit( function(ev) {
                  $(this).unbind('submit').submit()
              });
            }
          });
 
  });
  $('#input_phone').change(function(){
          var phone = $(this).val();
          $.post('<?php echo base_url('api/checkPhone');?>', {phone: phone}, function(result){
            if (result.error === 0) {
              $('#error_phone').css('display','block').removeClass('alert-danger').addClass('alert-success').html('').html('Phone availible!');
              $('form').submit( function(ev) {
                ev.preventDefault();
              });
            }
            else
            {
              $('#error_phone').css('display','block').removeClass('alert-success').addClass('alert-danger').html('').html('Phone already exit!');
              $('form').submit( function(ev) {
                  $(this).unbind('submit').submit()
              });
            }
          });
 
  });

  $(document).ready(function() {
 
        //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
        $("#form-create").validate({
                    rules: {
                        name: "required",
                        email: {
                            required: true,
                            email: true
                        },
                        phone: {
                            required: true,
                            minlength: 10,
                            maxlength: 10,
                            number: true
                        },
                        note: {
                            required: true,
                            minlength: 5
                        },
                    },
                    messages: {
                        name: "Vui lòng nhập tên",
                        email: {
                            required: "Vui lòng nhập địa chỉ email",
                            email: "Vui lòng nhập định dạng email"
                        },
                        phone: {
                            required: "Vui lòng nhập số điện thoại",
                            minlength: "Số máy quý khách vừa nhập là số không có thực",
                            maxlength: "Số máy quý khách vừa nhập là số không có thực",
                            number:"Vui lòng nhập số đúng"
                        },
                        note: {
                            required: "Vui lòng nhập mô tả",
                            minlength: "Tối thiệu 5 ký tự nhé!"
                        },
                    }
                });
    });

}
</script>