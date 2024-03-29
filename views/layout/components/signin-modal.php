<div class="modal" id="signInModal" tabindex="-1" aria-labelledby="signInModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header text-center border-0 pb-0">
                <button type="button" class="btn-close position-absolute end-5 top-5" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                <h3 class="modal-title w-100" id="signInModalLabel">Sign In</h3>
            </div>
            <div class="modal-body px-sm-13 px-8">
                <p class="text-center fs-16 mb-10">
                    Don’t have an account yet?
                    <a href="<?= BASE_URL ?>?action=register-client" class="text-black">Sign up</a>
                    for free
                </p>
                <form action="<?= BASE_URL ?>?action=login-client" method="post">
                    <input name="email" type="email" class="form-control mb-5" placeholder="Your email" required />
                    <input name="password" type="password" class="form-control" placeholder="Password" required />
                    <div class="d-flex align-items-center justify-content-between mt-8 mb-7">
                        <div class="custom-control d-flex form-check">
                            <input name="stay-signed-in" type="checkbox" class="form-check-input rounded-0 me-3"
                                id="staySignedIn" />
                            <label class="custom-control-label text-body" for="staySignedIn">Stay signed in</label>
                        </div>
                        <a href="<?= BASE_URL ?>?action=forgot-password" class="text-secondary">Forgot your
                            password?</a>
                    </div>
                    <button type="submit" class="btn btn-dark btn-hover-bg-primary btn-hover-border-primary w-100">
                        Log In
                    </button>
                </form>
            </div>
            <div class="modal-footer px-13 pt-0 pb-12 border-0">
                <div class="border-bottom w-100"></div>
                <div class="text-center lh-1 mb-8 w-100 mt-n5">
                    <span class="fs-14 bg-body lh-1 px-4">or Log-in with</span>
                </div>
                <div class="d-flex w-100">
                    <a href="#"
                        class="btn btn-outline-secondary w-100 border-2x me-5 btn-hover-bg-primary btn-hover-border-primary"><i
                            class="fab fa-facebook-f me-4" style="color: #2e58b2"></i>Facebook</a>
                    <a href="#"
                        class="btn btn-outline-secondary w-100 border-2x mt-0 btn-hover-bg-primary btn-hover-border-primary"><i
                            class="fab fa-google me-4" style="color: #dd4b39"></i>Google</a>
                </div>
            </div>
        </div>
    </div>
</div>