<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Product Add Page</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="fonts/css/boxicons.css">
        <link rel="stylesheet" href="css/addproduct.css">
    </head>
    <style>
        .changeform{
            display: none;
        }
    </style>
    <body>
    
        <header class="row col-12 align-items-center">
            <div class="col-6 text-start"><h4>Product Add</h4></div>
            <div class="buttons col-6 text-end p-0">
                <a href="" class="add-product">Save</a>
                <a href="" id="delete-product-btn">Cancel</a>
            </div>
        </header>
        <hr>
        <main class="row col-12">
            <div class="col-11 col-md-10 col-lg-10">
                <form action="" id="product_form" enctype="multipart/form-data" autocomplete="off">
                    <div class="row col-12 m-0">
                        <div class="col-md-4">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" class="form-control" id="title">
                        </div>
                        <div class="col-md-4">
                            <label for="name" class="form-label">Price:</label>
                            <input type="text" class="form-control" id="price" value="$0.00">
                        </div>
                        <div class="col-md-10">
                            <label for="name" class="form-label">Special Name:</label>
                            <input type="text" class="form-control" id="s_name">
                        </div>
                        <div class="col-md-4">
                            <label for="size" class="form-label">Size:</label>
                            <input type="text" class="form-control" id="size">
                        </div>
                        <div class="col-md-4">
                            <label for="quantity" class="form-label">Quantity:</label>
                            <div class="d-flex align-items-center justify-content-between qty">
                                <i class="bx bx-minus"></i>
                                <input type="text" class="form-control" id="quantity" value="0">
                                <i class="bx bx-plus"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-selector col-12 col-md-10">
                        <div class="dropdown col-md-5">
                            <i class="bx bx-caret-down"></i>
                            <select name="" id="productType">
                                <option selected> Switch </option>
                                <option value="disc">Form for Disc</option>
                                <option value="furniture">Form for Furniture</option>
                                <option value="dvd">Form for DVD</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="changeform col-12 col-md-10" id="furniture">
                        <h4>Form for Furniture</h4>
                        <div>
                            <form action="">
                                <div>
                                    <label for="" class="form-label">Size (MB):</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Description</label>
                                    <textarea class="form-control" id="" rows="3"></textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="changeform col-12 col-md-10" id="dvd">
                        <h4>Form for DVD</h4>
                        <div>
                            <form action="">
                                <div>
                                    <label for="" class="form-label">Height (cm):</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div>
                                    <label for="" class="form-label">Width (cm):</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div>
                                    <label for="" class="form-label">Length (cm):</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Description</label>
                                    <textarea class="form-control" id="" rows="3"></textarea>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="changeform col-12 col-md-10" id="disc">
                        <h4>Form for Disc</h4>
                        <div>
                            <form action="">
                                <div>
                                    <label for="" class="form-label">Weight (kg):</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Description</label>
                                    <textarea class="form-control" id="" rows="3"></textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="submit col-12 col-md-10">
                        <div class="col-md-6">
                            <button type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>





    
        <script src="js/bootstrap.min.js"></script>
        <script src="js/control.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#productType').on('change', function(){
                    $('.changeform').hide();
                    $('#'+$('#productType').val()).slideToggle();
                });
            });
        </script>


    </body>
    </html>