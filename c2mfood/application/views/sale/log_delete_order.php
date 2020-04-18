
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">



<!-- <div style="float: right;">
	<input type="checkbox" ng-model="showdeletcbut"> <?=$lang_showdel?>
</div> -->


<form class="form-inline">



<div class="form-group">
<input type="text" id="dayfrom" name="dayfrom" ng-model="dayfrom" class="form-control" placeholder="<?=$lang_fromday?>"> -
</div>
<div class="form-group">
<input type="text" id="dayto" name="dayto" ng-model="dayto" class="form-control" placeholder="<?=$lang_today?>">
</div>
<div class="form-group">
<button type="submit" ng-click="getlist()" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>


<div class="form-group">
<button type="submit" ng-click="getlist('','1')" class="btn btn-default" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div>

</form>
<br />




<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th><?=$lang_rank?></th>

				<th>รายการที่ลบ</th>
			<th>โต๊ะ</th>


				<th>ลบโดย</th>
			<th><?=$lang_day?></th>
			<th  ng-if="showdeletcbut" style="width: 50px;"><?=$lang_delete?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in list">
			<td ng-if="selectpage=='1'" class="text-center">{{($index+1)}}</td>
			<td ng-if="selectpage!='1'" class="text-center">{{($index+1)+(perpage*(selectpage-1))}}</td>
		
<td>{{x.product_name}}</td>
<td>{{x.table_name}}</td>
<td>{{x.name}}</td>

			<td>{{x.adddate}}</td>
			<td ng-show="showdeletcbut" align="center"><button class="btn btn-xs btn-danger" ng-click="Deletelist(x)" id="delbut{{x.ID}}">
			<?=$lang_delete?></button></td>
		</tr>
	</tbody>
</table>




<form class="form-inline">
<div class="form-group">
<?=$lang_show?>
<select class="form-control" name="" id="" ng-model="perpage" ng-change="getlist(searchtext,'1',perpage)">
	<option value="10">10</option>
	<option value="20">20</option>
	<option value="30">30</option>
	<option value="50">50</option>
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
<?=$lang_downloadexcel?>
 </button>












	</div>


	</div>

	</div>


		<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {


	$scope.ParsefloatFunc = function(data){
return parseFloat(data);
};





$("#dayfrom").datetimepicker({
    datetimepicker:false,
        format:'d-m-Y H:i',
    lang:'th'  // แสดงภาษาไทย
    //yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
    //inline:true

});

$("#dayto").datetimepicker({
    datetimepicker:false,
        format:'d-m-Y H:i',
    lang:'th'  // แสดงภาษาไทย
    //yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
    //inline:true

});

$scope.dayfrom = '<?php echo date('d-m-Y 00:01',time());?>';
$scope.dayto = '<?php echo date('d-m-Y 23:59',time());?>';





$scope.perpage = '10';
$scope.getlist = function(searchtext,page,perpage){
   if(!searchtext){
   	searchtext = '';
   }


    if(!page){
   var	page = '1';
   }

 if(!perpage){
   var	perpage = '10';
   }

   $http.post("Log_delete_order/get",{
searchtext:searchtext,
page: page,
perpage: perpage,
dayfrom: $scope.dayfrom,
dayto: $scope.dayto
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



$scope.Getone = function(x){
$('#Openone').modal('show');
$http.post("Salelist/Getone",{
	sale_runno: x.sale_runno
}).success(function(response){
$scope.listone = response;
$scope.cus_name = x.cus_name;
$scope.cus_address_all = x.cus_address_all;
$scope.sale_runno = x.sale_runno;
$scope.sumsale_discount = x.sumsale_discount;
$scope.sumsale_num = x.sumsale_num;
$scope.sumsale_price = x.sumsale_price;
$scope.money_from_customer = x.money_from_customer;
$scope.vat3 = x.vat;
$scope.sumsalevat = (parseFloat(x.sumsale_price) * (parseFloat(x.vat)/100)) + parseFloat(x.sumsale_price);
$scope.money_changeto_customer = x.money_changeto_customer;
$scope.adddate = x.adddate;
$scope.discount_last2 = x.discount_last;
        });

};

$scope.Deletelist = function(x){
$('#delbut'+ x.ID).prop('disabled',true);
$http.post("Salelist/Deletelist",{
	ID: x.ID,
	sale_runno: x.sale_runno
}).success(function(response){
$scope.getlist();
        });

};



});
	</script>
