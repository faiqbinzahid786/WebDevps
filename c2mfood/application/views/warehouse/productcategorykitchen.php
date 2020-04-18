
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">


<div style="float: right;">
	<input type="checkbox" ng-model="showdeletcbut"> <?=$lang_showdel?>
</div>
*** ครัว อาหาร  เครื่องดื่ม  ปิ้ง  ย่าง ทอด  ไทย  จีน ฝรั่งเศษ อื่นๆ
<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr style="background-color: #eee;">
			<th style="width: 50px;"><?=$lang_rank?></th>
			<th>ครัว</th>

			<th style="width: 120px;"><?=$lang_manage?></th>
		</tr>
	</thead>
	<tbody>
	<tr>
	<td></td>
			<td><input type="text" class="form-control" placeholder="ครัว" ng-model="kitchen_name"></td>

			<td><button class="btn btn-success" ng-click="Savecategory(kitchen_name)"><?=$lang_save?></button></td>
	</tr>

		<tr ng-repeat="x in categorylist">

		<td align="center">{{$index+1}}</td>

			<td ng-show="kitchen_id==x.kitchen_id"><input type="text" ng-model="x.kitchen_name" class="form-control"></td>



			<td ng-show="kitchen_id!=x.kitchen_id">

				{{x.kitchen_name}}


			</td>


			<td ng-show="kitchen_id!=x.kitchen_id">

				<button class="btn btn-xs btn-warning" ng-click="Editinputcategory(x.kitchen_id)"><?=$lang_edit?></button>
				<button  ng-show="showdeletcbut" class="btn btn-xs btn-danger" ng-click="Deletecategory(x.kitchen_id)">
				<?=$lang_delete?></button>
			</td>

			<td ng-show="kitchen_id==x.kitchen_id">

				<button class="btn btn-xs btn-success" ng-click="Editsavecategory(x.kitchen_id,x.kitchen_name)">
				<?=$lang_save?></button>
				<button class="btn btn-xs btn-default" ng-click="Cancelcategory(x.kitchen_id)"><?=$lang_cancel?></button>
			</td>

		</tr>
	</tbody>
</table>


<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
<?=$lang_downloadexcel?> </button>

	</div>


	</div>

	</div>


	<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.get = function(){

$http.get('Productcategorykitchen/get')
       .then(function(response){
          $scope.categorylist = response.data.list;

        });
   };
$scope.get();

$scope.Savecategory = function(kitchen_name){
$http.post("Productcategorykitchen/Add",{
	kitchen_name: kitchen_name
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();
        });
};

$scope.Editinputcategory = function(kitchen_id){
$scope.kitchen_id = kitchen_id;
};

$scope.Cancelcategory = function(kitchen_id){
$scope.kitchen_id = '';
$scope.get();
};

$scope.Editsavecategory = function(kitchen_id,kitchen_name){
$http.post("Productcategorykitchen/Update",{
	kitchen_id: kitchen_id,
	kitchen_name: kitchen_name
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.kitchen_id = '';
$scope.get();

        });
};


$scope.Deletecategory = function(kitchen_id){
$http.post("Productcategorykitchen/Delete",{
	kitchen_id: kitchen_id
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();
        });
};




});
	</script>
