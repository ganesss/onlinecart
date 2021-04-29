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
  	

	.price {
	  color: red;
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
	<h4>Product >></h4>
	<hr>
	<div class="card">
		<div class="row">
      <div class="col-md-4">
        <img ng-src="<?php echo base_url().'/assets/upload/'.$product[0]['product_image'];?>" alt="product" style="width:350px">
      </div>
		  <div class="col-md-3">
  		  <h4><?php echo $product[0]['name'];?></h4>
  		  <p class="price">&#x20b9; <?php echo $product[0]['price'];?></p>
        <p><?php echo $product[0]['short_description'];?></p>
		    <p><button ng-click="add_cart(<?php echo $product[0]['id'];?>)">Add to Cart</button></p>
      </div>
		</div>
    <div style="clear: both"></div>
    <hr>
    <div class="row">
      <div class="col-md-4" style="background-color: #CCC;">
        <h4>Description</h4>
      </div>
      <div class="col-md-8">
          <?php echo $product[0]['long_description'];?>
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
		$http.get("<?php echo base_url();?>ProductDetails/get_product_list").then(function(response) {
		$scope.product_items = response.data.result_data;
		});
	}

  $scope.cart_item_list =function(){
    $http.get("<?php echo base_url();?>ProductDetails/get_cart_list").then(function(response) {
        $scope.cart_list = response.data.result;
    });
  }
  $scope.cart_item_list();
  $scope.list_products();
  
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
      });
  }

 });
</script>