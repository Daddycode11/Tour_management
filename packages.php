<section class="page-section bg-dark" id="home">
	<div class="container">
		<h2 class="text-center">Tour Packages</h2>
	<div class="d-flex w-100 justify-content-center">
		<hr class="border-warning" style="border:3px solid" width="15%">
	</div>
	
<!-- Cultural-Themed Categories Section -->
<div class="row text-center mb-5">
  <div class="col-md-3 mb-3">
    <div class="border p-4 h-100 shadow-lg bg-white position-relative cultural-card">
      <img src="assets/img/icons/landscape-icon.png" class="mb-3" width="50" alt="Tourist Spot Icon">
      <h5 class="mb-0" style="font-family: 'Merienda', cursive; color: #6b3f27;">Tourist Spots</h5>
      <div class="cultural-frame-top"></div>
      <div class="cultural-frame-bottom"></div>
    </div>
  </div>
  <div class="col-md-3 mb-3">
    <div class="border p-4 h-100 shadow-lg bg-white position-relative cultural-card">
      <img src="assets/img/icons/hotel-icon.png" class="mb-3" width="50" alt="Hotel Icon">
      <h5 class="mb-0" style="font-family: 'Merienda', cursive; color: #6b3f27;">Hotel Accommodation</h5>
      <div class="cultural-frame-top"></div>
      <div class="cultural-frame-bottom"></div>
    </div>
  </div>
  <div class="col-md-3 mb-3">
    <div class="border p-4 h-100 shadow-lg bg-white position-relative cultural-card">
      <img src="assets/img/icons/food-icon.png" class="mb-3" width="50" alt="Restaurant Icon">
      <h5 class="mb-0" style="font-family: 'Merienda', cursive; color: #6b3f27;">Restaurants</h5>
      <div class="cultural-frame-top"></div>
      <div class="cultural-frame-bottom"></div>
    </div>
  </div>
  <div class="col-md-3 mb-3">
    <div class="border p-4 h-100 shadow-lg bg-white position-relative cultural-card">
      <img src="assets/img/icons/beach-icon.png" class="mb-3" width="50" alt="Beach Icon">
      <h5 class="mb-0" style="font-family: 'Merienda', cursive; color: #6b3f27;">Beaches</h5>
      <div class="cultural-frame-top"></div>
      <div class="cultural-frame-bottom"></div>
    </div>
  </div>
</div>

<style>
.cultural-card {
  border: 2px solid #d2b48c;
  border-radius: 12px;
  background-image: url('assets/img/patterns/ethnic-weave.png');
  background-size: cover;
  background-blend-mode: lighten;
  font-weight: bold;
}

.cultural-card img {
  filter: drop-shadow(2px 2px 2px rgba(0,0,0,0.2));
}

.cultural-frame-top, .cultural-frame-bottom {
  position: absolute;
  height: 10px;
  width: 100%;
  background: repeating-linear-gradient(45deg, #8B4513, #8B4513 5px, #DEB887 5px, #DEB887 10px);
}

.cultural-frame-top {
  top: 0;
  left: 0;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}

.cultural-frame-bottom {
  bottom: 0;
  left: 0;
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 10px;
}
	</style>
	<link href="https://fonts.googleapis.com/css2?family=Merienda:wght@700&display=swap" rel="stylesheet">

	<div class="w-100">
		<?php
		$packages = $conn->query("SELECT * FROM `packages` order by rand() ");
			while($row = $packages->fetch_assoc() ):
				$cover='';
				if(is_dir(base_app.'uploads/package_'.$row['id'])){
					$img = scandir(base_app.'uploads/package_'.$row['id']);
					$k = array_search('.',$img);
					if($k !== false)
						unset($img[$k]);
					$k = array_search('..',$img);
					if($k !== false)
						unset($img[$k]);
					$cover = isset($img[2]) ? 'uploads/package_'.$row['id'].'/'.$img[2] : "";
				}
				$row['description'] = strip_tags(stripslashes(html_entity_decode($row['description'])));
				$review = $conn->query("SELECT * FROM `rate_review` where package_id='{$row['id']}'");
				$review_count =$review->num_rows;
				$rate = 0;
				while($r= $review->fetch_assoc()){
					$rate += $r['rate'];
				}
				if($rate > 0 && $review_count > 0)
				$rate = number_format($rate/$review_count,0,"");
		?>
			<div class="card d-flex w-100 rounded-0 mb-3 package-item">
				<img class="card-img-top" src="<?php echo validate_image($cover) ?>" alt="<?php echo $row['title'] ?>" height="200rem" style="object-fit:cover">
				<div class="card-body">
				<h5 class="card-title truncate-1"><?php echo $row['title'] ?></h5>
				<div class=" w-100 d-flex justify-content-start">
				<form action="">
					<div class="stars stars-small">
							<input disabled class="star star-5" id="star-5" type="radio" name="star" <?php echo $rate == 5 ? "checked" : '' ?>/> <label class="star star-5" for="star-5"></label> 
							<input disabled class="star star-4" id="star-4" type="radio" name="star" <?php echo $rate == 4 ? "checked" : '' ?>/> <label class="star star-4" for="star-4"></label> 
							<input disabled class="star star-3" id="star-3" type="radio" name="star" <?php echo $rate == 3 ? "checked" : '' ?>/> <label class="star star-3" for="star-3"></label> 
							<input disabled class="star star-2" id="star-2" type="radio" name="star" <?php echo $rate == 2 ? "checked" : '' ?>/> <label class="star star-2" for="star-2"></label> 
							<input disabled class="star star-1" id="star-1" type="radio" name="star" <?php echo $rate == 1 ? "checked" : '' ?>/> <label class="star star-1" for="star-1"></label> 
					</div>
				</form>
				</div>
				<p class="card-text truncate"><?php echo $row['description'] ?></p>
				<div class="w-100 d-flex justify-content-between">
					<span class="rounded-0 btn btn-flat btn-sm btn-primary"><i class="fa fa-tag"></i> <?php echo number_format($row['cost']) ?></span>
					<a href="./?page=view_package&id=<?php echo md5($row['id']) ?>" class="btn btn-sm btn-flat btn-warning">View Package <i class="fa fa-arrow-right"></i></a>
				</div>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
	
	</div>
</section>