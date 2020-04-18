
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">


<h4><b>1. ตั้งค่ายอดเงินซื้อเปลี่ยนเป็นส่วนลด(ทุกการซื้อ)</b></h4>
<br />
เมื่อยอดเงินซื้อ
<input type="text" ng-model="discountfrombuylist.money_if" placeholder="ยอดเงินซื้อ" class="form-control" style="width:100px;">
<br/ >
จำนวนเงินที่ลด (<font color="orange">ใส่ 0 ถ้าไม่ต้องการใช้งาน</font>)
<input type="text" ng-model="discountfrombuylist.money_will_discount" placeholder="จำนวนเงินที่ลด" class="form-control" style="width:100px;">





<hr />


<h4><b>2. ตั้งค่ายอดเงินซื้อเปลี่ยนเป็นคะแนน(หลังจากลดราคาแล้ว, เฉพาะลูกค้าสมาชิก)</b></h4>
<br />
เมื่อยอดเงินซื้อ
<input type="text" ng-model="moneytopointlist.cus_money_if" placeholder="ยอดเงินซื้อ" class="form-control" style="width:100px;">
<br/ >
ได้คะแนน (<font color="orange">ใส่ 0 ถ้าไม่ต้องการใช้งาน</font>)
<input type="text" ng-model="moneytopointlist.point_will" placeholder="คะแนน" class="form-control" style="width:100px;">



<hr />

<h4><b>3. Service Charge</b></h4>
<br />

เปอร์เซ็นต์ (<font color="orange">ใส่ 0 ถ้าไม่ต้องการใช้งาน</font>)
<input type="text" ng-model="servicechargelist.servicecharge_percent" placeholder="%" class="form-control" style="width:100px;">
<br />
<button ng-if="servicechargelist.servicecharge_percent > '0'" class="btn btn-default" ng-click="Materialmodal()">
ผูกกับ {{servicechargelist.product_name}}
</button>

<hr />



<h4><b>4. VAT</b></h4>
<br />

เปอร์เซ็นต์ (<font color="orange">ใส่ 0 ถ้าไม่ต้องการใช้งาน</font>)
<input type="text" ng-model="vatlist.vat_percent" placeholder="%" class="form-control" style="width:100px;">
<br />
<button ng-if="vatlist.vat_percent > '0'" class="btn btn-default" ng-click="Vatmodal()">
ผูกกับ {{vatlist.product_name}}
</button>

<hr />




<button class="btn btn-lg btn-success" ng-click="Saveall()">บันทึก</button>













<div class="modal fade" id="materialmodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">

<input type="text" ng-model="searchmattext" class="form-control" placeholder="ค้นหา" ng-change="Getlistmat(searchmattext)">

<table class="table table-hover">

	<tbody>
		<tr ng-repeat="x in productlist">

			<td>
				<button class="btn btn-success btn-xs" ng-click="Addmaterial(x)">
					+ ผูกกับ Service Charge
				</button>
			</td>
			<td>{{x.product_name}}</td>

		</tr>
	</tbody>
</table>







			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>








<div class="modal fade" id="vatmodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">

<input type="text" ng-model="searchmattext" class="form-control" placeholder="ค้นหา" ng-change="Getlistmat(searchmattext)">

<table class="table table-hover">

	<tbody>
		<tr ng-repeat="x in productlist">

			<td>
				<button class="btn btn-success btn-xs" ng-click="Addvat(x)">
					+ ผูกกับ VAT
				</button>
			</td>
			<td>{{x.product_name}}</td>

		</tr>
	</tbody>
</table>







			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>













</div>
</div>



	</div>


	<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.getall = function(){

$http.get('Setting_etc/getdiscountfrombuy')
       .then(function(response){
          $scope.discountfrombuylist = response.data[0];

        });

$http.get('Setting_etc/getmoneytopoint')
				 .then(function(response){
				 $scope.moneytopointlist = response.data[0];

				 });


				 $http.get('Setting_etc/getservicecharge')
				 				 .then(function(response){
				 				 $scope.servicechargelist = response.data[0];

				 				 });

								 $http.get('Setting_etc/getvat')
												 .then(function(response){
												 $scope.vatlist = response.data[0];

												 });


   };
$scope.getall();



$scope.Saveall = function(){

	$http.post("Setting_etc/Updatediscountfrombuy",{
		money_if: $scope.discountfrombuylist.money_if,
		money_will_discount: $scope.discountfrombuylist.money_will_discount
		}).success(function(data){

	        });


$http.post("Setting_etc/Updatemoneytopoint",{
	cus_money_if: $scope.moneytopointlist.cus_money_if,
	point_will: $scope.moneytopointlist.point_will
	}).success(function(data){

$scope.getall();
toastr.success('<?=$lang_success?>');

        });


				$http.post("Setting_etc/Updateservicecharge",{
					servicecharge_percent: $scope.servicechargelist.servicecharge_percent,
					product_code: $scope.servicechargelist.product_code,
					product_name: $scope.servicechargelist.product_name
					}).success(function(data){

								});


								$http.post("Setting_etc/Updatevat",{
									vat_percent: $scope.vatlist.vat_percent,
									product_code: $scope.vatlist.product_code,
									product_name: $scope.vatlist.product_name
									}).success(function(data){

												});




};




$scope.Addmaterial = function(x){
$('#materialmodal').modal('hide');
$scope.servicechargelist.product_code = x.product_code;
$scope.servicechargelist.product_name = x.product_name;

   };


	 $scope.Addvat = function(x){
	 $('#vatmodal').modal('hide');
	 $scope.vatlist.product_code = x.product_code;
	 $scope.vatlist.product_name = x.product_name;

	    };




$scope.Materialmodal = function(){
$('#materialmodal').modal('show');

   };


	 $scope.Vatmodal = function(){
	 $('#vatmodal').modal('show');

	    };



$scope.Getlistmat = function(searchmattext){

 $http.post("<?php echo $base_url;?>/warehouse/Productlist/Getproduct",{
searchmattext:searchmattext
}).success(function(data){
          $scope.productlist = data;

});


   };









});
	</script>
