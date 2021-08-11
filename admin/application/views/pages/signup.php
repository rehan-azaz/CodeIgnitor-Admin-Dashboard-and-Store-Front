<body class="bg-light-gray" id="body">
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
                    <h4 class="text-dark mb-5">Sign Up</h4>
                    <form action="<?php echo base_url()?>signup/validateSignup" method="post">
                        <div class="row">

                            <div class="form-group col-md-12 mb-4">
                                <input type="text" class="form-control input-lg" name="first_name" placeholder="First Name" required>
                            </div>
                            <div class="form-group col-md-12 mb-4">
                                <input type="text" class="form-control input-lg" name="last_name" placeholder="Last Name" required>
                            </div>
                            <div class="form-group col-md-12 mb-4">
                                <input type="email" class="form-control input-lg" name="email" id="email" placeholder="Email" required>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="image">Uplaod Image</label>
                                <input type="file" class="form-control input-lg" name="image" id="image" placeholder="Upload Image" required>
                            </div>
                            <div class="form-group col-md-12 ">
                                <input type="password" class="form-control input-lg" name="password" id="password" placeholder="Password" required>
                            </div>
                            <div class="form-group col-md-12 ">
                                <input type="password" class="form-control input-lg" onchange="checkPassword()" id="cpassword" placeholder="Confirm Password" required>
                            </div>
                            <div class="col-md-12">
                                <div class="d-inline-block mr-3">
                                    <label class="control control-checkbox">
                                        <input type="checkbox" id="agree" required/>
                                        <div class="control-indicator"></div>
                                        I Agree the terms and conditions
                                    </label>

                                </div>
                                <button type="submit" id="signup" class="btn btn-lg btn-primary btn-block mb-4">Sign Up</button>
                                <p>Already have an account?
                                    <a class="text-blue" href="<?php echo base_url()?>login">Sign in</a>
                                </p>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
<script>
    document.querySelector("#signup").disabled = true;
    function checkPassword(){
        if(document.querySelector("#password").value === document.querySelector("#cpassword").value AND document.querySelector('#agree').checked === true){
            document.querySelector("#signup").disabled = false;
        }
    }
</script>
</body>