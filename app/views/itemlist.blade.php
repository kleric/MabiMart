@extends('layouts.master')
@section('page-title')
Items
@stop
@section('content')
	<div class="page-header">
		<h1>All Items</h1>
	</div>
	<ol class="breadcrumb">
  		<li>All Items</li>
	</ol>
	<div class="list-group">
  		<a href="#" class="list-group-item clearfix">
  			<div class="item-thumbnail pull-left">
    			<center><img src="images/items/thumbnails/2.png"></center>
    		</div>
    		<div>
	    		<b class="list-group-item-heading">Fine Reforging Tool</b>
	    		<i class="list-grou-item-text"> A highly sophisticated reforging tool meant for further reforging of an item. Reforging stats will not be changed.</i>
	    	</div>
Can only be used on items that have been reforged at least once.</i>
  		</a>
  		<a href="#" class="list-group-item clearfix">
  			<div class="item-thumbnail pull-left">
    			<center><img src="images/items/thumbnails/3.png"></center>
    		</div>
    		<div>
    			<b class="list-group-item-heading">Nuadha Robe (F)</b>
    			<i class="list-grou-item-text">A robe that has been imbued with Nuadha's power. Nuadha's power is said to have been split amongst his robe, gauntlets, and boots. You can become more powerful as a Demigod if you equip all three items.</i>
  			</div>
  		</a>
	</div>
	
@stop
