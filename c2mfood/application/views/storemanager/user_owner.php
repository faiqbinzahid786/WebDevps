
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">


<div class="panel panel-default">
	<div class="panel-body">


<button class="btn btn-primary" ng-click="Openmodal()">เพิ่มบัญชีเข้าใช้งาน +</button>
<hr />

<div style="float: right;">
	<input type="checkbox" ng-model="showdeletcbut">
	<?=$lang_showdel?>
</div>


<input type="text" ng-model="search" name="" placeholder="<?=$lang_search?>" class="form-control" style="width: 200px;">
<br />
<table id="headerTable" class="table table-hover">
	<thead  style="background-color: #eee;">
		<tr>
		<th style="width: 10px;"><?=$lang_rank?></th>
			<th><?=$lang_staffname?></th>
			<th>ตำแหน่ง</th>
			<th>User Login</th>
			<th><?=$lang_password?></th>

			<th style="width: 100px;"><?=$lang_edit?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in list | filter:search">
		<td>{{$index+1}}</td>
			<td>{{x.name}}</td>
			<td>
<!-- <span ng-if="x.user_type=='0'">พนักงานเปิดบิลสินค้า</span> -->
<span ng-if="x.user_type=='1'">พนักงานขายแคชเชียร์</span>
<span ng-if="x.user_type=='9'">พนักงานรับออเดอร์</span>
<span ng-if="x.user_type=='10'">หน้าจอสั่งอาหารของลูกค้า (โต๊ะ {{x.food_table_name}})</span>
<span ng-if="x.user_type=='2'">พนักงานสต๊อกร้าน</span>
<span ng-if="x.user_type=='15'">หน้าจอ Chef (ครัว {{x.kitchen_name}})</span>
<span ng-if="x.user_type=='20'">หน้าจอ สถานะการทำอาหารทั้งหมด</span>
<!-- <span ng-if="x.user_type=='3'">พนักงานคุมคลังสินค้าใหญ่</span> -->
<span ng-if="x.user_type=='4'" style="color: green;">Admin ร้าน</span>
			</td>
			<td>{{x.user_email}}</td>
			<td>***</td>

			<td>
				<button class="btn btn-warning btn-xs" ng-click="Openmodaledit(x)"><?=$lang_edit?></button>
				<button  ng-if="showdeletcbut && x.user_id!='1'" class="btn btn-xs btn-danger" ng-click="Deleteuser(x)">
					ลบ
				</button>
			</td>
		</tr>

	</tbody>
</table>

<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
<?=$lang_downloadexcel?> </button>



</div>
</div>




<div class="modal fade" id="modalstore">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">



<fieldset ng-show="listbrand.length == '0'">
	<center>
<a href="<?=$base_url?>/storemanager/brand" class="btn btn-danger btn-lg">
	<?=$lang_addbrand?>
</a>
</center>
</fieldset>



<fieldset ng-show="listbrand.length != '0'">
                    <div class="form-group">
                    	ชื่อ
		<input class="form-control" placeholder="ชื่อ" ng-model="user_name" type="text" style="height: 50px;font-size: 20px;">
			    		</div>

<div class="form-group">
	<select ng-disabled="user_id=='1'" id="" class="form-control" ng-model="user_type" style="height: 50px;font-size: 20px;">
		<option value="4">Admin ร้าน</option>
		<!-- <option value="0">พนักงานเปิดบิลสินค้า</option> -->
		<option value="1">พนักงานขายแคชเชียร์</option>
			<option value="9">พนักงานรับออเดอร์</option>
		<option value="2">พนักงานสต๊อกร้าน</option>
			<option value="10">หน้าจอสั่งอาหารของลูกค้า</option>
			<option value="15">หน้าจอ Chef</option>
			<option value="20">หน้าจอ สถานะการทำอาหารทั้งหมด</option>
		<!-- <option value="3">พนักงานคลังสินค้าใหญ่</option> -->

	</select>
</div>


<div class="form-group" ng-show="user_type=='10'">
	เลือกโต๊ะ:
	<select class="form-control" ng-model="food_table_id" style="height: 50px;font-size: 20px;">
<option value="0">เลือกโต๊ะ</option>
		<option ng-repeat="x in tablelist" value="{{x.food_table_id}}">{{x.food_table_name}}</option>

	</select>
</div>



<div class="form-group" ng-show="user_type=='15'">
	เลือกครัว:
	<select class="form-control" ng-model="kitchen_id" style="height: 50px;font-size: 20px;">
<option value="0">เลือกครัว</option>
		<option ng-repeat="x in kitchenlist" value="{{x.kitchen_id}}">{{x.kitchen_name}}</option>

	</select>
</div>


<!-- <div class="form-group">
	<select id="" class="form-control" ng-model="owner_id" style="height: 50px;font-size: 20px;">
		<option value="0"><?=$lang_selectbrand?></option>
		<option ng-repeat="a in listbrand" value="{{a.owner_id}}">{{a.owner_name}}</option>
	</select>
