
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">



<div style="float: right;">
	<button class="btn btn-info" ng-click="Modalexcel()">
	<?=$lang_importproductexcel?></button>
</div>

<div class="form-group" style="float: left;">
<button class="btn btn-primary" ng-click="Modaladd()"><?=$lang_addproduct?></button>
</div>

<form class="form-inline">

<div class="form-group">
<input type="text" ng-model="searchtext" class="form-control" placeholder="
<?=$lang_search?> ชื่ออาหาร,หมวดหมู่" ng-change="getlist(searchtext,'1')">
</div>

<div class="form-group">
<select class="form-control" ng-model="category_name" ng-change="getlist(category_name,'1')">
<option value="">
	ทุกหมวดหมู่
</option>
	<option ng-repeat="x in categorylist" value="{{x.product_category_name}}">
		{{x.product_category_name}}
	</option>
</select>
</div>
<!-- <div class="form-group">
<button type="submit" ng-click="getlist('','1')" class="btn btn-default" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div> -->

</form>


<br />


<div style="float: right;">
	<input type="checkbox" ng-model="showdeletcbut"> <?=$lang_showdel?>
</div>
<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr style="background-color: #eee;">
			<th style="width: 50px;"><?=$lang_rank?></th>
			<!-- <th style="text-align: center;width: 10px;">Barcode</th>
			<th style="text-align: center;width: 100px;"><?=$lang_barcode?></th> -->

			<th style="text-align: center;width: 150px;"><?=$lang_picproduct?></th>
			<th style="text-align: center;width: 100px;"><?=$lang_productname?></th>
			<th style="text-align: center;width: 50px;">จำนวน</th>
			<th style="text-align: center;">เพิ่มจำนวน</th>
			<!-- <th style="text-align: center;">ออฟชั่นเสริม</th> -->
			<th style="text-align: center;width: 30px;">วัตถุดิบ/ส่วนประกอบ</th>
			<th style="text-align: center;width: 100px;"><?=$lang_category?></th>
			<!-- <th style="text-align: center;width: 100px;">Supplier</th> -->
			 <th style="text-align: center;width: 100px;"><?=$lang_costperunit?></th>
			<th style="text-align: center;width: 100px;"><?=$lang_priceperunit?></th>
			<!-- <th style="text-align: center;width: 100px;"><?=$lang_wholepriceperunit?></th> -->
			 <th style="text-align: center;width: 100px;"><?=$lang_score?></th>
			<!--<th style="text-align: center;width: 100px;"><?=$lang_wherestore?></th> -->
			<th style="width: 80px;"><?=$lang_manage?></th>
		</tr>
	</thead>
	<tbody>




		<tr ng-repeat="x in list">
		<td ng-if="selectpage=='1'" class="text-center">{{($index+1)}}</td>
			<td ng-if="selectpage!='1'" class="text-center">{{($index+1)+(perpage*(selectpage-1))}}</td>



<!-- <td  align="center">
<a href="<?php echo $base_url; ?>/warehouse/barcode?product_code={{x.product_code}}&product_name={{x.product_name}}&product_price={{x.product_price | number:2}}" class="btn btn-xs btn-default" target="_blank"><span class="glyphicon glyphicon-barcode" aria-hidden="true"></span></a>
</td>

<td  align="center">
	 {{x.product_code}}
	</td> -->



<td align="center">
<img ng-if="x.product_image!=''" ng-src="<?php echo $base_url;?>/{{x.product_image}}" width="70px" height="70px;">

			</td>

			<td>{{x.product_name}}
				<br />
								<button class="btn btn-info" ng-click="Updatepotmodal(x)" style="width: 120px;">
								+ออฟชั่นเสริม({{x.product_num_other | number}})
								</button>
			</td>

<td>

	<?php if($_SESSION['user_type']=='4'){?>
<button class="btn btn-warning" ng-click="Updatematmodal(x)" style="width: 120px;">
	({{x.product_stock_num | number}})
	 แก้ไข
</button>
<?php } ?>

