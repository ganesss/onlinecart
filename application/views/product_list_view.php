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
			<div><center><h3>Product List</h3></center></div>
			<div class="btn btn-primary" style="float:right" data-toggle="modal" data-target="#Pnopopup" ng-click="reset_product()">Add Product</div>
			<br>
			<br>
			<div style="clear:both"></div>
			<span ng -show="product_items.length>0"><b>Items Count : </b>{{product_items.length}}</span>
			<br><br>
			<table class="table table-responsive">
				<tr>
					<th>Name</th>
					<th>Short Description</th>
					<th>Long Descrption</th>
					<th>Price &#x20b9;</th>
					<th>Image</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
				<tr ng-repeat="data in product_items">
					<td>{{data.name}}</td>
					<td>{{data.short_description}}</td>
					<td>{{data.long_description}}</td>
					<td>{{data.price}}</td>
					<td><img ng-src="<?php echo base_url();?>assets/upload/{{data.product_image}}" alt="product" width="100px"></td>
					<td>{{data.status}}</td>
					<td><button class="btn btn-info" ng-click="get_edit_product(data)" data-toggle="modal" data-target="#Pnopopup1">Edit</button></td>
				</tr>
			</table>
		</div>
	</div>
</div>
<?php include "footer.php";?>

  <div class="modal fade" id="Pnopopup" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Product</h4>
        </div>
        <div class="modal-body">
        	<div class="row">
				<div class="col-md-4">Name </div>
				<div class="col-md-1">:</div>
				<div class="col-md-7"><input type="text" class="form-control"  name="txt_name" ng-model="txt_name"></div>
        	</div>
        	<br>
        	<div class="row">
				<div class="col-md-4">Short Description </div>
				<div class="col-md-1">:</div>
				<div class="col-md-7"><input type="text" class="form-control"  name="short_description" ng-model="short_description"></div>
        	</div>
        	<br>
        	<div class="row">
				<div class="col-md-4">Long Description </div>
				<div class="col-md-1">:</div>
				<div class="col-md-7"><textarea class="form-control"  name="long_description" ng-model="long_description"></textarea></div>
        	</div>
        	<br>
        	<div class="row">
				<div class="col-md-4">Price &#x20b9;</div>
				<div class="col-md-1">:</div>
				<div class="col-md-7"><input type="number" class="form-control"  name="txt_price" ng-model="txt_price"></div>
        	</div>
        	<br>
        	<div class="row">
				<div class="col-md-4">Product Image </div>
				<div class="col-md-1">:</div>
				<div class="col-md-7"><input type="file" class="form-control"  name="file" id="file" ng-model="file"></div>
        	</div>
        	<br>
        	<div class="row">
				<div class="col-md-4">Status </div>
				<div class="col-md-1">:</div>
				<div class="col-md-7">
					<select class="form-control"  name="sel_status" ng-model="sel_status">
						<option value="">--Select--</option>
						<option value="active">Active</option>
						<option value="inactive">In active</option>
					</select>
        		</div>
        	</div>
        	<br>
        	<div class="row">
        		<div class="col-md-3 col-md-offset-5"><button class="btn btn-info" ng-click="add_product()">Save Product</button></div>
        	</div>
        	<br>
        	<center><span style="color:red" ng-show="error_msg!=undefined && error_msg!=''">{{error_msg}}</span></center>
        	<center><span style="color:green" ng-show="upload_msg!=undefined && upload_msg=='success'">Product Added successfully</span></center>
        	<center><span style="color:red" ng-show="upload_msg!=undefined && upload_msg=='error'">Product failed to add</span></center>
      </div>
      
    </div>
  </div>
</div>

