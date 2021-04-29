<div class="col-md-12 header" >
      <div class="col-md-6" >
        <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/img/logo.png" alt="logo"></a>
        <br>
        <br>
        <!-- <a href="<?php echo base_url();?>" ><button class="btn btn-info">HOME</button></a>
        <a href="<?php echo base_url().'ProductDetails/product_list';?>" ><button class="btn btn-info">PRODUCT LIST</button></a>
        <a href="<?php echo base_url().'ProductDetails/order_list';?>" ><button class="btn btn-info">ORDER LIST</button></a> -->
      </div>
      <div class="col-md-2 col-md-offset-4" style="float:right;" ng-show="cart_page!=undefined && cart_page!='cart'">
        <img src="<?php echo base_url();?>assets/img/cart.png" alt="cart" style="width:35px"> 
          <span style="line-height:2.6em">Cart </span><a href="<?php echo base_url();?>cart-checkout"><span ng-show="cart_list!=undefing && cart_list.length>0">({{cart_list.length}})</span></a>
      </div>
</div>
<div style="clear:both"></div>
