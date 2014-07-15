@extends('layouts.master')
@section('page-title')
Create an Auction
@stop
@section('css')
<link href="/css/bootstrap-combobox.css" media="screen" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/css/bootstrap-wysihtml5.css" />
@stop
@section('script')
<script src="/js/bootstrap-combobox.js" type="text/javascript"></script>
<script type="text/javascript">
	$('.stat_label').tooltip();
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.combobox').combobox();
  });
</script>
<script src="/js/wysihtml5-0.3.0.min.js" type="text/javascript"></script>
<script src="/js/bootstrap3-wysihtml5.js" type="text/javascript"></script>
<script type="text/javascript">
    $('#description-area').wysihtml5();

    function processForm(e) {
    	var textarea = document.getElementById('description-area');
    	textarea.value = $('#description-area').val();
    return true;
}

var form = document.getElementById('auction-form');
if (form.attachEvent) {
    form.attachEvent("submit", processForm);
} else {
    form.addEventListener("submit", processForm);
}
</script>
@stop
@section('content')
<div class="page-header">
	<h1>Sell your {{{ $item_name }}}</h1>
</div>
<div class="col-md-4">
	<div class="panel panel-info">
		<div class="panel-heading">
			{{{ $item_name or 'Not a valid item'}}}
		</div>
		<div class="panel-body">
			<div class="media">
				<img class="media-object pull-left" src="{{{ $item_imgurl }}}">
				<div class="media-body">
					<small><i>{{ $item_description or 'No description'}}</small></i> </br>
					@if(isset($item_stats))
					<small>{{$item_stats}}</small><br>
					@endif
					@if(isset($item_notes))
					<br>
					<div class="itemnotes">
						<small>{{ $item_notes }}</small>
					</div>
					@endif
					@if(isset($item_wiki_link)) 
					<br/>
					<div class="pull-right">
						<a href="{{{ $item_wiki_link }}}" class="label label-primary">View Wiki Page</a>	
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-warning">
		<div class="panel-heading">
			Auction Guidelines
		</div>
		<div class="panel-body">
			Based on the item, base stats are pre-entered and stats are added based on possible upgrade paths. Enter in the stats for the item you're trying to sell.
			<br/><br/>
			Please enter accurate information and please remember to follow the <a href="">rules</a>.
		</div>
	</div>