<div class="modal fade" id="Pnopopup1" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Product</h4>
        </div>
        <div class="modal-body">
        	<div class="row">
				<div class="col-md-4">Name </div>
				<div class="col-md-1">:</div>
				<div class="col-md-7"><input type="text" class="form-control"  name="txt_name" ng-model="edit_txt_name"></div>
        	</div>
        	<br>
        	<div class="row">
				<div class="col-md-4">Short Description </div>
				<div class="col-md-1">:</div>
				<div class="col-md-7"><input type="text" class="form-control"  name="short_description" ng-model="edit_short_description"></div>
        	</div>
        	<br>
        	<div class="row">
				<div class="col-md-4">Long Description </div>
				<div class="col-md-1">:</div>
				<div class="col-md-7"><textarea class="form-control"  name="long_description" ng-model="edit_long_description"></textarea></div>
        	</div>
        	<br>
        	<div class="row">
				<div class="col-md-4">Price &#x20b9;</div>
				<div class="col-md-1">:</div>
				<div class="col-md-7"><input type="number" class="form-control"  name="txt_price" ng-model="edit_txt_price"></div>
        	</div>
        	<br>
        	<div class="row">
				<div class="col-md-4">Product Image </div>
				<div class="col-md-1">:</div>
				<div class="col-md-7">
					<input type="file" class="form-control"  name="edit_file" id="edit_file" ng-model="edit_file">
					<img ng-src="<?php echo base_url();?>assets/upload/{{edit_product_image}}" alt="product" width="100px">
				</div>
        	</div>
        	<br>
        	<div class="row">
				<div class="col-md-4">Status </div>
				<div class="col-md-1">:</div>
				<div class="col-md-7">
					<select class="form-control"  name="sel_status" ng-model="edit_sel_status">
						<option value="">--Select--</option>
						<option value="active">Active</option>
						<option value="inactive">In active</option>
					</select>
        		</div>
        	</div>
        	<br>
        	<div class="row">
        		<div class="col-md-3 col-md-offset-5"><button class="btn btn-info" ng-click="update_product()">Update Product</button></div>
        	</div>
        	<br>
        	<center><span style="color:red" ng-show="error_msg!=undefined && error_msg!=''">{{error_msg}}</span></center>
        	<center><span style="color:green" ng-show="upload_msg!=undefined && upload_msg=='success'">Product Updated successfully</span></center>
        	<center><span style="color:red" ng-show="upload_msg!=undefined && upload_msg=='error'">Product failed to update</span></center>
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
  	 
  	$scope.reset_product =function(){
  		$scope.error_msg="";
  		$('#file').val('');
  		$scope.sel_status="";
  		$scope.txt_price="";
  		$scope.long_description="";
  		$scope.short_description="";
  		$scope.txt_name="";
  		$scope.upload_msg="";
  		$scope.update_reset();
  	}

  	$scope.save_reset =function(){
  		$scope.error_msg="";
  		$('#file').val('');
  		$scope.sel_status="";
  		$scope.txt_price="";
  		$scope.long_description="";
  		$scope.short_description="";
  		$scope.txt_name="";
  	}

  	$scope.update_reset =function(){
  		$scope.error_msg="";
  		$('#edit_file').val('');
  		$scope.edit_sel_status="";
  		$scope.edit_txt_price="";
  		$scope.edit_long_description="";
  		$scope.edit_short_description="";
  		$scope.edit_txt_name="";
  	}

  	$scope.get_edit_product = function (data){
  		$scope.edit_id=data.id;
  		$scope.edit_sel_status=data.status;
  		$scope.edit_txt_price=parseInt(data.price);
  		$scope.edit_long_description=data.long_description;
  		$scope.edit_short_description=data.short_description;
  		$scope.edit_txt_name=data.name;
  		$scope.edit_product_image=data.product_image;
  		$scope.upload_msg="";
  	}

  	$scope.list_products=function(){
		$http.get("<?php echo base_url();?>ProductDetails/get_product_list").then(function(response) {
		  $scope.product_items = response.data.result_data;
		});
	}

  	$scope.list_products();

  	$scope.update_product=function(){
		$scope.error_msg="";
		var validFormats = ['jpg','jpeg','png','svg'];

		if($('#edit_file')[0].files[0]!=undefined){
		    var upload_file=$('#edit_file')[0].files[0].name;
		    $scope.file=$('#edit_file')[0].files[0].name;
		    var ext = $('#edit_file')[0].files[0].name.substr($('#edit_file')[0].files[0].name.lastIndexOf('.')+1);
		    if(validFormats.indexOf(ext.toLowerCase()) == -1){
		        $scope.error_msg="Invalid Product Image format";
		    }
		}
		
		if($scope.edit_sel_status==undefined || $scope.edit_sel_status==''){
			$scope.error_msg="Status cannot be empty";
		}

		if($scope.edit_txt_price==undefined || $scope.edit_txt_price==''){
			$scope.error_msg="Price cannot be empty";
		}

		if($scope.edit_long_description==undefined || $scope.edit_long_description==''){
			$scope.error_msg="Long Description cannot be empty";
		}

		if($scope.edit_short_description==undefined || $scope.edit_short_description==''){
			$scope.error_msg="Short Description cannot be empty";
		}

		if($scope.edit_txt_name==undefined || $scope.edit_txt_name==''){
			$scope.error_msg="Name cannot be empty";
		}

		if($scope.error_msg==''){
			var formData   = new FormData();
			formData.append('id', $scope.edit_id);
			formData.append('name', $scope.edit_txt_name);
			formData.append('short_description', $scope.edit_short_description);
			formData.append('long_description', $scope.edit_long_description);
			formData.append('txt_price', $scope.edit_txt_price);
			formData.append('sel_status', $scope.edit_sel_status);

			if($('#file')[0].files[0]!=undefined){
				formData.append('file', $('#file')[0].files[0]);
			}else{
				formData.append('file', $scope.file);
			}

			$http({
			  method: 'POST',
			  url     : '<?php echo base_url();?>ProductDetails/save',
			  data: formData,
			  headers: {'Content-Type': undefined}
			}).success(function (response) {
				$scope.upload_msg=response;
				$scope.list_products();
			});
		}
    }

  	$scope.add_product=function(){
		$scope.error_msg="";
		var validFormats = ['jpg','jpeg','png','svg'];

		if($('#file')[0].files[0]!=undefined){
		    var upload_file=$('#file')[0].files[0].name;
		    $scope.file=$('#file')[0].files[0].name;
		    var ext = $('#file')[0].files[0].name.substr($('#file')[0].files[0].name.lastIndexOf('.')+1);
		    if(validFormats.indexOf(ext.toLowerCase()) == -1){
		        $scope.error_msg="Invalid Product Image format";
		    }
		}else{
			$scope.error_msg="Product Image cannot be empty";
		}
		
		if($scope.sel_status==undefined || $scope.sel_status==''){
			$scope.error_msg="Status cannot be empty";
		}

		if($scope.txt_price==undefined || $scope.txt_price==''){
			$scope.error_msg="Price cannot be empty";
		}

		if($scope.long_description==undefined || $scope.long_description==''){
			$scope.error_msg="Long Description cannot be empty";
		}

		if($scope.short_description==undefined || $scope.short_description==''){
			$scope.error_msg="Short Description cannot be empty";
		}

		if($scope.txt_name==undefined || $scope.txt_name==''){
			$scope.error_msg="Name cannot be empty";
		}

		if($scope.error_msg==''){
			var formData   = new FormData();
			formData.append('name', $scope.txt_name);
			formData.append('short_description', $scope.short_description);
			formData.append('long_description', $scope.long_description);
			formData.append('txt_price', $scope.txt_price);
			formData.append('sel_status', $scope.sel_status);

			if($('#file')[0].files[0]!=undefined){
				formData.append('file', $('#file')[0].files[0]);
			}else{
				formData.append('file', $scope.file);
			}

			$http({
			  method: 'POST',
			  url     : '<?php echo base_url();?>ProductDetails/save',
			  data: formData,
			  headers: {'Content-Type': undefined}
			}).success(function (response) {
				$scope.upload_msg=response;
				$scope.save_reset();
				$scope.list_products();
			});
		}
    }
 });
</script>