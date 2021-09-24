<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style_cart.css">
    <title>Document</title>
</head>
<body>
    


<section id="product_cart">
    <h1 class="display-4 text-center">Your Order</h1>
    <div class="container ">
        <div class="row">
            <div class="col-sm-12">
                <Table class="table table-border">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Qantity</th>
                            <th>Shipping</th>
                            <th>Subotal</th>
                            <th>Deliver by</th>
                            <th>Status</th>
                            <th>Cancel</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody> 
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <img src="images/boy_shoes_1.png" alt="" width="100">
                                    </div>
                                    <div class="col-sm-8">
                                        <h5>New Araival</h5> <br>
                                        <h5>Red</h5>
                                    </div>
                                </div>
                            </td>
                            <td class="table-row">
                                $715
                            </td>
                            <td class="table-row">
                                <!-- rgb(225, 229, 233); -->
                                <!-- <span class="quantity-left-minus">
                                    <button class="minus">-</button>
                                </span>
                                <input type="text" id="quantity" name="quantity" value="1" min="1" max="100">
                                <span class="quantity-right-plus">
                                    <button class="plus">+</button>
                                </span> -->
                                2
                            </td>
                            <td class="table-row">$15</td>
                            <td class="table-row">$730</td>
                            <td>Wen, 13 Apr, 2021 </td>
                            <td>Shipping</td>
                            <td class="table-row">
                                <div>
                                    <i class="fa fa-close"></i>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <img src="images/boy_shoes_1.png" alt="" width="100">
                                    </div>
                                    <div class="col-sm-8">
                                        <h5>New Araival</h5>
                                        <h5>Red</h5>
                                    </div>
                                </div>
                            </td>
                            <td class="table-row">
                                $715
                            </td>
                            <td class="table-row">
                                <!-- <span class="quantity-left-minus">
                                    <button class="minus">-</button>
                                </span>
                                <input type="text" id="quantity" name="quantity" value="1" min="1" max="100">
                                <span class="quantity-right-plus">
                                    <button class="plus">+</button>
                                </span> -->
                                1
                            </td>
                            <td class="table-row">$15</td>
                            <td class="table-row">$730</td>
                            <td>Mon, 11 Apr, 2021 </td>
                            <td>Shipped</td>
                            <td class="table-row">
                                <div>
                                    <i class="fa fa-close"></i>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </Table>
            </div>
        </div>
            <div class="row">
            <div class="col-sm-8">
                <table class="table table-border order-table">
                    <thead>
                        <tr style="border-bottom: 2px solid #b4b2b2;">
                            <td class="text-center" colspan="2">Shipping Details</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <!-- <td>
                                <div class="clearfix">
                                    <p class="float-left">Ship by</p>
                                    <p class="float-right">Mon, 11 Apr, 2021 to Tue, 12 Apr 2021</p>
                                </div>
                                
                                <div class="clearfix">
                                    <p class="float-left">Deliver By</p>
                                    <p class="float-right">Wen, 20 Apr, 2021 to Wen, 27 Apr, 2021</p>
                                </div>

                                <div class="clearfix">
                                    <p class="float-left">Ship to</p>
                                    <p class="float-right">Addis Ababa, Adey Abeba saries</p>
                                </div>
                            </td> -->
                        </tr>
                        <tr>
                            <th>Ship by:</th>
                            <td>Mon, 11 Apr, 2021 to Tue, 12 Apr 2021</td>
                        </tr>
                        <tr>
                            <th>Deliver By:</th>
                            <td>Wen, 20 Apr, 2021 to Wen, 27 Apr, 2021</td>
                        </tr>
                        <tr>
                            <th>Ship to:</th>
                            <td>Addis Ababa, Adey Abeba saries</td>
                        </tr>
                        
                        <!-- <tr style="border-top: 2px solid #b4b2b2;">
                            <td class="total">
                                <div class="clearfix">
                                    <p class="float-left">Total</p>
                                    <p class="float-right">$512</p>
                                </div>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
                <!-- <div class="d-flex justify-content-center">
                    <button class="btn checkout">Checkout</button>
                </div> -->
            </div>
            <div class="col-sm-4">
                <table class="table table-border order-table">
                    <thead>
                        <tr style="border-bottom: 2px solid #b4b2b2;">
                            <td class="text-center" colspan="2">Order Summery</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>shipping Items:</th>
                            <td>4</td>
                        </tr>
                        <tr>
                            <th>Ordered Items:</th>
                            <td>20</td>
                        </tr>
                        <tr>
                            <th>SubTotal:</th>
                            <td>20000 ETB</td>
                        </tr>
                        <tr>
                            <th>Total Shipping:</th>
                            <td>200 ETB</td>
                        </tr>
                        <tr>
                            <th>Total Ordered Price:</th>
                            <td>1200 ETB</td>
                        </tr>
                        <tr>
                            <th>Total Price:</th>
                            <td>2200 ETB</td>
                        </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="d-flex justify-content-center">
                            <button class="btn checkout bg-success">Order</button>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex justify-content-center">
                            <button class="btn checkout bg-danger">Cancel</button>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>










    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>


    
<script>
    $(document).ready(function(){

var quantitiy=0;
   $('.quantity-right-plus').click(function(e){
        
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined
            
            $('#quantity').val(quantity + 1);

          
            // Increment
        
    });

     $('.quantity-left-minus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined
      
            // Increment
            if(quantity>0){
            $('#quantity').val(quantity - 1);
            }
    });
    
});
</script>
</body>
</html>
