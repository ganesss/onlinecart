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
  		padding:30px;
  	}
  	.footer{
  		height:50px;
  		padding: 20px;
  		background-color:#ccc;
  	}
  	.list{
  		/*height:400px;*/
  	}
  	.card {
	  /*box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);*/
	  width: 350px;
	  height:420px;
	  text-align: center;
	  font-family: arial;
	  float:left;
	  padding:35px;
	}

	.price {
	  color: grey;
	  font-size: 22px;
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

	.card button:hover {
	  opacity: 0.7;
	}
	a{
		text-decoration: none !important;
	}
  </style>
</head>
<body ng-controller="postController" ng-cloak>

<?php include "header.php";?>
<div class="container">
	<h4>Featured Products List >></h4>
	<hr>
	<div ng-repeat="data in product_items">
		<div class="card">
			<div style="border:1px solid #CCC;border-radius:8px;">
			  <a href ="<?php echo base_url();?>product-view/{{data.id}}"><img ng-src="<?php echo base_url();?>assets/upload/{{data.product_image}}" alt="product" style="width:250px">
			  <h4>{{data.name}}</h4></a>
			  <p class="price">&#x20b9; {{data.price}}</p>
			  <p id="{{data.id}}_alert" style="color: green;display:none">Added to Cart</p>
			  <p><button ng-click="add_cart(data.id)">Add to Cart</button></p>
			</div>
		</div>
	</div>
	</div>
</div>
<?php include "footer.php";?>
<script>
var postApp = angular.module('postApp',[]);
  postApp.controller('postController', function($scope, $http, $timeout,$window,$filter,$element) {
  	 $scope.cart_page="";

	$scope.list_products=function(){
		$http.get("<?php echo base_url();?>ProductDetails/get_product_details").then(function(response) {
		$scope.product_items = response.data.result_data;
		});
	}
  	$scope.list_products();

	$scope.cart_item_list =function(){
		$http.get("<?php echo base_url();?>ProductDetails/get_cart_list").then(function(response) {
		$scope.cart_list = response.data.result;
		});
	}

	$scope.cart_item_list();

	$scope.add_cart =function(id){
	   $http({
	          method  : 'POST',
	          url     : '<?php echo base_url();?>/ProductDetails/add_cart',
	          data    : $.param({'product_id':id}),
	          headers : {'Content-Type': 'application/x-www-form-urlencoded'}
	      }).then(function(response) {
	         $scope.cart_mode=response.data.mode;
	         $scope.cart_status=response.data.status;
	         $scope.cart_item_list();
	         console.log('#'+id+'alert')
	         $('#'+id+'_alert').show();
			 $('#'+id+'_alert').delay(200).fadeOut(500);
	      });
	  }

 });
</script>