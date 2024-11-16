<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Fontfaces CSS-->
    <link href="../../css/php css/font-face.css" rel="stylesheet" media="all">
    <link href="../../../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../../../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../../../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../../../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../../../vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../../../vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../../../vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../../../vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../../../vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../../../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../../../vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../../css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
<!-- MENU SIDEBAR-->
@include('layouts.sidebar_admin')
<!-- END MENU SIDEBAR-->

<!-- PAGE CONTAINER-->
<div class="page-container">
    <!-- HEADER DESKTOP-->
    @include('layouts.header_admin')


    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <h4> Add Product
                    <a href="{{ url('products') }}" class="btn btn-primary float-end">Back</a>
                </h4>
            </div>
                        <form action="{{ url('products/create') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                                <input type="text" name="name" class="form-control" value="" />
                                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-4">
                                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                                <input type="number" name="price" class="form-control" value="" />
                                @error('price')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-4">
                                <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                                <input type="number" name="quantity" class="form-control" value="" />
                                @error('quantity')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-4">
                                <label for="number_of_part" class="block text-sm font-medium text-gray-700">Number of parts</label>
                                <input type="number" name="number_of_part" class="form-control" value="" required>
                                @error('number_of_part')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-4">
                                <label>Upload File/Image</label>
                                <input type="file" name="image" class="form-control"/>
                            </div>

                            <div class="mb-4">
                                <label>Description</label>
                                <textarea name="description" id="" class="form-control" rows="3"></textarea>
                                @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-4">
                                <input type="radio" name="categories_id" value ="1">
                                <label for="Ninjago">Ninjago</label>
                                <input type="radio" name="categories_id" value ="2">
                                <label for="Minecraft">Minecraft</label>
                                <input type="radio" name="categories_id" value ="3">
                                <label for="StarWar">StarWar</label>
                                <input type="radio" name="categories_id" value ="4">
                                <label for="Demon Slayer">Demon Slayer</label>
                                <input type="radio" name="categories_id" value ="5">
                                <label for="Collection">Collection</label>
                                <input type="radio" name="categories_id" value ="6">
                                <label for="Kamen Rider">Kamen Rider</label>
                            </div>

                            <div class="mb-4">
                                <input type="radio" name="product_type_id" value ="1">
                                <label for="Adult">Adult</label>
                                <input type="radio" name="product_type_id" value ="2">
                                <label for="Child">Child</label>
                            </div>

                            <div class="mb-4">
                                <label>Status</label>
                                <input type="checkbox" name="is_active" {{ old('is_active') == true ? 'checked':'' }}/>
                                @error('is_active')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>



        <!-- Jquery JS-->
        <script src="../../../vendor/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap JS-->
        <script src="../../../vendor/bootstrap-4.1/popper.min.js"></script>
        <script src="../../../vendor/bootstrap-4.1/bootstrap.min.js"></script>
        <!-- Vendor JS       -->
        <script src="../../../vendor/slick/slick.min.js">
        </script>
        <script src="../../../vendor/wow/wow.min.js"></script>
        <script src="../../../vendor/animsition/animsition.min.js"></script>
        <script src="../../../vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
        </script>
        <script src="../../../vendor/counter-up/jquery.waypoints.min.js"></script>
        <script src="../../../vendor/counter-up/jquery.counterup.min.js">
        </script>
        <script src="../../../vendor/circle-progress/circle-progress.min.js"></script>
        <script src="../../../vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="../../../vendor/chartjs/Chart.bundle.min.js"></script>
        <script src="../../../vendor/select2/select2.min.js">
        </script>

        <!-- Main JS-->
        <script src="../../js/main.js"></script>

        </body>

        </html>
