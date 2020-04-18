
<div class="col-md-12 col-sm-12" ng-app="firstapp" ng-controller="Index">
	
<div class="panel panel-default">
	<div class="panel-body">

<form class="form-inline">
<div class="form-group">
<input type="text" name="" placeholder="<?=$lang_searchfoodname?>" ng-model="searchproduct" class="form-control">
</div>
<div class="form-group">
<input type="text" id="dayfrom" name="dayfrom" ng-model="dayfrom" class="form-control" placeholder="<?=$lang_fromday?>"> -
</div>
<div class="form-group">
<input type="text" id="dayto" name="dayto" ng-model="dayto" class="form-control" placeholder="<?=$lang_today?>">
</div>
<div class="form-group">
<button type="submit" ng-click="reportdaylist()" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>


<!-- <div class="form-group">
<button class="btn btn-info"  ng-click="DownloadExcel()" title="ดาวน์โหลด" ><span class="glyphicon glyphicon-save" aria-hidden="true"></button> 
</div> -->



</form>
<hr />



	<div id="bar"></div>

<hr />
<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
		
			<th style="text-align: center;"><?=$lang_foodname?></th>
			<th style="text-align: center;"><?=$lang_price?></th>
			<th style="text-align: center;"><?=$lang_cansale?></th>
			<th style="text-align: center;"><?=$lang_revenue?></th>
			
			
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in daylist | filter:searchproduct">
			<td>{{x.food_name}}</td>
			<td align="right">{{x.food_price | number:2}}</td>
			<td align="right">{{x.food_numsaleall | number}}</td>
			<td align="right">{{x.food_pricesaleall | number:2}}</td>
			
			

			
		</tr>

		<tr>
			<td colspan="2" align="right"><?=$lang_all?></td>
			<td style="font-weight: bold;text-align: right;">
			{{ Sumnumall() | number }}</td>
			<td style="font-weight: bold;text-align: right;">
			{{ Sumpricesaleall() | number:2 }}</td>
			
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


$("#dayfrom").datetimepicker({  
    timepicker:false,  
        format:'d-m-Y',
    lang:'th'  // แสดงภาษาไทย  
    //yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ  
    //inline:true  

}); 

$("#dayto").datetimepicker({  
    timepicker:false,  
        format:'d-m-Y',
    lang:'th'  // แสดงภาษาไทย  
    //yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ  
    //inline:true  

}); 

$scope.dayfrom = '<?php echo date('01-m-Y',time());?>';
$scope.dayto = '<?php echo date('d-m-Y',time());?>';








$scope.reportdaylist = function(){
$http.post("Food_report/daylist",{
	dayfrom: $scope.dayfrom,
	dayto: $scope.dayto
	}).success(function(data){
$scope.daylist = data;

$scope.datac = [];
angular.forEach($scope.daylist,function(item){
$scope.datac.push({count: item.food_pricesaleall,name: item.food_name});
});

$scope.Chart($scope.datac);


        });
};
$scope.reportdaylist();



 $scope.Sumnumall = function(){
var total = 0;

 angular.forEach($scope.daylist,function(item){
	 if(item.food_numsaleall != null){
	 food_numsaleall = item.food_numsaleall;
	 }else{
     food_numsaleall = 0;
	 }
total += parseInt(food_numsaleall);
 });
    return total;
};

 $scope.Sumpricesaleall = function(){
var total = 0;

 angular.forEach($scope.daylist,function(item){
	 if(item.food_pricesaleall != null){
	 food_pricesaleall = item.food_pricesaleall;
	 }else{
     food_pricesaleall = 0;
	 }
total += parseInt(food_pricesaleall);
 });
    return total;
};






$scope.DownloadExcel = function(){

$http.post("Food_report/excel",{
	'excel': '1',
	'dayfrom': $scope.dayfrom || '',
	'dayto': $scope.dayto || ''
	}).success(function(data){
var blob = new Blob([data], {type: "application/force-download"});
    var objectUrl = URL.createObjectURL(blob);
    window.location.assign(objectUrl);

        });

};


$scope.datac = [];


$scope.Chart = function(datac){
$('#bar').empty();
Morris.Bar({
  element: 'bar',
  data: datac,
  xkey: 'name',
  ykeys: ['count'],
  labels: ['<?=$lang_revenue?>'],
  barColors: function (row, series, type) {
    if (type === 'bar') {
     var letters = '0123456789ABCDEF';
    var color = '#f0ad4e';
    /*var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }*/
    return color;
    }
  }

});
};

$scope.Openchart = function(){
$scope.showchart = true;
};

$scope.Opentable = function(){
$scope.showchart = false;
};


});

</script>