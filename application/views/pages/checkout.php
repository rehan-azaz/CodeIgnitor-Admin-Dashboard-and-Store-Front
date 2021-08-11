<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h6>Customer Details</h6>
                    </div>
                    <div class="card-body">
                        <form action="checkout/placeorder" method="post">
                            <div class="row">
                                <div class="form-group col-md-12 mb-4">
                                    <input type="text" class="form-control input-lg" name="name" placeholder="Name" required>
                                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <input type="text" class="form-control input-lg" name="address" placeholder="Address" required>
                                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <input type="text" class="form-control input-lg" name="city" placeholder="City" required>
                                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <input type="text" class="form-control input-lg" name="state" placeholder="State" required>
                                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <input type="text" class="form-control input-lg" name="country" placeholder="Country" required>
                                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <input type="text" class="form-control input-lg" name="zipcode" placeholder="Zip Code" required>
                                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <input type="submit" class="btn btn-success float-end" name="place_order" value="Place Order">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h6>Order Details</h6>
                    </div>
                    <div class="card-body">
                        <?php
                            $totalPrice = 0;
                            foreach ($cartItems as $cartItem){
                            $totalPrice +=  $cartItem['price']*$cartItem['qty'];
                        ?>

                          <div class="row">
                             <div class="col">
                                 <img src="<?php echo $cartItem['options']['image']?>" alt="" width="70px" height="70px">
                             </div>
                              <div class="col">
                                  <p><?php echo $cartItem['price']?></p>
                              </div><div class="col">
                                  <p>x</p>
                              </div><div class="col">
                                  <p><?php echo $cartItem['qty']?></p>
                              </div>
                              <div class="col">
                                  <p>=</p>
                              </div>
                              <div class="col">
                                <p><?php echo $cartItem['price']*$cartItem['qty']?></p>
                              </div>
                          </div>
                        <?php
                            }
                        ?>
                        <div class="float-end">
                            <p>
                                Total Price = Rs. <?php echo $totalPrice;?>/-
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>