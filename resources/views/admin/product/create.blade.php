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
    <link href="../../../../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../../../../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../../../../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../../../../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../../../../vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../../../../vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../../../../vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../../../../vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../../../../vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../../../../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../../../../vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../../../css/theme.css" rel="stylesheet" media="all">

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
            <form  enctype='multipart/form-data' action="{{ url('products/create') }}" method="POST">
                @csrf
                @method('post')
                <div class="form-group">
                    <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                </div>
                @if ($errors->has('name'))
                    @foreach ($errors->get('name') as $error)
                        <span class="text-danger fs-7">{{ $error }}</span>
                    @endforeach
                @endif

                <div class="form-group">
                    <label for="new" class="block text-sm font-medium text-gray-700">New</label>
                    <input type="radio" name="new" value="1" style="margin-left: 40px"> New
                    <input type="radio" name="new" value="0" style="margin-left: 40px"> Old <br>
                </div>
                @if ($errors->has('new'))
                    @foreach ($errors->get('new') as $error)
                        <span class="text-danger fs-7">{{ $error }}</span>
                    @endforeach
                @endif

                <div class="form-group">
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" step="any" name="price" id="price" class="form-control" value="{{ old('price') }}" required>
                </div>
                @if ($errors->has('price'))
                    @foreach ($errors->get('price') as $error)
                        <span class="text-danger fs-7">{{ $error }}</span>
                    @endforeach
                @endif

                <div class="form-group">
                    <label for="promotion_price" class="block text-sm font-medium text-gray-700">Promotion price</label>
                    <input type="number" step="any" name="promotion_price" id="promotion_price" class="form-control"
                           value="{{ old('promotion_price') }}" required>
                </div>
                @if ($errors->has('promotion_price'))
                    @foreach ($errors->get('promotion_price') as $error)
                        <span class="text-danger fs-7">{{ $error }}</span>
                    @endforeach
                @endif

                <div class="form-group">
                    <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity') }}" required>
                </div>
                @if ($errors->has('quantity'))
                    @foreach ($errors->get('quantity') as $error)
                        <span class="text-danger fs-7">{{ $error }}</span>
                    @endforeach
                @endif

                <div class="form-group">
                    <label for="number_of_part" class="block text-sm font-medium text-gray-700">Number of parts</label>
                    <input type="number" name="number_of_part" id="number_of_part" class="form-control"
                           value="{{ old('number_of_part') }}" required>
                </div>
                @if ($errors->has('number_of_part'))
                    @foreach ($errors->get('number_of_part') as $error)
                        <span class="text-danger fs-7">{{ $error }}</span>
                    @endforeach
                @endif

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" id="description" name="description" class=" form-control"
                           value="{{ old('description') }}" required/>
                </div>
                @if ($errors->has('description'))
                    @foreach ($errors->get('description') as $error)
                        <span class="text-danger fs-7">{{ $error }}</span>
                    @endforeach
                @endif

                <div class="form-group">
                    <label for="file">Choose Image:</label>
                    <input type="file" class="form-control-file" id="image" name="image"/>
                </div>
                @if ($errors->has('image'))
                    @foreach ($errors->get('image') as $error)
                        <span class="text-danger fs-7">{{ $error }}</span>
                    @endforeach
                @endif

                <div class="form-group">
                    <label>Brand:</label>
                    <select name="brand_id" id="brands">
                        <option disabled selected> - Choose - </option>
                        @foreach($brands as $brand)
                            <option value="<?= $brand['id'] ?>">
                                    <?= $brand['name'] ?>
                            </option>
                        @endforeach
                    </select>
                </div>
                @if ($errors->has('brands'))
                    @foreach ($errors->get('brands') as $error)
                        <span class="text-danger fs-7">{{ $error }}</span>
                    @endforeach
                @endif

                <div class="form-group">
                    <label>Type:</label>
                    <select name="product_type_id" id="product_types" style="margin-left: 15px">
                        <option disabled selected> - Choose - </option>
                        @foreach($types as $type)
                            <option value="<?= $type['id'] ?>">
                                    <?= $type['name'] ?>
                            </option>
                        @endforeach
                    </select>
                </div>
                @if ($errors->has('product_types'))
                    @foreach ($errors->get('product_types') as $error)
                        <span class="text-danger fs-7">{{ $error }}</span>
                    @endforeach
                @endif

                <div class="form-group">
                    <button type="submit" class="btn btn-secondary" style="height:40px">Add Item</button>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->
<!-- END PAGE CONTAINER-->




<!-- Jquery JS-->
<script src="../../../../vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="../../../../vendor/bootstrap-4.1/popper.min.js"></script>
<script src="../../../../vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="../../../../vendor/slick/slick.min.js">
</script>
<script src="../../../../vendor/wow/wow.min.js"></script>
<script src="../../../../vendor/animsition/animsition.min.js"></script>
<script src="../../../../vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="../../../../vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="../../../../vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="../../../../vendor/circle-progress/circle-progress.min.js"></script>
<script src="../../../../vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="../../../../vendor/chartjs/Chart.bundle.min.js"></script>
<script src="../../../../vendor/select2/select2.min.js">
</script>

<!-- Main JS-->
<script src="../../../js/main.js"></script>

</body>

</html>
