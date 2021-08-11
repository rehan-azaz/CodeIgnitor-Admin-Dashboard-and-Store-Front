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

                    <li >
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

                    <li class="active">
                        <a class="sidenav-item-link" href="<?php echo base_url()?>products"
                        >
                            <i class="mdi mdi-package-variant"></i>
                            <span class="nav-text">Products
                        </a>
                    </li>

                </ul>

            </div>

        </div>
    </aside>


    <div class="page-wrapper">

        <!--        --><?php //include 'navbar.php'?>

        <div class="content-wrapper">
            <div class="container">

                <div class="modal-content  my-4">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Product</h4>

                        </div>
                        <div class="modal-body">

                            <div class="box-body">

                                <div class="form-group">
                                    <label class="col-sm-4 control-label" for="product_image">Product Image</label>
                                    <div class="col-sm-6">
                                        <form action="<?= base_url('products/fileupload') ?>" class="dropzone" id="fileupload">

                                        </form>
                                        <script>
                                            Dropzone.options.fileupload = {
                                                acceptedFiles: 'image/*',
                                                maxFilesize: 1
                                            };
                                        </script>
                                    </div>
                                </div>

                                <a href="<?php echo base_url()?>products">
                                    <button class="btn btn-success">
                                        Done
                                    </button></a>
                            </div>

                        </div>
                    </div>





            </div>


        </div>
