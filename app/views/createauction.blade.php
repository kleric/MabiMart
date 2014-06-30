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
	<form class="form" action="{{ URL::route('createauction-post', $item_id) }}" method="post">
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
							<input class="form-control" type="number" value="1000" class="form-control" name="price">
							<span class="input-group-addon"><img src="/images/gold.gif" width="16" height="16"></span>
						</div>
					</div>
					<div class="col-md-4">
						Minimum price
						<div class="input-group">
							<input class="form-control" type="number" placeholder="Optional" class="form-control" name="minprice">
							<span class="input-group-addon"><img src="/images/gold.gif" width="16" height="16"></span>
						</div>
					</div>
					<div class="col-md-4">
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
			<div class="panel-heading">
				Description
			</div>
			<div class="panel-body">
				<p>Give a description of what you're selling, maybe some specifics, the color of the item, etc. Careful, you only have 500 characters.</p>
				<textarea name="description" class="form-control" rows="8" maxlength="500"></textarea>
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
					<select class="form-control" name="prefix">
						<option value="-1">None</option>
						@foreach ($prefix_enchants as $enchant)
						<option value="{{{ $enchant->id }}}">{{{ $enchant->getListText() }}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-md-6 col-sm-6">
					Suffix<br>
					<select class="form-control" name="suffix">
						<option value="-1">None</option>
						@foreach ($suffix_enchants as $enchant)
						<option value="{{{ $enchant->id }}}">{{{ $enchant->getListText() }}}</option>
						@endforeach
					</select>
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
							<input type="text" value="{{{ $weaponrange }}}" class="form-control" name="weaponrange">
						</div>
						<br/>
					</div>

					@endif

					@if (isset($injuryrate))
					<div class="col-md-6 col-sm-6">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="The Injury Rate">Injury</span>
							<input type="text" value="{{{ $injuryrate }}}" class="form-control" name="injuryrate">
							<span class="input-group-addon">%</span>
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->critical))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Critical of the Item">Critical</span>
							<input type="number" value="{{{ $base_item->critical }}}" class="form-control" name="critical">
							<span class="input-group-addon">%</span>
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->balance))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Balance of the Item">Balance</span>
							<input type="number" value="{{{ $base_item->balance }}}" class="form-control" name="balance">
							<span class="input-group-addon">%</span>
						</div>
						<br>
					</div>
					@endif


					@if (isset($base_item->mattack))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Magic Attack">M.Attack.</span>
							<input type="number" value="{{{ $base_item->mattack }}}" class="form-control" name="mattack">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->defense))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Defense">Def.</span>
							<input type="number" value="{{{ $base_item->defense}}}" class="form-control" name="defense">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->protection))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Protection">Prot.</span>
							<input type="number" value="{{{ $base_item->protection }}}" class="form-control" name="protection">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->mdefense))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Magic Defense">M.Def.</span>
							<input type="number" value="{{{ $base_item->mdefense}}}" class="form-control" name="mdefense">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->mprotection))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Magic Protection">M.Prot.</span>
							<input type="number" value="{{{ $base_item->mprotection }}}" class="form-control" name="mprotection">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->luck))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Luck Stat">Luck</span>
							<input type="number" value="{{{ $base_item->luck }}}" class="form-control" name="luck">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->dex))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Dexterity Stat">Dex</span>
							<input type="number" value="{{{ $base_item->dex }}}" class="form-control" name="dex">
						</div>
						<br>
					</div>
					@endif
					@if (isset($base_item->int))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Intelligence Stat">Int</span>
							<input type="number" value="{{{ $base_item->int }}}" class="form-control" name="int">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->str))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Strength Stat">Str</span>
							<input type="number" value="{{{ $base_item->str }}}" class="form-control" name="str">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->will))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Will Stat">Will</span>
							<input type="number" value="{{{ $base_item->will }}}" class="form-control" name="will">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->hp))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Hit Points">HP</span>
							<input type="number" value="{{{ $base_item->hp }}}" class="form-control" name="hp">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->mp))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Mana Points">MP</span>
							<input type="number" value="{{{ $base_item->mp }}}" class="form-control" name="mp">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->sp))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Stamina Points">SP</span>
							<input type="number" value="{{{ $base_item->sp }}}" class="form-control" name="sp">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->pierce))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Armor Pierce">Pierce</span>
							<input type="number" value="{{{ $base_item->pierce }}}" class="form-control" name="pierce">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->setexplosion))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Explosion Resistance">Exp. Def</span>
							<input type="number" value="{{{ $base_item->setexplosion }}}" class="form-control" name="setexplosion">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->setstomp))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Stomp Resistance">Stmp. def.</span>
							<input type="number" value="{{{ $base_item->setstomp }}}" class="form-control" name="setstomp">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->setpoison))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Poison Resistance">Psn. Res.</span>
							<input type="number" value="{{{ $base_item->setpoison }}}" class="form-control" name="setpoison">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->setmpred))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Mana Usage Reduction">MP Red.</span>
							<input type="number" value="{{{ $base_item->setmpred }}}" class="form-control" name="setmpred">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->setspred))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Stamina Usage Reduction">SP Red.</span>
							<input type="number" value="{{{ $base_item->setspred }}}" class="form-control" name="setspred">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->setattackspeed))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Attack Speed Enhancement">Attk. Sp.</span>
							<input type="number" value="{{{ $base_item->setattackspeed }}}" class="form-control" name="setattackspeed">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->setpetrification))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Petrification Resistance">Pet. Res.</span>
							<input type="number" value="{{{ $base_item->setpetrification }}}" class="form-control" name="setpetrification">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->setflameburst))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Flame Burst Enhancement">Flame Burst</span>
							<input type="number" value="{{{ $base_item->setflameburst }}}" class="form-control" name="setflameburst">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->setwatercannon))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Water Cannon Enhancmenet">Water Cannon</span>
							<input type="number" value="{{{ $base_item->setwatercannon }}}" class="form-control" name="setwatercannon">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->setdrain))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Life Drain Enhancement">Life Drain.</span>
							<input type="number" value="{{{ $base_item->setdrain }}}" class="form-control" name="setdrain">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->setcharge))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Charge Enhancement">Charge.</span>
							<input type="number" value="{{{ $base_item->setcharge }}}" class="form-control" name="setcharge">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->setfirebolt))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Firebolt Enhancement">Firebolt</span>
							<input type="number" value="{{{ $base_item->setfirebolt }}}" class="form-control" name="setfirebolt">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->seticebolt))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Icebolt Enhancement">Icebolt</span>
							<input type="number" value="{{{ $base_item->seticebolt }}}" class="form-control" name="seticebolt">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->setmagnum))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Magnum Shot Enhancement">Magnum</span>
							<input type="number" value="{{{ $base_item->setmagnum }}}" class="form-control" name="setmagnum">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->setsupportshot))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Support Shot Enhancement">Sup. Shot</span>
							<input type="number" value="{{{ $base_item->setsupportshot }}}" class="form-control" name="setsupportshot">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->setquestexp))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Quest Experience Boost">Quest Exp.</span>
							<input type="number" value="{{{ $base_item->setquestexp }}}" class="form-control" name="setquestexp">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->setfishing))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Fishing Enhancement">Fishing</span>
							<input type="number" value="{{{ $base_item->setfishing }}}" class="form-control" name="setfishing">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->settransformation))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Transformation Collection Enhancement">Trans.</span>
							<input type="number" value="{{{ $base_item->settransformation }}}" class="form-control" name="settransformation">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->setblacksmith))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Blacksmithing Enhancement">Blacksmith</span>
							<input type="number" value="{{{ $base_item->setblacksmith }}}" class="form-control" name="setblacksmith">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->setrefine))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Refining Enhancement">Refine</span>
							<input type="number" value="{{{ $base_item->setrefine }}}" class="form-control" name="setrefine">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->setsmash))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Smash Enhancement">Smash</span>
							<input type="number" value="{{{ $base_item->setsmash }}}" class="form-control" name="setsmash">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->setassaultslash))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Assault Slash Enhancement">Assault.</span>
							<input type="number" value="{{{ $base_item->setassaultslash }}}" class="form-control" name="setassaultslash">
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->setdemigod))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Demigod Enhancement">Demi.</span>
							<input type="number" value="{{{ $base_item->setdemigod }}}" class="form-control" name="setdemigod">
						</div>
						<br>
					</div>
					@endif

					@if (isset($proficiency))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Proficiency">Prof.</span>
							<input type="text" value="0.0" class="form-control" name="proficiency">
							<span class="input-group-addon">%</span>
						</div>
						<br>
					</div>
					@endif

					@if (isset($base_item->maxdurability))
					<div class="col-md-4 col-sm-4">
						<div class="input-group">
							<span class="input-group-addon stat_label" title="Top is current Durability, Bottom is Max Durability">Durability</span>
							<input type="number" value="{{{$base_item->maxdurability }}}" placeholder="Dura."name="durability" class="form-control">
							<input class="form-control" type="number" value="{{{$base_item->maxdurability}}}" placeholder="Max Dura." type="text" name="maxdurability">
						</div>
						<br>
					</div>
					@endif

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
					<select class="form-control" name="reforgerank">
						<option value="3" selected="selected">Rank 3</option>
						<option value="2">Rank 2</option>
						<option value="1">Rank 1</option>
					</select>
				</div>
				<div class="col-md-8 col-sm-8">
					<div class="input-group">
						<span class="input-group-addon stat_label" title="The reforge on the first line">Reforge 1</span>
						<input type="text" placeholder="None" name="reforge-1"class="form-control">
						<br>
					</div>
					<br>
					<div class="input-group">
						<span class="input-group-addon stat_label" title="The reforge on the second line">Reforge 2</span>
						<input type="text" placeholder="None" name="reforge-2" class="form-control">
					</div>
					<br>
					<div class="input-group">
						<span class="input-group-addon stat_label" title="The reforge on the third line">Reforge 3</span>
						<input type="text" placeholder="None" name="reforge-3" class="form-control">
					</div>
				</div>
			</div>
		</div>
		@endif
		@if(isset($base_item->upgrades) || isset($base_item->gemupgrades) || isset($base_item->specialupgradable))
		<div class="panel panel-primary">
			<div class="panel-heading">
				Upgrades
			</div>
			<div class="panel-body">
				@if (isset($base_item->upgrades))
				<div class="col-md-4 col-sm-4">
					<div class="input-group">
						<span class="input-group-addon stat_label" title="Number of upgrades left">Upgrades</span>
						<input type="number" value="{{{$base_item->upgrades }}}" placeholder="Upgrades" class="form-control" name="upgrades">
					</div>
					<br>
				</div>
				@endif
				@if (isset($base_item->gemupgrades))
				<div class="col-md-4 col-sm-4">
					<div class="input-group">
						<span class="input-group-addon stat_label" title="Number of gem upgrades left">Gem Upgrades</span>
						<input type="number" value="{{{$base_item->gemupgrades }}}" placeholder="Gem Upgrades" name="gemupgrades" class="form-control">
					</div>
					<br>
				</div>
				@endif
				@if (isset($base_item->specialupgradable))
				<div class="col-md-4 col-sm-4">
					<div class="input-group">
						<span class="input-group-addon stat_label" title="Type either S or R, then the level. Leave it blank if not special upgraded">Special Upg.</span>
						<input type="text" value="" placeholder="e.g. S6" class="form-control" name="specialup">
					</div>
					<br>
				</div>
				@endif
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