<?php if($_SESSION['user_type']!='4'){?>

<b>
{{x.product_stock_num | number}}
</b>
<?php } ?>



</td>

<td>
<button class="btn btn-primary" ng-click="Additemmodal(x)">
	+
</button>
</td>



			<td>
				<button class="btn btn-default" ng-click="Materialmodal(x)">
				({{x.material_num}})	วัตถุดิบ
				</button>
			</td>

			<td>{{x.product_category_name}}</td>


<!-- <td>
{{x.supplier_name}}
</td> -->

			 <td align="right">{{x.product_pricebase | number:2}}</td>
			<td align="right">{{x.product_price | number:2}}</td>
			<!-- <td align="right">{{x.product_wholesale_price | number:2}}</td> -->
			 <td align="right">{{x.product_score | number}}</td>

		<!--	<td align="right">{{x.zone_name}}</td> -->

			<td>

				<button class="btn btn-xs btn-warning" ng-click="Editinputproduct(x)"><?=$lang_edit?></button>
				<button ng-show="showdeletcbut" class="btn btn-xs btn-danger" ng-click="Deleteproduct(x.product_id)"><?=$lang_delete?></button>
			</td>



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
<?=$lang_downloadexcel?> </button>






<div class="modal fade" id="updatepotmodal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">รายการ ออฟชั่นเสริมของ <br /> {{potdata.product_name}}</h4>
			</div>
			<div class="modal-body">

<input type="text" placeholder="ค้นหาสินค้าเสริม" class="form-control" ng-model="search_pot" ng-change="Searchpot(search_pot)">

<table class="table">
	<tr ng-repeat="x in getpotlist">
		<td><button ng-click="Addpot(x)" class="btn btn-xs btn-success" >เพิ่ม</button></td>

			<td>{{x.product_ot_name}}</td>
				<td>{{x.product_ot_price}}</td>
	</tr>
</table>
<hr />
รายการ ออฟชั่นเสริม

<table class="table">
	<tr ng-repeat="x in getproductpotlist">
			<td>{{x.product_ot_name}}</td>
				<td>{{x.product_ot_price}}</td>
				<td><button ng-click="Delpot(x)" class="btn btn-xs btn-danger" >ลบ</button></td>
	</tr>
</table>

</center>

			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>





<div class="modal fade" id="Openadd">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_addproduct?></h4>
			</div>
			<div class="modal-body">
				<form id="uploadImg"  enctype="multipart/form-data" method="POST">


<input type="hidden" name="product_code"  placeholder="รหัสสินค้า" class="form-control">
<p></p>
<?=$lang_picproduct?>
<input type="file" name="product_image" accept="image/*" class="form-control" value="">
<p></p>
<?=$lang_productname?>
<input type="text" name="product_name"  placeholder="ชื่อสินค้า" class="form-control" required="required">
<p></p>
<?=$lang_category?>
<select class="form-control" name="product_category_id" required="">

					<option ng-repeat="y in categorylist" value="{{y.product_category_id}}">
						{{y.product_category_name}}
					</option>
				</select>
<!-- <p></p>

Supplier
<select class="form-control" name="supplier_id" >
				<option value="0"><?=$lang_select?></option>
					<option ng-repeat="x in supplierlist" value="{{x.supplier_id}}">
						{{x.supplier_name}}
					</option>
				</select> -->

				<p></p>
				ต้นทุน
	<input type="text" name="product_pricebase"  placeholder="<?=$lang_cost?>" class="form-control text-right">

	<p></p>
	<?=$lang_saleprice?>
	<input type="text" name="product_price"  placeholder="<?=$lang_saleprice?>" class="form-control text-right">


	<input type="hidden" name="product_wholesale_price"  placeholder="<?=$lang_wholepriceperunit?>" class="form-control text-right">

 <p></p>
	<?=$lang_score?>
	<input type="text" name="product_score"  placeholder="<?=$lang_score?>" class="form-control text-right">

	<p></p>

