<section class="page-section" id="home"> 
  <div class="container py-4">
    <h2 class="text-center text-dark display-5" style="font-family: 'Georgia', serif;">Tour Packages / Tourist Spots</h2>
    <div class="d-flex w-100 justify-content-center mb-4">
      <hr class="border-warning" style="border:3px solid" width="15%">
    </div>  

    <!-- Categories under Tour Packages -->
    <div class="row text-center mb-5">
      <div class="col-md-3 mb-3">
        <div class="border rounded shadow-sm p-3 h-100 bg-light">
          <i class="fas fa-mountain fa-2x text-warning mb-2"></i>
          <h5 class="mb-0" style="font-family: 'Georgia', serif;">Tourist Spots</h5>
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="border rounded shadow-sm p-3 h-100 bg-light">
          <i class="fas fa-hotel fa-2x text-warning mb-2"></i>
          <h5 class="mb-0" style="font-family: 'Georgia', serif;">Hotel Accommodation</h5>
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="border rounded shadow-sm p-3 h-100 bg-light">
          <i class="fas fa-utensils fa-2x text-warning mb-2"></i>
          <h5 class="mb-0" style="font-family: 'Georgia', serif;">Restaurants</h5>
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="border rounded shadow-sm p-3 h-100 bg-light">
          <i class="fas fa-umbrella-beach fa-2x text-warning mb-2"></i>
          <h5 class="mb-0" style="font-family: 'Georgia', serif;">Beaches</h5>
        </div>
      </div>
    </div>

    <!-- Your existing PHP package cards come after this -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    
    <div class="d-flex flex-wrap justify-content-center gap-3">
      <?php
      $packages = $conn->query("SELECT * FROM packages order by rand() ");
        while($row = $packages->fetch_assoc()):
          $cover = '';
          if(is_dir(base_app.'uploads/package_'.$row['id'])){
            $img = scandir(base_app.'uploads/package_'.$row['id']);
            $k = array_search('.', $img);
            if($k !== false) unset($img[$k]);
            $k = array_search('..', $img);
            if($k !== false) unset($img[$k]);
            $cover = isset($img[2]) ? 'uploads/package_'.$row['id'].'/'.$img[2] : "";
          }
          $row['description'] = strip_tags(stripslashes(html_entity_decode($row['description'])));
      ?>
        <div class="card tour-card m-2">
          <img class="card-img-top" src="<?php echo validate_image($cover) ?>" alt="<?php echo $row['title'] ?>" height="200rem" style="object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['title'] ?></h5>
            <p class="card-text"><?php echo $row['description'] ?></p>
            <div class="w-100 d-flex justify-content-end">
              <a href="./?page=packages&id=<?php echo md5($row['id']) ?>" class="btn btn-sm btn-warning text-dark">View Package <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>

    <div class="d-flex w-100 justify-content-end mt-4">
      <a href="./?page=Calintaan" class="btn btn-warning text-dark mr-4">Explore Calintaan <i class="fa fa-arrow-right"></i></a>
    </div>
  </div>
</section>

<!-- Styling for Cultural Card -->
<style>
  .tour-card {
    width: 100%;
    max-width: 340px;
    background-color: #fffefc;
    border: 6px solid transparent;
    border-image: url('https://upload.wikimedia.org/wikipedia/commons/thumb/3/3d/Weave_pattern.svg/800px-Weave_pattern.svg.png') 25 round;
    border-radius: 12px;
    font-family: 'Segoe UI', sans-serif;
    box-shadow: 0 6px 16px rgba(0,0,0,0.15);
    transition: transform 0.3s ease;
  }

  .tour-card:hover {
    transform: translateY(-5px);
  }

  .tour-card .card-title {
    font-family: 'Georgia', serif;
    font-size: 1.25rem;
    color:rgb(255, 255, 255);
    font-weight: bold;
    margin-bottom: 0.5rem;
  }

  .tour-card .card-text {
    font-size: 0.9rem;
    color: #555;
    font-style: italic;
    line-height: 1.4;
  }

  @media (max-width: 768px) {
    .tour-card {
      max-width: 100%;
    }
  }
</style>
