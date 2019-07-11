<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i> Pages</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="?page=Home">Home</a></li>
              <li><i class="fa fa-bars"></i><?php print_r($_GET["page"]); ?></li>
              <li><i class="fa fa-square-o"></i><?php print_r($_GET["action"]); ?></li>
            </ol>
          </div>
        </div>
       <?php
        include("Cards.php");
       ?>

      <div class="d-flex justify-content-center">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h3 class="card-title mt-0 mb-5">Crud Page</h3>
              <p class="card-text pb-5">Click on button to go on the crud page</p>
              <a href="?page=Crud" class="btn btn-primary">Crud</a>
            </div>
          </div>
          
          <div class="card ml-5" style="width: 18rem;">
            <div class="card-body">
              <h3 class="card-title mt-0 mb-5">Profile Page</h3>
              <p class="card-text pb-5">Click on button to go on the profile page</p>
              <a href="?page=Profile" class="btn btn-primary">Profile</a>
            </div>
      </div>

</div>
<!-- <a href="?page=crud">crud</a> -->
<!-- <a href="?page=profile">Profile</a> -->
      </section>
    </section>