<!-- Zone
<select class="form-control" name="zone_id" >
				<option value="0"><?=$lang_select?></option>
					<option ng-repeat="x in zonelist" value="{{x.zone_id}}">
						{{x.zone_name}}
					</option>
				</select>

	<p></p> -->



<button class="btn btn-success" type="submit"><?=$lang_save?></button>
</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>





<div class="modal fade" id="Openedit">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_edit?></h4>
			</div>
			<div class="modal-body">
				<form id="Updatedata"  enctype="multipart/form-data" method="POST">

<input type="hidden" name="product_id" id="product_id">

<input type="hidden" name="product_code" id="product_code" placeholder="<?=$lang_barcode?>" class="form-control">

<p></p>
<input type="hidden" name="product_image2" id="product_image2">
<center>
<img ng-if="product_image!=''" ng-src="<?php echo $base_url;?>/{{product_image}}" width="70px" height="70px;">
</center>
<?=$lang_picproduct?>
<input type="file" name="product_image" accept="image/*" class="form-control" value="">
<p></p>
<?=$lang_productname?>
<input type="text" name="product_name" id="product_name" placeholder="<?=$lang_productname?>" class="form-control" required="required">
<p></p>
<?=$lang_category?>
<select class="form-control" name="product_category_id" id="product_category_id">

					<option ng-repeat="y in categorylist" value="{{y.product_category_id}}">
						{{y.product_category_name}}
					</option>
				</select>
<!-- <p></p>

Supplier
<select class="form-control" name="supplier_id" id="supplier_id">
				<option value="0"><?=$lang_select?></option>
					<option ng-repeat="x in supplierlist" value="{{x.supplier_id}}">
						{{x.supplier_name}}
					</option>
				</select> -->


<p></p>
ต้นทุน
	<input type="text" name="product_pricebase" id="product_pricebase" placeholder="<?=$lang_cost?>" class="form-control text-right">



	<p></p>
	<?=$lang_saleprice?>
	<input type="text" name="product_price" id="product_price" placeholder="<?=$lang_saleprice?>" class="form-control text-right">


	<input type="hidden" name="product_wholesale_price" id="product_wholesale_price" placeholder="<?=$lang_wholepriceperunit?>" class="form-control text-right">

 <p></p>
	<?=$lang_score?>
	<input type="text" name="product_score" id="product_score" placeholder="<?=$lang_score?>" class="form-control text-right">
<!--
	<p></p>
	Zone
	<select class="form-control" name="zone_id" id="zone_id">
				<option value="0"><?=$lang_select?></option>
					<option ng-repeat="x in zonelist" value="{{x.zone_id}}">
						{{x.zone_name}}
					</option>
				</select> -->

	<p></p>



<button class="btn btn-success" type="submit"><?=$lang_save?></button>
</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>




<div class="modal fade" id="Modalexcel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_productlistfromexcel?></h4>
			</div>
			<div class="modal-body text-center">

<form enctype="multipart/form-data" id="formexcel">
<input type="file" accept=".csv" id="excel" name="excel" class="btn btn-default">
<br />
<button class="btn btn-success" id="submitexcel" type="submit"><?=$lang_upload?></button>
</form>

<hr />
<font color="red"><?=$lang_csvexsample?></font>
<br />
<img src="<?php echo $base_url;?>/pic/imcsv.png">
			</div>

		</div>
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
<h2>จำนวน</h2>
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






<div class="modal fade" id="additemmodal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">เพิ่มจำนวนของ {{matdata.product_name}}</h4>
			</div>
			<div class="modal-body">

				<center>
<h2>จำนวน</h2>
<input type="text" ng-model="product_stock_num" class="form-control" style="font-size: 25px;text-align: center;">
<br />
<button class="btn btn-success" ng-click="Additemok()">บันทึก</button>

</center>

			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>












<div class="modal fade" id="materialmodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">รายการวัตถุดิบของ {{productmatdata.product_name}} </h4>
			</div>
			<div class="modal-body">
