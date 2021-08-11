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

                <form action="<?php echo base_url()?>products/validateEditProduct?id=<?php echo $productData[0]->id;?>" class="form-horizontal" method="post">
                    <div class="modal-content  my-4">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Product</h4>

                        </div>
                        <div class="modal-body">

                            <div class="box-body">

                                <div class="form-group">
                                    <label class="col-sm-4 control-label" for="product_category">Product Category</label>
                                    <div class="col-sm-6">
                                        <select  class="form-control" id="product_category" name="product_category" >
                                            <option>
                                                <?php echo $productData[0]->product_category ?>
                                            </option>
                                            <?php
                                            foreach($categories as $category)
                                            {
                                                ?>
                                                <option><?php print_r($category->name); ?></option>
                                                <?php

                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label" for="product_name">Product Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $productData[0]->product_name ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label" for="product_info">Product Info</label>
                                    <div class="col-sm-6">
                                        <textarea type="text" class="form-control" id="editor" name="product_info" value="<?php echo $productData[0]->product_info ?>"><?php echo $productData[0]->product_info ?></textarea>
                                    </div>
                                </div>
                                <script>
                                    ClassicEditor
                                        .create( document.querySelector( '#editor' ) )
                                        .catch( error => {
                                            console.error( error );
                                        } );
                                </script>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label" for="product_price">Product Price</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="product_price" name="product_price" value="<?php echo $productData[0]->product_price ?>" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label" for="product_image">Product Image</label>
                                    <div class="col-sm-6">
                                        <input type="file" onchange="showImages()" multiple class="form-control" id="product_image" name="product_image[]" value="<?php echo $productData[0]->product_price ?>">
                                    </div>
                                </div>
                                <div id="showImage" class="row">
                                </div>
                                <script>
                                    function showImages(){
                                        document.querySelector("#product_image").addEventListener('change', product_image, false);

                                        var total_file=document.querySelector("#product_image").files.length;
                                        var files =  document.getElementById('product_image').files;

                                        for(var i=0;i<total_file;i++) {
                                            $('#showImage').append("<div class='card col-md-2'><img src='"+"<?php echo base_url()?>assets/img/"+files[i]['name']+"'/></div>");
                                        }
                                    }

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="submit" class="btn btn-success" id="update" name="update" value="Update" style="float: right">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>




            </div>


        </div>
