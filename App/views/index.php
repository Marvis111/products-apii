<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Product List</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/products-app/public/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="/products-app/public/assets/fonts/css/boxicons.css">
        <link rel="stylesheet" href="/products-app/public/assets/css/styles.css">
         
    </head>
    <body>
          
        <style>
            
        #preloader {
        display:'flex';
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
       <div class="header">
            <img src="images/logo.svg" alt="" class="img-fluid">
        </div> 
        <main>
            <header class="row col-12 align-items-center">
                <div class="col-4 col-lg-6 text-start p-0"><h4>Product List</h4></div>
                <div class="buttons col-8 col-lg-6 text-end p-0">
                    <a href="add-product" class="add-product">ADD</a>
                    <a href="#" onclick="deleteAll()" id="delete-product-btn">MASS DELETE</a>
                </div>
            </header>
            <div class="body">
                <div>
                <div id='product-success' style='width:80%;margin:5px auto'>
                    </div>
                <div id='productLists' class="row col-12 holder">
                    

                </div>
                </div>
            </div>
        </main>
        
        <div id="preloader"></div>
        
        
        <script type="text/javascript" src="/products-app/public/assets/js/bootstrap.js"></script>
        <script type="text/javascript" src="/products-app/public/assets/js/control.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                fetchAllProducts();                 
                $(window).on('load', function() {
        if ($('#preloader').length) {
           $('#preloader').delay(100).fadeOut('slow', function() {
             $(this).remove();
       });
     }
   });
            })
            	// Preloader
 

            function fetchAllProducts(){
                $.ajax({
                    url:"all-products",
                    method:"GET",
                    beforeSend:function(){
                        $('#preloader').css('display','flex');
                    },
                    success:function(data){
                        var data = JSON.parse(data);
                        var output = "";
                        if (data.length !=0) {
                            data.forEach(product =>{
                            output += `
                            <div class="col-6 col-md-4 col-lg-3 content">
                            <div class="icons">
                                <div class="one icon"><i class="bx bx-heart"></i></div>
                                <div class="two icon"><i class="bx bx-bookmark-plus"></i></div>
                                <div class="three icon"><i class="bx bx-cart-add"></i></div>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input products-check-ids delete-checkbox" type="checkbox" value="${product.id}"/>
                            </div>
                            <div class="image">
                                <img src="/products-app/public/assets/images/i4.png" alt="" class="img-fluid">
                            </div>
                            <div class="g_s_q_p">
                                <div class="g_name"><span>${product.special_name}</span></div>
                                <div class="s_name"><span> ${product.title} </span></div>
                                <div class="qty_size">
                                    <p>Qty: ${product.quantity}</p>
                                    <p>Size: ${product.size}</p>
                                </div>
                                <div class="price_buy">
                                    <span><small><s>$${product.price} </s></small> / $${product.price - 0.4 * product.price }</span>
                                    <button>Add to Cart</button>
                                </div>
                            </div>
                        </div>
                            `;
                            
                           


                        })
                        }else{
                            output = "No product Available";
                        }
                        $("#productLists").html(output);
                        $('#preloader').css('display','none');
                       
                      
                    }
                })
            }
            
            function deleteAll(){
                var productIDs = [];
                $('.products-check-ids').each(function(){
                    if ($(this)[0].checked == true) {
                        productIDs.push($(this).val());
                    }
                });
                if (productIDs.length !=0) {
                    $.ajax({
                    url:"delete-product",
                    method:"POST",
                    data:{ productIDs},
                    beforeSend:function(){
                        $('#preloader').css('display','flex');
                    },
                    success:function(data){
                        var data = JSON.parse(data)
                        if (data.success) {
                            fetchAllProducts();
                            $('#preloader').css('display','none');
                            $('#product-success').html(
              `
                        <div class="alert alert-success">
                        <strong>Success!</strong> Product Successfully deleted!</a>.
                        </div>         
                                `

                            )
                        }
                    }
                })
                }else{
                    $('#product-success').html(
              `
                        <div class="alert alert-info">
                        <strong>Please select products to delete</strong> </a>.
                        </div>         
                                `

                            )
                }
              
            }



        </script>
        

    </body>
</html>