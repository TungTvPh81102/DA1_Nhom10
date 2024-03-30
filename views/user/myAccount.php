<div class="bg-body-secondary py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-site py-0 d-flex justify-content-center">
            <li class="breadcrumb-item"><a class="text-decoration-none text-body" href="#">Home</a>
            </li>
            <li class="breadcrumb-item active pl-0 d-flex align-items-center" aria-current="page">
                <?= $title ?>
            </li>
        </ol>
    </nav>
</div>
<div class="my-account-wrapper section-padding pb-lg-20 pb-16">
    <div class="container py-5">
        <div class="section-bg-color">
            <div class="row">
                <div class="col-lg-12">
                    <div class="myaccount-page-wrapper">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div style="border-right: 1px solid black;" class="col-lg-3 col-md-4">
                                        <div class="myaccount-tab-menu nav d-flex flex-column" role="tablist">
                                            <a href="#dashboad" class="active mb-5" data-bs-toggle="tab">
                                                <i class="fa fa-dashboard"></i>
                                                Dashboard
                                            </a>
                                            <a href="#orders" class="mb-5" data-bs-toggle="tab"><i
                                                    class="fa fa-cart-arrow-down"></i>
                                                Orders</a>
                                            <a href="#account-info" class="mb-5" data-bs-toggle="tab"><i
                                                    class="fa fa-user"></i>
                                                Account
                                                Details</a>
                                            <a href="#change-password" class="mb-5" data-bs-toggle="tab"><i
                                                    class="fa fa-user"></i>
                                                Change Password
                                            </a>
                                            <a href="login-register.html"><i class="fa fa-sign-out"></i> Logout</a>
                                        </div>
                                    </div>

                                    <div class="col-lg-9 col-md-8">
                                        <div class="tab-content" id="myaccountContent">

                                            <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h5>Dashboard</h5>
                                                    <div class="welcome">
                                                        <p>Hello, <strong>Erik Jhonson</strong> (If Not <strong>Jhonson
                                                                !</strong><a href="login-register.html" class="logout">
                                                                Logout</a>)</p>
                                                    </div>
                                                    <p class="mb-0">From your account dashboard. you can easily check
                                                        &amp;
                                                        view your recent orders, manage your shipping and billing
                                                        addresses
                                                        and edit your password and account details.</p>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="orders" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h5>Orders</h5>
                                                    <div class="myaccount-table table-responsive text-center">
                                                        <table class="table table-bordered">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th>Order</th>
                                                                    <th>Date</th>
                                                                    <th>Status</th>
                                                                    <th>Total</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>Aug 22, 2018</td>
                                                                    <td>Pending</td>
                                                                    <td>$3000</td>
                                                                    <td><a href="cart.html" class="btn btn-sqr">View</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>July 22, 2018</td>
                                                                    <td>Approved</td>
                                                                    <td>$200</td>
                                                                    <td><a href="cart.html" class="btn btn-sqr">View</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>June 12, 2017</td>
                                                                    <td>On Hold</td>
                                                                    <td>$990</td>
                                                                    <td><a href="cart.html" class="btn btn-sqr">View</a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="account-info" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h5>Account Details</h5>
                                                    <div class="account-details-form">
                                                        <form action="#" method="post" enctype="multipart/form-data">
                                                            <div class="seller-application-section">
                                                                <div class="row ">
                                                                    <div class="col-lg-7">
                                                                        <div class=" account-section">

                                                                            <div class="review-form">
                                                                                <div class=" account-inner-form">
                                                                                    <div class="review-form-name">
                                                                                        <label for="firname"
                                                                                            class="form-label">First
                                                                                            Name*</label>
                                                                                        <input name="first_name"
                                                                                            type="text" id="firname"
                                                                                            class="form-control mb-5"
                                                                                            placeholder="First Name"
                                                                                            value="<?= $_SESSION['user'] ? $_SESSION['user']['first_name'] : null ?>">
                                                                                    </div>
                                                                                    <div class="review-form-name">
                                                                                        <label for="latname"
                                                                                            class="form-label">Last
                                                                                            Name*</label>
                                                                                        <input name="last_name"
                                                                                            type="text" id="latname"
                                                                                            class="form-control mb-5"
                                                                                            placeholder="Last Name"
                                                                                            value="<?= $_SESSION['user'] ? $_SESSION['user']['last_name'] : null ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class=" account-inner-form">
                                                                                    <div class="review-form-name">
                                                                                        <label for="gmail"
                                                                                            class="form-label">Email*</label>
                                                                                        <input name="email" type="email"
                                                                                            id="gmail"
                                                                                            class="form-control mb-5"
                                                                                            placeholder="user@gmail.com"
                                                                                            value="<?= $_SESSION['user'] ? $_SESSION['user']['email'] : null ?>">
                                                                                    </div>
                                                                                    <div class="review-form-name">
                                                                                        <label for="telephone"
                                                                                            class="form-label">Phone*</label>
                                                                                        <input name="phone_number"
                                                                                            type="text" id="telephone"
                                                                                            class="form-control mb-5"
                                                                                            placeholder="+880388**0899"
                                                                                            value="<?= $_SESSION['user'] ? $_SESSION['user']['phone_number'] : null ?>">
                                                                                    </div>
                                                                                    <div class="review-form-name">
                                                                                        <label for="telephone"
                                                                                            class="form-label">Address*</label>
                                                                                        <input name="address"
                                                                                            type="text" id="telephone"
                                                                                            class="form-control mb-5"
                                                                                            value="<?= $_SESSION['user'] ? $_SESSION['user']['address'] : null ?>">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="submit-btn mt-7">
                                                                                    <button type="reset"
                                                                                        class="btn btn-light">Cancel</button>
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary">Update
                                                                                        Profile</button>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-5">
                                                                        <div class="card mb-8 rounded-4">
                                                                            <div class="card-header p-7 bg-transparent">
                                                                                <h4
                                                                                    class="fs-18px mb-0 font-weight-500">
                                                                                    Media</h4>
                                                                            </div>
                                                                            <div class="card-body p-7">
                                                                                <div class="input-upload">
                                                                                    <div class="mb-7">
                                                                                        <img src="<?= BASE_URL . $_SESSION['user']['avatar'] ?>"
                                                                                            width="102"
                                                                                            class="d-block mx-auto rounded-circle"
                                                                                            alt="">
                                                                                    </div>
                                                                                    <input name="avatar"
                                                                                        class="form-control"
                                                                                        type="file">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="change-password">
                                                <fieldset>
                                                    <legend>Password change</legend>
                                                    <div class="single-input-item">
                                                        <label for="current-pwd" class="required">Current
                                                            Password</label>
                                                        <input type="password" id="current-pwd"
                                                            placeholder="Current Password">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                <label for="new-pwd" class="required">New
                                                                    Password</label>
                                                                <input type="password" id="new-pwd"
                                                                    placeholder="New Password">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                <label for="confirm-pwd" class="required">Confirm
                                                                    Password</label>
                                                                <input type="password" id="confirm-pwd"
                                                                    placeholder="Confirm Password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>