</div> -->


<div class="form-group">
	User Login:
			    		    <input ng-disabled="user_id=='1'" class="form-control" placeholder="<?=$lang_email?>" ng-model="user_email" type="text" style="height: 50px;font-size: 20px;">
			    		</div>


			    		<div class="form-group">
			    			<?=$lang_password?>:
			    		    <input class="form-control" placeholder="<?=$lang_password?>" ng-model="user_password" type="text" style="height: 50px;font-size: 20px;">
			    		</div>



			    		<input id="submit" class="btn btn-lg btn-success btn-block" type="submit" ng-click="Adduser()" value="บันทึก" ng-hide="foredit">

<input id="submit" class="btn btn-lg btn-success btn-block" type="submit" ng-click="Edituser()" value="ยืนยัน" ng-show="foredit">

			    	</fieldset>








			</div>
			<div class="modal-footer">


			</div>
		</div>
	</div>
</div>



</div>


<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {
$scope.bankaccount = '';
$scope.cfwd = false;
$scope.foredit = false;



$scope.Openmodal = function(){
$('#modalstore').modal('show');
$scope.foredit = false;

$scope.owner_id = '1';
$scope.user_email = '';
$scope.user_name = '';
$scope.user_password = '';
$scope.user_type = '4';
$scope.user_id = '0';

$scope.food_table_id ='0';
$scope.kitchen_id = '0';

};


$scope.Openmodaledit = function(x){
$('#modalstore').modal('show');

$scope.foredit = true;

$scope.user_id = x.user_id;
$scope.user_name = x.name;
$scope.user_email = x.user_email;
$scope.user_password = '';
$scope.user_type = x.user_type;
$scope.food_table_id = x.food_table_id;
$scope.kitchen_id = x.kitchen_id;

};


$scope.get = function(){

$http.get('User_owner/get')
       .then(function(response){
          $scope.list = response.data;

        });


$http.get('<?php echo $base_url;?>/food/Food_table/get')
				       .then(function(response){
				          $scope.tablelist = response.data.list;

				        });



   };
$scope.get();





$scope.getbrand = function(){

$http.get('<?php echo $base_url;?>/storemanager/Brand/get')
       .then(function(response){
          $scope.listbrand = response.data;

        });


				$http.get('<?php echo $base_url;?>/warehouse/Productcategorykitchen/get')
							 .then(function(response){
									$scope.kitchenlist = response.data.list;

								});


   };
$scope.getbrand();



$scope.Adduser = function(){


	if($scope.user_email != '' && $scope.owner_id != '0' && $scope.user_name != '' && $scope.user_password != ''){

if($scope.user_type=='10' && $scope.food_table_id=='0'){
toastr.warning('กรุณาเลือกโต๊ะ');
}else{




	if($scope.user_type=='15' && $scope.kitchen_id=='0'){
	toastr.warning('กรุณาเลือกครัว');
	}else{


$http.post("User_owner/Add",{
	owner_id: $scope.owner_id,
	name: $scope.user_name,
	user_email: $scope.user_email,
	user_password: $scope.user_password,
	user_type: $scope.user_type,
	food_table_id: $scope.food_table_id,
	kitchen_id: $scope.kitchen_id

	}).success(function(data){


if(data=='dup'){
	toastr.warning('<?=$lang_cannotusethisemail?>');
}else{
toastr.success('<?=$lang_success?>');
$scope.get();
$('#modalstore').modal('hide');
$scope.foredit = false;
}


        });


}




}



	}else{
	toastr.warning('กรุณากรอกข้อมูลให้ครบทุกช่อง');
}




};




$scope.Edituser = function(){

	if($scope.user_email != '' && $scope.owner_id != '0' && $scope.user_name != '' && $scope.user_password != ''){

		if($scope.user_type=='10' && $scope.food_table_id=='0'){
		toastr.warning('กรุณาเลือกโต๊ะ');
		}else{

			if($scope.user_type=='15' && $scope.kitchen_id=='0'){
			toastr.warning('กรุณาเลือกครัว');
			}else{


$http.post("User_owner/Edit",{

    user_id: $scope.user_id,
    owner_id: $scope.owner_id,
	name: $scope.user_name,
	user_email: $scope.user_email,
	user_password: $scope.user_password,
	user_type: $scope.user_type,
	food_table_id: $scope.food_table_id,
	kitchen_id: $scope.kitchen_id

	}).success(function(data){
toastr.success('บันทึกเรียบร้อย');
$scope.get();
$('#modalstore').modal('hide');
        });
}


}



	}else{
	toastr.warning('กรุณากรอกข้อมูลให้ครบทุกช่อง');
}




};


$scope.Deleteuser = function(x){
$http.post("User_owner/Deleteuser",{
	user_id: x.user_id
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();
        });
};




});
	</script>
