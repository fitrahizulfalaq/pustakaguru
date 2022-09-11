<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card-header">
      <a href="<?= base_url('');?>" class="btn btn-info float-right btn-sm"><i class="fas fa-backward"></i> Kembali</a>          
    </div>

    <?php $this->view('message'); ?>

    <div class="row">
      <div class="col-md-12">
        <!-- Profile Image -->
        <div class="card card-orange card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="img-fluid" src="<?=base_url()?>/assets/dist/img/login-logo.png">
            </div>

            <br>
            
            <div class="text-justify">
              Al Quds merupakan aplikasi pembelajaran Al Quran digital berbasis Learning Management System yang menerapkan metode e-learning melalui berbagai fitur penjunjang dalam pembelajaran Al Quran
            </div>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->        
      </div>      
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
