<section data-animated-id="1">
    <div class="bg-body-secondary py-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-site py-0 d-flex justify-content-center">
                <li class="breadcrumb-item"><a class="text-decoration-none text-body" href="#">Home</a>
                </li>
                <li class="breadcrumb-item active pl-0 d-flex align-items-center" aria-current="page">Contact Us</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class="text-center pt-13 mb-13 mb-lg-15">
            <div class="text-center">
                <h2 class="fs-36px mb-7">Keep In Touch with Us</h2>
                <p class="fs-18px mb-0 w-lg-60 w-xl-50 mx-md-13 mx-lg-auto">We’re talking about clean beauty gift sets,
                    of course – and we’ve got a bouquet of beauties for yourself or someone you love.</p>
            </div>
        </div>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8049491840543!2d105.7361725756684!3d21.040489087374777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab6b960c64f3%3A0xe299d1031f8a0a95!2zQ2FvIMSR4bqzbmcgcG9seQ!5e0!3m2!1sen!2s!4v1712235398473!5m2!1sen!2s"
            width="1170" height="535" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>

<section class="py-15 py-lg-18" data-animated-id="2">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <h2 class="mb-11 fs-3">Sent A Message</h2>
                <form class="contact-form" method="post" action="#">
                    <div class="row mb-8 mb-md-10">
                        <div class="col-md-6 col-12 mb-8 mb-md-0">
                            <input type="text" class="form-control input-focus" placeholder="Name">
                        </div>
                        <div class="col-md-6 col-12">
                            <input type="email" class="form-control input-focus" placeholder="Email">
                        </div>
                    </div>
                    <textarea class="form-control mb-6 input-focus" placeholder="Messenger" rows="7"></textarea>
                    <div class="form-check mb-9 text-start">
                        <input class="form-check-input rounded-0" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Save my name, email in this browse for the next time I comment
                        </label>
                    </div>
                    <button type="submit"
                        class=" btn btn-dark btn-hover-bg-primary btn-hover-border-primary px-11">Submit</button>
                </form>
            </div>
            <div class="col-lg-5 ps-lg-18 ps-xl-21 mt-13 mt-lg-0">
                <div class="d-flex align-items-start mb-11 me-15">
                    <div class="d-none">
                        <svg class="icon fs-2">
                            <use xlink:href="#"></use>
                        </svg>
                    </div>
                    <div>
                        <h3 class="fs-5 mb-6">Address</h3>
                        <div class="fs-6">
                            <p class="mb-5"><?= $GLOBALS['settings']['address'] ?? null ?></p>
                        </div>
                        <a href="#" class="text-decoration-none border-bottom border-currentColor fw-semibold fs-6">Get
                            Direction</a>
                    </div>
                </div>
                <div class="d-flex align-items-start">
                    <div class="d-none">
                        <svg class="icon fs-2">
                            <use xlink:href="#"></use>
                        </svg>
                    </div>
                    <div>
                        <h3 class="fs-5 mb-6">Contact</h3>
                        <div class="fs-6">
                            <p class="mb-3 fs-6">Mobile:<span
                                    class="text-body-emphasis"><?= $GLOBALS['settings']['mobile'] ?? null ?></span></p>
                            <p class="mb-3 fs-6">Hotline:<span class="text-body-emphasis">
                                    <?= $GLOBALS['settings']['hotline'] ?? null ?></span></p>
                            <p class="mb-0 fs-6">E-mail: <?= $GLOBALS['settings']['email'] ?? null ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>