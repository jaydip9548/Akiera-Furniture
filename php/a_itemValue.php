<?php


function cartElement($product_image,$price,$id,$name){
    echo '
    <form action="cart.php?action=remove" method="POST">
    <div class="box1">
        <div id="boxbox">
            <img src="'.$product_image.'" alt="" width="170px" height="185px">
            <div>
                <p style="text-align: center;">
                    <h3>Product 1</h3>
                </p><br>
                <p>Seller : <span>'.$name.'</span></p><br><br>
                <p style="font-size: 25px;"><b>&#8377;'.$price.'</b></p><br><br>
                <input type="submit" id="remove1" value="Remove" name="remove"   >
                <input type="hidden" value="'.$id.'" name="id">

            </div>

        </div>          <hr>
</div>

</form>
    ';
}




function assign($id,$name,$src,$prize,$del,$save){
    // echo $id;
    echo '

    <form method="POST" action="sofa.php">
    <div class="box">
    <div class="con">
  <img id="img1" src="'.$src.'" alt="">

       <div class="addBtn">
       <button class="p1" id="href1" 
       name="XXX" type="submit">Add To Cart</button>
       </div>
       <p class="info"><br><br><b>Nemo Kids Sofa </b><br> <br>&#8377; <b>'.$prize.'</b> &nbsp; <del>&#8377;  '.$del.'</del> <br>
       <p style="color: rgb(165, 164, 164);">Save &#8377; '.$save.'
           <span1>(41% Off)</span1>
       </p>
   </p>
   </div>
   </div>
   <input type="hidden" name="pid" value = "'.$id.'">
   <input type="hidden" name="p_name" value = "'.$name.'">
</form>
    ';}
    function assignbed($id,$name,$src,$prize,$del,$save,$action){

        echo '
        <form method="POST" action="'.$action.'">
        <div class="box">
        <div class="con">
       <img src="'.$src.'" alt="">
       <div class="addBtn">
       <button class="p1" id="href1" 
       name="XXX" type="submit">Add To Cart</button>
       </div>
            <p><br><br><b>'.$name.' </b><br> <br>&#8377; <b>'.$prize.'</b> &nbsp; <del>&#8377;  '.$del.'</del> <br>
                <p style="color: rgb(165, 164, 164);">Save &#8377;'.$save.'
                    <span1>(56% Off)</span1>
                </p>
            </p>
        </div>
    </div>
    <input type="hidden" name="pid" value = "'.$id.'">
 </form>
        ';
    }

