<header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <?php foreach ($images as $image): ?>
                <div class="carousel-item <?php if($image['image_id'] == 1 ){ echo 'active';} ?>" style="background-image: url(<?php echo URL; ?>uploads/slider_images/<?php echo $image['image_name']; ?>);">
                    <div class="carousel-caption d-none d-md-block" style="background: rgba(204, 71, 16, 0.5);">
                    <?php if ($image['image_id'] == 1): ?>
                        <h3>First Slide</h3>
                        <p>This is a description for the first slide.</p>
                    <?php endif ?>

                    <?php if ($image['image_id'] == 2): ?>
                        <h3>Second Slide</h3>
                        <p>This is a description for the second slide.</p>
                    <?php endif ?>

                    <?php if ($image['image_id'] == 3): ?>
                        <h3>Third Slide</h3>
                        <p>This is a description for the third slide.</p>
                    <?php endif ?>
                        
                    </div>
                </div>
            <?php endforeach ?>
            <!-- Slide One - Set the background image for this slide in the line below -->
            <!-- <div class="carousel-item active" style="background-image: url('images/img-slide-1.jpg'); background-position: bottom center;">
                <div class="carousel-caption d-none d-md-block" style="background: rgba(204, 71, 16, 0.5);">
                    <h3>First Slide</h3>
                    <p>This is a description for the first slide.</p>
                </div>
            </div> -->
            <!-- Slide Two - Set the background image for this slide in the line below -->
            <!-- <div class="carousel-item" style="background-image: url('images/img-slide-2.jpg'); background-position: center center;">
                <div class="carousel-caption d-none d-md-block" style="background: rgba(204, 71, 16, 0.5);">
                    <h3>Second Slide</h3>
                    <p>This is a description for the second slide.</p>
                </div>
            </div> -->
            <!-- Slide Three - Set the background image for this slide in the line below -->
            <!-- <div class="carousel-item" style="background-image: url('images/img-slide-3.jpg')">
                <div class="carousel-caption d-none d-md-block" style="background: rgba(204, 71, 16, 0.5);">
                    <h3>Third Slide</h3>
                    <p>This is a description for the third slide.</p>
                </div>
            </div> -->
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </div>
</header>
<!-- Page Content -->
<section class="py-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 px-5">
                <div class="row intro-section">
                    <h1 style="border-bottom: 2px solid rgba(204, 71, 16, 1);">Introduction</h1>
                    <p class="">PYIT is a private mining company which holds multiple leases in Gilgit-Baltistan area for mining precious metals like <b>GOLD, COBALT, VENEDIUM, ZIRCONIUM, COPPER</b>, etc. The company aims to establish long-term relationships with the world's best mining companies in order to better utilize Gilgit-Baltistan's natural resources with the goals of sustainable development and environmental protection.</p>
                </div>
                <div class="row mission-section">
                    <h1 style="border-bottom: 2px solid rgba(204, 71, 16, 1);">Mission</h1>
                    <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis quo, dolorum obcaecati, maxime rem ratione, doloremque, eaque sint praesentium illum omnis cum cumque alias distinctio! Aspernatur nobis, vel labore iste.</p>
                </div>
                <div class="row vision-section">
                    <h1 style="border-bottom: 2px solid rgba(204, 71, 16, 1);">Vision</h1>
                    <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis quo, dolorum obcaecati, maxime rem ratione, doloremque, eaque sint praesentium illum omnis cum cumque alias distinctio! Aspernatur nobis, vel labore iste.</p>
                </div>
            </div>
            <div class="col-md-3 px-5 contact-section" style="border-left: 1px solid #777F70;">
                <h4 class="pb-2" style="border-bottom: 1px solid #777F70;">Contact Us</h4>
                <p><b>Address</b>: Street 123, ABC Area, XYZ Province, Pakistan</p>
                <p><b>Contact</b>: 03xx-123456789, 03xx-123456789</p>
                <p><b>Email Us</b>: 
                <form action="">
                    <label for="">Email Address</label>
                    <input class="form-control" type="text" placeholder="someone@mail.com">
                    <label for="">Message</label>
                    <textarea class="form-control" name="" id="" cols="30" rows="6"></textarea>
                    <button class="btn btn-dark mt-2">Send</button>
                </form>
                </p>
            </div>
            <div class="col-md-3 px-5 contact-section" style="border-left: 1px solid #777F70;">
                <h4 class="pb-2" style="border-bottom: 1px solid #777F70;">Latest News</h4>
                <?php foreach ($news_list as $news): ?>
                    <h4><?= $news['news_headline']; ?></h4>
                    <p><?= word_limiter($news['news_description'], 20);?></p>
                <?php endforeach ?>
                
            </div>
        </div>
    </div>
</section>