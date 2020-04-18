
<div class="col-md-12 col-sm-12" ng-app="firstapp" ng-controller="Index">

<div class="col-md-12 col-sm-12">

<div style="float: right;color:orange;">
	<input type="checkbox" ng-model="showdeletcbut"> <?=$lang_showdel?>
</div>
<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr style="background-color: #eee;">
<th><?=$lang_tablename?></th><th>จำนวน<?=$lang_seat?></th><th style="width: 120px;"><?=$lang_manage?></th>
		</tr>
	</thead>
	<tbody>
	<tr style="background-color:#eee;">

			<td>
<input type="text" class="form-control" placeholder="<?=$lang_tablename?>" ng-model="food_table_name" style="font-size:20px;">
			</td>

			<td>
				<input type="text" class="form-control" placeholder="จำนวน<?=$lang_seat?>" ng-model="food_table_seat" style="font-size:20px;">
			</td>




			<td><button class="btn btn-success" ng-click="Savecategory(food_table_name,food_table_seat)"><?=$lang_save?></button></td>
	</tr>

	</tbody>
</table>

</div>





<!--
<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span> ดาวน์โหลดตาราง Excel </button> -->






	<div class="col-xs-4 col-sm-2 col-md-2" ng-repeat="x in categorylist">
<div  class="btn btn-default" style="width:100%;">


			<span ng-show="food_table_id==x.food_table_id">
			<input type="text" placeholder="<?=$lang_tablename?>" ng-model="x.food_table_name" class="form-control">
			<input type="text" placeholder="<?=$lang_seat?>" ng-model="x.food_table_seat" class="form-control">

			</span>
<center>
			<span ng-show="food_table_id!=x.food_table_id">
			<h1 style="font-weight: bold;">{{x.food_table_name}}</h1></span>

			<span ng-show="food_table_id!=x.food_table_id">
			<h4>{{x.food_table_seat}} <?=$lang_numseat?></h4></span>

</center>
<br />
			<span ng-show="food_table_id!=x.food_table_id" style="float: right;">

				<button class="btn btn-xs btn-default" ng-click="Editinputcategory(x.food_table_id)">
				<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
				</button>
				<button  ng-show="showdeletcbut" class="btn btn-xs btn-danger" ng-click="Deletetable(x.food_table_id)"><?=$lang_delete?></button>
			</span>

			<span ng-show="food_table_id==x.food_table_id" style="float: right;">

				<button class="btn btn-xs btn-success" ng-click="Editsavecategory(x)"><?=$lang_save?></button>
				<button class="btn btn-xs btn-default" ng-click="Cancelcategory(x.food_table_id)"><?=$lang_cancel?></button>
			</span>



</div>
<div class="col-md-12">
<BR />
</div>
		</div>





	</div>


	<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.food_table_name = '';
$scope.food_table_seat = '';


$scope.get = function(){

$http.get('Food_table/get')
       .then(function(response){
          $scope.categorylist = response.data.list;

        });
   };
$scope.get();

$scope.Savecategory = function(food_table_name,food_table_seat){
	if(food_table_name != '' && food_table_seat != ''){
$http.post("Food_table/Add",{
	food_table_name: food_table_name,
	food_table_seat: food_table_seat
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();
$scope.food_table_name = '';
$scope.food_table_seat = '';
        });
}else{
toastr.warning('<?=$lang_plz?>');
}

};

$scope.Editinputcategory = function(food_table_id){
$scope.food_table_id = food_table_id;
};

$scope.Cancelcategory = function(food_table_id){
$scope.food_table_id = '';
$scope.get();
};

$scope.Editsavecategory = function(x){
$http.post("Food_table/Update",{
	food_table_id: x.food_table_id,
	food_table_name: x.food_table_name,
	food_table_seat: x.food_table_seat
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.food_table_id = '';
$scope.get();

        });
};


$scope.Deletetable = function(food_table_id){
$http.post("Food_table/Delete",{
	food_table_id: food_table_id
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();
        });
};




});
	</script>
