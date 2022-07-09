<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Product Add Page</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/products-app/public/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="/products-app/public/assets/fonts/css/boxicons.css">
        <link rel="stylesheet" href="/products-app/public/assets/css/addproduct.css">
    </head>
    <style>
        .changeform{
            display: none;
        }
    </style>
    <body>
    <style>
            
            #preloader {
            display:none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 99999;
            overflow: hidden;
            background: #fff;
        }
        
        #preloader:before {
            content: "";
            position: fixed;
            top: calc(50% - 30px);
            left: calc(50% - 30px);
            border: 6px solid #0563bb;
            border-top-color: #fff;
            border-bottom-color: #fff;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            -webkit-animation: animate-preloader 1s linear infinite;
            animation: animate-preloader 1s linear infinite;
        }
        
        @-webkit-keyframes animate-preloader {
            0% {
                transform: rotate(0deg);
            }
        
            100% {
                transform: rotate(360deg);
            }
        }
        
        @keyframes animate-preloader {
            0% {
                transform: rotate(0deg);
            }
        
            100% {
                transform: rotate(360deg);
            }
        }
            </style>
    
        <header class="row col-12 align-items-center">
            <div class="col-6 text-start"><h4>Product Add</h4></div>
            <div class="buttons col-6 text-end p-0">
                <a href="#" class="add-product" onclick="submitProduct()">Save</a>
                <a href="#" id="delete-product-btn" onclick="cancel()">Cancel</a>
            </div>
        </header>
        <hr>
        <main class="row col-12">
            <div class="col-11 col-md-10 col-lg-10">
            <div id='new-product-status' style='width:80%;margin:5px auto'>
            </div>
                <form action="" method='POST' id="product_form" enctype="multipart/form-data"  autocomplete="off">
                    <div class="row col-12 m-0">
                        <div class="col-md-4">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" class="form-control" id="title" required>
                        </div>
                        <div class="col-md-4">
                            <label for="sku" class="form-label">SKU:</label>
                            <input type="text" class="form-control" id="sku" required>
                        </div>
                        <div class="col-md-4">
                            <label for="name" class="form-label">Price:</label>
                            <input type="text" class="form-control" id="price" value="0" required>
                        </div>
                        <div class="col-md-10">
                            <label for="name" class="form-label">Special Name:</label>
                            <input type="text" class="form-control" id="s_name" required>
                        </div>
                        <div class="col-md-4">
                            <label for="size" class="form-label">Size:</label>
                            <input type="text" class="form-control" id="size" required>
                        </div>
                        <div class="col-md-4">
                            <label for="quantity" class="form-label">Quantity:</label>
                            <div class="d-flex align-items-center justify-content-between qty">
                                <i class="bx bx-minus"></i>
                                <input type="text" class="form-control" id="quantity" value="0" required>
                                <i class="bx bx-plus"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-selector col-12 col-md-10">
                        <div class="dropdown col-md-5">
                            <i class="bx bx-caret-down"></i>
                            <select name="" id="productType" required>
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
                                    <input type="text" name='furniture_size' class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Description</label>
                                    <textarea class="form-control" furniture='description' id="" rows="3" required></textarea>
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
                                    <input type="text" name='dvd_height' class="form-control" required>
                                </div>
                                <div>
                                    <label for="" class="form-label">Width (cm):</label>
                                    <input type="text" name='dvd_width' class="form-control" required>
                                </div>
                                <div>
                                    <label for="" class="form-label">Length (cm):</label>
                                    <input type="text" name='dvd_length' class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Description</label>
                                    <textarea class="form-control" name='dvd_description' id="" rows="3" required></textarea>
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
                                    <input type="text" name='disc_weight' class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Description</label>
                                    <textarea class="form-control" name='disc_description' id="" rows="3" required></textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="submit col-12 col-md-10">
                        <div class="col-md-6">
                            <button type="submit" onclick="submitProduct()">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>



<div id='preloader'></div>

    
        <script src="/products-app/public/assets/js/bootstrap.min.js"></script>
        <script src="/products-app/public/assets/js/control.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#productType').on('change', function(){
                    $('.changeform').hide();
                    $('#'+$('#productType').val()).slideToggle();
                });
            });
            
           function submitProduct(){
               var title = $('#title').val(),
               price = $('#price').val(),
               sku = $("#sku").val(),
               specialName = $('#s_name').val(),
               size = $('#size').val(),
               quantity = $('#quantity').val(),
               productType = $('#productType').val(),
               productTypeDetails = [];
               $(`#${productType} form input`).each(function(){
                   productTypeDetails.push({
                       [$(this)[0].name]:$(this).val()
                   })
               })
               $(`#${productType} form textarea`).each(function(){
                   productTypeDetails.push({
                       [$(this)[0].name]:$(this).val()
                   })
               });

               console.log(productTypeDetails);
               if (title !="" && price !="" && specialName !="" && size !=""
               && price !="" && productTypeDetails.length !=0
               ) {
                $.ajax({
                    url:"new-product",
                    method:"POST",
                    data:{ 
                        title,sku,price,specialName,size,quantity,productType,productTypeDetails
                    },
                    beforeSend:function(){
                       $('#preloader').css('display','flex');
                    },
                    success:function(data){
                        var data = JSON.parse(data);
                        if (data.success) {
                            cancelFileds();
                            $('#preloader').css('display','none');
                            $('#new-product-status').html( `
                        <div class="alert alert-success">
                        <strong>Success!</strong> Product Successfully added!</a>.
                        </div>         
                                `);
                        }else{
                            $('#new-product-status').html( `
                        <div class="alert alert-danger">
                        <strong>Failed!</strong> Error saving this product. Try again!</a>.
                        </div>         
                                `);
                        }
                    }
                });
               }
               else{
                $('#new-product-status').html(
              `
                        <div class="alert alert-danger">
                        <strong>Failed!</strong> All fields are required !</a>
                        </div>         
                                `
                            );
               }
              


           }

           function cancelFileds(){
               $("body input").val("");
               $("body textarea").val("")
           }

        </script>

            

    </body>
    </html>