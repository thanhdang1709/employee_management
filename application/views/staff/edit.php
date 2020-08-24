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
            <h1 class="m-0 text-dark">Edit</h1>
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
                <h3 class="card-title">Edit Staff</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <?php echo form_open_multipart('staff/update', ['class' => 'form-signin', 'role' => 'form']); ?>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="hidden" name="id" value="<?php echo $staff->id; ?>">
                        <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $staff->name; ?>">
                      </div>
                    </div>
                     <div class="col-md-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $staff->email; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" placeholder="Phone" name="phone" value="<?php echo $staff->phone; ?>">
                      </div>
                    </div>
                     <div class="col-md-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="picture" class="form-control" placeholder="Image">
                        <br>
                        <!-- Trigger the Modal -->
                            <img id="myImg" src="<?php echo $staff->image;   ?>" alt="Snow" style="width:100%;max-width:300px">

                            <!-- The Modal -->
                            <div id="myModal" class="modal">

                              <!-- The Close Button -->
                              <span class="close">&times;</span>

                              <!-- Modal Content (The Image) -->
                              <img class="modal-content" id="img01">

                              <!-- Modal Caption (Image Text) -->
                              <div id="caption"></div>
                            </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" class="form-control" placeholder="Description" name="note"><?php echo $staff->note; ?></textarea>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label > Department</label>
                        <select name="department[]" id="department" class="form-control" multiple="multiple">
     
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
    /* Style the Image Used to Trigger the Modal */
#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (Image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image (Image Text) - Same Width as the Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation - Zoom in the Modal */
.modal-content, #caption {
  animation-name: zoom;
  animation-duration: 0.6s;
}

@keyframes zoom {
  from {transform:scale(0)}
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
  </style>
<script>var department = [];</script>
<?php
$department = $CI->Staff_model->staff_department($staff->id);
  if(empty($department)){
    $json = json_encode([]);
  }else{
    $json = json_encode($department);
    
  }
?>

<script>
  var jArray = <?php echo $json; ?>;

window.onload = function() {
  $.each(jArray,function(key,value){
      department.push(value.department_id);
  });
$('#department').val(department).change();









// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
}

</script>





