<!DOCTYPE html>
<html ng-app="postApp">
<head>
  <title>Onlinecart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.9/angular.min.js"></script>
  <style type="text/css">
  	body{
  		width:1200px;
  		margin:auto;
  		border:1px solid #ccc
  	}
  	.header{
  		border-bottom:1px solid #ccc;
  		padding: 20px;
  	}
  	.container{
  		min-height:700px;
  		border-top:1px;
  	}
  	.footer{
  		height:50px;
  		padding: 20px;
  		background-color:#ccc;
  	}
  	.list{
  		/*height:400px;*/
  	}

    .card button {
    border: none;
    outline: 0;
    padding: 12px;
    color: white;
    background-color: #000;
    cursor: pointer;
    width: 100%;
    font-size: 18px;
  }
  	
	a{
		text-decoration: none !important;
	}
  </style>
</head>
<body ng-controller="postController" ng-cloak>

<?php include "header.php";?>
<div class="container">
	<h4>Order Details >></h4>
	<hr>
  <div class="col-md-6">
    <div class="col-md-12">
      <h3>Thank you. Your order has been received.</h3>
    </div>
    <div class="col-md-12">
      <div class="col-md-4"> <b>ORDER NUMBER </b> </div>
      <div class="col-md-4"><b> DATE </b></div>
      <div class="col-md-4"> <b> TOTAL </b></div>
      <div class="col-md-4"><?php echo $order_number;?></div>
      <div class="col-md-4"> <?php echo $order_date;?></div>
      <div class="col-md-4">&#x20b9; <?php echo $get_total_amount;?></div>
    </div>
  </div> 
	<div class="col-md-6">
    <h4>order Details</h4>
		  <table class="table">
        <?php foreach($get_order_items as $key=>$value){?>
        <tr>
          <td width="20%"><img src="<?php echo base_url().'assets/upload/'.$value['product_image'];?>" alt="image" style="width:50px;"></td>
          <td width="60%"><?php echo $value['name'];?></td>
          <td width="20%">&#x20b9; <?php echo $value['price'];?></td>
        </tr>
      <?php }?>
        <tr>
          <td colspan="3" align="right"><b>Total :</b> &#x20b9; <?php echo $get_total_amount;?> </td>
        </tr>
      </table>
	</div>
</div>
<?php include "footer.php";?>
<script>
var postApp = angular.module('postApp',[]);
  postApp.controller('postController', function($scope, $http, $timeout,$window,$filter,$element) {
    $scope.cart_page="cart";
 });
</script>