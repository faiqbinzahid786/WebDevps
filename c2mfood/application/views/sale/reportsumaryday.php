
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">

<form class="form-inline">
<div class="form-group">
เดือน:
<select ng-model="month" class="form-control">
	<option value="01">
		1
	</option>
	<option value="02">
		2
	</option>
	<option value="03">
		3
	</option>
	<option value="04">
		4
	</option>
	<option value="05">
		5
	</option>
	<option value="06">
		6
	</option>
	<option value="7">
		7
	</option>
	<option value="08">
		8
	</option>
	<option value="09">
		9
	</option>
	<option value="10">
		10
	</option>
	<option value="11">
		11
	</option>
	<option value="12">
		12
	</option>

</select>
</div>
<div class="form-group">
ปี:
<input type="text"  ng-model="year" name="" class="form-control" style="width: 70px;">
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
		<th style="text-align: center;width: 10px;">Day</th>

			<th style="text-align: center;">กำไร</th>

		</tr>
	</thead>
	<tbody style="font-size: 16px;font-weight: bold;">
		<tr>
		<td>1</td>
		<td align="right">{{daylist[0].d1-daylist[0].dd1-c1 | number:2}}</td>
		</tr>

		<tr>
		<td>2</td>
		<td align="right">{{daylist[0].d2-daylist[0].dd2-c2 | number:2}}</td>
		</tr>

		<tr>
		<td>3</td>
		<td align="right">{{daylist[0].d3-daylist[0].dd3-c3 | number:2}}</td>
		</tr>

		<tr>
		<td>4</td>
		<td align="right">{{daylist[0].d4-daylist[0].dd4-c4 | number:2}}</td>
		</tr>

		<tr>
		<td>5</td>
		<td align="right">{{daylist[0].d5-daylist[0].dd5-c5 | number:2}}</td>
		</tr>

		<tr>
		<td>6</td>
		<td align="right">{{daylist[0].d6-daylist[0].dd6-c6 | number:2}}</td>
		</tr>

		<tr>
		<td>7</td>
		<td align="right">{{daylist[0].d7-daylist[0].dd7-c7 | number:2}}</td>
		</tr>

		<tr>
		<td>8</td>
		<td align="right">{{daylist[0].d8-daylist[0].dd8-c8 | number:2}}</td>
		</tr>

		<tr>
		<td>9</td>
		<td align="right">{{daylist[0].d9-daylist[0].dd9-c9 | number:2}}</td>
		</tr>

		<tr>
		<td>10</td>
		<td align="right">{{daylist[0].d10-daylist[0].dd10-c10 | number:2}}</td>
		</tr>

		<tr>
		<td>11</td>
		<td align="right">{{daylist[0].d11-daylist[0].dd11-c11 | number:2}}</td>
		</tr>

		<tr>
		<td>12</td>
		<td align="right">{{daylist[0].d12-daylist[0].dd12-c12 | number:2}}</td>
		</tr>

		<tr>
		<td>13</td>
		<td align="right">{{daylist[0].d13-daylist[0].dd13-c13 | number:2}}</td>
		</tr>

		<tr>
		<td>14</td>
		<td align="right">{{daylist[0].d14-daylist[0].dd14-c14 | number:2}}</td>
		</tr>

		<tr>
		<td>15</td>
		<td align="right">{{daylist[0].d15-daylist[0].dd15-c15 | number:2}}</td>
		</tr>

		<tr>
		<td>16</td>
		<td align="right">{{daylist[0].d16-daylist[0].dd16-c16 | number:2}}</td>
		</tr>

		<tr>
		<td>17</td>
		<td align="right">{{daylist[0].d17-daylist[0].dd17-c17 | number:2}}</td>
		</tr>

		<tr>
		<td>18</td>
		<td align="right">{{daylist[0].d18-daylist[0].dd18-c18 | number:2}}</td>
		</tr>

		<tr>
		<td>19</td>
		<td align="right">{{daylist[0].d19-daylist[0].dd19-c19 | number:2}}</td>
		</tr>

		<tr>
		<td>20</td>
		<td align="right">{{daylist[0].d20-daylist[0].dd20-c20 | number:2}}</td>
		</tr>

		<tr>
		<td>21</td>
		<td align="right">{{daylist[0].d21-daylist[0].dd21-c21 | number:2}}</td>
		</tr>

		<tr>
		<td>22</td>
		<td align="right">{{daylist[0].d22-daylist[0].dd22-c22 | number:2}}</td>
		</tr>

		<tr>
		<td>23</td>
		<td align="right">{{daylist[0].d23-daylist[0].dd23-c23 | number:2}}</td>
		</tr>

		<tr>
		<td>24</td>
		<td align="right">{{daylist[0].d24-daylist[0].dd24-c24 | number:2}}</td>
		</tr>

		<tr>
		<td>25</td>
		<td align="right">{{daylist[0].d25-daylist[0].dd25-c25 | number:2}}</td>
		</tr>

		<tr>
		<td>26</td>
		<td align="right">{{daylist[0].d26-daylist[0].dd26-c26 | number:2}}</td>
		</tr>

		<tr>
		<td>27</td>
		<td align="right">{{daylist[0].d27-daylist[0].dd27-c27 | number:2}}</td>
		</tr>

		<tr>
		<td>28</td>
		<td align="right">{{daylist[0].d28-daylist[0].dd28-c28 | number:2}}</td>
		</tr>

		<tr>
		<td>29</td>
		<td align="right">{{daylist[0].d29-daylist[0].dd29-c29 | number:2}}</td>
		</tr>

		<tr>
		<td>30</td>
		<td align="right">{{daylist[0].d30-daylist[0].dd30-c30 | number:2}}</td>
		</tr>

		<tr>
		<td>31</td>
		<td align="right">{{daylist[0].d31-daylist[0].dd31-c31 | number:2}}</td>
		</tr>


	</tbody>
