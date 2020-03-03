<?php
include("includes/db.php");
if (isset($_POST["product_id"])) {

    $product_id=$_POST['product_id'];
    $get_product="select * from products where product_id=$product_id";
    $run_product=mysqli_query($con,$get_product);
    $row_product=mysqli_fetch_array($run_product);
    $p_cat_id=$row_product['p_cat_id'];
    $pro_title=$row_product['product_title'];
    $pro_qty=$row_product['available_qty'];
    $pro_price=$row_product['product_price'];
    $pro_desc=$row_product['product_desc'];
    $pro_img1=$row_product['product_img1'];
    $pro_img2=$row_product['product_img2'];
    $pro_img3=$row_product['product_img3'];
    
   $pro_size=$row_product['product_size'];
    if($pro_size==null )
    {
        $pro_size="N/A";
    }
    else
    {
        $pro_size=$row_product['product_size'];
    }
    $pro_frame=$row_product['product_frame'];
    if($pro_frame==null )
    {
        $pro_frame="N/A";
    }
    else
    {
        $pro_frame=$row_product['product_frame'];
    }

    $pro_weight=$row_product['product_weight'];
    if($pro_weight==null)
    {
        $pro_weight="N/A";
    }
    else
    {
        $pro_weight=$row_product['product_weight'];
    }
    $pro_front_suspension=$row_product['product_front_suspension'];
    if($pro_front_suspension==null)
    {
        $pro_front_suspension="N/A";
    }
    else
    {
        $pro_front_suspension=$row_product['product_front_suspension'];
    }
    $pro_rear_suspension=$row_product['product_rear_suspension'];
    if($pro_rear_suspension==null)
    {
        $pro_rear_suspension="N/A";
    }else{
        $pro_rear_suspension=$row_product['product_rear_suspension'];
    }
    $pro_front_derailleur=$row_product['product_front_derailleur'];
    if($pro_front_suspension==null)
    {
        $pro_front_suspension="N/A";
    }
    else{
        $pro_front_derailleur=$row_product['product_front_derailleur'];
    }
    $pro_rear_derailleur=$row_product['product_rear_derailleur'];
    if($pro_rear_derailleur==null)
    {
        $pro_rear_derailleur="N/A";
    }
    else{
        $pro_rear_derailleur=$row_product['product_rear_derailleur'];
    }
    $pro_wheels=$row_product['product_wheels'];
    if($pro_wheels==null)
    {
        $pro_wheels="N/A";
    }
    else{
        $pro_wheels=$row_product['product_wheels'];
    }
    $pro_tires=$row_product['product_tires'];
    if($pro_tires==null)
    {
        $pro_tires="N/A";
    }else{
        $pro_tires=$row_product['product_tires'];
    }
    $pro_shifter=$row_product['product_shifter'];
    if($pro_shifter==null)
    {
        $pro_shifter="N/A";
    }
    else
    {
        $pro_shifter=$row_product['product_shifter'];
    }
    $pro_crankset=$row_product['product_crankset'];
    if($pro_crankset==null)
    {
        $pro_crankset="N/A";
    }
    else{
        $pro_crankset=$row_product['product_crankset'];
    }
    $pro_freewheels=$row_product['product_freewheels'];
    if($pro_freewheels==null)
    {
        $pro_freewheels="N/A";
    }
    else{
        $pro_freewheels=$row_product['product_freewheels'];
    }
    $pro_bb_set=$row_product['product_bb_set'];
    if($pro_bb_set==null)
    {
        $pro_bb_set="N/A";
    }
    else{
        $pro_bb_set=$row_product['product_bb_set'];   
    }
    $pro_cassette=$row_product['product_cassette'];
    if($pro_cassette==null)
    {
        $pro_cassette="N/A";
    }
    else{
        $pro_cassette=$row_product['product_cassette'];   
    }
    $pro_colour=$row_product['product_colour'];
    if($pro_colour==null)
    {
        $pro_colour="N/A";
    }
    else{
        $pro_colour=$row_product['product_colour'];   
    }
    $pro_pedals=$row_product['product_pedals'];
    if($pro_pedals==null)
    {
        $pro_pedals="N/A";
    }
    else{
        $pro_pedals=$row_product['product_pedals'];
    }
    $pro_seat_post=$row_product['product_seat_post'];
    if($pro_seat_post==null)
    {
        $pro_seat_post="N/A";
    }
    else{
        $pro_seat_post=$row_product['product_seat_post'];
    }
    $pro_handleber=$row_product['product_handleber'];
    if($pro_handleber==null)
    {
        $pro_handleber="N/A";
    }
    else{
        $pro_handleber=$row_product['product_handleber'];
    }
    $pro_stem=$row_product['product_stem'];
    if($pro_stem==null)
    {
        $pro_stem="N/A";
    }else{
        $pro_stem=$row_product['product_stem'];
    }
    $pro_headset=$row_product['product_headset'];
    if($pro_headset==null)
    {
        $pro_headset="N/A";
    }
    else{
        $pro_headset=$row_product['product_headset'];
    }
    $pro_brakeset=$row_product['product_brakeset'];
    if($pro_brakeset==null)
    {
        $pro_brakeset="N/A";
    }
    else{
        $pro_brakeset=$row_product['product_brakeset'];
    }

    ?>
                <div class="table-responsive">
                                                <table class="table table-bordered mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td>color</td>
                                                            <td><?php echo $pro_colour ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>size</td>
                                                            <td><?php echo $pro_size ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Frame</td>
                                                            <td><?php echo $pro_frame ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Front Suspension</td>
                                                            <td><?php echo $pro_front_suspension ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Rear Suspension</td>
                                                            <td><?php echo $pro_rear_suspension ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Wheels</td>
                                                            <td><?php echo $pro_wheels ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tires</td>
                                                            <td><?php echo $pro_tires ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Shifters</td>
                                                            <td><?php echo $pro_shifter ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Crankset</td>
                                                            <td><?php echo $pro_crankset ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>BB Set</td>
                                                            <td><?php echo $pro_bb_set ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Cassetts</td>
                                                            <td><?php echo $pro_cassette ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pedals</td>
                                                            <td><?php echo $pro_pedals ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Front Derailleur</td>
                                                            <td><?php echo $pro_front_derailleur ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Rear Derailleur</td>
                                                            <td><?php echo $pro_rear_derailleur ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Seat Post</td>
                                                            <td><?php  echo $pro_seat_post ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Handlebar</td>
                                                            <td><?php echo $pro_handleber ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Stem</td>
                                                            <td><?php echo $pro_stem ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Headset</td>
                                                            <td><?php echo $pro_headset ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Brakeset</td>
                                                            <td><?php echo $pro_brakeset ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
<?php
}
?>