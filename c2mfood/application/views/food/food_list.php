
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">
	
<div class="panel panel-default">
	<div class="panel-body">



<!-- <div style="float: right;">
	<button class="btn btn-info" ng-click="Modalexcel()"> นำเข้ารายชื่อสินค้าจาก Excel</button>
</div> -->


<form class="form-inline">
<div class="form-group">
<button class="btn btn-primary" ng-click="Modaladd()">
+ <?=$lang_foodaddnew?></button>
</div>
<div class="form-group">
<input type="text" ng-model="searchtext" class="form-control" placeholder="<?=$lang_foodsearchname?>" style="width: 300px;">
</div>
<div class="form-group">
<button type="submit" ng-click="getlist(searchtext,'1')" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>
<div class="form-group">
<button type="submit" ng-click="getlist('','1')" class="btn btn-default" placeholder="" title="reflesh"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div>

</form>


<br />


<div style="float: right;">
	<input type="checkbox" ng-model="showdeletcbut"> <?=$lang_showdel?>
</div>
<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr style="background-color: #eee;">
			<th style="width: 50px;">ลำดับ</th>
			<th style="text-align: center;width: 150px;">
			<?=$lang_foodimage?></th>
			<th style="text-align: center;width: 100px;">
			<?=$lang_foodname?></th>
			<th style="text-align: center;width: 100px;">
<?=$lang_type?>
			</th>
			
			<th style="text-align: center;width: 100px;">
<?=$lang_price?>
			</th>
			<th style="text-align: center;width: 100px;">
<?=$lang_status?>
			</th>
			<th style="width: 80px;">
<?=$lang_manage?>
			</th>
		</tr>
	</thead>
	<tbody>
	


		<tr ng-repeat="x in list">
		<td ng-show="selectpage=='1'" class="text-center">{{($index+1)}}</td>
			<td ng-show="selectpage!='1'" class="text-center">{{($index+1)+(perpage*(selectpage-1))}}</td>
		

			


<td align="center">
<img ng-if="x.food_image!=''" ng-src="<?php echo $base_url;?>/{{x.food_image}}" width="70px" height="70px;">

			</td>

			<td>{{x.food_name}}

			</td>
			
			<td>{{x.food_category_name}}</td>

			<td align="right">{{x.food_price | number:2}}</td>

			<td>
			<span ng-if="x.food_status=='0'" style="color: green;font-weight: bold;">
				<?=$lang_saleready?>
			</span>

<span ng-if="x.food_status=='1'" style="color: red;font-weight: bold;">
<?=$lang_foodoutstock?>
</span>

			</td>


			<td>

				<button class="btn btn-xs btn-warning" ng-click="Editinputproduct(x)">
<?=$lang_edit?>
				</button>
				<button ng-show="showdeletcbut" class="btn btn-xs btn-danger" ng-click="Deleteproduct(x.food_id)">
<?=$lang_delete?>
				</button>
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





<div class="modal fade" id="Openadd">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_foodaddnew?></h4>
			</div>
			<div class="modal-body">
				<form id="uploadImg"  enctype="multipart/form-data" method="POST">


<?=$lang_foodimage?>
<input type="file" name="food_image" accept="image/*" class="form-control" value="">
<p></p>
<?=$lang_foodname?>
<input type="text" name="food_name"  placeholder="<?=$lang_foodname?>" class="form-control">
<p></p>
<?=$lang_type?>
<select class="form-control" name="food_category_id" >
<option value="0"><?=$lang_selecttype?></option>
					<option ng-repeat="y in categorylist" value="{{y.food_category_id}}">
						{{y.food_category_name}}
					</option>
				</select>

	<p></p>
	<?=$lang_price?>
	<input type="text" name="food_price"  placeholder="<?=$lang_price?>" class="form-control text-right">

	<p></p>

<?=$lang_status?>
	<select class="form-control" name="food_status">

					<option value="0"><?=$lang_saleready?></option>
					<option value="1"><?=$lang_foodoutstock?></option>
				</select>
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





<div class="modal fade" id="Openedit">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_edit?></h4>
			</div>
			<div class="modal-body">
				<form id="Updatedata"  enctype="multipart/form-data" method="POST">
<input type="hidden" name="food_id" id="food_id">
<input type="hidden" name="food_image2" id="food_image2">
<center>
<img ng-if="food_image!=''" ng-src="<?php echo $base_url;?>/{{food_image}}" width="70px" height="70px;">
</center>
<?=$lang_foodimage?>
<input type="file" name="food_image" accept="image/*" class="form-control" value="">
<p></p>
<?=$lang_foodname?>
<input type="text" name="food_name" id="food_name" placeholder="<?=$lang_foodname?>" class="form-control">
<p></p>
<?=$lang_type?>
<select class="form-control" name="food_category_id" id="food_category_id">

					<option ng-repeat="y in categorylist" value="{{y.food_category_id}}">
						{{y.food_category_name}}
					</option>
				</select>
<p></p>
	<?=$lang_price?>
	<input type="text" name="food_price" id="food_price" placeholder="<?=$lang_price?>" class="form-control text-right">


	<p></p>

<?=$lang_status?>
	<select class="form-control" name="food_status" id="food_status">

					<option value="0"><?=$lang_saleready?></option>
					<option value="1"><?=$lang_foodoutstock?></option>
				</select>
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












	</div>


	</div>

	</div>


	<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.food_category_id = '0';
$scope.productlist = [];

$scope.Modalexcel = function(){
$('#Modalexcel').modal('show');
};

$scope.Modaladd = function(){
$('#Openadd').modal('show');
};



$scope.getcategory = function(){
   
$http.get('Food_category/get')
       .then(function(response){
          $scope.categorylist = response.data.list; 
                 
        });
   };
$scope.getcategory();



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

 $http.post("Food_list/get",{
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
$scope.searchtext = '';
        });
   };
$scope.getlist('','1');






$(document).ready(function (e) {
    $('#uploadImg').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: 'Food_list/Add',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){ 
$( "#uploadImg" )[0].reset();
$('#Openadd').modal('hide');
$scope.getlist();


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
$("#food_id").val(x.food_id);
$("#food_name").val(x.food_name);
$("#food_image2").val(x.food_image);
$("#food_price").val(x.food_price);
$("#food_category_id").val(x.food_category_id);
$("#food_status").val(x.food_status);

$scope.food_image = x.food_image;

};

$scope.Cancelproduct = function(food_id){
$scope.food_id = '';
$scope.getlist();
};




$(document).ready(function (e) {
    $('#Updatedata').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: 'Food_list/Update',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){ 
$( "#Updatedata" )[0].reset();
$scope.getlist('',$scope.selectthispage,$scope.perpage);
$('#Openedit').modal('hide');
            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    }));

});





$scope.Deleteproduct = function(food_id){
$http.post("Food_list/Delete",{
	food_id: food_id
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.getlist();
        });	
};

   


   
	
    $("form#formexcel").submit(function () {
var formData = new FormData($(this)[0]);
        $.ajax({
            type: "POST",
            url: "Food_list/uploadexcel",
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






});
	</script>
