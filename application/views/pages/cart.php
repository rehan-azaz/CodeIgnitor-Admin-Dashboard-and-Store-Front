<div class="container">
    <div class="row">
        <div class="col-md-12" >

            <table class="table">
                <thead>
                    <tr>
                        <th>
                            Image
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Price
                        </th>
                        <th>
                            Quantity
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $totalPrice = 0;
                foreach ($cartItems as $cartItem){
                    $totalPrice += intval($cartItem['price'])*intval($cartItem['qty']);
                ?>
                <tr>
                    <td>
                        <img src="<?php echo $cartItem['options']['image']?>" alt="" width="60" height="60">
                    </td>
                    <td>
                        <p>
                            <?php echo $cartItem['name']?>
                        </p>
                    </td>
                    <td>
                        <p>
                            <?php echo $cartItem['price']?>
                        </p>
                    </td>
                    <td>
                        <div class="text-center">
                            <a href="<?php echo base_url()."cart/decreaseitem?rowid=".$cartItem['rowid']?>">
                                <input class="btn btn-warning btn-sm p-0" value="-"/>
                            </a>
                            <strong id="qty"><?php echo $cartItem['qty']?></strong>
                            <a href="<?php echo base_url()."cart/increaseitem?rowid=".$cartItem['rowid']?>">
                                <input class="btn btn-success btn-sm p-0" value="+"/>
                            </a>
                        </div>
                    </td>
                    <td>
                        <a href="<?php echo base_url()."cart/removeitem?rowid=".$cartItem['rowid']?>">
                            <button class="btn btn-danger">
                                Remove
                            </button>
                        </a>
                    </td>
                </tr>

                <?php
                }
                ?>
                </tbody>
            </table>
            <div class="float-end mb-2">
                <p class="">
                    <strong>
                        Total Bill: <?php echo $totalPrice?>
                    </strong>
                </p>
                <a href="<?php echo base_url()."checkout"?>" >
                    <button class="btn btn-outline-secondary btn-lg">
                        Check Out
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
</div>
</div>
