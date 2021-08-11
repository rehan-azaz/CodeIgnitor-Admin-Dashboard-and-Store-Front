<body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
<script>
    NProgress.configure({ showSpinner: false });
    NProgress.start();
</script>

<div class="mobile-sticky-body-overlay"></div>

<div class="wrapper">

    <aside class="left-sidebar bg-sidebar">
        <div id="sidebar" class="sidebar sidebar-with-footer">

            <div class="app-brand">
                <a href="<?php echo base_url()?>">
                    <svg
                        class="brand-icon"
                        xmlns="http://www.w3.org/2000/svg"
                        preserveAspectRatio="xMidYMid"
                        width="30"
                        height="33"
                        viewBox="0 0 30 33"
                    >
                        <g fill="none" fill-rule="evenodd">
                            <path
                                class="logo-fill-blue"
                                fill="#7DBCFF"
                                d="M0 4v25l8 4V0zM22 4v25l8 4V0z"
                            />
                            <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                        </g>
                    </svg>
                    <span class="brand-name">Shopify Dashboard</span>
                </a>
            </div>
            <!-- begin sidebar scrollbar -->
            <div class="sidebar-scrollbar">

                <!-- sidebar menu -->
                <ul class="nav sidebar-inner" id="sidebar-menu">

                    <li class="active">
                        <a class="sidenav-item-link" href="<?php echo base_url()?>users"
                        >
                            <i class="mdi mdi-account-outline"></i>
                            <span class="nav-text">Users
                        </a>
                    </li>

                    <li>
                        <a class="sidenav-item-link" href="<?php echo base_url()?>category">
                            <i class="mdi mdi-square-inc"></i>
                            <span class="nav-text">Category
                        </a>
                    </li>

                    <li>
                        <a class="sidenav-item-link" href="<?php echo base_url()?>products"
                        >
                            <i class="mdi mdi-package-variant"></i>
                            <span class="nav-text">Products
                        </a>
                    </li>

                    <li>
                        <a class="sidenav-item-link" href="<?php echo base_url()?>orders"
                        >
                            <i class="mdi mdi-package-variant"></i>
                            <span class="nav-text">Orders
                        </a>
                    </li>

                </ul>

            </div>

        </div>
    </aside>


    <div class="page-wrapper">

        <?php include 'navbar.php'?>

        <div class="content-wrapper">
            <div class="container">

                <form action="<?php echo base_url()?>users/validateAddUser" class="form-horizontal" method="post">
                    <div class="modal-content  my-4">
                        <div class="modal-header">
                            <h4 class="modal-title">Add User</h4>

                        </div>
                        <div class="modal-body">
                            <form action="" method="post" class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="first_name">First Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="first_name" name="first_name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="last_name">Last Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="last_name" name="last_name" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="email">Email</label>
                                        <div class="col-sm-6">
                                            <input type="email" class="form-control" id="email" name="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="image">Image</label>
                                        <div class="col-sm-6">
                                            <input type="file" class="form-control" id="image" name="image">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="password">Password</label>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control" id="password" name="password" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="submit" class="btn btn-success" id="add" name="add" value="Add" style="float: right">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>



            </div>


        </div>