<font color="red">(ตัดสต๊อก)</font>
<input type="text" ng-model="searchmattext" class="form-control" placeholder="ค้นหาวัตถุดิบ เช่น เนื้อหมู" ng-change="Getlistmat(searchmattext)">

<table class="table table-hover">
	<thead>
		<tr style="background-color: #eee;">

			<th>
				เพิ่ม
			</th>
			<th>
				ชื่อวัตถุดิบ
			</th>
			<th>
				จำนวน(หน่วย)
			</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in productformaterial">

			<td>
				<button class="btn btn-success btn-xs" ng-click="Addmaterial(x)">
					+ เพิ่ม
				</button>
			</td>
			<td>{{x.product_name}}</td>
			<td>
	<input type="text" ng-model="x.num" style="width: 100px;" class="form-control" >
</td>
		</tr>
	</tbody>
</table>


<hr />

<table class="table table-hover">
	<thead>
		<tr style="background-color: #eee;">


			<th>
				ชื่อวัตถุดิบ
			</th>

			<th>
				จำนวน(หน่วย)
			</th>
			<th>
				ลบ
			</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in materiallist">

			<td>{{x.product_name}}</td>
			<td>
	{{x.num}}
</td>
<td>
	<button ng-click="Deletematerial(x)" class="btn btn-default">ลบ</button>
</td>
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

$scope.product_category_id = '0';
$scope.supplier_id = '0';
$scope.zone_id = '0';
$scope.productlist = [];
$scope.category_name = '';
$scope.searchtext = '';

$scope.Modalexcel = function(){
$('#Modalexcel').modal('show');
};

$scope.Modaladd = function(){
$('#Openadd').modal('show');
};



$scope.getcategory = function(){

$http.get('Productcategory/get')
       .then(function(response){
          $scope.categorylist = response.data.list;

        });
   };
$scope.getcategory();


$scope.getsupplier = function(){

$http.get('Supplier/getlist')
       .then(function(response){
          $scope.supplierlist = response.data.list;

        });
   };
$scope.getsupplier();






$scope.perpage = '10';
$scope.getlist = function(searchtext,page,perpage){

	$scope.searchtext =	searchtext;


    if(!page){
   var	page = '1';
   }

 if(!perpage){
   var	perpage = '10';
   }

 $http.post("Productlist/get",{
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





$scope.Saveproduct = function(product_code,product_name,product_price,product_pricebase,product_category_id,supplier_id,product_score){
$http.post("Productlist/Add",{
	product_code: product_code,
	product_name: product_name,
	product_price: product_price,
	product_pricebase: product_pricebase,
	product_category_id: product_category_id,
	product_score: product_score,
	supplier_id: supplier_id
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.product_code = '';
$scope.product_name = '';
$scope.product_pricebase = '';
$scope.product_price = '';
$scope.product_score = '';
$scope.getlist();
        });
};



$(document).ready(function (e) {
    $('#uploadImg').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: 'Productlist/Add',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
$( "#uploadImg" )[0].reset();
$('#Openadd').modal('hide');
$scope.getlist('','1');


            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    }));


});



$scope.Editinputproduct = function(x){
	$('#Openedit').modal('show');
$("#product_id").val(x.product_id);
$("#product_code").val(x.product_code);
$("#product_name").val(x.product_name);
$("#product_image2").val(x.product_image);
$("#product_price").val(x.product_price);
$("#product_wholesale_price").val(x.product_wholesale_price);
$("#product_pricebase").val(x.product_pricebase);
$("#product_category_id").val(x.product_category_id);
$("#product_score").val(x.product_score);
$("#zone_id").val(x.zone_id);
$("#supplier_id").val(x.supplier_id);

$scope.product_image = x.product_image;

};

$scope.Cancelproduct = function(product_id){
$scope.product_id = '';
$scope.getlist();
};





$(document).ready(function (e) {
    $('#Updatedata').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: 'Productlist/Update',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
$( "#Updatedata" )[0].reset();
$scope.getlist($scope.searchtext,$scope.selectthispage,$scope.perpage);
$('#Openedit').modal('hide');
            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    }));

});





