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


        if ($this->session->flashdata('errors')){
            echo '<div class="alert alert-danger">';
            echo $this->session->flashdata('errors');
            echo "</div>";
        }elseif ($this->session->flashdata('success')){
            echo '<div class="alert alert-success">';
            echo $this->session->flashdata('success');
            echo "</div>";
        }


    ?>
        <div class="row">


          <div class="col-md-12">
            
         
          <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Create Department</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <?php echo form_open('department/store', ['class' => 'form-signin', 'role' => 'form']); ?>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo set_value('name'); ?>">
                      </div>
                    </div>
                     <div class="col-md-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Note</label>
                        <textarea type="text" class="form-control" placeholder="Note" name="note" value=""><?php echo set_value('note'); ?></textarea>
                      </div>
                    </div>
                  </div>

                  
                  <div class="row">
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







