<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Software Engineer</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
        <!-- bootstrap -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
       
        <link href="css/bootstrappage.css" rel="stylesheet"/>
       
        <!-- global styles -->
        <link href="css/flexslider.css" rel="stylesheet"/>
        <link href="css/browse.css" rel="stylesheet"/>
        <link rel="stylesheet" href="css/checkout.css">
        <!-- <link rel="stylesheet" href="js/css/stylecheckout.css"> -->
 
        <!-- scripts -->
        <script src="js/jquery-1.7.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>            
        <script src="js/superfish.js"></script>
 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>

        <script src="{{ asset('js/jquery-1.7.2.min.js') }}"></script>
        <script src="{{ asset('js/superfish.js') }}"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
 
        <!-- scorll magic -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js"></script>
        <!--[if lt IE 9]>          
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <script src="js/respond.min.js"></script>
        <![endif]-->

        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->       
    </head>
    <body>      
            <div class="content">
                <div class="row">
                    <div id="content-header" style="margin-left: 3%">
                        <font color="#432E41">
                            Shopping Cart
                        </font>
                    </div>
                </div>
                <div>
                    <table>
                        <br>
                        <div class="color-text">
                            <div class="column-labels">
                                <label class="product-image">
                                    <h4>Image</h4>
                                </label>
                                <label class="product-details">
                                    <h4>Product</h4>
                                </label>
                                <label class="product-removal">
                                    <h4>Remove</h4>
                                </label>
                                <label class="product-price">
                                    <h4>Price</h4>
                                </label>
                                <label class="product-quantity">
                                    <h4>Quantity</h4>
                                </label>
                                <label class="product-line-price">
                                    <h4>Total</h4>
                                </label>
                            </div>
                        </div>
                @foreach ($values as $value)
                        <div class="product">
                            <div class="product-image">
                                <img src="{{ url('images/food/food'.$value['food_id'].'.jpg') }}">
                            </div>
                            <div class="product-details">
                                <div class="product-title">
                                    <h5> {{ $value['food_name']}} </h5>
                                </div>
                                <div> 
                                    <div class="product-note"> 
                                        <button class="btn btn-link" data-toggle="modal" data-target="#exampleModal">
                                            Notation
                                        </button>
                                    </div>
                                    <div id="myContent">
                                        
                                    </div> 
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" data-dismiss="modal">&times;</span>
                                            </button>
                                            <h4 class="modal-title">Notation</h4>
                                          </div>
                                          <div class="modal-body">
                                            <form>
                                              <div class="form-group">
                                                <label for="message-text" class="control-label">Message:</label>
                                                <textarea class="form-control" id="message-text"></textarea>
                                              </div>
                                            </form>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="add()">Send message</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-price">{{ number_format($value['price'] , 2, '.', '')}}</div>
                            <div class="product-quantity">
                                <input type="number" value="{{ $value['quantity']}}" min="1">
                            </div>
                            <div class="product-line-price">{{ number_format($value['quantity'] * $value['price'], 2, '.', '')}}</div>
                        </div>
                    </table>
                @endforeach
                    <div class="removeall" >
                        <form action="{{ url('/browse/checkout/clear')}}">
                            <button class ="btn btn-danger">
                                    Remove All
                            </button>
                        </form>
                    </div>
                    <?php
                        $sum = 0;
                        foreach ($values as $value) {
                            $sum = $sum + ($value['quantity'] * $value['price']); 
                        }
                    ?>
                    <div class="totals">
                        <div class="totals-item">
                            <label>
                                <h4>Subtotal</h4>
                            </label>
                            <div class="totals-value" id="cart-subtotal">{{ number_format($sum, 2, '.', '')}}</div>
                        </div>
                        <div class="totals-item">
                            <label>
                                <h4>Service (10%)</h4>
                            </label>
                            <div class="totals-value" id="cart-tax">{{ number_format($sum*0.1, 2, '.', '')}}</div>
                        </div>
                        <div class="totals-item">
                            <label>
                                <h4>Shipping</h4>
                            </label>
                            <?php
                                $shipping = 15;
                            ?>
                            <div class="totals-value" id="cart-shipping">{{ number_format($shipping, 2, '.', '')}}</div>
                        </div>
                        <div class="totals-item totals-item-total">
                            <label>
                                <h4>Grand Total</h4>
                            </label>
                            <?php
                                $total = $sum+($sum*0.1)+$shipping;
                            ?>
                            <div class="totals-value" id="cart-total">{{ number_format($total, 2, '.', '')}}</div>
                        </div>
                    </div>
                    <form action="{{route('payment',['total'=> $total])}}">
                        <button class="checkout" style="vertical-align:middle">
                            <span>Checkout</span>
                        </button>
                    </form>
                </div>      
            </div>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="js/browse.js"></script>
        <script src="js/checkout.js"></script>
        <script src="{{ asset('js/scroll.js') }}"></script>

    </body>
</html>