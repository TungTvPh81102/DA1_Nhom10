<div class="modal" id="signUpModal" tabindex="-1" aria-labelledby="signUpModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header text-center border-0 pb-0">
                <button type="button" class="btn-close position-absolute end-5 top-5" data-bs-dismiss="modal" aria-label="Close"></button>
                <h3 class="modal-title w-100" id="signUpModalLabel">Sign Up</h3>
            </div>
            <div class="modal-body px-sm-13 px-8">
                <p class="text-center fs-16 mb-10">
                    Already have an account?
                    <a href="#" data-bs-toggle="modal" data-bs-target="#signInModal" class="text-black">Log in</a>
                </p>
                <form action="#">
                    <input name="first-name" type="text" class="form-control border-1 mb-5" placeholder="First name" required />
                    <input name="last-name" type="text" class="form-control border-1 mb-5" placeholder="Last name" required />
                    <input name="email" type="email" class="form-control border-1 mb-5" placeholder="Your email" required />
                    <input name="password" type="password" class="form-control border-1" placeholder="Password" required />
                    <div class="d-flex align-items-center mt-8 mb-7">
                        <div class="form-check">
                            <input name="agree-policy-terms" type="checkbox" class="form-check-input rounded-0 me-3" id="agreePolicyTerm" />
                            <label class="custom-control-label text-body" for="agreePolicyTerm">Yes, I agree with
                                Grace
                                <a href="#" class="text-black">Privacy Policy</a> and
                                <a href="#" class="text-black">Terms of Use</a></label>
                        </div>
                    </div>
                    <button type="submit" value="Sign Up" class="btn btn-dark btn-hover-bg-primary btn-hover-border-primary w-100">
                        Sign Up
                    </button>
                </form>
            </div>
            <div class="modal-footer px-13 pt-0 pb-12 border-0">
                <div class="border-bottom w-100"></div>
                <div class="text-center lh-1 mb-8 w-100 mt-n5">
                    <span class="fs-14 bg-body lh-1 px-4">or Sign Up with</span>
                </div>
                <div class="d-flex w-100">
                    <a href="#" class="btn btn-outline-secondary w-100 border-2x me-5 btn-hover-bg-primary btn-hover-border-primary"><i class="fab fa-facebook-f me-4" style="color: #2e58b2"></i>Facebook</a>
                    <a href="#" class="btn btn-outline-secondary w-100 border-2x mt-0 btn-hover-bg-primary btn-hover-border-primary"><i class="fab fa-google me-4" style="color: #dd4b39"></i>Google</a>
                </div>
            </div>
        </div>
    </div>
</div>