</table>

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



$scope.year = '<?php echo date('Y',time());?>';

$scope.month = '<?php echo date('m',time());?>';


$scope.reportdaylist = function(){
$http.post("Reportsumaryday/daylist",{
	year: $scope.year,
	month: $scope.month
	}).success(function(data){
$scope.daylist = data.data;
$scope.c1 = data.c1;
$scope.c2 = data.c2;
$scope.c3 = data.c3;
$scope.c4 = data.c4;
$scope.c5 = data.c5;
$scope.c6 = data.c6;
$scope.c7 = data.c7;
$scope.c8 = data.c8;
$scope.c9 = data.c9;
$scope.c10 = data.c10;
$scope.c11 = data.c11;
$scope.c12 = data.c12;
$scope.c13 = data.c13;
$scope.c14 = data.c14;
$scope.c15 = data.c15;
$scope.c16 = data.c16;
$scope.c17 = data.c17;
$scope.c18 = data.c18;
$scope.c19 = data.c19;
$scope.c20 = data.c20;
$scope.c21 = data.c21;
$scope.c22 = data.c22;
$scope.c23 = data.c23;
$scope.c24 = data.c24;
$scope.c25 = data.c25;
$scope.c26 = data.c26;
$scope.c27 = data.c27;
$scope.c28 = data.c28;
$scope.c29 = data.c29;
$scope.c30 = data.c30;
$scope.c31 = data.c31;

$scope.datac = [];
angular.forEach($scope.daylist,function(item){
$scope.datac.push(
	{count: item.d1-item.dd1-$scope.c1,name: '1'},
	{count: item.d2-item.dd2-$scope.c2,name: '2'},
	{count: item.d3-item.dd3-$scope.c3,name: '3'},
	{count: item.d4-item.dd4-$scope.c4,name: '4'},
	{count: item.d5-item.dd5-$scope.c5,name: '5'},
	{count: item.d6-item.dd6-$scope.c6,name: '6'},
	{count: item.d7-item.dd7-$scope.c7,name: '7'},
	{count: item.d8-item.dd8-$scope.c8,name: '8'},
	{count: item.d9-item.dd9-$scope.c9,name: '9'},
	{count: item.d10-item.dd10-$scope.c10,name: '10'},
	{count: item.d11-item.dd11-$scope.c11,name: '11'},
	{count: item.d12-item.dd12-$scope.c12,name: '12'},
	{count: item.d13-item.dd13-$scope.c13,name: '13'},
	{count: item.d14-item.dd14-$scope.c14,name: '14'},
	{count: item.d15-item.dd15-$scope.c15,name: '15'},
	{count: item.d16-item.dd16-$scope.c16,name: '16'},
	{count: item.d17-item.dd14-$scope.c17,name: '17'},
	{count: item.d18-item.dd18-$scope.c18,name: '18'},
	{count: item.d19-item.dd19-$scope.c19,name: '19'},
	{count: item.d20-item.dd20-$scope.c20,name: '20'},
	{count: item.d21-item.dd21-$scope.c21,name: '21'},
	{count: item.d22-item.dd22-$scope.c22,name: '22'},
	{count: item.d23-item.dd23-$scope.c23,name: '23'},
	{count: item.d24-item.dd24-$scope.c24,name: '24'},
	{count: item.d25-item.dd25-$scope.c25,name: '25'},
	{count: item.d26-item.dd26-$scope.c26,name: '26'},
	{count: item.d27-item.dd27-$scope.c27,name: '27'},
	{count: item.d28-item.dd28-$scope.c28,name: '28'},
	{count: item.d29-item.dd29-$scope.c29,name: '29'},
	{count: item.d30-item.dd30-$scope.c30,name: '30'},
	{count: item.d31-item.dd31-$scope.c31,name: '31'}
	);
});

$scope.Chart($scope.datac);


        });
};
$scope.reportdaylist();





$scope.datac = [];


$scope.Chart = function(datac){
$('#bar').empty();
Morris.Bar({
  element: 'bar',
  data: datac,
  xkey: 'name',
  ykeys: ['count'],
  labels: ['กำไร'],
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
