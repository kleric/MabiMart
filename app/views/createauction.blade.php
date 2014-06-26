@extends('layouts.master')
@section('page-title')
Create an Auction
@stop
@section('script')
<script type="text/javascript">
	$('.stat_label').tooltip();
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
			<div class="pull-right">
				@if(isset($item_wiki_link)) 
				<a href="{{{ $item_wiki_link }}}" class="label label-primary">View Wiki</a>
				@endif
			</div>
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
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-warning">
		<div class="panel-heading">
			Auction Guidelines
		</div>
		<div class="panel-body">
			The stats for the base items are pre-entered. Replace them with the stats of the item you are trying to sell. </br>
		</br>
		We also won't send you lame newsletters. Cause that'd be lame.
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
	<form class="form-inline" action="{{ URL::route('createauction-post', $item_id) }}" method="post">
		<div class="panel panel-success">
			<div class="panel-heading">
				Auction Details
			</div>
			<div class="panel-body">
				<div class="form-group col-md-12">
					<div class="col-md-4 col-sm-4">
						Server?<br>
						<select class="form-control" name="inputDuration">
							<option value="1">Alexina</option>
							<option value="2">Tarlach</option>
							<option value="3">Ruari</option>
							<option value="4">Mari</option>
						</select>
					</div>
					<div class="col-md-4 col-sm-4">
						Duration?<br>
						<select class="form-control" name="inputDuration">
							<option value="1">1 day</option>
							<option value="2">2 days</option>
							<option value="3">3 days</option>
							<option value="4">4 days</option>
							<option value="5">5 days</option>
						</select>
					</div>
					<div class="col-md-4 col-sm-4">
						Quantity?<br>
						@if (isset($simple)) 
						<input class="form-control" type="number" {{ Input::old('quantity') ? ' value="' . Input::old('quantity')  . '"' : ''}} required class="form-control" id="itemQuantity" name="quantity" maxlength="5">
						@else
						<input class="form-control" type="number" value="1" disabled class="form-control" id="itemQuantity" name="quantity">
						@endif
					</div>
					<br><br>
				</div>
				<div class="col-md-12">
					<br>
				</div>
				<div class="form-group col-md-12">
					<div class="col-md-6">
						@if (isset($simple))
						Startinf Price (for all)
						@else
						Starting Price
						@endif
						<div class="input-group">
							<input class="form-control" type="number" value="1000" class="form-control" name="price">
							<span class="input-group-addon"><img src="/images/gold.gif" width="16" height="16"></span>
						</div>
					</div>
					<div class="col-md-6">
						Auto-win
						<div class="input-group">
							<input class="form-control" type="number" placeholder="Optional" class="form-control" name="autowin">
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
		</div>
		@if(isset($enchantable))
		<div class="panel panel-info">
			<div class="panel-heading">
				Enchants
			</div>
			<div class="panel-body">
				<div class="col-md-6 col-sm-6">
					<div class="input-group">
						<span class="input-group-addon stat_label" title="Prefix Enchant">Prefix</span>
						<input type="text" value="None" disabled class="form-control">
						<span class="input-group-btn">
							<button class="btn btn-default stat_label" title="Edit" type="button"><i class="fa fa-pencil"></i></span>
							</button>
						</div>
						<br>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Suffix Enchant">Suffix</span>
							<input type="text" value="None" name="prefix" disabled class="form-control">
							<span class="input-group-btn">
								<button class="btn btn-default stat_label" title="Edit" type="button"><i class="fa fa-pencil"></i></span>
								</button>
							</div>
							<br>
						</div>
					</div>
				</div>
				@endif
				@if(isset($reforgable))
				<div class="panel panel-default">
					<div class="panel-heading">
						Reforges
					</div>
					<div class="panel-body">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="The reforge on the first line">Reforge 1</span>
							<input type="text" value="None" name="reforge-1" disabled class="form-control">
							<span class="input-group-btn">
								<button class="btn btn-default stat_label" title="Edit" type="button"><i class="fa fa-pencil"></i></span>
								</button>
							</div>
							<br>
							<div class="input-group">
								<span class="input-group-addon stat_label" title="The reforge on the second line">Reforge 2</span>
								<input type="text" value="None" name="reforge-3" disabled class="form-control">
								<span class="input-group-btn">
									<button class="btn btn-default stat_label" title="Edit" type="button"><i class="fa fa-pencil"></i></span>
									</button>
								</div>
								<br>
								<div class="input-group">
									<span class="input-group-addon stat_label" title="The reforge on the third line">Reforge 3</span>
									<input type="text" value="None" name="reforge-3" disabled class="form-control">
									<span class="input-group-btn">
										<button class="btn btn-default stat_label" title="Edit" type="button"><i class="fa fa-pencil"></i></span>
										</button>
										<br>
									</div>
								</div>
							</div>
							@endif
							@if (!isset($simple))
							<div class="panel panel-warning">
								<div class="panel-heading">
									Item Stats
								</div>
								<div class="panel-body">
									<div class="form-group">
										@if (isset($weaponrange))
										<div class="col-md-6 col-sm-6">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="The Damage Range">Attack</span>
												<input type="text" value="{{{ $weaponrange }}}" class="form-control">
											</div>
											<br>
										</div>

										@endif

										@if (isset($injuryrate))
										<div class="col-md-6 col-sm-6">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="The Injury Rate">Injury</span>
												<input type="text" value="{{{ $injuryrate }}}" class="form-control">
												<span class="input-group-addon">%</span>
											</div>
											<br>
										</div>
										@endif

										@if (isset($critical))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Critical of the Item">Critical</span>
												<input type="number" value="{{{ $critical }}}" class="form-control">
												<span class="input-group-addon">%</span>
											</div>
											<br>
										</div>
										@endif

										@if (isset($balance))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Balance of the Item">Balance</span>
												<input type="number" value="{{{ $balance }}}" class="form-control">
												<span class="input-group-addon">%</span>
											</div>
											<br>
										</div>
										@endif

										@if (isset($proficiency))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Proficiency">Prof.</span>
												<input type="text" value="0.0" class="form-control">
												<span class="input-group-addon">%</span>
											</div>
											<br>
										</div>
										@endif

										@if (isset($mattack))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Magic Attack">M.Attack.</span>
												<input type="number" value="{{{ $mattack }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($defense))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Defense">Def.</span>
												<input type="number" value="{{{ $defense}}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($protection))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Protection">Prot.</span>
												<input type="number" value="{{{ $protection }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($mdefense))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Magic Defense">M.Def.</span>
												<input type="number" value="{{{ $mdefense}}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($mprotection))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Magic Protection">M.Prot.</span>
												<input type="number" value="{{{ $mprotection }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($maxdurability))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Top is current Durability, Bottom is Max Durability">Durability</span>
												<input type="number" value="{{{$maxdurability }}}" placeholder="Dura." class="form-control">
												<input class="form-control" type="number" value="{{{$maxdurability}}}" placeholder="Max Dura." type="text">
											</div>
											<br>
										</div>
										@endif

										@if (isset($luck))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Luck Stat">Luck</span>
												<input type="number" value="{{{ $luck }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($dex))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Dexterity Stat">Dex</span>
												<input type="number" value="{{{ $dex }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif
										@if (isset($int))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Intelligence Stat">Int</span>
												<input type="number" value="{{{ $int }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($str))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Strength Stat">Str</span>
												<input type="number" value="{{{ $str }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($will))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Will Stat">Will</span>
												<input type="number" value="{{{ $will }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($hp))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Hit Points">HP</span>
												<input type="number" value="{{{ $hp }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($mp))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Mana Points">MP</span>
												<input type="number" value="{{{ $mp }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($sp))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Stamina Points">SP</span>
												<input type="number" value="{{{ $sp }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($pierce))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Armor Pierce">Pierce</span>
												<input type="number" value="{{{ $pierce }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($setexplosion))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Explosion Resistance">Exp. Def</span>
												<input type="number" value="{{{ $setexplosion }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($setstomp))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Stomp Resistance">Stmp. def.</span>
												<input type="number" value="{{{ $setstomp }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($setpoison))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Poison Resistance">Psn. Res.</span>
												<input type="number" value="{{{ $setpoison }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($setmpred))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Mana Usage Reduction">MP Red.</span>
												<input type="number" value="{{{ $setmpred }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($setspred))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Stamina Usage Reduction">SP Red.</span>
												<input type="number" value="{{{ $setspred }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($setattackspeed))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Attack Speed Enhancement">Attk. Sp.</span>
												<input type="number" value="{{{ $setattackspeed }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($setpetrification))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Petrification Resistance">Pet. Res.</span>
												<input type="number" value="{{{ $setpetrification }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($setflameburst))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Flame Burst Enhancement">Flame Burst</span>
												<input type="number" value="{{{ $setflameburst }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($setwatercannon))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Water Cannon Enhancmenet">Water Cannon</span>
												<input type="number" value="{{{ $setwatercannon }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($setdrain))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Life Drain Enhancement">Life Drain.</span>
												<input type="number" value="{{{ $setdrain }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($setcharge))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Charge Enhancement">Charge.</span>
												<input type="number" value="{{{ $setcharge }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($setfirebolt))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Firebolt Enhancement">Firebolt</span>
												<input type="number" value="{{{ $setfirebolt }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($seticebolt))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Icebolt Enhancement">Icebolt</span>
												<input type="number" value="{{{ $seticebolt }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($setmagnum))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Magnum Shot Enhancement">Magnum</span>
												<input type="number" value="{{{ $setmagnum }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($setsupportshot))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Support Shot Enhancement">Sup. Shot</span>
												<input type="number" value="{{{ $setsupportshot }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($setquestexp))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Quest Experience Boost">Quest Exp.</span>
												<input type="number" value="{{{ $setquestexp }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($setfishing))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Fishing Enhancement">Fishing</span>
												<input type="number" value="{{{ $setfishing }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($settransformation))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Transformation Collection Enhancement">Trans.</span>
												<input type="number" value="{{{ $settransformation }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($setblacksmith))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Blacksmithing Enhancement">Blacksmith</span>
												<input type="number" value="{{{ $setblacksmith }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($setrefine))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Refining Enhancement">Refine</span>
												<input type="number" value="{{{ $setrefine }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($setsmash))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Smash Enhancement">Smash</span>
												<input type="number" value="{{{ $setsmash }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($setassaultslash))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Assault Slash Enhancement">Assault.</span>
												<input type="number" value="{{{ $setassaultslash }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

										@if (isset($setdemigod))
										<div class="col-md-4 col-sm-4">
											<div class="input-group">
												<span class="input-group-addon stat_label" title="Demigod Enhancement">Demi.</span>
												<input type="number" value="{{{ $setdemigod }}}" class="form-control">
											</div>
											<br>
										</div>
										@endif

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
