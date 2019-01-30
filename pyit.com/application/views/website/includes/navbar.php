<body style="font-family: 'Slabo 27px', serif;">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background: rgba(204, 71, 16, 0.9); background-image: linear-gradient(to left, rgba(204, 71, 16, 0.9), rgba(255,116,20))">
      <div class="container" >
        <a class="navbar-brand" href="<?php echo URL; ?>"><img src="<?php echo URL; ?>assets/website/logo/logo-4.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link <?php if($title == 'Home'){ echo 'active';} ?>" href="<?php echo URL; ?>">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item <?php if($title == 'Products'){ echo 'active';} ?>">
              <a class="nav-link" href="<?php echo URL; ?>products">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Industry</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Marketing</a>
            </li>
            <li class="nav-item <?php if($title == 'Partners'){ echo 'active';} ?>">
              <a class="nav-link" href="<?php echo URL; ?>partners">Our Partners</a>
            </li>
            
            <li class="nav-item <?php if($title == 'Strengths'){ echo 'active';} ?>">
              <a class="nav-link" href="<?php echo URL; ?>strengths">Our Strengths</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn text-light mt-2 px-2" href="<?php echo URL; ?>authentication/login" style="background-color: #1A3F78; padding: 0px; border-radius: 0px;">Sign-in</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
