<section>
    <div class="slick-slider hero hero-header-09" data-slick-options="{&#34;arrows&#34;:false,&#34;autoplay&#34;:true,&#34;cssEase&#34;:&#34;ease-in-out&#34;,&#34;dots&#34;:false,&#34;fade&#34;:true,&#34;infinite&#34;:true,&#34;slidesToShow&#34;:1,&#34;speed&#34;:600}">
        <?php foreach ($imgThumbnail as $img) : ?>
            <div class="vh-100 d-flex align-items-center">
                <div class="lazy-bg bg-overlay position-absolute z-index-1 w-100 h-100 light-mode-img" data-bg-src="<?= BASE_URL . $img['image'] ?>"></div>
                <div class="lazy-bg bg-overlay dark-mode-img position-absolute z-index-1 w-100 h-100" data-bg-src="<?= BASE_URL ?>assets/client/images/hero-slider/hero-slider-white-18.jpg"></div>
                <div class="position-relative z-index-2 container container-xxl pt-22 pb-15 pt-xl-13 pb-xl-11">
                    <div class="border-0 ps-lg-1 mx-md-0 mx-auto hero-card text-center">
                        <div class="text-start text-xl-center">
                            <div data-animate="fadeInDown">
                                <p class="text-primary mb-8 hero-title font-primary">
                                    Made for you!
                                </p>
                                <h1 style="color:white" class="mb-7 hero-title">
                                    <?= $img['heading'] ?>
                                </h1>
                                <p class="hero-desc fs-18px mb-11 text-body-calculate">
                                    <?= $img['description'] ?>
                                </p>
                            </div>
                            <a href="#" data-animate="fadeInUp" class="btn btn-lg btn-dark btn-hover-bg-primary btn-hover-border-primary">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>