</div>
<div class="col-md-8">
	@if ($errors->count() > 0)
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all('<li>:message</li>') as $err)
			@if ($err == "<li>The confirmpassword and password must match.</li>")
			<li>Password Confirmation does not match.</li>
			@else 
			{{ $err }}
			@endif
			@endforeach
		</ul>
	</div>
	@endif
	<form class="form" id="auction-form" action="{{ URL::route('createauction-post', $item_id) }}" method="post">
		<div class="panel panel-success">
			<div class="panel-heading">
				Auction Details
			</div>
			<div class="panel-body">
				<div class="form-group col-md-12">
					<div class="col-md-4 col-sm-4">
						Server?<br>
						<select class="form-control" name="server">
							<option value="1">Alexina</option>
							<option value="2">Tarlach</option>
							<option value="3">Ruari</option>
							<option value="4">Mari</option>
						</select>
					</div>
					<div class="col-md-4 col-sm-4">
						Duration?<br>
						<select class="form-control" name="duration">
							<option value="1">1 day</option>
							<option value="2">2 days</option>
							<option value="3">3 days</option>
							<option value="4">4 days</option>
							<option value="5">5 days</option>
							<option value="10">10 days</option>
						</select>
					</div>
					<div class="col-md-4 col-sm-4">
						Quantity?<br>
						@if (isset($simple)) 
						<input class="form-control" type="number" {{ Input::old('quantity') ? ' value="' . Input::old('quantity')  . '"' : ''}} required id="itemQuantity" name="quantity" maxlength="5">
						@else
						<input class="form-control" type="number" value="1" disabled name="quantity" maxlength="5">
						@endif
					</div>
					<br><br>
				</div>
				<div class="col-md-12">
					<br>
				</div>
				<div class="form-group col-md-12">
					<div class="col-md-4">
						@if (isset($simple))
						Starting Price (for all)
						@else
						Starting Price
						@endif
						<div class="input-group">
							<input class="form-control" type="number" {{ Input::old('price') ? ' value="' . Input::old('price')  . '"' : 'value="1000"'}} class="form-control" name="price">
							<span class="input-group-addon"><img src="/images/gold.gif" width="16" height="16"></span>
						</div>
					</div>
					<div class="col-md-4">
						Minimum price
						<div class="input-group">
							<input class="form-control" type="integer" {{ Input::old('minprice') ? ' value="' . Input::old('minprice')  . '"' : ''}}placeholder="Optional" class="form-control" name="minprice">
							<span class="input-group-addon"><img src="/images/gold.gif" width="16" height="16"></span>
						</div>
					</div>
					<div class="col-md-4">
						Auto-win
						<div class="input-group">
							<input class="form-control" type="integer" placeholder="Optional" {{ Input::old('autowin') ? ' value="' . Input::old('autowin')  . '"' : ''}} class="form-control" name="autowin">
							<span class="input-group-addon"><img src="/images/gold.gif" width="16" height="16"></span>
						</div>
					</div>
					<div class="col-md-4">
						<br>
						Sniper Protection
						<input type="checkbox" name="sniperprotect">
					</div>
				</div>
			</div>
			<div class="panel-heading">
				Description
			</div>
			<div class="panel-body">
				<p>Give a description of what you're selling. Maybe what it looks like, etc. Please insert reforge and enchant data below. Please insert a screenshot of the item in your inventory (hover over it). You can use Mabi's screenshot functionality and crop using paint, then upload somewhere like imgur. Or if you prefer, you can use Puush or Gyazo. </p>
				<p>This will make it easier to show what you're trying to sell :)</p>
				<textarea name="description" id="description-area" class="form-control" rows="12">{{ Input::old('description') ? Input::old('description')  : ''}}</textarea>
			</div>
		</div>
		@if(isset($base_item->enchantable))
		<div class="panel panel-info">
			<div class="panel-heading">
				Enchants
			</div>
			<div class="panel-body">
				<div class="col-md-6 col-sm-6">
					Prefix<br/>
					<select class="combobox form-control" data-placeholder="None" name="prefix">
						<option value="-1"></option>
						@foreach ($prefix_enchants as $enchant)
						<option value="{{{ $enchant->id }}}">{{{ $enchant->getListText() }}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-md-6 col-sm-6">
					Suffix<br>
					<select class="combobox form-control" name="suffix" data-placeholder="None">
						<option value="-1"></option>
						@foreach ($suffix_enchants as $enchant)
						<option value="{{{ $enchant->id }}}">{{{ $enchant->getListText() }}}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
		@endif
		@if(isset($base_item->reforgable))
		<div class="panel panel-default">
			<div class="panel-heading">
				Reforges
			</div>
			<div class="panel-body">
				<div class="col-md-4 col-sm-4">
					Reforge Rank
					<select class="form-control center-y" name="reforgerank">
						<option value="3" selected="selected">Rank 3</option>
						<option value="2">Rank 2</option>
						<option value="1">Rank 1</option>
					</select>
				</div>
				<div class="col-md-8 col-sm-8">
					Reforge Line 1
					<select class="combobox form-control" data-placeholder="None" name="reforge-1">
						<option value="-1"></option>
						@foreach ($reforges as $reforge)
						<option value="{{{ $reforge->id }}}">{{{ $reforge->getName() }}}</option>
						@endforeach
					</select>
					<div class="input-group">

						<span class="input-group-addon stat_label" title="The reforge on the first line">Reforge Level</span>
						<input type="number" placeholder="None" name="reforge-1-level"class="form-control">
						<br>
					</div>
					<br>
					Reforge Line 2
					<select class="combobox form-control" data-placeholder="None" name="reforge-2">
						<option value="-1"></option>
						@foreach ($reforges as $reforge)
						<option value="{{{ $reforge->id }}}">{{{ $reforge->getName() }}}</option>
						@endforeach
					</select>
					<div class="input-group">
						<span class="input-group-addon stat_label" title="The reforge on the second line">Reforge Level</span>
						<input type="number" placeholder="None" name="reforge-2-level" class="form-control">
					</div>
					<br>
					Reforge Line 3
					<select class="combobox form-control" data-placeholder="None" name="reforge-3">
						<option value="-1"></option>
						@foreach ($reforges as $reforge)
						<option value="{{{ $reforge->id }}}">{{{ $reforge->getName() }}}</option>
						@endforeach
					</select>
					<div class="input-group">
						<span class="input-group-addon stat_label" title="The reforge on the third line">Reforge Level</span>
						<input type="number" placeholder="None" name="reforge-3-level" class="form-control">
					</div>
				</div>
			</div>
		</div>
		@endif
		@if(isset($base_item->specialupgradable))
		<div class="panel panel-primary">
			<div class="panel-heading">
				Special Upgrade
			</div>
			<div class="panel-body">
				<div class="col-md-4 col-sm-4">
					<div class="input-group">
						<span class="input-group-addon stat_label" title="Type either S or R, then the level. Leave it blank if not special upgraded">Special Upg.</span>
						<input type="text" value="" placeholder="e.g. S6" class="form-control" name="specialup">
					</div>
					<br>
				</div>
			</div>
		</div>
		@endif
	</div>
	<div class="form-group pull-right">
		<button type="submit" class="btn btn-success">List It</button>
	</div>
	{{ Form::token() }}
</form>
</div>
@stop
