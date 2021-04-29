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
	<h4>Checkout >></h4>
	<hr>
  <div class="col-md-6">
    <h4>Billing details</h4>
    <hr>
      <div class="col-md-12">Name</div>
      <div class="col-md-12"><input type="text" name="cus_name" class="form-control" ng-model="cus_name"></div>
      <div class="col-md-12">Email</div>
      <div class="col-md-12"><input type="text" name="cus_email" class="form-control" ng-model="cus_email"></div>
      <div class="col-md-12">Phone</div>
      <div class="col-md-12"><input type="text" name="cus_phone" class="form-control" ng-model="cus_phone" ></div>
      <div class="col-md-12">Address</div>
      <div class="col-md-12"><textarea name="cus_address" class="form-control" ng-model="cus_address"></textarea></div>
      <div class="col-md-12"><br><button class="btn btn-warning" style="width:100%" ng-click="place_order()">Place Order</button></div>
      <br><br>
      <center><span style="color:red" ng-show="error_msg!=undefined && error_msg!=''">{{error_msg}}</span></center>
  </div>
	<div class="col-md-6">
    <h4>order Details</h4>
		  <table class="table">
        <tr ng-repeat="data in cart_items">
          <td width="20%"><img ng-src="<?php echo base_url();?>assets/upload/{{data.product_image}}" alt="image" style="width:50px;"></td>
          <td width="60%">{{data.name}}</td>
          <td width="20%">&#x20b9; {{data.price}}</td>
        </tr>
        <tr>
          <td colspan="3" align="right"><b>Total :</b> &#x20b9; {{get_total_amount}} </td>
        </tr>
      </table>
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

    $scope.place_order =function(){
      $scope.error_msg="";
      if($scope.cus_address==undefined || $scope.cus_address==''){
        $scope.error_msg="Address cannot be empty";
      }

      if($scope.cus_phone==undefined || $scope.cus_phone==''){
        $scope.error_msg="Phone cannot be empty";
      }else{
        var phoneformat = /^[6789]+[0-9]{9}$/;
        if(!$scope.cus_phone.match(phoneformat)){
            $scope.error_msg="Invalid Phone";
        }
      }

      if($scope.cus_email==undefined || $scope.cus_email==''){
        $scope.error_msg="Email cannot be empty";
      }else{
        var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if(!$scope.cus_email.match(mailformat)){
            $scope.error_msg="Invalid Email";
        }
      }

      if($scope.cus_name==undefined || $scope.cus_name==''){
        $scope.error_msg="Name cannot be empty";
      }

      if($scope.error_msg==''){
         $http({
            method  : 'POST',
            url     : '<?php echo base_url();?>/ProductDetails/place_order',
            data    : $.param({'cus_name':$scope.cus_name,'cus_email':$scope.cus_email,'cus_phone':$scope.cus_phone,'cus_address':$scope.cus_address}),
            headers : {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function(response) {
            $scope.order_status=response.data.status;
            window.location = "<?php echo base_url();?>order-details/"+response.data.order_no;
        });
      }

    }

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