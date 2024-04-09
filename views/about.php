<div class="bg-body-secondary py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-site py-0 d-flex justify-content-center">
            <li class="breadcrumb-item"><a class="text-decoration-none text-body" href="#">Home</a>
            </li>
            <li class="breadcrumb-item active pl-0 d-flex align-items-center" aria-current="page"><?= $title ?></li>
        </ol>
    </nav>
</div>
<section class="pb-14 py-lg-18" data-animated-id="1">
    <div class="container container-xxl">
        <div class="row">
            <div class="col-lg-6">
                <div class="card border-0 hover-zoom-in">
                    <div class="image-box-4">
                        <img style="object-fit: cover;" class="img-fluid loaded"
                            src="<?= $GLOBALS['settings']['img-contact'] ?? null ?>"
                            data-src="./assets/images/background/bg-about-02.jpg" width="960" height="340" alt=""
                            loading="lazy" data-ll-status="loaded">
                    </div>
                    <div class="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 px-xxl-18 mt-12 mt-lg-0">
                <h2 class="mb-8"><?= $title ?></h2>
                <p style="text-align: justify;" class="mb-xl-16"><?= $GLOBALS['settings']['about-content'] ?></span></p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex align-items-start">
                            <div class="d-none">
                                <svg class="icon fs-2">
                                    <use xlink:href="#"></use>
                                </svg>
                            </div>
                            <div>
                                <h3 class="fs-5 mb-6">Message</h3>
                                <div class="fs-6">
                                    <p class="mb-6 fs-15px">Send us a text &amp; an ambassador will respond when
                                        available.</p>
                                    <p class="m-0 fs-6 fw-bold text-primary">
                                        <?= $GLOBALS['settings']['mobile'] ?? null ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pt-9 pt-md-0">
                        <div class="d-flex align-items-start">
                            <div class="d-none">
                                <svg class="icon fs-2">
                                    <use xlink:href="#"></use>
                                </svg>
                            </div>
                            <div>
                                <h3 class="fs-5 mb-6">Store Hours</h3>
                                <div class="fs-6">
                                    <dl class="d-flex mb-0">
                                        <dt class="pe-3 fs-6 text-body-emphasis fw-500" style="width: 110px">Mon – Fri:
                                        </dt>
                                        <dd class="mb-0"> <?= $GLOBALS['settings']['early-in-the-week'] ?? null ?></dd>
                                    </dl>
                                    <dl class="d-flex mb-0">
                                        <dt class="pe-3 fs-6 text-body-emphasis fw-500" style="width: 110px">Sat &amp;
                                            Sun:</dt>
                                        <dd class="mb-0"> <?= $GLOBALS['settings']['weekends'] ?? null ?></dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="from_our_blog_2" class="pt-14 pb-16 py-lg-18 mt-1">
    <div class="container">
        <div class="text-center" data-animate="fadeInUp">
            <h2 class="mb-6">We pride ourselves on have a team of highly skilled</h2>
            <p class="fs-18px mb-0 mw-xl-50 mw-lg-75 ms-auto me-auto">Not cool. Our tightly knitted fabric holds its
                form after repeated wear. Plus, Aldays dress up or down, no prob. So you can wear them all day. Get it?
            </p>
        </div>
    </div>
    <div class="container mt-12 pt-3">
        <div class="slick-slider"
            data-slick-options='{&#34;arrows&#34;:false,&#34;dots&#34;:false,&#34;responsive&#34;:[{&#34;breakpoint&#34;:1200,&#34;settings&#34;:{&#34;slidesToShow&#34;:3}},{&#34;breakpoint&#34;:992,&#34;settings&#34;:{&#34;dots&#34;:true,&#34;slidesToShow&#34;:2}},{&#34;breakpoint&#34;:768,&#34;settings&#34;:{&#34;dots&#34;:true,&#34;slidesToShow&#34;:1}}],&#34;slidesToShow&#34;:3}'>
            <div>
                <article class="card card-post-grid-1 bg-transparent border-0" data-animate="fadeInUp">
                    <figure class="card-img-top position-relative mb-10"><a href="#"
                            class="hover-shine hover-zoom-in d-block"
                            title="A User-Friendly Guide to Natural Cleansers">
                            <img style="height: 493px; object-fit: cover;"
                                data-src="<?= $GLOBALS['settings']['member1'] ?? null ?>"
                                class="img-fluid lazy-image w-100" alt="A User-Friendly Guide to Natural Cleansers"
                                width="370" height="450" src="#">
                        </a><a href="#"
                            class="post-item-cate btn btn-light btn-text-light-body-emphasis btn-hover-bg-dark btn-hover-text-light fw-500 post-cat position-absolute top-100 start-50 translate-middle py-2 px-7 border-0"
                            title="Life style">Life style</a>
                    </figure>
                    <div class="card-body text-center px-md-9 py-0">
                        <h4 class="card-title lh-base mb-9"><a class="text-decoration-none"
                                href="../blog/details-01.html" title="A User-Friendly Guide to Natural Cleansers">
                                TRUONG VAN TUNG</a></h4>
                        <ul class="post-meta list-inline lh-1 d-flex flex-wrap justify-content-center m-0">
                            <li class="list-inline-item border-end pe-5 me-5">By <a href="#" title="Admin">Leader</a>
                            </li>
                            <li class="list-inline-item">PH46392</li>
                        </ul>
                    </div>
                </article>
            </div>
            <div>
                <article class="card card-post-grid-1 bg-transparent border-0" data-animate="fadeInUp">
                    <figure class="card-img-top position-relative mb-10"><a href="#"
                            class="hover-shine hover-zoom-in d-block" title="Our Favorite Multitasking Products">
                            <img style="height: 490px; object-fit: cover;"
                                data-src="<?= $GLOBALS['settings']['member2'] ?? null ?>"
                                class="img-fluid lazy-image w-100" alt="Our Favorite Multitasking Products" width="370"
                                height="450" src="#">
                        </a><a href="#"
                            class="post-item-cate btn btn-light btn-text-light-body-emphasis btn-hover-bg-dark btn-hover-text-light fw-500 post-cat position-absolute top-100 start-50 translate-middle py-2 px-7 border-0"
                            title="Life style">Life style</a>
                    </figure>
                    <div class="card-body text-center px-md-9 py-0">
                        <h4 class="card-title lh-base mb-9"><a class="text-decoration-none"
                                href="../blog/details-01.html" title="Our Favorite Multitasking Products">
                                DO ANH HAO</a></h4>
                        <ul class="post-meta list-inline lh-1 d-flex flex-wrap justify-content-center m-0">
                            <li class="list-inline-item border-end pe-5 me-5">By <a href="#" title="Admin">Member</a>
                            </li>
                            <li class="list-inline-item">PH46419</li>
                        </ul>
                    </div>
                </article>
            </div>
            <div>
                <article class="card card-post-grid-1 bg-transparent border-0" data-animate="fadeInUp">
                    <figure class="card-img-top position-relative mb-10"><a href="#"
                            class="hover-shine hover-zoom-in d-block"
                            title="How To Choose The Right Sofa for your home">
                            <img style="height: 490px;" data-src="<?= $GLOBALS['settings']['member3'] ?? null ?>"
                                class="img-fluid lazy-image w-100" alt="How To Choose The Right Sofa for your home"
                                width="370" height="450" src="#">
                        </a><a href="#"
                            class="post-item-cate btn btn-light btn-text-light-body-emphasis btn-hover-bg-dark btn-hover-text-light fw-500 post-cat position-absolute top-100 start-50 translate-middle py-2 px-7 border-0"
                            title="Life style">Life style</a>
                    </figure>
                    <div class="card-body text-center px-md-9 py-0">
                        <h4 class="card-title lh-base mb-9"><a class="text-decoration-none"
                                href="../blog/details-01.html" title="How To Choose The Right Sofa for your home">
                                TRAN HUU HOANG MINH</a></h4>
                        <ul class="post-meta list-inline lh-1 d-flex flex-wrap justify-content-center m-0">
                            <li class="list-inline-item border-end pe-5 me-5">By <a href="#" title="Admin">Member</a>
                            </li>
                            <li class="list-inline-item">PH46387</li>
                        </ul>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>