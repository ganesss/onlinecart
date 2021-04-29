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
	<h4>Cart >></h4>
	<hr>
	<div class="cart">
		  <table class="table" ng-show="cart_items.length>0">
        <tr>
          <th>Image</th>
          <th>Product</th>
          <th>Price &#x20b9;</th>
          <th></th>
        </tr>
        <tr ng-repeat="data in cart_items">
          <td width="10%"><img ng-src="<?php echo base_url();?>assets/upload/{{data.product_image}}" alt="image" style="width:50px;"></td>
          <td width="40%">{{data.name}}</td>
          <td width="30%">{{data.price}}</td>
          <td width="10%"><button class="btn btn-primary" ng-click="remove_cart(data.c_id)">Remove</button></td>
        </tr>
        <tr>
          <td colspan="2" align="left"></td>
          <td align="left"><b>Total :</b> &#x20b9; {{get_total_amount}} </td>
          <td></td>
        </tr>
        <tr>
          <td colspan="2"></td>
          <td align="right" class="card"><a href="<?php echo base_url();?>place-order"><button class="btn btn-primary">Proceed to Checkout</button></a></td>
          <td></td>
        </tr>
      </table>
      <div class="col-md-6 col-md-offset-3" ng-hide="cart_items.length>0">
        <a href="<?php echo base_url();?>" ><button class="btn btn-primary" style="width:100%">Continue Shopping</button></a>
      </div>
	</div>
</div>
<?php include "footer.php";?>
<script>
var postApp = angular.module('postApp',[]);
  postApp.controller('postController', function($scope, $http, $timeout,$window,$filter,$element) {
    $scope.cart_page="cart";
    $scope.list_products=function(){
      $http.get("<?php echo base_url();?>ProductDetails/get_checkout_details").then(function(response) {
        $scope.cart_items = response.data.get_cart_items;

        $scope.get_total_amount=0;
        $scope.cart_items.forEach(function(val,key){
          $scope.get_total_amount+=parseInt(val.price);
        })

      });
    }
    $scope.list_products();

    $scope.remove_cart = function(id){
      $http({
        method: 'POST',
        url     : '<?php echo base_url();?>ProductDetails/remove_cart',
        data    : $.param({'cartid':id}),
        headers : {'Content-Type': 'application/x-www-form-urlencoded'}
      }).success(function (response) {
        $scope.list_products();
      });
    }
 });
</script>