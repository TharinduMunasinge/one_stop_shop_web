

    
{{Form::open(array('url'=>'','class'=>'form-inline'))}}


<div style="float:right;margin:10px" class="control-group">
		{{Form::label('keyword','Keyword :',array('class'=>'control-label'))}}

	<div class="controls">
			{{Form::text('keyword','', array(
		'class'=>"input-medium search-query",
			'list'=>'browsers','onkeyup'=>'search()','id'=>'keyword'))}}
	</div>
</div>

<div style="float:right;margin:10px" class="control-group">
	
	{{Form::label('Field','Field :',array('class'=>'control-label'))}}

	<div class="controls">
	{{Form::select('field',array('BrandName'=>'Brand Name','ItemTypeName'=>'Item Type','BuyingPrice'=>'Buying Price','SizeDesc'=>'size'),'ItemTypeName',array('id'=>'field'))}}
</div>
</div>

{{Form::close()}}



	





	



 

@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

	<div class='container' id="itemTable">
	@include('Layout.Helper.itemTable')
	</div>