<div class="container d-flex flex-column justify-content-between vh-100">
    <div class="row justify-content-center mt-5">
        <div class="col-xl-5 col-lg-6 col-md-10">
            <div class="card">
                <div class="card-header bg-primary">
                    <div class="app-brand">
                        <a href="<?php echo base_url();?>">
                            <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30" height="33"
                                 viewBox="0 0 30 33">
                                <g fill="none" fill-rule="evenodd">
                                    <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                                    <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                                </g>
                            </svg>
                            <span class="brand-name">Shopify Dashboard</span>
                        </a>
                    </div>
                </div>
                <div class="card-body p-5">

                    <h4 class="text-dark mb-5">Sign In</h4>
                    <form action="<?php echo base_url();?>login/validateLogin" method="post">
                        <div class="row">
                            <div class="form-group col-md-12 mb-4">
                                <input type="email" class="form-control input-lg" name="username" id="username" placeholder="Username" required>


                            </div>
                            <div class="form-group col-md-12 ">
                                <input type="password" class="form-control input-lg" name="password" id="password" placeholder="Password" required>
                            </div>
                            <div class="col-md-12">
                                <div class="d-flex my-2 justify-content-between">
                                    <div class="d-inline-block mr-3">
                                        <label class="control control-checkbox">Remember me
                                            <input type="checkbox" />
                                            <div class="control-indicator"></div>
                                        </label>
                                    </div>
                                    <p><a class="text-blue" href="#">Forgot Your Password?</a></p>
                                </div>
                                <button type="submit" name="login" class="btn btn-lg btn-primary btn-block mb-4">Sign In</button>
                                <p>Don't have an account yet ?
                                    <a class="text-blue" href="<?php echo base_url()?>signup">Sign Up</a>
                                </p>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

