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

                    <li>
                        <a class="sidenav-item-link" href="<?php echo base_url()?>users"
                        >
                            <i class="mdi mdi-account-outline"></i>
                            <span class="nav-text">Users
                        </a>
                    </li>

                    <li class="active">
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
        <!-- Header -->
        <?php include 'navbar.php'?>


        <div class="content-wrapper">
            <div class="container mt-5">

                <h1 class="h3 mb-2 text-gray-800">Category</h1>



                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
                    </div>

                    <div class="card-body">
                        <a href="<?php echo base_url()?>category/addCategory">
                            <button class="btn btn-outline-secondary float-right mb-3" id="btn-add-user">Add Category</button>
                        </a>
                        <table id="category-table" class="table table-striped">
                            <thead>
                            <tr>
                                <th width="25%">Name</th>
                                <th width="25%">Image</th>
                                <th width="25%">Description</th>
                                <th width="25%">Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <script>
            $(document).ready(function(){
                $('#category-table').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "order": [[0, "desc" ]],
                    "ajax": {
                        "url": "<?php echo base_url('category/fetchCategories'); ?>",
                        "type": "POST"
                    },


                });
            });
        </script>
