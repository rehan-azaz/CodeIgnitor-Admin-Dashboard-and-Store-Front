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
        <!-- Header -->
        <?php include 'navbar.php'?>


        <div class="content-wrapper">
            <div class="container mt-5">

                <h1 class="h3 mb-2 text-gray-800">Users</h1>



                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Admins</h6>
                    </div>

                    <div class="card-body">
                        <a href="<?php echo base_url()?>users/adduser">
                            <button class="btn btn-outline-secondary float-right mb-3" id="btn-add-user">Add User</button>
                        </a>
                        <table id="users-table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th width="15%">First Name</th>
                                    <th width="15%">Last Name</th>
                                    <th width="25%">Email</th>
                                    <th width="15%">Image</th>
                                    <th width="10%">Role</th>
                                    <th width="20%">Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>Role</th>
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
                $('#users-table').DataTable({

                    "processing": true,
                    "serverSide": true,
                    "order": [[0, "desc" ]],
                    "ajax": {
                        "url": "<?php echo base_url('users/fetchUsers'); ?>",
                        "type": "POST"
                    },
                    "columnDefs": [{
                        "targets": [3, 5],
                        "orderable": false
                    }]

                });
            });
        </script>
