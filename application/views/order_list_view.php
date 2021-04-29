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

  	.table > tbody > tr > td {
	     vertical-align: middle;
	}
  </style>
</head>
<body ng-controller="postController" ng-cloak>

<?php include "header.php";?>
<div class="container">
	<div class="col-md-12">
		<div class="list">
			<div><center><h3>Order List</h3></center></div>
			<br>
			<br>
			<div style="clear:both"></div>
			<span><b>Order Count : </b> <?php echo count($get_order_details);?></span>
			<br><br>
			<table class="table table-responsive">
				<tr>
					<th>Order Number</th>
					<th>Order Date</th>
					<!-- <th>Customer Name</th> -->
					<th>Customer Email</th>
					<th>Customer Phone</th>
					<th>Customer Address</th>
					<th>Total Amount &#x20b9;</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
				<?php foreach ($get_order_details as $key => $value) {?>
				<tr>
					<td><?php echo $value['order_number'];?></td>
					<td><?php echo $value['created_date'];?></td>
					<!-- <td><?php echo $value['name'];?></td> -->
					<td><?php echo $value['email'];?></td>
					<td><?php echo $value['phone'];?></td>
					<td><?php echo $value['address'];?></td>
					<td><?php echo $value['totalPrice'];?></td>
					<td><?php echo $value['status'];?></td>
					<td><button class="btn btn-info" ng-click="display_order('<?php echo $value['order_number'];?>')" data-toggle="modal" data-target="#Pnopopup">VIEW</button></td>
				</tr>
				<?php }?>
			</table>
		</div>
	</div>
</div>
<?php include "footer.php";?>

<div class="modal fade" id="Pnopopup" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Order Details : {{order_number}}</h4>
        </div>
        <div class="modal-body">
        	<table class="table">
		        <tr>
		          <th>Image</th>
		          <th>Product</th>
		          <th>Price &#x20b9;</th>
		        </tr>
		        <tr ng-repeat="data in order_details">
		          <td width="10%"><img ng-src="<?php echo base_url();?>assets/upload/{{data.product_image}}" alt="image" style="width:50px;"></td>
		          <td width="40%">{{data.name}}</td>
		          <td width="30%">{{data.price}}</td>
		        </tr>
		        <tr>
		          <td colspan="2" align="left"></td>
		          <td align="left"><b>Total :</b> &#x20b9; {{get_total_amount}} </td>
		          <td></td>
		        </tr>
		      </table>
        	<br>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<script>
var postApp = angular.module('postApp',[]);
 postApp.controller('postController', function($scope, $http, $timeout,$window,$filter,$element) {
  	 $scope.cart_page="cart";

  	 $scope.display_order = function(order_number){
  	 	$http({
            method  : 'POST',
            url     : '<?php echo base_url();?>/ProductDetails/display_order_details',
            data    : $.param({'order_number':order_number}),
            headers : {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function(response) {
            $scope.order_details=response.data.get_order_details;
            console.log(response);
            $scope.order_number=response.data.order_number;
            $scope.order_date=response.data.order_date;
            $scope.get_total_amount=response.data.get_total_amount;
        });
  	 }

 });
</script>