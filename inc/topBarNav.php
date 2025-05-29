 <!-- Navigation-->
 <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-shrink" id="mainNav">
            <div class="container-fluid">
                <a class="navbar-brand" href="#page-top"><span class="text-waring">Turismo ng Calintaan</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $page !='home' ? './':'' ?>">
            <i class="fas fa-home nav-icon"></i>Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./?page=packages">
            <i class="fas fa-map-marked-alt nav-icon"></i>Packages
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $page !='home' ? './':'' ?>#about">
            <i class="fas fa-info-circle nav-icon"></i>About
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $page !='home' ? './':'' ?>#contact">
            <i class="fas fa-envelope nav-icon"></i>Contact
          </a>
        </li>
        <?php if(isset($_SESSION['userdata'])): ?>
        <li class="nav-item">
          <a class="nav-link" href="./?page=my_account">
            <i class="fas fa-user nav-icon"></i>Hi, <?php echo $_settings->userdata('firstname') ?>!
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-warning" href="logout.php" title="Logout">
            <i class="fas fa-sign-out-alt"></i>
          </a>
        </li>
        <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)" id="login_btn">
            <i class="fas fa-sign-in-alt nav-icon"></i>Login
          </a>
        </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
<script>
  $(function(){
    $('#login_btn').click(function(){
      uni_modal("","login.php","large")
    })
    $('#navbarResponsive').on('show.bs.collapse', function () {
        $('#mainNav').addClass('navbar-shrink')
    })
    $('#navbarResponsive').on('hidden.bs.collapse', function () {
        if($('body').offset.top == 0)
          $('#mainNav').removeClass('navbar-shrink')
    })
  })
</script><!-- Add Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- Navigation Bar -->
<style>
  body {
    font-family: 'Poppins', sans-serif;
  }

  .navbar-nav .nav-link {
    color: #fff;
    font-weight: 500;
    transition: all 0.3s ease;
  }

  .navbar-nav .nav-link:hover {
    color: #ffc107 !important;
    transform: scale(1.05);
  }

  .navbar {
    background-color: #007bff; /* primary */
  }

  .nav-icon {
    margin-right: 5px;
  }
</style>