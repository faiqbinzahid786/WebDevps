
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">


<div style="float: left;">
<input type="text" ng-model="searchtext" class="form-control" placeholder="
<?=$lang_search?> ชื่อพนักงานขาย" ng-change="getlist(searchtext,'1')">
</div>


<br />




<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader"  style="font-size:12px;">
			<th>กะ</th>
			<th>พิมพ์บิล</th>
			<th>โดย</th>
			<th>เวลาที่เปิดกะ</th>
			<th>เวลาปิดกะ</th>
			<th>เงินลิ้นชักเริ่ม</th>
<th>เงินในลิ้นชักสุดท้าย</th>
<th>ส่วนต่างเงินในลิ้นชัก</th>
<th>จำนวนสินค้าที่ขายได้</th>
<th>ยอดขาย</th>
			<th>ส่วนลดท้ายบิล</th>
			<th>ยอดสุทธิ</th>

<th>เงินสด</th>
<th>บัตรเครดิต</th>
<th>QR Pament</th>
<th>UseWallet</th>
<th>AddWallet</th>

		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in list">
	<td>
		<button class="btn btn-warning btn-lg" ng-click="Productinshift(x)">
			{{x.shift_id | number}}
</button>
		</td>
		<td>
<button class="btn btn-sm btn-default" ng-click="Openbillcloseday(x)">พิมพ์</button>

		</td>
<td>{{x.user_name}}</td>
<td style="font-size:12px;">{{x.shift_start_time}}</td>
<td style="font-size:12px;">
<span ng-if="x.shift_end_time=='01-01-1970 07:00:00'"></span>
<span ng-if="x.shift_end_time!='01-01-1970 07:00:00'">	{{x.shift_end_time}}</span>
</td>
<td style="text-align:right;">{{x.shift_money_start  | number:2}}</td>
<td style="text-align:right;">{{x.shift_money_end  | number:2}}</td>
<td style="color:#fff;background-color:#f0ad4e;text-align:right;">{{x.shift_money_end-x.shift_money_start  | number:2}}</td>
<td style="text-align:right;">{{x.sumsale_num | number}}</td>
<td style="text-align:right;">{{x.sumsale_price | number:2}}</td>
<td style="text-align:right;">{{x.discount_last | number:2}}</td>
<td style="color:#000;background-color:#eee;text-align:right;">{{x.sumsale_price-x.discount_last | number:2}}</td>

<td style="color:#fff;background-color:#f0ad4e;text-align:right;">{{x.cash  | number:2}}</td>
<td style="text-align:right;">{{x.creditcard  | number:2}}</td>
<td style="text-align:right;">{{x.qrpayment  | number:2}}</td>
<td style="text-align:right;">{{x.usewallet  | number:2}}</td>
<td style="color:#fff;background-color:#f0ad4e;text-align:right;">{{x.addwallet  | number:2}}</td>


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
	<option value="1000">1000</option>
	<option value="3000">3000</option>
	<option value="5000">5000</option>
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










 <div class="modal fade" id="Productinshift">
 	<div class="modal-dialog modal-lg">
 		<div class="modal-content">

 			<div class="modal-body">

รายการอาหารที่ขายได้ในกะที่ {{shift_this | number}}
<table class="table table-bordered">
<thead>
	<tr class="trheader">
			<th>ลำดับ	</th>
	<th>ชื่ออาหาร	</th>
	<th>หมวดหมู่	</th>
	<th>จำนวนขาย	</th>
	<th>ขายได้	</th>
	<th>ส่วนลด	</th>
	<th>รายรับ	</th>
</tr>
</thead>
<tbody>
	<tr ng-repeat="x in listproduct">
		<td> {{$index+1}}</td>
		<td> {{x.product_name_ok}}</td>
		<td>{{x.product_category_name}} </td>
		<td>{{x.sale_num | number}} </td>
		<td>{{x.price | number:2}} </td>
		<td> {{x.price_discount | number:2}}</td>
		<td> {{x.sumprice | number:2}}</td>
	</tr>
</tbody>

</table>



 			</div>
 			<div class="modal-footer">
 			<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">ปิดหน้าต่าง</button>

 			</div>
 		</div>
 	</div>
 </div>







 <div class="modal fade" id="Openbillcloseday">
 	<div class="modal-dialog modal-sm">
 		<div class="modal-content">

 			<div class="modal-body">
 <form class="form-inline">
 <div class="form-group">
 </div>

 <!-- <div class="form-group">
 <button type="submit" ng-click="Openbillcloseday()" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
 </div> -->



 </form>
 		<div  id="section-to-print">
 <center>
 					<table style="table-layout: fixed;">
 	<tr>
 <td width="150px" align="center">
 	<img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" width="100px">
 </td>
 </tr>
 </table>
 		<b><span style="font-size: 18px;">	<?php echo $_SESSION['owner_name']; ?></span> </b>


 <?php if($_SESSION['owner_tax_number'] != ''){ ?>
 		<br />
 		 <?=$lang_tax?>:<?php echo $_SESSION['owner_tax_number']; ?>
 <?php } ?>


 	<br />

 <?php echo $_SESSION['owner_address']; ?>
 <br />
 <?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>

 <br />
 ________________
 <br />
 <?=$lang_billclostday?> กะที่ {{shift_id | number}}
 <br/>
 เริ่ม: {{shift_start_time}}
 <br />
 ถึง: {{shift_end_time}}
 <br />
