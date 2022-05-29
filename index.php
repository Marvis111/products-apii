<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Product List</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="fonts/css/boxicons.css">
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <!-- <div class="header">
            <img src="images/logo.svg" alt="" class="img-fluid">
        </div> -->
        <main>
            <header class="row col-12 align-items-center">
                <div class="col-4 col-lg-6 text-start p-0"><h4>Product List</h4></div>
                <div class="buttons col-8 col-lg-6 text-end p-0">
                    <a href="add-product.php" class="add-product">Add</a>
                    <a href="#" onclick="deleteAll()" id="delete-product-btn">Delete All</a>
                </div>
            </header>
            <div class="body">
                <div>
                <div id='productLists' class="row col-12 holder">

                </div>
                </div>
            </div>
        </main>
        
        
        
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/control.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                fetchAllProducts();
            })

            function fetchAllProducts(){
                $.ajax({
                    url:"backend/api/products/all.php",
                    method:"GET",
                    success:function(data){
                        var data = JSON.parse(data);
                        var output = "";
                        data.forEach(product =>{
                            output += `
                            <div class="col-6 col-md-4 col-lg-3 content">
                            <div class="icons">
                                <div class="one icon"><i class="bx bx-heart"></i></div>
                                <div class="two icon"><i class="bx bx-bookmark-plus"></i></div>
                                <div class="three icon"><i class="bx bx-cart-add"></i></div>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input products-check-ids" type="checkbox" value="${product.id}"/>
                            </div>
                            <div class="image">
                                <img src="images/i4.png" alt="" class="img-fluid">
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
                            $("#productLists").html(output);


                        })
                      
                    }
                })
            }
            
            function deleteAll(){
                var productIDs = [];
                $('.products-check-ids').each(function(){
                    productIDs.push($(this).val());
                });
                
                $.ajax({
                    url:"backend/api/products/delete.php",
                    method:"POST",
                    data:{ productIDs},
                    success:function(data){
                        var data = JSON.parse(data)
                        if (data.success) {
                            fetchAllProducts();
                        }
                    }
                })
            }



        </script>
        

    </body>
</html>