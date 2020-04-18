
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">


<div class="panel panel-default">
	<div class="panel-body">


<!--
<button class="btn btn-primary" ng-click="Openmodal()"><?=$lang_addbrand?> +</button>
<hr />
<input type="text" ng-model="search" name="" placeholder="ค้นหา" class="form-control" style="width: 200px;">
<br />-->
<table id="headerTable" class="table table-hover"  ng-repeat="x in list">
	<thead  style="background-color: #eee;">
		<tr>
			<th>logo</th>
			<th><?=$lang_brandname?></th>
			<th><?=$lang_address?></th>
			<th><?=$lang_tax?></th>
			<th>VAT %</th>

			<th style="width: 10px;"><?=$lang_edit?></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>


<img ng-if="x.owner_logo != ''" ng-src="<?php echo $base_url;?>/{{x.owner_logo}}" style="height: 50px;">


<button class="btn btn-default" ng-click="Updatelogomodal(x)">อัฟโหลดโลโก้ร้าน</button>

			</td>
			<td>{{x.owner_name}}</td>
			<td>
			{{x.owner_address}}



, <?=$lang_tel?>: {{x.tel}}
			</td>
			<td>{{x.owner_tax_number}}</td>
			<td>
	<span ng-if="x.owner_vat_status=='0'">ปิด VAT</span>

<span ng-if="x.owner_vat_status=='1'">ภาษีรวมในสินค้า VAT Include</span>
<span ng-if="x.owner_vat_status=='2'">ภาษีแยกจากสินค้า VAT Exclude</span>
<br />
	<span ng-if="x.owner_vat_status!='0'">	{{x.owner_vat}} % </span>

		</td>

			<td>
				<button class="btn btn-warning btn-xs" ng-click="Openmodaledit(x)"><?=$lang_edit?></button>
			</td>
		</tr>



		<tr>

					<td colspan="5" style="text-align: center;">
		<input type="text" class="form-control" ng-model="x.footer_slip" placeholder="ใส่ข้อความส่วนล่างใบเสร็จ...">
					</td>
					<td>
			<button class="btn btn-success" ng-click="Updatefooter_slip(x)">บันทึกส่วนล่างใบเสร็จ</button>


					</td>
				</tr>





		<tr>

			<td colspan="6" style="text-align: center;">
<button class="btn btn-default" ng-click="Updatebgimgmodal(x)">อัฟโหลดภาพพื้นหลัง</button>
<hr />
<img class="img" ng-if="x.owner_bgimg != ''" ng-src="<?php echo $base_url;?>/{{x.owner_bgimg}}" style="max-width: 300px;">

			</td>
		</tr>
	</tbody>
</table>

<!-- <hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
<?=$lang_downloadexcel?> </button> -->

</div>
</div>




<div class="modal fade" id="modalstore">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_addbrand?></h4>
			</div>
			<div class="modal-body">







<fieldset>
                    <div class="form-group">
                    	<?=$lang_brandname?>
			    		    <input class="form-control" placeholder="<?=$lang_brandname?>" ng-model="owner_name" type="text" style="height: 50px;font-size: 20px;">
			    		</div>

<div class="form-group">
	<?=$lang_tax?>
			    		    <input class="form-control" placeholder="<?=$lang_tax?>" ng-model="owner_tax_number" type="text" style="height: 50px;font-size: 20px;">
			    		</div>



<div class="form-group">
			    			<select  class="form-control" style="height: 50px;font-size: 20px;" ng-model="owner_vat_status">
			    				<option value="0">ปิด VAT</option>
			    				<option value="1">ภาษีรวมในสินค้า VAT Include</option>
			    				<option value="2">ภาษีแยกจากสินค้า VAT Exclude</option>
			    			</select>
			    		</div>


			    		<div class="form-group" ng-show="owner_vat_status!='0'">
			    			VAT %
			    		    <input class="form-control" placeholder="VAT %" ng-model="owner_vat" type="text" style="height: 50px;font-size: 20px;">
			    		</div>


<div class="form-group">
	<?=$lang_address?>
	<textarea name="owner_address" class="form-control" placeholder="<?=$lang_address?>" ng-model="owner_address" style="height: 70px;font-size: 20px;">
</textarea>
</div>





 <div class="col-md-12">
			    		<br />
			    		</div>


 <div class="form-group">
			    		    <input class="form-control" placeholder="<?=$lang_tel?>" ng-model="tel" type="text" style="height: 50px;font-size: 20px;">
			    		</div>


			    		<input id="submit" class="btn btn-lg btn-success btn-block" type="submit" ng-click="Addbrand()" value="<?=$lang_addbrand?>" ng-hide="foredit">