..............................
<br />
เงินในลิ้นชักสุดท้าย {{shift_money_end | number:2}}
 <br /> เงินเริ่มต้น {{shift_money_start | number:2}}
 <br />= ส่วนต่าง {{shift_money_end-shift_money_start | number:2}}

 <br />

 <span ng-if="shiftclose_addwallet[0].money_add != null">
 ..............................
 <br />
 เพิ่มเงินเข้ากระเป๋า Wallet ({{shiftclose_addwallet[0].money_add | number}})
 <br />
 </span>
 ..............................

 </center>

 <table class="" style="width: 100%;"  ng-repeat="x in openbillclosedaylista">

 	<tbody>
 		<tr style="font-weight:bold;">
 			<td><i>{{x.product_category_name2}}</i></td>
 			<td>
 				{{x.product_sale_num2}}
 			</td>
 			<td align="right">{{x.product_price2 | number:2}}</td>
 		</tr>
 		<tr ng-repeat="y in openbillclosedaylist_product" ng-if="y.product_category_id2==x.product_category_id2">
 <td> <li>- {{y.product_name2}} </li></td>
 <td>{{y.product_sale_num2}}</td>
 <td align="right">{{y.product_price2 | number:2}}</td>
 		</tr>

 </tbody>
 </table>

 <center>..............................</center>
  <table class="" style="width: 100%;">

 	<tbody>

         <tr ng-repeat="x in openbillclosedaylistb">
 			<td><?=$lang_discount?></td>
 			<td align="right">{{x.discount_last2 | number:2}}</td>

 		</tr>
 	</tbody>
 </table>

 <center>..............................</center>
 <table class="" style="width: 100%;">

 	<tbody>
 		<tr ng-repeat="x in openbillclosedaylistc">
 			<td>
 			<span ng-if="x.pay_type=='1'"><?=$lang_cash?></span>
 			<span ng-if="x.pay_type=='3'"><?=$lang_creditcard?></span>
 			<span ng-if="x.pay_type=='5'"><?=$lang_qrpayment?></span>
 			<span ng-if="x.pay_type=='6'">กระเป๋าเงิน Wallet</span>
 		</td>

 			<td align="right">{{x.sumsale_price2-x.discount_last2 | number:2}}</td>
 		</tr>
      </tbody>
 </table>
 <center>..............................</center>
     <table class="" style="width: 100%;">
 	<tbody>
         <tr ng-repeat="x in openbillclosedaylistb">
 			<td><?=$lang_all?></td>
 			<td align="right">{{x.sumsale_price2-x.discount_last2 | number:2}}</td>
 		</tr>
 	</tbody>
 </table>

 <center>
 ________________
 		<br />
 <?=$lang_sales?>: <?php echo $_SESSION['name']; ?>
 <br />

 <?=$lang_day?><?=$lang_print?>: <?php echo date('d-m-Y H:i:s',time())?>

 <br />
 ________________
 </center>


 </div>

 			</div>
 			<div class="modal-footer">
 	<button type="button" class="btn btn-primary" ng-click="printDiv()"><?=$lang_print?></button>


 	<button type="button" class="btn btn-default" data-dismiss="modal"><?=$lang_close?></button>
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


	$scope.ParsefloatFunc = function(data){
return parseFloat(data);
};


$scope.printDiv = function(){
	window.scrollTo(0, 0);
	window.print();
};







$scope.Openbillcloseday = function(x){
$('#Openbillcloseday').modal('show');


$scope.shift_id = x.shift_id;
$scope.shift_start_time = x.shift_start_time;
$scope.shift_end_time = x.shift_end_time;
$scope.shift_money_start = x.shift_money_start;
$scope.shift_money_end = x.shift_money_end;






$http.post("Salereportshift/Openbillclosedaylist_product",{
shift_id: x.shift_id,
}).success(function(data){

	 $scope.openbillclosedaylist_product = data;

			});



	$http.post("Salereportshift/Openbillclosedaylista",{
	shift_id: x.shift_id,
	}).success(function(data){

     $scope.openbillclosedaylista = data;

        });

	$http.post("Salereportshift/Openbillclosedaylistb",{
	shift_id: x.shift_id,
	}).success(function(data){

     $scope.openbillclosedaylistb = data;

        });


	$http.post("Salereportshift/Openbillclosedaylistc",{
	shift_id: x.shift_id,
	}).success(function(data){

     $scope.openbillclosedaylistc = data;

        });



				$http.post("Salereportshift/Shiftclose_addwallet",{
				shift_id: x.shift_id,
				}).success(function(data){

					 $scope.shiftclose_addwallet = data;

							});




};




$scope.printDivfullsend = function(x){
$('#Openonesend').modal('show');

$scope.dataprintsend = x;

setTimeout(function(){
$scope.printDiv();
 }, 1000);

};

$scope.lung = '1';
$scope.Selectlung = function(x){
$scope.lung = x;
};




$scope.Productinshift = function(x){
$('#Productinshift').modal('show');

$scope.shift_this = x.shift_id;

$http.post("Salereportshift/getproductinshift",{
shift_id:x.shift_id
}).success(function(data){
$scope.listproduct = data;


		 });



};






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




$scope.perpage = '10';
$scope.getlist = function(searchtext,page,perpage){
   if(!searchtext){
   	searchtext = '';
   }


if(searchtext!=''){
   $scope.dayfrom = '';
   $scope.dayto='';
   }






    if(!page){
   var	page = '1';
   }

 if(!perpage){
   var	perpage = '10';
   }

   $http.post("Salereportshift/get",{
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





});
	</script>