$scope.Deleteproduct = function(product_id){
$http.post("Productlist/Delete",{
	product_id: product_id
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.getlist($scope.searchtext,$scope.selectthispage,$scope.perpage);
        });
};






    $("form#formexcel").submit(function () {
var formData = new FormData($(this)[0]);
        $.ajax({
            type: "POST",
            url: "Productlist/uploadexcel",
            data:formData,
            processData: false,
   		 	contentType: false,
            success: function () {
               toastr.success('<?=$lang_success?>');
               $('#Modalexcel').modal('hide');
               $scope.getlist('','1');
            }
        });
    });


$scope.Getproductmaterial = function(product_id){
 $http.post("Productlist/Getproductmaterial",{
product_id:product_id
}).success(function(data){
          $scope.materiallist = data;

});
   };



$scope.Materialmodal = function(x){
$('#materialmodal').modal('show');
$scope.productmatdata = x;
$scope.Getproductmaterial(x.product_id);
   };

$scope.Getlistmat = function(searchmattext){

 $http.post("Productlist/Getproduct",{
searchmattext:searchmattext
}).success(function(data){
          $scope.productformaterial = data;

});


   };



$scope.Addmaterial = function(x){

 $http.post("Productlist/Addmaterial",{
product_id:$scope.productmatdata.product_id,
product_id_material:x.product_id,
num:x.num
}).success(function(data){

$scope.Getproductmaterial($scope.productmatdata.product_id);
});


   };



   $scope.Deletematerial = function(x){

 $http.post("Productlist/Deletematerial",{
m_id:x.m_id
}).success(function(data){

$scope.Getproductmaterial($scope.productmatdata.product_id);
});


   };








$scope.Updatematmodal = function(x){
$('#updatematmodal').modal('show');
$scope.matdata = x;
}



$scope.Updatematok = function(){
$http.post("Stockmat/Updatematok",{
product_id: $scope.matdata.product_id,
product_stock_num: $scope.matdata.product_stock_num
}).success(function(data){
	toastr.success('<?=$lang_success?>');
	$scope.getlist($scope.searchtext,$scope.selectthispage,$scope.perpage);
	$('#updatematmodal').modal('hide');
});


}





$scope.Additemmodal = function(x){
$('#additemmodal').modal('show');
$scope.itemdata = x;
$scope.product_stock_num = '0';
}



$scope.Additemok = function(){
$http.post("Stockmat/Additemok",{
product_id: $scope.itemdata.product_id,
product_stock_num: $scope.product_stock_num
}).success(function(data){
	toastr.success('<?=$lang_success?>');
	$scope.getlist($scope.searchtext,$scope.selectthispage,$scope.perpage);
	$('#additemmodal').modal('hide');
});


}










$scope.Updatepotmodal = function(x){
$('#updatepotmodal').modal('show');
$scope.potdata = x;
$http.post("Productlist/getpotlist",{
product_id: x.product_id
}).success(function(data){

$scope.getproductpotlist = data;

});

}



$scope.Addpot = function(x){
$http.post("Productlist/addpot",{
product_id: $scope.potdata.product_id,
pot_ID: x.pot_ID
}).success(function(data){


	$http.post("Productlist/getpotlist",{
	product_id: $scope.potdata.product_id
	}).success(function(data){

	$scope.getproductpotlist = data;

	});



});

}



$scope.Delpot = function(x){
$http.post("Productlist/delpot",{
product_id: $scope.potdata.product_id,
pot_ID: x.pot_ID
}).success(function(data){


	$http.post("Productlist/getpotlist",{
	product_id: $scope.potdata.product_id
	}).success(function(data){

	$scope.getproductpotlist = data;

	});


});

}






$scope.Searchpot = function(s){
$http.post("Productlist/searchpot",{
searchtext: s
}).success(function(data){
$scope.getpotlist = data;
});

}







});
	</script>
