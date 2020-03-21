<div class="tab-pane fade" id="orders" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h5>Orders</h5>
                                                    <div class="myaccount-table table-responsive text-center">
                                                        <table class="table table-bordered">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th>Order</th>
                                                                    <th>customer name</th>
                                                                    <th>customer address</th>
                                                                    <th>customer contact</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                
                                                                $customer_session = $_SESSION['customer_email'];
                                                                $get_orders = "select * from orders where customer_email='$customer_session'";
                                                                $run_orders = mysqli_query($con,$get_orders);
                                                                $i = 0;
                                                               while( $row_orders = mysqli_fetch_array($run_orders)){
                                                                  //  $order_id=$row_orders['order_id'];
                                                                    $customer_name=$row_orders['customer_name'];
                                                                    $customer_address=$row_orders['customer_address'];
                                                                    $customer_contact=$row_orders['customer_contact'];
                                                                    $order_id=$row_orders['id'];
                                                                  //  $due_amount=$row_orders['due_amount'];
                                                                   // $invoice_no=$row_orders['invoice_no'];
                                                                    //$qty=$row_orders['qty'];
                                                                    $i++;
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $i; ?></td>
                                                                    <td><?php echo $customer_name?></td>
                                                                    <td><?php echo $customer_address; ?></td>
                                                                    <td><?php echo $customer_contact;?></td>
                                                                    <td><a href="full_orders.php?o_id=<?php echo $order_id; ?>" class="btn btn-sqr">View</a>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                               } 
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            