<input id="submit" class="btn btn-lg btn-success btn-block" type="submit" ng-click="Editbrand()" value="<?=$lang_confirm?>" ng-show="foredit">

			    	</fieldset>








			</div>
			<div class="modal-footer">


			</div>
		</div>
	</div>
</div>






<div class="modal fade" id="updatelogomodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">อัฟโหลดโลโก้</h4>
			</div>
			<div class="modal-body">


<form id="uploadImg"  enctype="multipart/form-data" method="POST">
	<div class="form-group">

<input type="hidden" name="owner_id" value="{{owner_id_logo}}">
<input type="file" name="owner_logo" accept="image/*" class="form-control" value="">
</div>
<div class="form-group">
<button class="btn btn-success" type="submit"><?=$lang_save?> logo</button>
</div>
</form>


			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>







<div class="modal fade" id="updatebgimgmodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">อัฟโหลดภาพพื้นหลัง</h4>
			</div>
			<div class="modal-body">


<form id="uploadbgImg"  enctype="multipart/form-data" method="POST">
	<div class="form-group">

<input type="hidden" name="owner_id" value="{{owner_id_bgimg}}">
<input type="file" name="owner_bgimg" accept="image/*" class="form-control" value="">
</div>
<div class="form-group">
<button class="btn btn-success" type="submit"><?=$lang_save?></button>
</div>
</form>


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

$scope.owner_name = '';
$scope.owner_tax_number  = '';
$scope.owner_address = '';
$scope.tel  = '';
$scope.owner_vat  = '0';
$scope.owner_vat_status  = '0';


$scope.Openmodal = function(){
$('#modalstore').modal('show');
$scope.foredit = false;
};


$scope.Openmodaledit = function(x){
$('#modalstore').modal('show');

$scope.foredit = true;

$scope.owner_id = x.owner_id;
$scope.owner_name = x.owner_name;
$scope.owner_tax_number = x.owner_tax_number;
$scope.owner_address = x.owner_address;
$scope.owner_vat= x.owner_vat;
$scope.owner_vat_status= x.owner_vat_status;
$scope.tel = x.tel;

};


$scope.get = function(){

$http.get('Brand/get')
       .then(function(response){
          $scope.list = response.data;

        });
   };
$scope.get();



$scope.Addbrand = function(){

if($scope.owner_name != '' && $scope.owner_address != '' && $scope.tel != ''){
$http.post("Brand/Add",{
	owner_name: $scope.owner_name,
	owner_tax_number: $scope.owner_tax_number,
	owner_address: $scope.owner_address,
	owner_vat: $scope.owner_vat,
	owner_vat_status: $scope.owner_vat_status,
	tel: $scope.tel
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();
$('#modalstore').modal('hide');
$scope.foredit = false;
        });
}else{
	toastr.warning('<?=$lang_plz?>');
}


};




$scope.Updatelogomodal = function(x){

$scope.owner_id_logo = x.owner_id;
$('#updatelogomodal').modal('show');

};


$(document).ready(function (e) {
    $('#uploadImg').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: 'Brand/Addimg',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
$( "#uploadImg" )[0].reset();
$scope.get();
$('#updatelogomodal').modal('hide');
            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    }));


});








$scope.Updatebgimgmodal = function(x){

$scope.owner_id_bgimg = x.owner_id;
$('#updatebgimgmodal').modal('show');

};


$(document).ready(function (e) {
    $('#uploadbgImg').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: 'Brand/Addbgimg',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
$( "#uploadbgImg" )[0].reset();
$scope.get();
$('#updatebgimgmodal').modal('hide');
            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    }));


});





$scope.Editbrand = function(){
	if($scope.owner_name != '' && $scope.owner_address != '' && $scope.tel != ''){
$http.post("Brand/Edit",{
	owner_id: $scope.owner_id,
	owner_name: $scope.owner_name,
	owner_tax_number: $scope.owner_tax_number,
	owner_address: $scope.owner_address,
	owner_vat: $scope.owner_vat,
	owner_vat_status: $scope.owner_vat_status,
	tel: $scope.tel
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();
$('#modalstore').modal('hide');
        });

        }else{
	toastr.warning('<?=$lang_plz?>');
}


};





$scope.Updatefooter_slip = function(x){
$http.post("Brand/Updatefooter_slip",{
	owner_id: x.owner_id,
	footer_slip: x.footer_slip
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();
        });


};





});
	</script>
