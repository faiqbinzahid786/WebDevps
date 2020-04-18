
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">

<form class="form-inline">
<div class="form-group">
<input type="text" ng-model="searchtext" class="form-control" placeholder="
<?=$lang_search?> ชื่อวัตถุดิบ" ng-change="getlist(searchtext,'1')">
</div>

<!-- <div class="form-group">
<button type="submit" ng-click="getlist('','1')" class="btn btn-default" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div> -->

</form>

<hr />
<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
		<th style="width: 50px;"><?=$lang_rank?></th>
	<!-- 	<th style="text-align: center;">รหัส</th> -->
			<th style="text-align: center;">ชื่อวัตถุดิบ</th>

			<th style="text-align: center;"><?=$lang_total?>(หน่วย)</th>
			<!-- <th style="text-align: center;"><?=$lang_total?>(ขีด)</th>
			<th style="text-align: center;"><?=$lang_total?>(กิโลกรัม)</th> -->

			<th style="text-align: center;width: 50px;">แก้ไขจำนวนวัตถุดิบ</th>
			<!-- <th style="text-align: center;"><?=$lang_estimatedrevenue?></th> -->
		</tr>
	</thead>
	<tbody>


		<tr ng-repeat="x in list">
			<td ng-if="selectpage=='1'" class="text-center">{{($index+1)}}</td>
			<td ng-if="selectpage!='1'" class="text-center">{{($index+1)+(perpage*(selectpage-1))}}</td>
			<!-- <td align="center">
				 {{x.product_code}}
			</td> -->

			<td>{{x.product_name}}</td>


			<td align="right">{{x.product_stock_num | number}}</td>
			<!-- <td align="right">{{x.product_stock_num/100 | number}}</td>
			<td align="right">{{x.product_stock_num/1000 | number}}</td> -->
			<!-- <td align="right">{{ (x.product_price - x.product_price_discount) * x.product_stock_num | number:2}}</td> -->

			<td>
<button class="btn btn-primary" ng-click="Updatematmodal(x)">
	แก้ไขจำนวน
</button>
			</td>


		</tr>

	</tbody>
</table>


<form class="form-inline">
<div class="form-group">
<?=$lang_show?>
<select class="form-control" name="" id="" ng-model="perpage" ng-change="getlist(searchtext,'1',perpage)">

	<option value="100">100</option>
	<option value="200">200</option>
	<option value="300">300</option>
	<option value="500">500</option>
	<option value="1000">1000</option>
	<option value="10000">10000</option>
	<option value="100000">100000</option>
	<option value="1000000">1000000</option>
</select>

<?=$lang_page?>
<select name="" id="" class="form-control" ng-model="selectthispage"  ng-change="getlist(searchtext,selectthispage,perpage)">
	<option  ng-repeat="i in pagealladd" value="{{i.a}}">{{i.a}}</option>
</select>
</div>


</form>


<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
<?=$lang_downloadexcel?> </button>


	</div>


	</div>






<div class="modal fade" id="updatematmodal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">แก้ไขจำนวนของ {{matdata.product_name}}</h4>
			</div>
			<div class="modal-body">

				<center>
<h2>จำนวน(หน่วย)</h2>
<input type="text" ng-model="matdata.product_stock_num" class="form-control" style="font-size: 25px;text-align: center;">
<br />
<button class="btn btn-success" ng-click="Updatematok()">บันทึก</button>

</center>

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

$scope.searchtext = '';





$scope.perpage = '100';
$scope.getlist = function(searchtext,page,perpage){
    if(!searchtext){
   	searchtext = '';
   }


    if(!page){
   var	page = '1';
   }

 if(!perpage){
   var	perpage = '100';
   }

 $http.post("Stockmat/Getstockmat",{
searchtext:searchtext,
page: page,
perpage: perpage
}).success(function(data){
          $scope.list = data.list;
                 $scope.pageall = data.pageall;
$scope.numall = data.numall;

$scope.pagealladd = [];
           for(i=1;i<=$scope.pageall;i++){
$scope.pagealladd.push({a:i});
}

$scope.selectpage = page;
$scope.selectthispage = page;
        });
   };
$scope.getlist('','1');




$scope.Updatematmodal = function(x){
$('#updatematmodal').modal('show');
$scope.matdata = x;
}



$scope.Updatematok = function(){
$http.post("Stockmat/Updatematok",{
product_id: $scope.matdata.product_id,
product_stock_num: $scope.matdata.product_stock_num
}).success(function(data){
	$scope.getlist('','1');
	$('#updatematmodal').modal('hide');
});


}







});
	</script>
