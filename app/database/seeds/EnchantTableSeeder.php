<?php

class EnchantTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('enchants')->delete();
		
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 2,'effects' => "<ul>
			<li>+1000 CP</li>
			<li>-6% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Black Scar"));
		Enchant::create(array('enchantsonto' => "Heavy Armor",'rank' => 2,'effects' => "<ul>
			<li>+60 Str If Sunday</li>
			<li>+60 Will If Friday</li>
			<li>+60 Luck If Saturday</li>
			<li>+1~3 Stomp Resistance</li>
			<li>+1~3 Explosion Resistance</li>
			<li>+2 Poison Immunity</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Weekend"));
		Enchant::create(array('enchantsonto' => "Heavy Armor",'rank' => 2,'effects' => "<ul>
			<li>+20 Str while Potion Poisoned</li>
			<li>+12 Max Damage</li>
			<li>-20% Balance while Poisoned</li>
			<li>+10% Critical while Deadly</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Avenger"));
		Enchant::create(array('enchantsonto' => "Heavy Armor",'rank' => 2,'effects' => "<ul>
			<li>+35 Str If Carpentry Rank 5+</li>
			<li>+15 Luck If Taming Wild Animals Rank 5+</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Friend"));
		Enchant::create(array('enchantsonto' => "Clothing, Armor, Shields",'rank' => 2,'effects' => "<ul>
			<li>+5 Defense when lvl 76+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Giant"));
		Enchant::create(array('enchantsonto' => "Clothing",'rank' => 2,'effects' => "<ul>
			<li>+40 HP if March Song Rank A+</li>
			<li>+30 MP</li>
			<li>+30 Stamina</li>
			<li>+3 Music Buff Duration if Enduring Melody Rank 3+</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Orchestra"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 3,'effects' => "<ul>
			<li>-100 HP when lvl 20+</li>
			<li>+12 Max Damage if age 20-</li>
			<li>-6 Min Damage if age 14+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Banshee"));
		Enchant::create(array('enchantsonto' => "Magical Clothing",'rank' => 3,'effects' => "<ul>
			<li>+20 Str</li>
			<li>+12 Max Damage if using \"the Hungry\" title</li>
			<li>+10% Critical if using \"the Luxurious\" title</li>
			<li>+12% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Habit"));
		Enchant::create(array('enchantsonto' => "Clothing",'rank' => 3,'effects' => "<ul>
			<li>+20 HP if Harvest Song Rank 9+</li>
			<li>+25 Stamina</li>
			<li>+50% Repair Cost</li>
			<li>+2 Music Buff Duration if Playing Instrument Rank 2+</li>
			<li>+25 HP</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Major"));
		Enchant::create(array('enchantsonto' => "Gloves",'rank' => 3,'effects' => "<ul>
			<li>+1~2 Magic Attack if Magic Mastery Rank 5+</li>
			<li>+1~2 Magic Attack if Blaze Rank 7+</li>
			<li>+1 Magic Attack if Ice Spear Rank 9+</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Mana Hammer"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 3,'effects' => "<ul>
			<li>+1000 CP</li>
			<li>-3% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Red Scar"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 3,'effects' => "<ul>
			<li>-7 Max Damage</li>
			<li>-7 Min Damage</li>
			<li>+5~9% Min Injury Rate</li>
			<li>+2~5% Critical if lvl 40+</li>
			<li>-500 CP</li>
			<li>+5x Repair Cost</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Scrap"));
		Enchant::create(array('enchantsonto' => "Royal Alchemist Robe",'rank' => 3,'effects' => "<ul>
			<li>+3% Crystal-making success rate when wearing the Royal Alchemist title</li>
			<li>+3% Synthesis success rate when wearing the Royal Alchemist title</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Academic"));
		Enchant::create(array('enchantsonto' => "Bows and Crossbows",'rank' => 3,'effects' => "<ul>
			<li>+9 Dex</li>
			<li>-250 CP</li>
			<li>+6x Repair Cost</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Broken Arrow"));
		Enchant::create(array('enchantsonto' => "Two-handed Weapons (Bugged in-game)",'rank' => 3,'effects' => "<ul>
			<li>+20 Str when lvl 10+</li>
			<li>-20 Luck when lvl 40+</li>
			<li>+10% Balance</li>
			<li>+8% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Divide"));
		Enchant::create(array('enchantsonto' => "One-Handed Weapon",'rank' => 3,'effects' => "<ul>
			<li>+10 Str if Smash Rank 1+</li>
			<li>+8~15 Max Damage if Combat Mastery Rank 1+</li>
			<li>+5~8% Critical if Windmill Rank 1+</li>
			<li>+2x Repair Cost</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Dominator"));
		Enchant::create(array('enchantsonto' => "Magical Clothing",'rank' => 3,'effects' => "<ul>
			<li>-1000 CP</li>
			<li>-3% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Raccoon Cub"));
		Enchant::create(array('enchantsonto' => "Wands",'rank' => 3,'effects' => "<ul>
			<li>+20 MP if Meditation Rank 8+</li>
			<li>+2~5% Critical if Fusion Bolt Rank 1+</li>
			<li>+2x Repair Cost</li>
			<li>+2~4 Magic Attack if Blaze Rank 1+</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Reasonable"));
		Enchant::create(array('enchantsonto' => "Crossbow",'rank' => 3,'effects' => "<ul>
			<li>+20 Dex if Weaving Rank 7+</li>
			<li>+10 Will if Tailoring Rank 9+</li>
			<li>+10% Critical</li>
			<li>+6% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Revolver"));
		Enchant::create(array('enchantsonto' => "Clothing(Excludes Magical Clothing)",'rank' => 3,'effects' => "<ul>
			<li>+5x Repair Cost</li>
			<li>+2% Crystal-making Success Rate</li>
			<li>+2% Synthesis Success Rate</li>
			<li>+2% Fragmentation Success Rate</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Scholar"));
		Enchant::create(array('enchantsonto' => "Handgear, Footgear",'rank' => 4,'effects' => "<ul>
			<li>+25~30 Will if Charging Strike Rank 1</li>
			<li>+10~20 Max Damage if Spinning Uppercut Rank 1</li>
			<li>+4% Critical</li>
			<li>+2x Repair Cost</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Break"));
		Enchant::create(array('enchantsonto' => "Footwear, Handgear",'rank' => 4,'effects' => "<ul>
			<li>-20 Will</li>
			<li>+10~15 Max Damage if Act 9: Invigorating Encore Rank 1+</li>
			<li>+7~15 Marionette Max Damage if Act 6: Crisis Rank 1+</li>
			<li>+3x Repair Cost</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Burlesque"));
		Enchant::create(array('enchantsonto' => "Lances",'rank' => 4,'effects' => "<ul>
			<li>-50 Stamina</li>
			<li>+10~15 Max Damage if Lance Charge Rank 1+</li>
			<li>+10~15% Critical if Lance Counter Rank 1+</li>
			<li>+5x Repair Cost</li>
			<li>+3 Piercing Level if Lance Mastery Rank 1+</li>
			<li>-30 Max Damage if Lance Counter Rank 3-</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Cartel"));
		Enchant::create(array('enchantsonto' => "Two-Handed Weapon",'rank' => 4,'effects' => "<ul>
			<li>+40 Str if Evasion rank 6+</li>
			<li>+20~25 Max Damage if Windmill rank 1</li>
			<li>+10~15 Min Damage if Final Hit rank 1</li>
			<li>+5x Repair Cost</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Conqueror"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 4,'effects' => "<ul>
			<li>+15 HP if Axe Mastery Rank 6+</li>
			<li>+20~30 Str if Sword Mastery Rank 6+</li>
			<li>+15 Luck if Taunt Rank 6+</li>
			<li>+1~3 Fast Attack if Blunt Mastery Rank 6+</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Duke"));
		Enchant::create(array('enchantsonto' => "Magical Clothing",'rank' => 4,'effects' => "<ul>
			<li>+10 MP</li>
			<li>+10 Int</li>
			<li>+10% Balance if using \"the Diligent\" title</li>
			<li>+10% Critical if using \"the Lazy\" title</li>
			<li>+9% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Fickle"));
		Enchant::create(array('enchantsonto' => "Footwear",'rank' => 4,'effects' => "<ul>
			<li>+10~15 Dex if Weaving Rank 6+</li>
			<li>+20~35 Luck if level 40+</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Gathering"));
		Enchant::create(array('enchantsonto' => "Weapon",'rank' => 4,'effects' => "<ul>
			<li>+500 CP</li>
			<li>-3% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Green Scar"));
		Enchant::create(array('enchantsonto' => "Instruments",'rank' => 4,'effects' => "<ul>
			<li>+50 Stamina</li>
			<li>+10~25 Luck</li>
			<li>+20~25 Max Damage if Dischord Rank 1+</li>
			<li>+3x Repair Cost</li>
			<li>+5 Music Buff Effect if Vivace Rank 1+</li>
			<li>+10 Music Buff Duration if Musical Knowledge Rank 1+</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Harmony"));
		Enchant::create(array('enchantsonto' => "Bows and Crossbows",'rank' => 4,'effects' => "<ul>
			<li>+30 Dex</li>
			<li>+5~10 Max Damage if Ranged Attack Rank 1+</li>
			<li>-4 Defense</li>
			<li>+7x Repair Cost</li>
			<li>+8~15 Critical if Magnum Shot Rank 1+</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Interlocking"));
		Enchant::create(array('enchantsonto' => "Heavy Armor",'rank' => 4,'effects' => "<ul>
			<li>-500 CP</li>
			<li>-6% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Marble"));
		Enchant::create(array('enchantsonto' => "Magical Clothing",'rank' => 4,'effects' => "<ul>
			<li>-20 Stamina</li>
			<li>+10 Will</li>
			<li>+10 Luck</li>
			<li>+12% Balance if using \"the Master of Healing\" title</li>
			<li>+9% Repair Cost</li>
			<li>+6 % Balance if using \"the One Who Discovered the Maiz Prairie Ruins' title</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Rule's"));
		Enchant::create(array('enchantsonto' => "Gauntlets and Metal Boots",'rank' => 4,'effects' => "<ul>
			<li>+30 Str if Lance Counter Rank 1</li>
			<li>-20~30 Dex</li>
			<li>+5% Critical</li>
			<li>+2 Defense if Evasion Rank 9+</li>
			<li>+5x Repair Cost</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Running"));
		Enchant::create(array('enchantsonto' => "Knuckle",'rank' => 4,'effects' => "<ul>
			<li>+20 Will if Respite Rank 1</li>
			<li>+25~30 Max Damage if Focused Fist Rank 1</li>
			<li>+5~10% Critical if Chain Mastery Rank 1</li>
			<li>-4 Defense</li>
			<li>+7x Repair Cost</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Vale Tudo"));
		Enchant::create(array('enchantsonto' => "Gauntlets and Metal Boots",'rank' => 4,'effects' => "<ul>
			<li>+25~40 Str if Charge Rank 1</li>
			<li>-50 Will if Smash 2-</li>
			<li>+1~3 Defense if Critical Hit Rank 1</li>
			<li>+2x Repair Cost</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Arena"));
		Enchant::create(array('enchantsonto' => "Footwear, Handgear",'rank' => 4,'effects' => "<ul>
			<li>+10~30 Int if Lightning Shield is Rank 1</li>
			<li>+8% Critical if Fire Shield is Rank 1</li>
			<li>-3~5 Defense</li>
			<li>+2x Repair Cost</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Arrogant"));
		Enchant::create(array('enchantsonto' => "Control Bar",'rank' => 4,'effects' => "<ul>
			<li>+50 Stamina</li>
			<li>+25~35 Str if Colossus Marionette rank 1</li>
			<li>+25 Luck if Pierrot Marionette rank 1</li>
			<li>+5x Repair Cost</li>
			<li>+10 Marionette Max Damage</li>
			<li>+25 Marionette Max Damage if Act 9: Invigorating Encore Rank 1</li>
			<li>+5~10 Marionette Critical if Act 1: Inciting Incident Rank 1</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Challenger"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 4,'effects' => "<ul>
			<li>+15~25 Will if Tumble Rank 1</li>
			<li>+10 Max Damage if Chain Mastery Rank 1</li>
			<li>+5~7% Critical if Knuckle Mastery Rank 1</li>
			<li>+5x Repair Cost</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Dazed"));
		Enchant::create(array('enchantsonto' => "Handgear",'rank' => 4,'effects' => "<ul>
			<li>+40 MP</li>
			<li>+30 Stamina if Carpentry Rank 1</li>
			<li>+10~15 Dex if Cooking Rank 6+</li>
			<li>+8~15 Max Damage if Refining Rank 1</li>
			<li>+5% Critical if Metallurgy Rank 1</li>
			<li>+3x Repair Cost</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Difficult"));
		Enchant::create(array('enchantsonto' => "Cylinder",'rank' => 4,'effects' => "<ul>
			<li>-50 Max Damage if Alchemy Mastery Rank 2-</li>
			<li>+15% Critical if Wind Blast Rank 1</li>
			<li>+7x Repair Cost</li>
			<li>+15~25 Fire Alchemy Damage if Heat Buster Rank 1</li>
			<li>+30~50 Water Alchemy Damage if Rain Casting Rank 1</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Disaster"));
		Enchant::create(array('enchantsonto' => "Magical Clothing",'rank' => 4,'effects' => "<ul>
			<li>-9% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Eagle"));
		Enchant::create(array('enchantsonto' => "Magical Clothing",'rank' => 4,'effects' => "<ul>
			<li>-500 CP</li>
			<li>-9% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Jackal"));
		Enchant::create(array('enchantsonto' => "Instruments",'rank' => 4,'effects' => "<ul>
			<li>+20~30 Stamina</li>
			<li>+12 Max Damage if Battlefield Overture Rank 3+</li>
			<li>+2 Music Buff Duration if Playing Instrument Rank 3+</li>
			<li>+8 Max Damage</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Rhythm"));
		Enchant::create(array('enchantsonto' => "Footwear, Handgear",'rank' => 4,'effects' => "<ul>
			<li>+20 Dex if Bow Mastery Rank 1+</li>
			<li>-50 Will if Support Shot Rank 2-</li>
			<li>+5~8 Max Damage if Crossbow Mastery Rank 1+</li>
			<li>+5x Repair Cost</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Release"));
		Enchant::create(array('enchantsonto' => "Staves",'rank' => 4,'effects' => "<ul>
			<li>+50 MP if Meditation Rank 8+</li>
			<li>+40~70 Int if Fireball Rank 1+</li>
			<li>+5~10% Critical if Fusion Bolt Rank 1+</li>
			<li>+5x Repair Cost</li>
			<li>+5 Magic Attack if Hailstorm Rank 1+</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Used"));
		Enchant::create(array('enchantsonto' => "Instruments",'rank' => 5,'effects' => "<ul>
			<li>+15 HP if Lullaby Rank 5+</li>
			<li>+20 Stamina</li>
			<li>+8 Max Damage</li>
			<li>+3 Music Buff Effect if Playing Instrument Rank 4+</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Allegro"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 5,'effects' => "<ul>
			<li>-10~30 Will</li>
			<li>+10 Max Damage if Puppet's Snare Rank 1</li>
			<li>+7% Critical if Wire Pull Rank 1</li>
			<li>+3x Repair Cost</li>
			<li>+10~15 Marionette Max Damage if Act 4: Rising Action Rank 1</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Allegory"));
		Enchant::create(array('enchantsonto' => "Armor made out of Leather",'rank' => 5,'effects' => "<ul>
			<li>+20 Luck if Rest Rank 8+</li>
			<li>+6~12 Max Damage if Rest Rank 7+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Ancient"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 5,'effects' => "<ul>
			<li>+15~30 Int if Bolt Mastery Rank 1</li>
			<li>+5x Repair Cost</li>
			<li>+3~5 Magic Attack if Thunder Rank 1</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Apathetic"));
		Enchant::create(array('enchantsonto' => "Footwear, Handgear",'rank' => 5,'effects' => "<ul>
			<li>+10~30 Int if Lightning Shield is Rank 1</li>
			<li>+8% Critical if Fire Shield is Rank 1</li>
			<li>-3~5 Defense</li>
			<li>+2x Repair Cost</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Arrogant"));
		Enchant::create(array('enchantsonto' => "Bodywear",'rank' => 5,'effects' => "<ul>
			<li>+20 HP</li>
			<li>+13 Max Damage if Sand Burst rank 1</li>
			<li>+5% Critical if Chain Cylinder rank 1</li>
			<li>+3x Repair Cost</li>
			<li>+5~7 Fire Alchemy Damage if Flame Burst rank 1</li>
			<li>+10~15 Water Alchemy Damage if Water Cannon rank 1</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Boiling"));
		Enchant::create(array('enchantsonto' => "Handgear",'rank' => 5,'effects' => "<ul>
			<li>+3% Critical</li>
			<li>+100% Repair Cost</li>
			<li>+10~20 Marionette Max Damage</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Controlled"));
		Enchant::create(array('enchantsonto' => "Clothing",'rank' => 5,'effects' => "<ul>
			<li>+50 HP if Enduring Melody Rank 1</li>
			<li>+50 Stamina</li>
			<li>+10~15 Max Damage if Lullaby Rank 1</li>
			<li>+5x Repair Cost</li>
			<li>+3 Music Buff Effect if Composing Rank 1</li>
			<li>+5~10 Music Buff Duration if Musical Knowledge Rank 1</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Encore"));
		Enchant::create(array('enchantsonto' => "Light Armor",'rank' => 5,'effects' => "<ul>
			<li>+7 Str</li>
			<li>+7 Int</li>
			<li>+7 Dex</li>
			<li>+6~12% Critical if Critical Hit rank 1</li>
			<li>+2x Repair Cost</li>
			<li>+6 Critical when wearing \"who Discovered the Maiz Ruins\" title</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Fundamental"));
		Enchant::create(array('enchantsonto' => "Bodywear",'rank' => 5,'effects' => "<ul>
			<li>+30 HP</li>
			<li>+30 Stamina</li>
			<li>+7~12 Max Damage if Alchemy Mastery rank 1</li>
			<li>+5x Repair Cost</li>
			<li>+2~4 Alchemy Success Rate if Mana Crystallization rank 1</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Key"));
		Enchant::create(array('enchantsonto' => "Light Armor",'rank' => 5,'effects' => "<ul>
			<li>-60 Stamina</li>
			<li>+5~7 Max Damage if Support Shot Rank 1</li>
			<li>+10% Critical if Crash Shot Rank 1</li>
			<li>+3 Defense</li>
			<li>+5x Repair Cost</li>
			<li>+8 Max Damage if Magnum Shot Rank 1</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Knocking"));
		Enchant::create(array('enchantsonto' => "Gauntlet",'rank' => 5,'effects' => "<ul>
			<li>+10 Stamina if Evasion Rank 6+</li>
			<li>+5 Max Damage if Windmill Rank 1</li>
			<li>+2~4 Fast Attack</li>
			<li>+5 Max Damage if Windmill Rank 6+</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Marquis"));
		Enchant::create(array('enchantsonto' => "Dual Guns",'rank' => 5,'effects' => "<ul>
			<li>+10~28 Max Damage if Way of the Gun Rank 1</li>
			<li>+4~8 Min Damage if Dual Gun Mastery Rank 1</li>
			<li>+2x Repair Cost</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Officer's"));
		Enchant::create(array('enchantsonto' => "Light Armor",'rank' => 5,'effects' => "<ul>
			<li>+5 Str</li>
			<li>+5 Int</li>
			<li>+5 Dex</li>
			<li>+16% Critical if using \"the Master of Critical Hit\" title</li>
			<li>+12% Repair Cost</li>
			<li>+6% Critical if using \"the One Who Discovered Maiz Prairie Ruins\" title</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Principle's"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 5,'effects' => "<ul>
			<li>+15 HP if Alchemy Mastery 9+</li>
			<li>+10 Max Damage if Water Cannon Rank 1</li>
			<li>+5% Critical if Life Drain 6+</li>
			<li>+15% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Shadow Hunter"));
		Enchant::create(array('enchantsonto' => "Handgear/Footgear",'rank' => 5,'effects' => "<ul>
			<li>+25 Luck if Harvest Song Rank 1</li>
			<li>+10 Max Damage if Vivace Rank 1</li>
			<li>+5% Critical</li>
			<li>+2x Repair Cost</li>
			<li>+2 Music Buff Effect if Battlefield Overture Rank 1</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Solo"));
		Enchant::create(array('enchantsonto' => "Light Armor",'rank' => 5,'effects' => "<ul>
			<li>+20 HP</li>
			<li>+35~50 Will if Pummel rank 1</li>
			<li>+20 Min Damage if Somersault Kick rank 1</li>
			<li>+10~12% Critical if Drop Kick rank 1</li>
			<li>+3 Defense</li>
			<li>+3x Repair Cost</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Sparring"));
		Enchant::create(array('enchantsonto' => "Heavy Armor",'rank' => 5,'effects' => "<ul>
			<li>+15~20 Max Damage if Lance Charge Rank 1</li>
			<li>+7~12% Critical if Lance Mastery Rank 1</li>
			<li>+3 Defense</li>
			<li>+2x Repair Cost</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Stabbing"));
		Enchant::create(array('enchantsonto' => "Heavy Armor",'rank' => 5,'effects' => "<ul>
			<li>-9% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Stable"));
		Enchant::create(array('enchantsonto' => "Magical Clothing",'rank' => 5,'effects' => "<ul>
			<li>+10 Dex</li>
			<li>+10 Max Damage if using \"the Fire Arrow\" title</li>
			<li>+10% Balance if using \"the Noob Elemental Master\" title</li>
			<li>+6% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Stage"));
		Enchant::create(array('enchantsonto' => "Cylinder",'rank' => 5,'effects' => "<ul>
			<li>+6% Critical if Alchemy Mastery Rank 5+</li>
			<li>+5 Fire Alchemy Damage if Flame Burst Rank 5+</li>
			<li>+3~7 Fire Alchemy Damage if Water Cannon Rank 1</li>
			<li>+7~11 Water Alchemy Damage if Flame Burst Rank 9+</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Synergy"));
		Enchant::create(array('enchantsonto' => "Handgear / Footwear",'rank' => 5,'effects' => "<ul>
			<li>+6~10 Max Damage if Transmutation Rank 1</li>
			<li>+5% Critical</li>
			<li>+3x Repair Cost</li>
			<li>+2~4 Alchemy Success Rate if Metal Conversion Rank 1</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Tripod"));
		Enchant::create(array('enchantsonto' => "Dustin Silver Knight set",'rank' => 5,'effects' => "<ul>
			<li>+4 Max Damage when Age 16+</li>
			<li>+4 Min Damage</li>
			<li>-5% Critical</li>
			<li>+4 Max Damage when Age</li>
			<li>-20</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Union"));
		Enchant::create(array('enchantsonto' => "Clothing",'rank' => 5,'effects' => "<ul>
			<li>+15~30 Int if Hail Storm Rank 1</li>
			<li>+5% Critical if Party Healing Rank 1</li>
			<li>+3x Repair Cost</li>
			<li>+3</li>
			<li>-5 Magic Attack if Enchant Rank 1</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Welcome"));
		Enchant::create(array('enchantsonto' => "Weapon",'rank' => 5,'effects' => "<ul>
			<li>-3% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Yellow Scar"));
		Enchant::create(array('enchantsonto' => "Bodywear",'rank' => 5,'effects' => "<ul>
			<li>+40 HP</li>
			<li>+10~15 Max Damage if Control Marionette Rank 1</li>
			<li>+5x Repair Cost</li>
			<li>+15~20 Marionette Max Damage if Act 2: Threshold Cutter Rank 1</li>
			<li>+5 Marionette Defense if Act 7: Climactic Crash Rank 1</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Avant-garde"));
		Enchant::create(array('enchantsonto' => "Armor",'rank' => 5,'effects' => "<ul>
			<li>-60 Stamina</li>
			<li>+25~35 Str level 40+</li>
			<li>+10~15 Max Damage if Counterattack rank 1</li>
			<li>+3 Defense</li>
			<li>+2x Repair Cost</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Champion"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 5,'effects' => "<ul>
			<li>+10 Luck if March Song Rank 1</li>
			<li>+15 Max Damage if Battlefield Overture Rank 1</li>
			<li>+5x Repair Cost</li>
			<li>+2~3 Music Buff Bonus if Playing Instrument Rank 1</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Chorus"));
		Enchant::create(array('enchantsonto' => "Hat",'rank' => 5,'effects' => "<ul>
			<li>+15 Int</li>
			<li>+10 Dex</li>
			<li>+10 Will</li>
			<li>+8% Critical if Fireball Rank 7+</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Clever"));
		Enchant::create(array('enchantsonto' => "Handgear, Footgear",'rank' => 5,'effects' => "<ul>
			<li>+10 Will</li>
			<li>+10~25 Luck</li>
			<li>+6~10 Max Damage if Metallurgy Rank 1</li>
			<li>+5x Repair Cost</li>
			<li>+1 Production Quality if Carpentry Rank 1</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Colossal"));
		Enchant::create(array('enchantsonto' => "Shield",'rank' => 5,'effects' => "<ul>
			<li>+15 Str if Combat Mastery Rank 3+</li>
			<li>+3% Critical</li>
			<li>+1~3 Fast Attack</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Count"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 5,'effects' => "<ul>
			<li>+10~20 Dex</li>
			<li>+10% Critical if Synthesis Rank 1</li>
			<li>+3x Repair Cost</li>
			<li>+2~4 Alchemy Production Success Rate if Fragmentation Rank 1</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Created"));
		Enchant::create(array('enchantsonto' => "Clothes and Armors",'rank' => 5,'effects' => "<ul>
			<li>+50 HP</li>
			<li>+15~25 Luck</li>
			<li>+7~15 Max Damage if Refine Rank 1</li>
			<li>+2x Repair Cost</li>
			<li>+2 Product Quality if Blacksmithing Rank 1</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Daunting"));
		Enchant::create(array('enchantsonto' => "Clothing",'rank' => 5,'effects' => "<ul>
			<li>+10 Stamina if Carpentry Rank 8+</li>
			<li>+10 Dex</li>
			<li>+25 Luck if Potion Making Rank 9+</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Diligent"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 5,'effects' => "<ul>
			<li>+5% Critical if Summon Golem Rank 1</li>
			<li>+5x Repair Cost</li>
			<li>+3~5 Fire Alchemy Damage if Fire Alchemy Mastery rank 1</li>
			<li>+7~10 Water Alchemy Damage if Water Alchemy Mastery rank 1</li>
			<li>+5% Critical</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Frozen"));
		Enchant::create(array('enchantsonto' => "Melee Weapon",'rank' => 5,'effects' => "<ul>
			<li>+8~14 Str if Potion Making B+</li>
			<li>+8~14 Dex if Herbalism A+</li>
			<li>+12 Max Damage</li>
			<li>+2x Repair Cost</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Horn"));
		Enchant::create(array('enchantsonto' => "Dual Guns",'rank' => 5,'effects' => "<ul>
			<li>+10~22 Max Damage if Bullet Storm Rank 1</li>
			<li>+2~8 Min Damage if Bullet Storm Rank 3+</li>
			<li>+10% Critical if Flash Launcher Rank 1</li>
			<li>+2x Repair Cost</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "High-Powered"));
		Enchant::create(array('enchantsonto' => "Helmets",'rank' => 5,'effects' => "<ul>
			<li>+25~40 Str if Combat Mastery Rank 1+</li>
			<li>-50 Dex</li>
			<li>+5% Critical if Ranged Attack Rank 5-</li>
			<li>+1~3 Defense if Defense Rank 1+</li>
			<li>+5x Repair Cost</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Laurel Wreath"));
		Enchant::create(array('enchantsonto' => "Light Armor",'rank' => 5,'effects' => "<ul>
			<li>+20 Dex</li>
			<li>+20 Will</li>
			<li>+20 Luck</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Monster"));
		Enchant::create(array('enchantsonto' => "Bows and Crossbows",'rank' => 5,'effects' => "<ul>
			<li>-10 HP</li>
			<li>-10 Stamina</li>
			<li>+8 Max Damage if Ranged Attack Rank 4+</li>
			<li>+6 Min Damage if Ranged Attack Rank 7+</li>
			<li>+12% Repair Cost</li>
			<li>+4 Max Damage if Ranged Attack Rank A+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Palm Tree"));
		Enchant::create(array('enchantsonto' => "Tower Cylinder",'rank' => 5,'effects' => "<ul>
			<li>-30 Dex</li>
			<li>+10x Repair Cost</li>
			<li>+15 Water Alchemy Damage if Frozen Blast is Rank 3+</li>
			<li>+30~40 Water Alchemy Damage if Water Cannon is Rank 1</li>
			<li>+10~15 Fire Alchemy Damage if Flame Burst is Rank 1</li>
			<li>-5% Stamina Usage if Water Cannon is Rank 6+</li>
			<li>-5% Stamina Usage if Flame Burst is Rank 6+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Refreshing"));
		Enchant::create(array('enchantsonto' => "Weapon",'rank' => 5,'effects' => "<ul>
			<li>+10 Str if Potion Making Rank A+</li>
			<li>+10 Dex if Herbalism Rank 9+</li>
			<li>+10 Max Damage</li>
			<li>+10% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Spike"));
		Enchant::create(array('enchantsonto' => "Weapon",'rank' => 5,'effects' => "<ul>
			<li>+8 Max Damage when Age 16+</li>
			<li>-4 Min Damage when Age 20+</li>
			<li>+5% Balance</li>
			<li>-5% Critical</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Stamp"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 5,'effects' => "<ul>
			<li>+7~10 Max Damage if Weaving Rank 1+</li>
			<li>+5% Critical</li>
			<li>+2x Repair Cost</li>
			<li>+2 Production Quality if Tailoring Rank 1+</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Steady"));
		Enchant::create(array('enchantsonto' => "Handgear / Footwear",'rank' => 5,'effects' => "<ul>
			<li>+10 Max Damage if Shock is Rank 1</li>
			<li>+5% Critical if Barrier Spikes is Rank 1</li>
			<li>+3x Repair Cost</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Symbolic"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 5,'effects' => "<ul>
			<li>+30~40 Dex if Crash Shot Rank 1</li>
			<li>-50 Will if Ranged Attack Rank 2-</li>
			<li>+25 Luck if Magnum Shot Rank 1</li>
			<li>+3x Repair Cost</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Target"));
		Enchant::create(array('enchantsonto' => "Bows and Crossbows",'rank' => 5,'effects' => "<ul>
			<li>+8~14 Dex if Herbalism Rank 5+</li>
			<li>+8~14 Luck if Potion Making Rank 5+</li>
			<li>+12 Max Damage</li>
			<li>+40% Repair Cost</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Thorn Lotus"));
		Enchant::create(array('enchantsonto' => "Helmet",'rank' => 5,'effects' => "<ul>
			<li>-50 Dex</li>
			<li>+12~15 Max Damage if Lance Mastery Rank 1</li>
			<li>+3~5% Critical if Critical Hit Rank 1</li>
			<li>+3 Defense if Defense Rank 1</li>
			<li>+3x Repair Cost</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Tournai"));
		Enchant::create(array('enchantsonto' => "Magical Clothing",'rank' => 5,'effects' => "<ul>
			<li>+50 Str if Poisoned</li>
			<li>+10% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Viper"));
		Enchant::create(array('enchantsonto' => "Cylinder",'rank' => 5,'effects' => "<ul>
			<li>+18 Water Alchemy Damage if Alchemy Mastery Rank 5+</li>
			<li>+15~25 Water Alchemy Damage if Water Cannon Rank 1</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Wave"));
		Enchant::create(array('enchantsonto' => "Footwear",'rank' => 5,'effects' => "<ul>
			<li>+27 Will if in the state of Recovery aftereffect</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Indomitable"));
		Enchant::create(array('enchantsonto' => "Ranged Weapons",'rank' => 5,'effects' => "<ul>
			<li>+2~4 Fast Attack</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Swallow"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 6,'effects' => "<ul>
			<li>-5 Max Damage if lvl 44+</li>
			<li>+5 Min Damage if lvl 22+</li>
			<li>+5% Balance</li>
			<li>+5% Critical</li>
			<li>-250 CP</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Arc Lich"));
		Enchant::create(array('enchantsonto' => "Heavy Armor",'rank' => 6,'effects' => "<ul>
			<li>+5 Str</li>
			<li>-20 Int</li>
			<li>+20 Will</li>
			<li>+15 Max Damage if using \"the Master of Combat\" title</li>
			<li>+12% Repair Cost</li>
			<li>+5 Max Damage if using \"the One Who Discovered the Maiz Prairie Ruins\" title</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Basic"));
		Enchant::create(array('enchantsonto' => "Heavy Armor",'rank' => 6,'effects' => "<ul>
			<li>+5 Str</li>
			<li>-10 Int</li>
			<li>+20 Will</li>
			<li>+8~14 Max Damage if Combat Mastery Rank 1</li>
			<li>+2x Repair Cost</li>
			<li>+5 Max Damage when wearing \"who Discovered the Maiz Ruins\" title</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Conceptual"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 6,'effects' => "<ul>
			<li>-30 HP</li>
			<li>-15 Str</li>
			<li>+30% Max Injury Rate when lvl 30+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Destructive"));
		Enchant::create(array('enchantsonto' => "Light Armor",'rank' => 6,'effects' => "<ul>
			<li>+20 HP</li>
			<li>-20 MP</li>
			<li>+20 Stamina</li>
			<li>+3 Defense if Exploration lvl 5+</li>
			<li>+15% Repair Cost</li>
			<li>+3 Defense if Exploration lvl 15+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Heath"));
		Enchant::create(array('enchantsonto' => "Gloves (excluding Gauntlets)",'rank' => 6,'effects' => "<ul>
			<li>+25~40 Luck if Fishing Rank 3+</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Fortunate"));
		Enchant::create(array('enchantsonto' => "Clothing",'rank' => 6,'effects' => "<ul>
			<li>+12 Int</li>
			<li>+12 Will</li>
			<li>+2 Defense if Defense Rank 9+</li>
			<li>+10 Magic Defense if Magic Mastery Rank 5+</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Mana Wall"));
		Enchant::create(array('enchantsonto' => "Cylinder",'rank' => 6,'effects' => "<ul>
			<li>+10x Repair Cost</li>
			<li>+9 Water Element Alchemy Skill's Damage if Water Cannon Rank 5+</li>
			<li>+18 Water Element Alchemy Skill's Damage if Water Cannon Rank 1</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Moist"));
		Enchant::create(array('enchantsonto' => "Two-Handed Weapons",'rank' => 6,'effects' => "<ul>
			<li>+35~42 Str if Combat Mastery Rank 1</li>
			<li>-15 Dex</li>
			<li>+2x Repair Cost</li>
			<li>+20 Str if Wind Guard Rank 5+</li>
			<li>+18~22 Str if Final Hit Rank 5+</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Necromancer"));
		Enchant::create(array('enchantsonto' => "Lance",'rank' => 6,'effects' => "<ul>
			<li>+7% Critical If Lance Mastery Rank 1+</li>
			<li>+7 Max Damage If Lance Counter Rank 1+</li>
			<li>+2 Piercing Level</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Secret"));
		Enchant::create(array('enchantsonto' => "Royal Alchemist Robe",'rank' => 6,'effects' => "<ul>
			<li>+27 Water Element Alchemy Damage if using the Royal Alchemist title</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Soggy"));
		Enchant::create(array('enchantsonto' => "Melee Weapons",'rank' => 6,'effects' => "<ul>
			<li>-70 Stamina</li>
			<li>+3~6 Max Damage If Smash Rank 1</li>
			<li>+2 Min Damage If Defense Rank 9+</li>
			<li>+10% Critical</li>
			<li>+2x Repair Cost</li>
			<li>+3~6 Max Damage If Counterattack Rank 6+</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Wyllow"));
		Enchant::create(array('enchantsonto' => "Shield",'rank' => 6,'effects' => "<ul>
			<li>-500 CP</li>
			<li>+12% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Abysmal"));
		Enchant::create(array('enchantsonto' => "Accessory, Footwear, Handgear",'rank' => 6,'effects' => "<ul>
			<li>+12~6 Dex when lvl 44+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Archer"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 6,'effects' => "<ul>
			<li>-4 MP when lvl</li>
			<li>-35</li>
			<li>+10~5 Stamina when lvl 12+</li>
			<li>+3~1 Explosion Resistance if Counter Rank 8+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Burst Fighter"));
		Enchant::create(array('enchantsonto' => "Helmets",'rank' => 6,'effects' => "<ul>
			<li>+5 HP</li>
			<li>+10~20 Str if Assault Slash rank 6+</li>
			<li>+1 Defense if Defense rank 1+</li>
			<li>+1~3 Speed (Fast Attack) if Critical Hit rank 3+</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Baron"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 6,'effects' => "<ul>
			<li>+10 MP</li>
			<li>+10 Will</li>
			<li>+10 Luck</li>
			<li>+1 Defense</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Cornflower"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 6,'effects' => "<ul>
			<li>+15 HP</li>
			<li>+10 Str</li>
			<li>-15 Dex</li>
			<li>+2 Defense</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Cosmos"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 6,'effects' => "<ul>
			<li>+5 MP</li>
			<li>+5 Int</li>
			<li>+10 Dex</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Gemini"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 6,'effects' => "<ul>
			<li>-30 HP if Combat Mastery Rank 8+</li>
			<li>+15 Str when lvl 40+</li>
			<li>+5 Dex when lvl 40+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Knight"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 6,'effects' => "<ul>
			<li>+5 HP</li>
			<li>+10 Str</li>
			<li>+10 Will</li>
			<li>+1% Protection</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Leo"));
		Enchant::create(array('enchantsonto' => "Lance",'rank' => 6,'effects' => "<ul>
			<li>-25 MP</li>
			<li>+10~18 Max Damage if Lance Charge Rank 6+</li>
			<li>+16 Min Damage if Lance Mastery Rank 6+</li>
			<li>+6% Critical if Lance Counter Rank 9+</li>
			<li>+30% Repair Cost</li>
			<li>+1 Pierce Level if Lance Counter Rank 3+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Medal"));
		Enchant::create(array('enchantsonto' => "Axes and Blunts",'rank' => 6,'effects' => "<ul>
			<li>+10 Str if Carpentry rank B+</li>
			<li>-20 Int</li>
			<li>+3x Repair Cost</li>
			<li>+7~15 Str if Carpentry rank 8+</li>
			<li>+5 Str</li>
			<li>+7~15 Str if Carpentry rank 4+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Might"));
		Enchant::create(array('enchantsonto' => "Control Bar",'rank' => 6,'effects' => "<ul>
			<li>+20 Dex</li>
			<li>+15~20 Max Damage if Pierrot Marionette Rank 7+</li>
			<li>-20 Pierrot Marionette HP</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Pierrot"));
		Enchant::create(array('enchantsonto' => "Fomor Cylinders",'rank' => 6,'effects' => "<ul>
			<li>+5~27 Water Alchemy Damage if Water Cannon Rank 1</li>
			<li>+10 Water Alchemy Damage if Alchemy Mastery Rank 6+</li>
			<li>+3 Fire Alchemy Damage if Alchemy Mastery Rank 6+</li>
			<li>+1~10 Fire Alchemy Damage if Flame Burst Rank 1</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Purgatory"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 6,'effects' => "<ul>
			<li>-20 HP</li>
			<li>+40 MP</li>
			<li>+20 Int if Lightning Bolt Rank 6+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Wizard"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 6,'effects' => "<ul>
			<li>+10~15 HP</li>
			<li>+5% Critical</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Durable"));
		Enchant::create(array('enchantsonto' => "Footwear",'rank' => 6,'effects' => "<ul>
			<li>+21 Will If in the state of Respite aftermath</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Overcoming"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 7,'effects' => "<ul>
			<li>+15 HP</li>
			<li>+5 Luck</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Beautiful"));
		Enchant::create(array('enchantsonto' => "Footwear",'rank' => 7,'effects' => "<ul>
			<li>-10 Dex if Playing Instrument rank 9-</li>
			<li>+5% Balance</li>
			<li>+3~5% Critical if Composing rank 9+</li>
			<li>+2x Repair Cost</li>
			<li>+4% Critical if Musical Knowledge rank 8+</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Composer"));
		Enchant::create(array('enchantsonto' => "Melee Weapon",'rank' => 7,'effects' => "<ul>
			<li>-100 Stamina</li>
			<li>+4 Max Damage if Counter Rank 6+</li>
			<li>+2 Min Damage if Defense Rank 9+</li>
			<li>+10% Critical</li>
			<li>+4 Max Damage if Smash Rank 1</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Cypress"));
		Enchant::create(array('enchantsonto' => "Weapon",'rank' => 7,'effects' => "<ul>
			<li>+4% Critical if lvl 78+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Deadly"));
		Enchant::create(array('enchantsonto' => "Footgear",'rank' => 7,'effects' => "<ul>
			<li>+5~10% Critical If Act 9: Invigorating Encore Rank 6+</li>
			<li>+20 Marionette Max HP If Act 9: Invigorating Encore Rank B+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Dramatic"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 7,'effects' => "<ul>
			<li>+1~10 Dex</li>
			<li>+3 Max Damage</li>
			<li>-2 Min Damage</li>
			<li>+5% Critical</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Elven"));
		Enchant::create(array('enchantsonto' => "Cylinder",'rank' => 7,'effects' => "<ul>
			<li>+2 Seconds Frozen Blast Duration if Frozen Blast Rank A+</li>
			<li>+8 Degrees Frozen Blast Range</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Frozen"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 7,'effects' => "<ul>
			<li>+15 HP</li>
			<li>+5 Will</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Holy"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 7,'effects' => "<ul>
			<li>+10 Will</li>
			<li>+10 Max Damage when in Outlaw Pursuit mode</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Hunter"));
		Enchant::create(array('enchantsonto' => "Two-handed Weapons",'rank' => 7,'effects' => "<ul>
			<li>+35 Str if Combat Mastery Rank 1</li>
			<li>-30 Dex</li>
			<li>+20 Str if Final Hit 5+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Lich"));
		Enchant::create(array('enchantsonto' => "Clothing, Armor",'rank' => 7,'effects' => "<ul>
			<li>+5 Max Damage If Control Marionette Rank 3+</li>
			<li>+3~6% Critical If Control Marionette Rank 7+</li>
			<li>+6~9% Marionette Critical</li>
			<li>+5 Marionette Max Damage</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Linked"));
		Enchant::create(array('enchantsonto' => "Wands and Staves",'rank' => 7,'effects' => "<ul>
			<li>+10 Will</li>
			<li>+2~4 Decreased Mana Consumption if Thunder Rank 9+</li>
			<li>+2 Magic Attack if Ice Spear Rank 8+</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Mana Conjurer"));
		Enchant::create(array('enchantsonto' => "Bows and Crossbows",'rank' => 7,'effects' => "<ul>
			<li>-20 Str</li>
			<li>+5~7 Max Damage if Mana Shield rank B+</li>
			<li>+8% Critical if lvl 25+</li>
			<li>+4x Repair Cost</li>
			<li>+6~8 Max Damage if Ranged Attack rank 4+</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Nobility"));
		Enchant::create(array('enchantsonto' => "Life Exploration Weapons Only",'rank' => 7,'effects' => "<ul>
			<li>+8% Critical</li>
			<li>+2x Repair Cost</li>
			<li>+5% Critical when using the Master Angler title</li>
			<li>+3~6% Critical when using the Epicure title</li>
			<li>+3~6% Critical when using the Conqueror of the Wild title</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Persistent"));
		Enchant::create(array('enchantsonto' => "Phoenix Feather Sword  Mysterious Phoenix Feather Sword",'rank' => 7,'effects' => "<ul>
			<li>+10 Luck if using The Phoenix's Witness title</li>
			<li>+6~8 Max Damage</li>
			<li>+7~9% Critical</li>
			<li>+50% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Phoenix's Spark"));
		Enchant::create(array('enchantsonto' => "Mysterious Phoenix Feather Sword",'rank' => 7,'effects' => "<ul>
			<li>+10 Int if using The Phoenix's Witness title</li>
			<li>+1~4 MP Usage Reduction</li>
			<li>+1~3 Magic Attack</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Phoenix's Wisdom"));
		Enchant::create(array('enchantsonto' => "Clothing",'rank' => 7,'effects' => "<ul>
			<li>-15 Str</li>
			<li>-15 Dex</li>
			<li>+5 Defense if Defense rank 6+</li>
			<li>+1~3% Protection if Playing Instrument rank 8+</li>
			<li>+2~5 Explosion Resistance if Magic Mastery rank A+</li>
			<li>+3 Defense</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Reactive"));
		Enchant::create(array('enchantsonto' => "Heavy Armor",'rank' => 7,'effects' => "<ul>
			<li>+20 HP if lvl 10+</li>
			<li>+3% Protection if lvl 20+ (Scroll description is bugged)</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Refined"));
		Enchant::create(array('enchantsonto' => "Clothing",'rank' => 7,'effects' => "<ul>
			<li>+10~15 HP Party Healing Rank 9+</li>
			<li>+5 Max Damage</li>
			<li>+5 Min Damage</li>
			<li>+8% Critical</li>
			<li>+6~9 Critical if Healing Rank 5+</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Restored"));
		Enchant::create(array('enchantsonto' => "Clothes, Armors, Gloves, Shoes",'rank' => 7,'effects' => "<ul>
			<li>+20 HP if Way of the Gun r3+</li>
			<li>+20 MP if Way of the Gun r1+</li>
			<li>+8~15 Int if Bullet Storm r1+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Royal Guard's"));
		Enchant::create(array('enchantsonto' => "Lance",'rank' => 7,'effects' => "<ul>
			<li>+6~14 Max Damage if Lance Mastery Rank 8+</li>
			<li>+2% Critical if Lance Charge Rank 5+</li>
			<li>-2 Defense</li>
			<li>+30% Repair Cost</li>
			<li>+1 Pierce Level if Lance Charge Rank 8+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Sieged"));
		Enchant::create(array('enchantsonto' => "Clothes, Armors, Gloves, Shoes",'rank' => 7,'effects' => "<ul>
			<li>+20 HP if Bullet Slide Rank 3+</li>
			<li>+20 Stamina if Bullet Slide Rank 3+</li>
			<li>+8~15 Str if Grapple Shot Rank 1</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Spy's"));
		Enchant::create(array('enchantsonto' => "Knuckles",'rank' => 7,'effects' => "<ul>
			<li>+17~25 Max Damage if Pummel Rank 1</li>
			<li>+7 Min Damage if Pummel Rank 5+</li>
			<li>+50% Repair Cost</li>
			<li>+20 Will if Pummel Rank 9+</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Speedy"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 7,'effects' => "<ul>
			<li>+15 HP</li>
			<li>+5 Will</li>
			<li>+1 Defense</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Splendorous"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 7,'effects' => "<ul>
			<li>+8~2 Str if Giant or Giant-allied Human</li>
			<li>-3 Luck</li>
			<li>+3~1 Explosion Resistance if Smash Rank 5+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Burst Warrior"));
		Enchant::create(array('enchantsonto' => "Light Armors",'rank' => 7,'effects' => "<ul>
			<li>+20 HP</li>
			<li>+8~16 Will if Chain Mastery Rank 1+</li>
			<li>+8~12 Max Damage if Chain Mastery Rank 5+</li>
			<li>+50% Repair Cost</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Challenger"));
		Enchant::create(array('enchantsonto' => "Shield",'rank' => 7,'effects' => "<ul>
			<li>-3 Min Damage if Combat Mastery A-</li>
			<li>+10% Max Injury Rate</li>
			<li>+3 Defense if Mirage Missile Rank 9+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Composed"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 7,'effects' => "<ul>
			<li>+3 Dex if Healing Rank 8+</li>
			<li>-10 Luck if First Aid Rank D+</li>
			<li>+2 Dex if Party Healing Rank C+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Courteous"));
		Enchant::create(array('enchantsonto' => "Two-handed Weapons",'rank' => 7,'effects' => "<ul>
			<li>-40 HP</li>
			<li>+20 Str if Giant-allied</li>
			<li>+29 Max Damage if Wind Blast Rank 6+</li>
			<li>-5 Defense</li>
			<li>+1.5x Repair Cost</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Crocodile"));
		Enchant::create(array('enchantsonto' => "Fomor Two-handed Weapons",'rank' => 7,'effects' => "<ul>
			<li>+11~25 Max Damage if Evasion Rank E+</li>
			<li>-10% Balance</li>
			<li>+3~7% Critical if Rain Casting Rank D+</li>
			<li>-3% Protection</li>
			<li>+1.5x Repair Cost</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Cursed"));
		Enchant::create(array('enchantsonto' => "Light Armor, Heavy Armor",'rank' => 7,'effects' => "<ul>
			<li>-5 Will</li>
			<li>+5~15 Max Damage when lvl 30+</li>
			<li>-3 Defense</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Darkness"));
		Enchant::create(array('enchantsonto' => "Shield",'rank' => 7,'effects' => "<ul>
			<li>+5% Balance</li>
			<li>+60 Barrier Life if Barrier Spikes Rank 7+</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Ebony"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 7,'effects' => "<ul>
			<li>+50 Stamina Rare Mineralogy Rank 1</li>
			<li>+5~12 Str Rare Mineralogy Rank 5+</li>
			<li>+1~10 Luck Rare Mineralogy Rank 3+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Excavation"));
		Enchant::create(array('enchantsonto' => "Weapon",'rank' => 7,'effects' => "<ul>
			<li>-20 Stamina if Combat Mastery C+</li>
			<li>+5 Int if Firebolt Rank A+</li>
			<li>+3 Will if Firebolt Rank A+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Fire"));
		Enchant::create(array('enchantsonto' => "Basic Green Onion, Advanced Green Onion, Upgraded Green Onion, Basic Tangerine, Advanced Tangerine, Upgraded Tangerine, Basic Banana, Advanced Banana, Upgraded Banana, Burning Ice Cream, Freezing Ice Cream, Shocking Ice Cream, Electric Guitar",'rank' => 7,'effects' => "<ul>
			<li>+50 HP</li>
			<li>+50 MP</li>
			<li>+50 Stamina</li>
			<li>-25% Repair Cost</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Garden"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 7,'effects' => "<ul>
			<li>+5~10 Dex</li>
			<li>+2~3 Fast Attack</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Hummingbird"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 7,'effects' => "<ul>
			<li>+5 Str if Icebolt Rank A+</li>
			<li>-10 Dex if Smash 8+</li>
			<li>+5 Will if Icebolt Rank A+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Ice"));
		Enchant::create(array('enchantsonto' => "Weapon",'rank' => 7,'effects' => "<ul>
			<li>+20 MP if Lightning Bolt Rank A+</li>
			<li>-5 Str if Icebolt Rank C+</li>
			<li>+3 Dex if Lightning Bolt Rank A+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Lightning"));
		Enchant::create(array('enchantsonto' => "Footwear",'rank' => 7,'effects' => "<ul>
			<li>+20 MP if Icebolt Rank 8+</li>
			<li>-15 Str if Meditation Rank A+</li>
			<li>+10 Int if Meditation Rank A+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Mana"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 7,'effects' => "<ul>
			<li>+12~6 MP when lvl 20+</li>
			<li>-5 Will if lvl</li>
			<li>-24</li>
			<li>+3~1 Decreased Mana Consumption if Fireball Rank 8+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Mana Wizard"));
		Enchant::create(array('enchantsonto' => "Heavy Armor",'rank' => 7,'effects' => "<ul>
			<li>+6 Max Damage if Final Hit Rank 6+</li>
			<li>+6 Min Damage if Final Hit Rank A+</li>
			<li>+6 Defense</li>
			<li>+12% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Oak Tree"));
		Enchant::create(array('enchantsonto' => "Clothing",'rank' => 7,'effects' => "<ul>
			<li>+10 HP if Enduring Melody Rank 7+</li>
			<li>+15 MP</li>
			<li>+20 Stamina</li>
			<li>+2 Music Buff Duration if Playing Instrument Rank 7+</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Opera"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 7,'effects' => "<ul>
			<li>+8~15 Dex if Shyllien Ecology Rank 3+</li>
			<li>-20 Luck</li>
			<li>+15% Critical if Shyllien Ecology Rank 5+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Poacher"));
		Enchant::create(array('enchantsonto' => "Handgears",'rank' => 7,'effects' => "<ul>
			<li>+16 Dex if using Mana Shield</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Sahagin"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 7,'effects' => "<ul>
			<li>+10 Stamina</li>
			<li>+5 Int</li>
			<li>-10 Dex</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Snowfield's"));
		Enchant::create(array('enchantsonto' => "Heavy Armor",'rank' => 7,'effects' => "<ul>
			<li>+3 Defense when you have a Golem summoned</li>
			<li>+1% Protection when Summon Golem Rank 5+</li>
			<li>+6 Defense when Summon Golem Rank 9+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Stone"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 7,'effects' => "<ul>
			<li>+7 Str</li>
			<li>+7 Int</li>
			<li>+7 Dex</li>
			<li>+7 Will</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Storm's"));
		Enchant::create(array('enchantsonto' => "Gloves, Footwear",'rank' => 7,'effects' => "<ul>
			<li>-30 HP when lvl 30+</li>
			<li>+20 Stamina when lvl 30+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "The Dawn"));
		Enchant::create(array('enchantsonto' => "Sword of the Goddess",'rank' => 7,'effects' => "<ul>
			<li>+100 Str</li>
			<li>+100 Will</li>
			<li>+100 Luck</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Warring"));
		Enchant::create(array('enchantsonto' => "Clothing",'rank' => 7,'effects' => "<ul>
			<li>+20 Luck</li>
			<li>+5~7 Max Damage if Taming Wild Animals 9+</li>
			<li>+3 Min Damage if Taming Wild Animals C+</li>
			<li>+120% Repair Cost</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "White Horse"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 7,'effects' => "<ul>
			<li>-10 Str</li>
			<li>-20 Dex</li>
			<li>+20~12 Max Damage if using \"the Dragon Knight\" title</li>
			<li>+5% Critical</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Wyvern"));
		Enchant::create(array('enchantsonto' => "Knuckles",'rank' => 7,'effects' => "<ul>
			<li>+20 Will if Chain Mastery Rank 9+</li>
			<li>+17~25 Max Damage if Pummel Rank 1</li>
			<li>+7 Min Damage if Pummel Rank 5+</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Rapid"));
		Enchant::create(array('enchantsonto' => "Gloves",'rank' => 7,'effects' => "<ul>
			<li>+10~14 Max Damage if level 40+</li>
			<li>+6~10 Min Damage</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Twister"));
		Enchant::create(array('enchantsonto' => "Clothing",'rank' => 7,'effects' => "<ul>
			<li>+10 MP</li>
			<li>+15 Stamina</li>
			<li>+15 Will if level 25+</li>
			<li>+10~14% Critical if Shock Rank 9+</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Static"));
		Enchant::create(array('enchantsonto' => "Gloves",'rank' => 8,'effects' => "<ul>
			<li>+15~20 MP if Party Healing rank B+</li>
			<li>+20 Int</li>
			<li>-15 Will</li>
			<li>+10 Luck</li>
			<li>+3x Repair Cost</li>
			<li>+15~20 MP if Party Healing rank B+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Abundant"));
		Enchant::create(array('enchantsonto' => "Shield",'rank' => 8,'effects' => "<ul>
			<li>-20 HP</li>
			<li>-20 Stamina</li>
			<li>+5% Balance when lvl 6+</li>
			<li>+5% Critical when lvl 18+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Adamant"));
		Enchant::create(array('enchantsonto' => "Crossbows",'rank' => 8,'effects' => "<ul>
			<li>-20 Will</li>
			<li>+10 Max Damage if Arrow Revolver Rank 6+</li>
			<li>+4 Min Damage if Arrow Revolver Rank 9+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Arrow of Death"));
		Enchant::create(array('enchantsonto' => "Clothes",'rank' => 8,'effects' => "<ul>
			<li>+10 MP if lvl</li>
			<li>-20</li>
			<li>+4 Int if lvl 10+</li>
			<li>-30 MP if lvl 30+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Chaotic"));
		Enchant::create(array('enchantsonto' => "Handgear",'rank' => 8,'effects' => "<ul>
			<li>+6 Max Damage if Enthralling Performance Rank B+</li>
			<li>+8% Critical if Enthralling Performance Rank 6+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Classic"));
		Enchant::create(array('enchantsonto' => "Helmets",'rank' => 8,'effects' => "<ul>
			<li>+7 Max Damage if Frozen Blast Rank 8+</li>
			<li>+3 Min Damage if Frozen Blast Rank B+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Cold"));
		Enchant::create(array('enchantsonto' => "Helmets",'rank' => 8,'effects' => "<ul>
			<li>+12 MP when lvl 30+</li>
			<li>+16 Int if Healing Rank 9+</li>
			<li>-8% Balance when lvl 15+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Curing"));
		Enchant::create(array('enchantsonto' => "Two-Handed Weapons",'rank' => 8,'effects' => "<ul>
			<li>-100 HP</li>
			<li>+20 Max Damage when lvl 30+</li>
			<li>+10 Min Damage when lvl</li>
			<li>-40</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Demi Lich"));
		Enchant::create(array('enchantsonto' => "Footwear",'rank' => 8,'effects' => "<ul>
			<li>+5x Repair Cost</li>
			<li>+2% Fragmentation success rate if Mana Crystallization rank C+</li>
			<li>+2% Crystal-making success rate</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Division"));
		Enchant::create(array('enchantsonto' => "Bows and Crossbows",'rank' => 8,'effects' => "<ul>
			<li>-20 Str</li>
			<li>+5 Max Damage if Mana Shield Rank A+</li>
			<li>+8% Critical if level 25+</li>
			<li>+3x Repair Cost</li>
			<li>+6 Max Damage if Ranged Attack Rank 3+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Glorious"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 8,'effects' => "<ul>
			<li>+10~8 Max Damage while lvl 70+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Golem Hunter's"));
		Enchant::create(array('enchantsonto' => "Graceful Plate Armor Set",'rank' => 8,'effects' => "<ul>
			<li>-10 Will</li>
			<li>+3 Max Damage if Counter Rank 6+</li>
			<li>+3 Min Damage if Counter Rank 9+</li>
			<li>+6% Balance</li>
			<li>+3 Max Damage if Counter Rank 3+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Grace"));
		Enchant::create(array('enchantsonto' => "Light Armor",'rank' => 8,'effects' => "<ul>
			<li>+10 Max Damage if Bow Mastery rank 3+</li>
			<li>+9% Critical if Crossbow Mastery rank 3+</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Innocent"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 8,'effects' => "<ul>
			<li>-10 Luck</li>
			<li>+4 Max Damage if First Aid Rank D+</li>
			<li>+4 Max Damage if First Aid Rank B+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Land's"));
		Enchant::create(array('enchantsonto' => "Light Armor",'rank' => 8,'effects' => "<ul>
			<li>+15 HP if lvl 10+</li>
			<li>-10 MP</li>
			<li>+10 Str if lvl 10+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Lovely"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 8,'effects' => "<ul>
			<li>-20 HP if lvl 30+</li>
			<li>+3 Dex</li>
			<li>+15 Luck if lvl 35+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Lucky"));
		Enchant::create(array('enchantsonto' => "Shoes",'rank' => 8,'effects' => "<ul>
			<li>+8 HP</li>
			<li>+2~3 MP Cost Reduction if Meditation Rank 9+</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Mana Sorcerer"));
		Enchant::create(array('enchantsonto' => "Shields",'rank' => 8,'effects' => "<ul>
			<li>+5 Max Damage</li>
			<li>+5 Magic Defense if Mana Shield Rank 8+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Mana Stone"));
		Enchant::create(array('enchantsonto' => "Light Armor",'rank' => 8,'effects' => "<ul>
			<li>+5 Int</li>
			<li>+5 Will</li>
			<li>+5 Luck</li>
			<li>+4 Defense if Defense Rank 5+</li>
			<li>+5% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Mint"));
		Enchant::create(array('enchantsonto' => "Metal Boots",'rank' => 8,'effects' => "<ul>
			<li>-10 Dex if Playing Instrument Rank 9-</li>
			<li>+4% Critical if Musical Knowledge Rank 6+</li>
			<li>+3% Critical if Composing Rank 9+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Musician's"));
		Enchant::create(array('enchantsonto' => "Footwear",'rank' => 8,'effects' => "<ul>
			<li>+6 HP</li>
			<li>+6 Stamina</li>
			<li>+5~10 Dex</li>
			<li>+5~10% Critical when lvl 45+</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Oasis"));
		Enchant::create(array('enchantsonto' => "Fomor Melee Weapons",'rank' => 8,'effects' => "<ul>
			<li>+2~5 Max Damage if Heat Buster Rank E+</li>
			<li>+3 Min Damage if Blaze Rank E+</li>
			<li>+3~9% Critical if Flame Burst Rank E+</li>
			<li>-3 Defense if Healing Rank D+</li>
			<li>-2% Protection if Party Healing Rank 5+</li>
			<li>+4 Max Damage if Campfire Rank A+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Pyromaniac"));
		Enchant::create(array('enchantsonto' => "Clothes and Armor",'rank' => 8,'effects' => "<ul>
			<li>+10 Max Damage if Level 16+</li>
			<li>+5% Stamina Reduction if Alchemy Mastery Rank 6+</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Relax"));
		Enchant::create(array('enchantsonto' => "Handgear",'rank' => 8,'effects' => "<ul>
			<li>+6 Max Damage if Act 1: Inciting Incident Rank D+</li>
			<li>+6 Marionette Control Critical if Act 2: Threshold Cutter Rank 6+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Repetitive"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 8,'effects' => "<ul>
			<li>+6 Max Damage if using \"the One Who Discovered the Maiz Prairie Ruins\"</li>
			<li>+6 Min Damage if using \"the One Who Discovered the Maiz Prairie Ruins\"</li>
			<li>+5% Balance</li>
			<li>-5% Critical</li>
			<li>+10% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Secretive"));
		Enchant::create(array('enchantsonto' => "Gloves(glitched in game)",'rank' => 8,'effects' => "<ul>
			<li>-100 CP</li>
			<li>+2x Repair Cost</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Small"));
		Enchant::create(array('enchantsonto' => "Bows and Crossbows",'rank' => 8,'effects' => "<ul>
			<li>-20 Luck</li>
			<li>+4 Max Damage if Magnum Shot Rank 6+</li>
			<li>+4 Min Damage if Windmill Rank 6+</li>
			<li>+10% Critical if level 30+</li>
			<li>+12% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Snowfall"));
		Enchant::create(array('enchantsonto' => "Shield",'rank' => 8,'effects' => "<ul>
			<li>+6% Critical</li>
			<li>+6 Water Alchemy Damage if Rain Casting Rank B+</li>
			<li>+3 Fire Alchemy Damage if Mana Crystallization Rank B+</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Steam"));
		Enchant::create(array('enchantsonto' => "Gauntlets(Excludes Wooden Gauntlets)",'rank' => 8,'effects' => "<ul>
			<li>+5 Max Damage If Combat Mastery Rank 7+</li>
			<li>+1~4% Critical If Critical Hit Rank 9+</li>
			<li>+100% Repair Cost</li>
			<li>+5 Critical</li>
			<li>+7~11 Max Damage If Combat Mastery Rank 4+</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Steel Needle"));
		Enchant::create(array('enchantsonto' => "Bows and Crossbows",'rank' => 8,'effects' => "<ul>
			<li>-40 HP</li>
			<li>+10 Dex when Mirage Missile Rank 7+</li>
			<li>+20 Dex when Final Shot Rank 5+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Swift"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 8,'effects' => "<ul>
			<li>-100 CP</li>
			<li>+2x Repair Cost</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Thin"));
		Enchant::create(array('enchantsonto' => "Two-handed Axes",'rank' => 8,'effects' => "<ul>
			<li>+30 Str when Wind Guard Rank 5+</li>
			<li>-50 Int</li>
			<li>+25 STR when Taunt Rank 9+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Titanic"));
		Enchant::create(array('enchantsonto' => "Footgear",'rank' => 8,'effects' => "<ul>
			<li>+10 Str if Act 7: Climactic Crash is Rank 4+</li>
			<li>+5~10 Marionette Max Damage if Act 4: Rising Action is Rank 8+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Tragedy"));
		Enchant::create(array('enchantsonto' => "Shield",'rank' => 8,'effects' => "<ul>
			<li>+4 Max Damage if Exploration lvl 5+</li>
			<li>+4 Min Damage if Exploration lvl 1+</li>
			<li>+10% Critical if using \"the One Who Discovered Karu Forest Ruins\"</li>
			<li>-5 Defense</li>
			<li>+5% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Unfamiliar"));
		Enchant::create(array('enchantsonto' => "Footwear",'rank' => 8,'effects' => "<ul>
			<li>-100 CP</li>
			<li>+2x Repair Cost</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Vicious"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 8,'effects' => "<ul>
			<li>+12 HP</li>
			<li>+2 Max Damage</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Well-groomed"));
		Enchant::create(array('enchantsonto' => "Wooden Equipment and Weapons[2]",'rank' => 8,'effects' => "<ul>
			<li>-16 Dex</li>
			<li>+8 Max Damage if Combat Mastery Rank 5+</li>
			<li>+6% Critical</li>
			<li>+4 Max Damage if Combat Mastery Rank 8+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Wooden Needle"));
		Enchant::create(array('enchantsonto' => "Shields",'rank' => 8,'effects' => "<ul>
			<li>-15 Stamina</li>
			<li>+20 Str if Spirit of Order Rank A+</li>
			<li>-10 Dex</li>
			<li>+80% Repair Cost</li>
			<li>+15</li>
			<li>-25 Str if Daemon of Physis Rank A+</li>
			<li>+15</li>
			<li>-25 Str if Soul of Chaos Rank A+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Alteration"));
		Enchant::create(array('enchantsonto' => "Glove",'rank' => 8,'effects' => "<ul>
			<li>+15 HP when Combat Mastery 3+</li>
			<li>+3% Critical when Critical Hit 3+</li>
			<li>+1 Defense when Defense 3+</li>
			<li>+5x Repair Cost</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Amplified"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 8,'effects' => "<ul>
			<li>+10 HP</li>
			<li>+5 Str</li>
			<li>+2% Protection</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Aries"));
		Enchant::create(array('enchantsonto' => "Dual Guns",'rank' => 8,'effects' => "<ul>
			<li>+15% Balance if Reload Rank 5+</li>
			<li>+10~15% Critical if Shooting Rush Rank 7+</li>
			<li>+8 Fast Attack</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Automatic"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 8,'effects' => "<ul>
			<li>+5 HP</li>
			<li>+15 MP</li>
			<li>-5 Str</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Blizzard's"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 8,'effects' => "<ul>
			<li>-10 HP when lvl 10+</li>
			<li>-10 MP when lvl 15+</li>
			<li>-10 Stamina when lvl 20+</li>
			<li>-22% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Camellia Tree"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 8,'effects' => "<ul>
			<li>+10 Stamina</li>
			<li>+5 Dex</li>
			<li>+1 Defense</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Cancer"));
		Enchant::create(array('enchantsonto' => "Heavy Armor",'rank' => 8,'effects' => "<ul>
			<li>+10 Str when lvl 20+</li>
			<li>+5 Will</li>
			<li>+3 Defense when lvl 20+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Captain"));
		Enchant::create(array('enchantsonto' => "Life Exploration Cooking Knife",'rank' => 8,'effects' => "<ul>
			<li>+10 Max Damage</li>
			<li>+5 Min Damage</li>
			<li>+2x Repair Cost</li>
			<li>+2~10 Max Damage when using the Epicure title</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Chef"));
		Enchant::create(array('enchantsonto' => "Instruments",'rank' => 8,'effects' => "<ul>
			<li>+20 Stamina</li>
			<li>+10 Max Damage if Dischord Rank 7+</li>
			<li>+1 Music Buff Effect if Playing Instrument Rank 7+</li>
			<li>+5 Max Damage</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Chord"));
		Enchant::create(array('enchantsonto' => "Shields",'rank' => 8,'effects' => "<ul>
			<li>+12~8 MP if Natural Shield C+</li>
			<li>-6 Stamina</li>
			<li>+8~6 Int</li>
			<li>-10 Will</li>
			<li>+2% Protection if Natural Shield C+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Colonel"));
		Enchant::create(array('enchantsonto' => "Weapon",'rank' => 8,'effects' => "<ul>
			<li>+10 HP if Counter Rank 9+</li>
			<li>+3% Critical if Counter Rank 9+</li>
			<li>-4 Defense if Defense Rank C+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Counter"));
		Enchant::create(array('enchantsonto' => "Spika Silver Plate Armor, Boots, Gloves",'rank' => 8,'effects' => "<ul>
			<li>+50 HP when Age <17</li>
			<li>+10 Str when Age <17[3]</li>
			<li>-20 Dex</li>
			<li>-20 Will</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Dark Cross"));
		Enchant::create(array('enchantsonto' => "Clothes",'rank' => 8,'effects' => "<ul>
			<li>-10 HP</li>
			<li>+10 Stamina if Weaving Rank B+</li>
			<li>+3 Dex if Weaving Rank C+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Embroidered"));
		Enchant::create(array('enchantsonto' => "Headgear, Armor, Clothes",'rank' => 8,'effects' => "<ul>
			<li>+16~12 Stamina when lvl 38+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Energy"));
		Enchant::create(array('enchantsonto' => "Clothes, Armors (in-game typo says enchant enabled for Headgears)",'rank' => 8,'effects' => "<ul>
			<li>-2 Str</li>
			<li>+3 Int if Meditation Rank D+</li>
			<li>+3 Dex if Meditation Rank C+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Falcon"));
		Enchant::create(array('enchantsonto' => "Shoes (Greaves excluded)",'rank' => 8,'effects' => "<ul>
			<li>+10 HP if Combat Mastery Rank 9+</li>
			<li>+10 MP if Meditation Rank 7+</li>
			<li>+10 Stamina if Production Mastery Rank 9+</li>
			<li>+10 MP if Enchant Rank A+</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Flow"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 8,'effects' => "<ul>
			<li>+3% Fragmentation Success Rate</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Fragmentation"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 8,'effects' => "<ul>
			<li>+5 MP</li>
			<li>+10 Int</li>
			<li>+5 Luck</li>
			<li>+1 Defense</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Frost's"));
		Enchant::create(array('enchantsonto' => "Shields",'rank' => 8,'effects' => "<ul>
			<li>+10~16 HP</li>
			<li>-5 Int</li>
			<li>+2~5% Critical if Counter Attack 6+</li>
			<li>+1% Protection</li>
			<li>+2x Repair Cost</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "General"));
		Enchant::create(array('enchantsonto' => "Helmets",'rank' => 8,'effects' => "<ul>
			<li>+7~3 Max Damage if using the Gladiator title</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Gladiator"));
		Enchant::create(array('enchantsonto' => "Shoes",'rank' => 8,'effects' => "<ul>
			<li>+15 MP if Magic Mastery Rank 6+</li>
			<li>+6 Max Damage if Ranged Attack Rank 3+</li>
			<li>+6 Min Damage if Combat Mastery Rank 3+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Hard Peaca"));
		Enchant::create(array('enchantsonto' => "Knuckles",'rank' => 8,'effects' => "<ul>
			<li>+12~20 Will</li>
			<li>+13~20 Max Damage if Spinning Uppercut Rank 3+</li>
			<li>+10% Critical if Charging Strike Rank 5+</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Heavy Punch"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 8,'effects' => "<ul>
			<li>+15 Stamina</li>
			<li>-5 Dex</li>
			<li>+5 Will</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Hurricane's"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 8,'effects' => "<ul>
			<li>+10 Int</li>
			<li>+5 Luck</li>
			<li>+2% Protection</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Hyacinth"));
		Enchant::create(array('enchantsonto' => "Metal Footwear",'rank' => 8,'effects' => "<ul>
			<li>-5 Str if lvl 9+</li>
			<li>-100 CP</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Inconvenient"));
		Enchant::create(array('enchantsonto' => "Handgear, Footgear",'rank' => 8,'effects' => "<ul>
			<li>+10~5 Int when lvl 31+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Knowledge"));
		Enchant::create(array('enchantsonto' => "Headgear, Armor, Clothes",'rank' => 8,'effects' => "<ul>
			<li>+12~16 HP when lvl 29+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Life"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 8,'effects' => "<ul>
			<li>+5~2 Int if Elf or Elf-Allied Human</li>
			<li>-3 Dex</li>
			<li>+3~1 Mana Consumption Reduction if Ice Spear Rank A+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Mana Witch"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 8,'effects' => "<ul>
			<li>+5 HP</li>
			<li>+5 MP</li>
			<li>+5 Stamina</li>
			<li>+10 Int</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Marguerite"));
		Enchant::create(array('enchantsonto' => "Footwear",'rank' => 8,'effects' => "<ul>
			<li>+1% Synthesis success rate if Metal Conversion Rank B+</li>
			<li>+2% Crystal Making success rate if Metal Conversion Rank 9+</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Mix"));
		Enchant::create(array('enchantsonto' => "Metal Weapons and Armor",'rank' => 8,'effects' => "<ul>
			<li>+3 Str if Defense Rank C+</li>
			<li>-4 Dex</li>
			<li>+1 Defense if Giant or Giant-Allied</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Muscular"));
		Enchant::create(array('enchantsonto' => "Weapon",'rank' => 8,'effects' => "<ul>
			<li>+15 HP if lvl 35+</li>
			<li>-10 MP if Meditation Rank B+</li>
			<li>+5 Int if Meditation Rank B+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Nature"));
		Enchant::create(array('enchantsonto' => "Gauntlets",'rank' => 8,'effects' => "<ul>
			<li>+10 HP if Fishing Rank 5+</li>
			<li>-15 Stamina</li>
			<li>+15 Str if Handicraft Rank 9+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Peaceful"));
		Enchant::create(array('enchantsonto' => "Phoenix Feather Sword, Mysterious Phoenix Feather Sword",'rank' => 8,'effects' => "<ul>
			<li>+4~6 Int</li>
			<li>+1~4 Mana Usage Reduction when using The Phoenix's Witness title</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Phoenix's Insight"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 8,'effects' => "<ul>
			<li>-3 Str when lvl 24+</li>
			<li>+4~1 Dex when lvl</li>
			<li>-42</li>
			<li>+3~1 Poison Resistance if Ranged Attack 4+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Poison Ranger"));
		Enchant::create(array('enchantsonto' => "Weapon",'rank' => 8,'effects' => "<ul>
			<li>+8 MP</li>
			<li>-15 Stamina when lvl 15+</li>
			<li>+11 Int if Enchant Rank A+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Prophetic"));
		Enchant::create(array('enchantsonto' => "Footgear",'rank' => 8,'effects' => "<ul>
			<li>+10 Dex if Act 1: Inciting Incident Rank 3+</li>
			<li>+3~7% Marionette Critical Rate</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Prop"));
		Enchant::create(array('enchantsonto' => "Weapon",'rank' => 8,'effects' => "<ul>
			<li>+18 Str If Body of Chaos Rank 4+</li>
			<li>+26 Int If Mind of Chaos Rank A+</li>
			<li>+12 Dex If Hands of Chaos Rank 7+</li>
			<li>+23 Will</li>
			<li>+20% Critical If wearing Infra Black title</li>
			<li>+5x Repair Cost</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Raging"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 8,'effects' => "<ul>
			<li>+20 HP if Healing Rank 9+</li>
			<li>-10 Stamina</li>
			<li>+5 Int if Healing Rank 7+</li>
			<li>+5 Will if Healing Rank 5+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Restoring"));
		Enchant::create(array('enchantsonto' => "Two-Handed Weapons",'rank' => 8,'effects' => "<ul>
			<li>-20 Dex if Ranged Attack Rank 9+</li>
			<li>+22 Max Damage if Combat Mastery 7+</li>
			<li>+16 Min Damage if Combat Mastery B+</li>
			<li>+5% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Rough"));
		Enchant::create(array('enchantsonto' => "Handgear, Shoes, Accessories",'rank' => 8,'effects' => "<ul>
			<li>+7~9 Luck if level 72+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Satisfaction"));
		Enchant::create(array('enchantsonto' => "Life Exploration Fishing Rod",'rank' => 8,'effects' => "<ul>
			<li>+5 Luck</li>
			<li>+23 Max Damage</li>
			<li>+2x Repair Cost</li>
			<li>+2~12 Max Damage when using the Master Angler title</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Scent of the Sea"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 8,'effects' => "<ul>
			<li>+5 Stamina</li>
			<li>+10 Luck</li>
			<li>+1% Protection</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Sleet's"));
		Enchant::create(array('enchantsonto' => "Weapon",'rank' => 8,'effects' => "<ul>
			<li>+3 Str if Smash Rank A+</li>
			<li>-8~5 Max Damage if Critical Rank C+</li>
			<li>+5% Balance if Smash Rank A+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Smash"));
		Enchant::create(array('enchantsonto' => "Bows and Crossbows",'rank' => 8,'effects' => "<ul>
			<li>-10 Int</li>
			<li>+4 Max Damage</li>
			<li>+7x Repair Cost</li>
			<li>+4~8 Max Damage if Ranged Attack rank 8+</li>
			<li>+4~8 Max Damage if Ranged Attack rank B+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Sniping"));
		Enchant::create(array('enchantsonto' => "Life Exploration Taming Cane",'rank' => 8,'effects' => "<ul>
			<li>+20 MP</li>
			<li>+5 Will</li>
			<li>+2x Repair Cost</li>
			<li>+2~4 Magic Attack when using the Conqueror of the Wild title</li>
			<li>+2 Magic Attack</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Tempting"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 8,'effects' => "<ul>
			<li>+8 Str</li>
			<li>+8 Dex</li>
			<li>+5 Marionette Max Damage</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Theatrical"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 8,'effects' => "<ul>
			<li>+10 HP</li>
			<li>+5 Stamina</li>
			<li>+2 Max Damage</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Thunder's"));
		Enchant::create(array('enchantsonto' => "Metal Helmets",'rank' => 8,'effects' => "<ul>
			<li>-5 Will if lvl 9+</li>
			<li>-100 CP</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Uncomfortable"));
		Enchant::create(array('enchantsonto' => "Footgear, Armor, Clothes",'rank' => 8,'effects' => "<ul>
			<li>+10~5 Str when lvl 35+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Warrior"));
		Enchant::create(array('enchantsonto' => "Headgear, Armor, Clothes",'rank' => 8,'effects' => "<ul>
			<li>+16~12 MP when lvl 28+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Waterfall"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 8,'effects' => "<ul>
			<li>-6 Str</li>
			<li>+4 Dex if Weaving Rank 9+</li>
			<li>+2 Dex if Weaving Rank C+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Weaving"));
		Enchant::create(array('enchantsonto' => "Weapon",'rank' => 8,'effects' => "<ul>
			<li>+10 Stamina if Windmill Rank A+</li>
			<li>+3 Str if Windmill Rank A+</li>
			<li>-5% Protection if Defense Rank C+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Windmill"));
		Enchant::create(array('enchantsonto' => "Dual Guns",'rank' => 9,'effects' => "<ul>
			<li>+5~10 Max Damage if Grapple Shot Rank 5+</li>
			<li>+2~5 Min Damage if Dual Gun Mastery Rank 7+</li>
			<li>+10% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Apprentice's"));
		Enchant::create(array('enchantsonto' => "Royal Alchemist Boots",'rank' => 9,'effects' => "<ul>
			<li>+8 Fire Alchemy damage when using the Royal Alchemist title</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Baking"));
		Enchant::create(array('enchantsonto' => "Metal Equipment",'rank' => 9,'effects' => "<ul>
			<li>+1 Defense if Life Drain Rank 9+</li>
			<li>+1% Protection if Wind Blast Rank 5+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Burgundy Bear"));
		Enchant::create(array('enchantsonto' => "Shields",'rank' => 9,'effects' => "<ul>
			<li>-30 HP</li>
			<li>-30 Stamina</li>
			<li>+4 Max Damage if Defense Rank C+</li>
			<li>+4 Min Damage if Defense Rank 7+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Careful"));
		Enchant::create(array('enchantsonto' => "Control Bar",'rank' => 9,'effects' => "<ul>
			<li>-50 HP</li>
			<li>+20 Marionette Max Damage if Act 7: Climactic Crash Rank 9+</li>
			<li>+10 Marionette Min Damage</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Carved"));
		Enchant::create(array('enchantsonto' => "Heavy Armor",'rank' => 9,'effects' => "<ul>
			<li>+20 HP With the Champion title</li>
			<li>+6 Max Damage with the Defense skill at Dan 2 or higher</li>
			<li>+6% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Defense Junior"));
		Enchant::create(array('enchantsonto' => "Heavy Armor",'rank' => 9,'effects' => "<ul>
			<li>+7 Str</li>
			<li>+4 Dex</li>
			<li>+4 Defense</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Defensive"));
		Enchant::create(array('enchantsonto' => "Footwear",'rank' => 9,'effects' => "<ul>
			<li>+2 % Crystal-making success rate if Alchemy Mastery D+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Difficult"));
		Enchant::create(array('enchantsonto' => "Light Armors",'rank' => 9,'effects' => "<ul>
			<li>+20 Stamina</li>
			<li>+8~15 Will if Somersault Kick Rank 5+</li>
			<li>+8~10 Max Damage if Drop Kick Rank 3+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Duelist"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 9,'effects' => "<ul>
			<li>+30 Stamina if Hillwen Engineering Rank 3+</li>
			<li>+3</li>
			<li>-10 Str if Hillwen Engineering Rank 9+</li>
			<li>+5</li>
			<li>-12 Dex if Hillwen Engineering Rank 5+</li>
			<li>-50% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Engineer's"));
		Enchant::create(array('enchantsonto' => "Electric Guitar",'rank' => 9,'effects' => "<ul>
			<li>+3 Mana Reduction when Kaito title is equipped</li>
			<li>+3 Mana Reduction when Kagamine Len title is equipped</li>
			<li>+3 Mana Reduction when Kagamine Rin title is equipped</li>
			<li>+3 Mana Reduction when Hatsune Miku title is equipped</li>
			<li>+3 Music Buff Effect</li>
			<li>+3 Music Buff Duration</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Exciting"));
		Enchant::create(array('enchantsonto' => "Gauntlets",'rank' => 9,'effects' => "<ul>
			<li>+10 Will</li>
			<li>+10 Max Damage</li>
			<li>+5% Critical</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Expansive"));
		Enchant::create(array('enchantsonto' => "Light Armor",'rank' => 9,'effects' => "<ul>
			<li>+5 Str</li>
			<li>+5 Dex</li>
			<li>+2 Defense</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Expensive-Looking"));
		Enchant::create(array('enchantsonto' => "Clothing and Armor",'rank' => 9,'effects' => "<ul>
			<li>-10 Will if level 30+</li>
			<li>+7 Max Damage</li>
			<li>+4 Min Damage</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Extraordinary"));
		Enchant::create(array('enchantsonto' => "Heavy Boots",'rank' => 9,'effects' => "<ul>
			<li>-15 Dex</li>
			<li>+5 Max Damage if Charge Rank B+</li>
			<li>+2% Critical if Charge Rank 6+</li>
			<li>+1~4 Max Damage if Charge Rank 8+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Fleet"));
		Enchant::create(array('enchantsonto' => "Footwear",'rank' => 9,'effects' => "<ul>
			<li>+3 Max Damage if Rest Rank B+</li>
			<li>-5 Min Damage if Fishing Rank A-</li>
			<li>+3 Max Damage if Campfire Rank B+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Free"));
		Enchant::create(array('enchantsonto' => "One-Handed Axes",'rank' => 9,'effects' => "<ul>
			<li>-20 Dex if level 30+</li>
			<li>+10 Max Damage</li>
			<li>+10% Critical</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Frenzy"));
		Enchant::create(array('enchantsonto' => "Shoes (excluding greaves)",'rank' => 9,'effects' => "<ul>
			<li>+4 Max Damage if Ice Shield Rank A+</li>
			<li>+4% Critical if Fire Shield Rank B+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Glowing"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 9,'effects' => "<ul>
			<li>+6% Critical</li>
			<li>+100% Repair Cost</li>
			<li>+6 Marionette Critical</li>
			<li>+4 Marionette Magic Defense</li>
			<li>-20 Marionette Max HP</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Grotesque"));
		Enchant::create(array('enchantsonto' => "Shields",'rank' => 9,'effects' => "<ul>
			<li>+5 Stamina</li>
			<li>+10 Str</li>
			<li>+1~2 Explosion Resistance</li>
			<li>+1~2 Stomp Resistance</li>
			<li>+2 Poison Immunity</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Guard"));
		Enchant::create(array('enchantsonto' => "Shields",'rank' => 9,'effects' => "<ul>
			<li>+10~6 HP</li>
			<li>-20 Int</li>
			<li>+6~4 Will</li>
			<li>-4 Luck</li>
			<li>+4 Defense if Defense Rank 8+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Guardian"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 9,'effects' => "<ul>
			<li>+3 Stamina when lv 15+</li>
			<li>-11 Str when lvl 20+</li>
			<li>+12 Int if Icebolt Rank 9+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Honorable"));
		Enchant::create(array('enchantsonto' => "Footwear",'rank' => 9,'effects' => "<ul>
			<li>+8 Fire-based Alchemy Damage if Flame Burst Rank 9+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Hot"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 9,'effects' => "<ul>
			<li>-20 Luck</li>
			<li>+12 Max Damage if using \"the Master of Defense\" title</li>
			<li>+6 Min Damage if Defense Rank 1</li>
			<li>+5% Balance</li>
			<li>+10% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Incubus"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 9,'effects' => "<ul>
			<li>+15 Str</li>
			<li>+10 Luck</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Dependable"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 9,'effects' => "<ul>
			<li>+20 MP</li>
			<li>+10 Luck</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Intelligent"));
		Enchant::create(array('enchantsonto' => "Helmets",'rank' => 9,'effects' => "<ul>
			<li>+2 Max Damage when lvl</li>
			<li>-15</li>
			<li>+10% Critical if using \"the Lazy\" title</li>
			<li>+2 Max Damage if Exploration lvl</li>
			<li>-10</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Lazy"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 9,'effects' => "<ul>
			<li>+15 Dex</li>
			<li>+10 Luck</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Light"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 9,'effects' => "<ul>
			<li>+50 MP When Magic Craft is Rank 3 or higher</li>
			<li>+3</li>
			<li>-8 Int When Magic Craft is Rank 9 or higher</li>
			<li>+1</li>
			<li>-10 Luck When Magic Craft is Rank 4 or higher</li>
			<li>-30% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Magical"));
		Enchant::create(array('enchantsonto' => "Wands",'rank' => 9,'effects' => "<ul>
			<li>+10 Max Damage if using \"the Elemental Master\"</li>
			<li>+5% Critical if using \"the Elemental Apprentice\"</li>
			<li>-15% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Magical"));
		Enchant::create(array('enchantsonto' => "Handgear",'rank' => 9,'effects' => "<ul>
			<li>+2% Crystal-making success rate if Summon Golem is rank D+</li>
			<li>+1% Crystal-making success rate if Barrier Spikes is rank D+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Maker"));
		Enchant::create(array('enchantsonto' => "Wands and Staves",'rank' => 9,'effects' => "<ul>
			<li>+5% Balance</li>
			<li>+2 Magic Attack if Magic Mastery Rank A+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Mana Needle"));
		Enchant::create(array('enchantsonto' => "Wands",'rank' => 9,'effects' => "<ul>
			<li>-5 HP</li>
			<li>-5 Stamina</li>
			<li>+10% Balance if Meditation Rank B+</li>
			<li>+10% Critical if Meditation Rank D+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Maritime"));
		Enchant::create(array('enchantsonto' => "Bows and Crossbows",'rank' => 9,'effects' => "<ul>
			<li>+10 Luck</li>
			<li>+8 Max Damage if using \"the Discoverer of Longa Desert Ruins\" title</li>
			<li>+4 Min Damage if using \"the Discoverer of Longa Desert Ruins\" title</li>
			<li>-4 Defense if using \"the Discoverer of Longa Desert Ruins\" title</li>
			<li>-10% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Mirage"));
		Enchant::create(array('enchantsonto' => "Knuckles",'rank' => 9,'effects' => "<ul>
			<li>+6 Max Damage if Stomp Rank 9+</li>
			<li>+5% Critical if Stomp Rank 3+</li>
			<li>+6 Max Damage if Stomp Rank 6+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Noble"));
		Enchant::create(array('enchantsonto' => "Norman Warrior Armor and Helmet",'rank' => 9,'effects' => "<ul>
			<li>+6 Stamina if Charge Rank B+</li>
			<li>+6 Str if Charge Rank 8+</li>
			<li>-12 Dex</li>
			<li>+8% Critical</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Norman"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 9,'effects' => "<ul>
			<li>+5 Luck</li>
			<li>+5~9 Max Damage if lvl 20+</li>
			<li>+6 Marionette Max Damage</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Nostalgic"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 9,'effects' => "<ul>
			<li>+8 HP</li>
			<li>-15 Luck</li>
			<li>+10 Max Damage if lvl 20+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Oblivion"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 9,'effects' => "<ul>
			<li>+12 Str if level 25+</li>
			<li>+3% Critical if level 25+</li>
			<li>-3 Defense</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Pain"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 9,'effects' => "<ul>
			<li>+7 HP</li>
			<li>+5 Dex</li>
			<li>-5 Will</li>
			<li>+15 Luck</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Posh"));
		Enchant::create(array('enchantsonto' => "Fomor Bows and Crossbows",'rank' => 9,'effects' => "<ul>
			<li>+3~6 Max Damage if Evasion Rank D+</li>
			<li>+5% Critical if below Age 16</li>
			<li>-4 Defense</li>
			<li>+2x Repair Cost</li>
			<li>+3~6 Max Damage if Windmill Rank 9+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Reckless"));
		Enchant::create(array('enchantsonto' => "Basic Tangerine, Advanced Tangerine, Upgraded Tangerine",'rank' => 9,'effects' => "<ul>
			<li>+15~5 Stamina</li>
			<li>+15~5 Max Damage</li>
			<li>+7 Max Damage when Kagamine Rin Title is equipped</li>
			<li>+8% Critical when Kagamine Rin Title is equipped</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Refreshing (Prefix)"));
		Enchant::create(array('enchantsonto' => "Metal Weapons and Armor",'rank' => 9,'effects' => "<ul>
			<li>-20 Dex</li>
			<li>+6 Max Damage if Eye of Order Rank B+</li>
			<li>+2 Min Damage if Spirit of Order Rank B+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Silver Fox"));
		Enchant::create(array('enchantsonto' => "Basic Banana, Advanced Banana, Upgraded Banana",'rank' => 9,'effects' => "<ul>
			<li>+7 Dex</li>
			<li>+7 Max Damage when Kagamine Len Title is equipped</li>
			<li>+15~5% Critical</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Smooth"));
		Enchant::create(array('enchantsonto' => "Clothing & Armor",'rank' => 9,'effects' => "<ul>
			<li>+8 Max Damage</li>
			<li>+5 Min Damage</li>
			<li>+4% Critical if Fusion Bolt Rank 6+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Special"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 9,'effects' => "<ul>
			<li>-10 Dex if Lightning Bolt Rank A+</li>
			<li>+10% Max Injury Rate if Smash Rank 9+</li>
			<li>+10% Critical</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Stiff"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 9,'effects' => "<ul>
			<li>+9% Max Injury Rate if Windmill Rank 9+</li>
			<li>-3% Critical</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Strange"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 9,'effects' => "<ul>
			<li>+20 Str if Champion</li>
			<li>+20 Dex if Champion</li>
			<li>+3 Max Damage if Eye of Order Rank 9+</li>
			<li>+6 Min Damage if Power of Order Rank 6+</li>
			<li>+5x Repair Cost</li>
			<li>+3 Max Damage if Sword of Order Rank C+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Stunning"));
		Enchant::create(array('enchantsonto' => "Handgear",'rank' => 9,'effects' => "<ul>
			<li>+4 Max Damage</li>
			<li>+4% Critical</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Sun"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 9,'effects' => "<ul>
			<li>+25 Luck</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Surprising"));
		Enchant::create(array('enchantsonto' => "Burning Ice Cream, Freezing Ice Cream, Shocking Ice Cream",'rank' => 9,'effects' => "<ul>
			<li>+15 Int</li>
			<li>+3% Critical when Kaito Title is equipped    +Magic Damage 2~4</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Sweet (Prefix)"));
		Enchant::create(array('enchantsonto' => "Basic Green Onion, Advanced Green Onion, Upgraded Green Onion",'rank' => 9,'effects' => "<ul>
			<li>+10 Max Damage if Hatsune Miku title is Equipped</li>
			<li>+10~20 Max Damage</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Tear-Jerker"));
		Enchant::create(array('enchantsonto' => "Shoes",'rank' => 9,'effects' => "<ul>
			<li>-20 Str if Combat Mastery Rank 9+</li>
			<li>-20 Dex if Ranged Attack Rank 9+</li>
			<li>+6 Max Damage if Alchemy Mastery Rank 9+</li>
			<li>+4% Critical if Water Cannon Rank 6+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Tilted"));
		Enchant::create(array('enchantsonto' => "Footwear",'rank' => 9,'effects' => "<ul>
			<li>+3% Critical if Cooking Rank E+</li>
			<li>+3x Repair Cost</li>
			<li>+2% Critical if Cooking Rank A+</li>
			<li>+2% Critical if Cooking Rank C+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Virtuous"));
		Enchant::create(array('enchantsonto' => "Weapon",'rank' => 9,'effects' => "<ul>
			<li>+15 Int if Mind of Connous 9+</li>
			<li>+20 Dex if Sharpness of Connous 6+</li>
			<li>+5% Balance if holding Falcon Sage title</li>
			<li>+15% Critical if holding Falcon Sage title</li>
			<li>+5x Repair Cost</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Agile"));
		Enchant::create(array('enchantsonto' => "Clothing",'rank' => 9,'effects' => "<ul>
			<li>+7~11 Max Damage if Blunt Mastery Rank 1</li>
			<li>+5 Min Damage if Axe Mastery Rank 1</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Ambush"));
		Enchant::create(array('enchantsonto' => "Clothes, Armors, Gloves, Shoes",'rank' => 9,'effects' => "<ul>
			<li>+8% Critical if Shooting Rush Rank 3+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Assault"));
		Enchant::create(array('enchantsonto' => "Clothes, Armors, Gloves, Shoes(Excludes Steel equipment)",'rank' => 9,'effects' => "<ul>
			<li>+3~9 Max Damage if Dual Gun Mastery Rank 3+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Camo"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 9,'effects' => "<ul>
			<li>+5 HP</li>
			<li>+5 Int</li>
			<li>+15 Will</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Cold winter's"));
		Enchant::create(array('enchantsonto' => "Control Bar",'rank' => 9,'effects' => "<ul>
			<li>+20 HP</li>
			<li>+30 Str</li>
			<li>+10~15 Marionette Max Damage</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Colossus"));
		Enchant::create(array('enchantsonto' => "Footwear",'rank' => 9,'effects' => "<ul>
			<li>+4 Fire-based Alchemy Damage</li>
			<li>+6 Water-based Alchemy Damage</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Cowboy"));
		Enchant::create(array('enchantsonto' => "Gauntlets",'rank' => 9,'effects' => "<ul>
			<li>-10 Luck if lvl 6+</li>
			<li>-100 CP</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Damaging"));
		Enchant::create(array('enchantsonto' => "Metal Weapons and Armor",'rank' => 9,'effects' => "<ul>
			<li>+10 Str if Potion Poisoned</li>
			<li>+5 Will if Poisoned</li>
			<li>-5% Min Injury Rate</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Dangerous"));
		Enchant::create(array('enchantsonto' => "Two-Handed Weapons",'rank' => 9,'effects' => "<ul>
			<li>+5 Dex if Smash Rank 9+</li>
			<li>-40% Balance if Combat Mastery Rank B+</li>
			<li>+15% Critical if Windmill Rank 9+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Deadly"));
		Enchant::create(array('enchantsonto' => "Two-Handed Weapons",'rank' => 9,'effects' => "<ul>
			<li>-40 HP</li>
			<li>-20 Dex</li>
			<li>+15~26 Max Damage if Combat Mastery 9+</li>
			<li>+9 Min Damage if lvl 32+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Destruction"));
		Enchant::create(array('enchantsonto' => "Gloves",'rank' => 9,'effects' => "<ul>
			<li>-5 MP</li>
			<li>+10~12% Balance</li>
			<li>+5~7% Critical</li>
			<li>+2x Repair Cost</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Dignified (Suffix)"));
		Enchant::create(array('enchantsonto' => "Handgear and Footwear",'rank' => 9,'effects' => "<ul>
			<li>+10% Balance</li>
			<li>+3~5% Critical</li>
			<li>+20 Marionette Max HP</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Director"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 9,'effects' => "<ul>
			<li>+5 Stamina</li>
			<li>+15 Str</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Earthquake's"));
		Enchant::create(array('enchantsonto' => "Metal Weapons and Armor",'rank' => 9,'effects' => "<ul>
			<li>+6 Stamina if Critical Hit Rank 9+</li>
			<li>+10 Str if Critical Hit Rank 9+</li>
			<li>-20 Will</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Easy Peaca"));
		Enchant::create(array('enchantsonto' => "Handgear and Footwear",'rank' => 9,'effects' => "<ul>
			<li>+7% Critical</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Ecstasy"));
		Enchant::create(array('enchantsonto' => "Gloves (not gauntlets)",'rank' => 9,'effects' => "<ul>
			<li>+2% Critical if Icebolt Rank 9+</li>
			<li>+2% Critical if Firebolt Rank 9+</li>
			<li>+2% Critical if Lightning Bolt Rank 9+</li>
			<li>+2% Critical if level 25+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Elementalist"));
		Enchant::create(array('enchantsonto' => "Heavy Armor",'rank' => 9,'effects' => "<ul>
			<li>+7 Max Damage if level 35+</li>
			<li>+5 Min Damage</li>
			<li>+3% Critical</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Flash"));
		Enchant::create(array('enchantsonto' => "Wand",'rank' => 9,'effects' => "<ul>
			<li>+20 MP if Firebolt Rank A+</li>
			<li>-20 Str</li>
			<li>+10 Int if Icebolt Rank A+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Formal"));
		Enchant::create(array('enchantsonto' => "Clothes, Armor, and Shields",'rank' => 9,'effects' => "<ul>
			<li>-20 Int when lvl 20+</li>
			<li>+2 Defense when lvl</li>
			<li>-10</li>
			<li>+5% Protection when lvl</li>
			<li>-15</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Golem"));
		Enchant::create(array('enchantsonto' => "Heavy Armor",'rank' => 9,'effects' => "<ul>
			<li>-10 Dex if lvl 6+</li>
			<li>-100 CP</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Handicapping"));
		Enchant::create(array('enchantsonto' => "Bows and Crossbows",'rank' => 9,'effects' => "<ul>
			<li>+5 Dex if Ranged Attack 9+</li>
			<li>-5 Defense if Combat Mastery C+</li>
			<li>+3 Dex if Ranged Attack A+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Hitting"));
		Enchant::create(array('enchantsonto' => "Handgear",'rank' => 9,'effects' => "<ul>
			<li>+2 Magic Attack</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Homestead"));
		Enchant::create(array('enchantsonto' => "Fomor Weapons",'rank' => 9,'effects' => "<ul>
			<li>-10 HP</li>
			<li>+15 Stamina</li>
			<li>+6 Max Damage if Enthralling Performance Rank C+</li>
			<li>+4% Critical if Life Drain Rank 4+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Horrifying"));
		Enchant::create(array('enchantsonto' => "Wands and Staves",'rank' => 9,'effects' => "<ul>
			<li>+1~2 Magic Attack if Hail Storm Rank A+</li>
			<li>+1~2 Magic Attack if Hail Storm Rank 5+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Island"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 9,'effects' => "<ul>
			<li>-5 Str</li>
			<li>+15 Dex</li>
			<li>+5 Luck</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Lilly"));
		Enchant::create(array('enchantsonto' => "Cylinders",'rank' => 9,'effects' => "<ul>
			<li>+4~6 Fire Damage if Fire Alchemy Mastery Rank 3+</li>
			<li>+4~6 Fire Damage if Heat Buster Rank 3+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Magma"));
		Enchant::create(array('enchantsonto' => "Shields",'rank' => 9,'effects' => "<ul>
			<li>+6~12 HP</li>
			<li>-15 Int</li>
			<li>+3% Critical if Counter Rank 6+</li>
			<li>+1% Protection</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Marshal"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 9,'effects' => "<ul>
			<li>+25 Stamina if Mana Shield Rank A+</li>
			<li>-12 Dex</li>
			<li>+5x Repair Cost</li>
			<li>+3% Synthesis Success Rate if Level 25+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Melting"));
		Enchant::create(array('enchantsonto' => "Heavy Armor",'rank' => 9,'effects' => "<ul>
			<li>+8 Str if Taming Wild Animals Rank B+</li>
			<li>+2% Protection</li>
			<li>+12 Str if Taming Wild Animals Rank 9+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Otter"));
		Enchant::create(array('enchantsonto' => "Handgear",'rank' => 9,'effects' => "<ul>
			<li>+11 Dex</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Outlaw"));
		Enchant::create(array('enchantsonto' => "Lance",'rank' => 9,'effects' => "<ul>
			<li>-20 HP</li>
			<li>+10 Max Damage if Lance Charge is Rank 8+</li>
			<li>-12 Min Damage Lance charge B-</li>
			<li>+10% Repair Cost</li>
			<li>+2 Piercing if Lance Counter is Rank 3+</li>
			<li>+6 Max Damage If wearing Lance Master title</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Penetrating"));
		Enchant::create(array('enchantsonto' => "Light Armor",'rank' => 9,'effects' => "<ul>
			<li>-10 Stamina</li>
			<li>-10 Luck</li>
			<li>+5 Max Damage if Mirage Missile 9+</li>
			<li>+5 Min Damage if Mirage Missile 5+</li>
			<li>+3 Defense</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Pine Tree"));
		Enchant::create(array('enchantsonto' => "Clothes, Armor",'rank' => 9,'effects' => "<ul>
			<li>+10~25 Str</li>
			<li>+7~10 Dex</li>
			<li>+2 Marionette Defense</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Premiere"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 9,'effects' => "<ul>
			<li>-10 (Misprinted as</li>
				<li>-20) Will</li>
		<li>+15 Luck if Natural Shield Rank B+</li>
		<li>+5 Max Damage if Lightning Shield Rank B+</li>
		<li>-1 Defense</li>
	</ul>",'personalized' => false,'type' => 2,'name' => "Rainbow"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 9,'effects' => "<ul>
			<li>+8~5 Max Damage if Smash Rank 9+</li>
			<li>+4~2 Min Damage if Smash Rank 9+</li>
			<li>-3 Defense if Combat Mastery Rank A+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Raven"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 9,'effects' => "<ul>
			<li>+10 Dex</li>
			<li>+8 Luck if Production Mastery rank A+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Reliable"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 9,'effects' => "<ul>
			<li>+5 Stamina</li>
			<li>+10 Dex</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Salvia"));
		Enchant::create(array('enchantsonto' => "Metal Weapons and Armor",'rank' => 9,'effects' => "<ul>
			<li>+10 Str if Deadly</li>
			<li>+5 Dex if Poisoned</li>
			<li>-2% Critical</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Scary"));
		Enchant::create(array('enchantsonto' => "Metal Weapons and Armor",'rank' => 9,'effects' => "<ul>
			<li>+10 Dex if Deadly</li>
			<li>+5 Will if Potion Poisoned</li>
			<li>-10% Min Injury Rate</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Serious"));
		Enchant::create(array('enchantsonto' => "Footwear",'rank' => 9,'effects' => "<ul>
			<li>-20 MP if Magic Mastery Rank C+</li>
			<li>+5% Critical if Stomp 8+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Shake"));
		Enchant::create(array('enchantsonto' => "Instruments and Weapons",'rank' => 9,'effects' => "<ul>
			<li>+30~25 MP if Musical Knowledge rank A+</li>
			<li>+30~25 Stamina if Playing Instrument rank A+</li>
			<li>-10 Max Damage</li>
			<li>+5 Defense</li>
			<li>+50% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Sweet (Suffix)"));
		Enchant::create(array('enchantsonto' => "Wand",'rank' => 9,'effects' => "<ul>
			<li>+15 Str when Combat Mastery Rank 8+</li>
			<li>+15 Int when Magic Mastery Rank 8+</li>
			<li>-15 Dex</li>
			<li>-10% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Talent"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 9,'effects' => "<ul>
			<li>+1 Defense</li>
			<li>+3% Protection</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Taurus"));
		Enchant::create(array('enchantsonto' => "Head",'rank' => 9,'effects' => "<ul>
			<li>+1~2 Magic Attack if Bolt Mastery Rank 1</li>
			<li>+1 Magic Attack if Ice Mastery Rank 1</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Treasure"));
		Enchant::create(array('enchantsonto' => "Wands",'rank' => 9,'effects' => "<ul>
			<li>-10 Dex</li>
			<li>+4 Max Damage if Icebolt Rank 9+</li>
			<li>+4 Min Damage if Lightning Bolt Rank C+</li>
			<li>+4% Critical if Firebolt Rank 5+</li>
			<li>-5% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Trustworthy"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 9,'effects' => "<ul>
			<li>+10 MP</li>
			<li>+2% Protection</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Virgo"));
		Enchant::create(array('enchantsonto' => "Bows and Crossbows",'rank' => 9,'effects' => "<ul>
			<li>+8 Stamina</li>
			<li>+10~15 Max Damage if level 30+</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Wanderer"));
		Enchant::create(array('enchantsonto' => "Shoes",'rank' => 9,'effects' => "<ul>
			<li>+1~2 Magic Attack if Fire Mastery Rank 3+</li>
			<li>+1~2 Magic Attack if Lightning Mastery Rank 3+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Witch"));
		Enchant::create(array('enchantsonto' => "Clothing, Armors",'rank' => 9,'effects' => "<ul>
			<li>+15 Luck</li>
			<li>+15 Max Damage if doing Commerce</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Greed"));
		Enchant::create(array('enchantsonto' => "Gloves and Shoes",'rank' => 9,'effects' => "<ul>
			<li>-5% Stamina Consumption if Alchemy Mastery Rank 6+</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Vitality"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 10,'effects' => "<ul>
			<li>+10 Stamina when lvl 15+</li>
			<li>-15% Balance when lvl 20+</li>
			<li>+5% Critical when lvl 20+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Blessed"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 10,'effects' => "<ul>
			<li>-10 Will if Water Cannon Rank 9+</li>
			<li>-5% Balance if Water Cannon Rank 9+</li>
			<li>+4% Critical if Flame Burst Rank B+</li>
			<li>+2% Critical if Flame Burst Rank 7+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Burning (Prefix)"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 10,'effects' => "<ul>
			<li>+15 Dex when Act 6: Crisis Rank 5+</li>
			<li>+3% Critical</li>
			<li>+2 Marionette Defense</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Catastrophic"));
		Enchant::create(array('enchantsonto' => "Heavy Gloves",'rank' => 10,'effects' => "<ul>
			<li>+12 HP if Blaze Rank 7+</li>
			<li>+10 Int if Blaze Rank C+</li>
			<li>+5% Critical if Blaze Rank 9+</li>
			<li>-2 Defense</li>
			<li>-1% Protection</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Collector"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 10,'effects' => "<ul>
			<li>+4~2 Max Damage if Alchemy Mastery B+</li>
			<li>+3 Min Damage if Alchemy Mastery D+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Color"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 10,'effects' => "<ul>
			<li>+20 Str</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Confident"));
		Enchant::create(array('enchantsonto' => "Handgear",'rank' => 10,'effects' => "<ul>
			<li>+5 Str</li>
			<li>+3% Protection if Barrier Spikes is summoned</li>
			<li>+1 % Protection if Barrier Spikes Rank 6+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Deep"));
		Enchant::create(array('enchantsonto' => "Two-Handed Weapons",'rank' => 10,'effects' => "<ul>
			<li>+6 Max Damage if Exploration lvl 9+</li>
			<li>+2 Min Damage if Exploration lvl</li>
			<li>-12</li>
			<li>-5% Protection</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Desert Spider"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 10,'effects' => "<ul>
			<li>-5 HP</li>
			<li>-5 MP</li>
			<li>-5 Stamina</li>
			<li>+4% Critical if Critical Hit Rank 6+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Fearless"));
		Enchant::create(array('enchantsonto' => "Two-Handed Weapons",'rank' => 10,'effects' => "<ul>
			<li>-50 MP</li>
			<li>+4 Max Damage if Combat Mastery B+</li>
			<li>+4 Max Damage if Combat Mastery 7+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Firm"));
		Enchant::create(array('enchantsonto' => "Knuckles",'rank' => 10,'effects' => "<ul>
			<li>+20 Stamina</li>
			<li>+20~30 Will if Knuckle Mastery Rank 5+</li>
			<li>+18~27 Will if Knuckle Mastery Rank 9+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Fist"));
		Enchant::create(array('enchantsonto' => "Light Armor",'rank' => 10,'effects' => "<ul>
			<li>+5 Str</li>
			<li>+1 Defense</li>
			<li>+1% Protection</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Glittering"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 10,'effects' => "<ul>
			<li>-10~1 Max Damage</li>
			<li>-6~1 Min Damage</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Hamster"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 10,'effects' => "<ul>
			<li>+6 Fire-based Alchemy Damage</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Heated"));
		Enchant::create(array('enchantsonto' => "Clothing",'rank' => 10,'effects' => "<ul>
			<li>+5 Str if Giant or Giant-Allied</li>
			<li>-8 Dex if Arrow Revolver Rank C+</li>
			<li>+1 Defense if Giant or Giant-Allied</li>
			<li>+5 Str if Combat Mastery Rank 9+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Heavy"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 10,'effects' => "<ul>
			<li>+6% Max Injury Rate if Windmill Rank C+</li>
			<li>-2% Critical</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Hesitant"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 10,'effects' => "<ul>
			<li>+2~4 Stamina if Blacksmith Rank B+</li>
			<li>-5 Str</li>
			<li>+2~4 Dex if Weaving Rank B+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Hidden"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 10,'effects' => "<ul>
			<li>+5 HP when lvl 14+</li>
			<li>-20 Stamina when lvl 26+</li>
			<li>+8 Dex if Tailoring Rank A-</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Intricate"));
		Enchant::create(array('enchantsonto' => "Footwear",'rank' => 10,'effects' => "<ul>
			<li>-3% Balance</li>
			<li>+6% Min Injury Rate if Counter Rank A+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Lake's"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 10,'effects' => "<ul>
			<li>+8~10 Max Damage when lvl 40+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Lion Hunter's"));
		Enchant::create(array('enchantsonto' => "Metal Equipment and Weapons",'rank' => 10,'effects' => "<ul>
			<li>+6 Max Damage when lvl 32+</li>
			<li>+2 Min Damage when lvl 24+</li>
			<li>+2% Critical when lvl 16+</li>
			<li>-12 Max Damage if Ranged Attack Rank 9+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Metal Needle"));
		Enchant::create(array('enchantsonto' => "Instruments",'rank' => 10,'effects' => "<ul>
			<li>+7 HP if Lullaby Rank 9+</li>
			<li>+15 Stamina</li>
			<li>+5 Max Damage</li>
			<li>+2 Music Buff Effect if Playing Instrument Rank 8+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Moderato"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 10,'effects' => "<ul>
			<li>+20 Dex</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Nimble"));
		Enchant::create(array('enchantsonto' => "Magical Clothes",'rank' => 10,'effects' => "<ul>
			<li>-5 Str</li>
			<li>-5 Dex</li>
			<li>+6 Max Damage when Rest Rank C+</li>
			<li>+4 Min Damage when Rest Rank A+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "The Ocean's"));
		Enchant::create(array('enchantsonto' => "Phoenix Ear MuffsPhoenix Feather SwordMysterious Phoenix Feather Sword",'rank' => 10,'effects' => "<ul>
			<li>+20 Luck</li>
			<li>+5~25 Luck if using \"The Phoenix's Witness\" Title</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Phoenix's Blessing"));
		Enchant::create(array('enchantsonto' => "Fomor Weapons",'rank' => 10,'effects' => "<ul>
			<li>+16 Luck if below Age 13</li>
			<li>+4 Max Damage if below Age 13</li>
			<li>+3% Critical</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Prankster"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 10,'effects' => "<ul>
			<li>+20 Dex</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Precise"));
		Enchant::create(array('enchantsonto' => "Shields",'rank' => 10,'effects' => "<ul>
			<li>+5~10 Stamina</li>
			<li>+4~8 Str</li>
			<li>-10 Dex</li>
			<li>-5% Balance</li>
			<li>+3 Defense if Charge Rank B+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Rigid"));
		Enchant::create(array('enchantsonto' => "Handgear",'rank' => 10,'effects' => "<ul>
			<li>-6 Stamina</li>
			<li>+3 Min Damage if Smash Rank D+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "River"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 10,'effects' => "<ul>
			<li>+5% Critical</li>
			<li>+2x Repair Cost</li>
			<li>+4~7 Critical if Combat Mastery rank 9+</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Round"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 10,'effects' => "<ul>
			<li>+5 HP</li>
			<li>+5 Int</li>
			<li>+5 Dex</li>
			<li>+5 Luck</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Shiny (Prefix)"));
		Enchant::create(array('enchantsonto' => "Headgears",'rank' => 10,'effects' => "<ul>
			<li>+10 Magic Attack if below an alchemy cloud</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Soaked"));
		Enchant::create(array('enchantsonto' => "Shield",'rank' => 10,'effects' => "<ul>
			<li>+10 HP</li>
			<li>+10 MP</li>
			<li>+10 Stamina</li>
			<li>-5% Balance</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Solid"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 10,'effects' => "<ul>
			<li>-8 Stamina when lvl 28+</li>
			<li>-10 Str if Icebolt Rank A+</li>
			<li>+5% Max Injury Rate when lvl</li>
			<li>-20</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Splendid"));
		Enchant::create(array('enchantsonto' => "Shield",'rank' => 10,'effects' => "<ul>
			<li>+5 Str if Defense Rank C+</li>
			<li>+5% Balance</li>
			<li>-5% Critical</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Stable"));
		Enchant::create(array('enchantsonto' => "Shield, Footgear, Headgear",'rank' => 10,'effects' => "<ul>
			<li>+3~5% Balance when lvl 15+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Sturdy"));
		Enchant::create(array('enchantsonto' => "Fomor Weapons",'rank' => 10,'effects' => "<ul>
			<li>+15 Stamina</li>
			<li>+15 Dex if below Age 15</li>
			<li>+10 Luck</li>
			<li>-1~3% Protection</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Thug"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 10,'effects' => "<ul>
			<li>+9 Water-based Alchemy Damage</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Transparent"));
		Enchant::create(array('enchantsonto' => "Two-Handed Weapons",'rank' => 10,'effects' => "<ul>
			<li>-30 HP</li>
			<li>+16 Max Damage if Smash Rank 8+</li>
			<li>-4% Protection</li>
			<li>+5% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Untamed"));
		Enchant::create(array('enchantsonto' => "Shields",'rank' => 10,'effects' => "<ul>
			<li>-15 Int</li>
			<li>+5 Max Damage if Campfire Rank D+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Unusual"));
		Enchant::create(array('enchantsonto' => "Gloves",'rank' => 10,'effects' => "<ul>
			<li>-5 HP</li>
			<li>+3 Dex if Magnum Shot Rank C+</li>
			<li>+5~2 Min Damage if Magnum Shot Rank A+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Archer"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 10,'effects' => "<ul>
			<li>+25 Str if Charge Rank 1+</li>
			<li>+25 Luck if Evasion Rank 1+ (Not implemented yet)</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Bandit"));
		Enchant::create(array('enchantsonto' => "Two-Handed Weapons",'rank' => 10,'effects' => "<ul>
			<li>+13 Max Damage if Windmill Rank 7+</li>
			<li>+6% Critical if Critical Hit Rank 9+</li>
			<li>-5 Defense</li>
			<li>+8% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Barbarian"));
		Enchant::create(array('enchantsonto' => "Clothes, Armor, Hat, Accessory",'rank' => 10,'effects' => "<ul>
			<li>+7~4 HP when lvl 7+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Bloody"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 10,'effects' => "<ul>
			<li>+2x Repair Cost</li>
			<li>+5 Wind-based Alchemy Skill Damage</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Breeze"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 10,'effects' => "<ul>
			<li>-10 Will if Water Cannon Rank 9+</li>
			<li>-5% Balance if Water Cannon Rank 9+</li>
			<li>+4% Critical if Flame Burst Rank B+</li>
			<li>+2% Critical if Flame Burst Rank 7+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Burning (Suffix)"));
		Enchant::create(array('enchantsonto' => "Metal Weapons and Armor",'rank' => 10,'effects' => "<ul>
			<li>+10~1 Str</li>
			<li>-5 Dex</li>
			<li>+4~1 Explosion Resistance if Defense Rank 9+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Burst Knight"));
		Enchant::create(array('enchantsonto' => "Footgears",'rank' => 10,'effects' => "<ul>
			<li>+7~12 Max Damage if using Mana Shield</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Butterfly"));
		Enchant::create(array('enchantsonto' => "Bows and Crossbows",'rank' => 10,'effects' => "<ul>
			<li>+6 Max Damage if Mirage Missile Rank 9+</li>
			<li>+4 Min Damage if Mirage Missile Rank B+</li>
			<li>-4% Protection if lvl 30+</li>
			<li>-6% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Cactus"));
		Enchant::create(array('enchantsonto' => "Footwear",'rank' => 10,'effects' => "<ul>
			<li>+10 Stamina</li>
			<li>+10 Luck if Blacksmith Rank 9+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Charm"));
		Enchant::create(array('enchantsonto' => "Cooking Tools",'rank' => 10,'effects' => "<ul>
			<li>-20 Stamina if Cooking Rank C-</li>
			<li>+5% Balance if Cooking Rank 9+</li>
			<li>+10% Critical if using \"who Placed in the Cooking Contest\" title</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Chef's"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 10,'effects' => "<ul>
			<li>+10 HP</li>
			<li>+2 Defense</li>
			<li>+2% Protection</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Clover"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 10,'effects' => "<ul>
			<li>-10 Stamina</li>
			<li>+10 Int if Poisoned</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Cold-hearted"));
		Enchant::create(array('enchantsonto' => "Metal Equipment",'rank' => 10,'effects' => "<ul>
			<li>+5 HP</li>
			<li>+5 Stamina</li>
			<li>+5 Str</li>
			<li>-10 Dex if Arrow Revolver Rank A+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Courageous"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 10,'effects' => "<ul>
			<li>-10 HP</li>
			<li>+10 Dex if Deadly</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Cruel"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 10,'effects' => "<ul>
			<li>+10 Dex if Exploration lvl 15+</li>
			<li>+10 Max Damage</li>
			<li>+3% Critical</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Dexterity"));
		Enchant::create(array('enchantsonto' => "Light Armor",'rank' => 10,'effects' => "<ul>
			<li>-15 Int when lvl 3+</li>
			<li>-100 CP</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Difficult"));
		Enchant::create(array('enchantsonto' => "Instruments",'rank' => 10,'effects' => "<ul>
			<li>+20 Stamina</li>
			<li>+5 Max Damage if Playing Instrument Rank 9+</li>
			<li>+7 Max Damage if Dischord Rank 9+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Do Re Mi"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 10,'effects' => "<ul>
			<li>+1~3% Critical if Fragmentation A+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Earnest"));
		Enchant::create(array('enchantsonto' => "Footwear, Handgear",'rank' => 10,'effects' => "<ul>
			<li>-20 MP</li>
			<li>+10% Balance</li>
			<li>+5% Critical</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Elegant"));
		Enchant::create(array('enchantsonto' => "Heavy Armor",'rank' => 10,'effects' => "<ul>
			<li>+15 Luck</li>
			<li>+4 Defense if Pet Summoned</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Elephant"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 10,'effects' => "<ul>
			<li>+50 Stamina when Age</li>
			<li>-16</li>
			<li>-15 Str when Age 17+</li>
			<li>+3 Max Damage when Age 12+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Energetic"));
		Enchant::create(array('enchantsonto' => "Clothing",'rank' => 10,'effects' => "<ul>
			<li>+10 MP</li>
			<li>+15 Stamina if Enduring Melody Rank A+</li>
			<li>+15 Stamina</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Ensemble"));
		Enchant::create(array('enchantsonto' => "Two-Handed Weapons",'rank' => 10,'effects' => "<ul>
			<li>-20 Will</li>
			<li>+24 Max Damage if Counter Rank 8+</li>
			<li>+10% Balance</li>
			<li>+3% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Fierce"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 10,'effects' => "<ul>
			<li>+3~2 Str when lvl 8+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Fighter"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 10,'effects' => "<ul>
			<li>+10~20 MP if Fireball rank D+</li>
			<li>+4% Critical if Firebolt rank A+</li>
			<li>+2x Repair Cost</li>
			<li>+6 Fire Alchemy Damage Increase if Flame Burst rank A+</li>
			<li>+2~5% Critical if Fire Shield rank B+</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Flame"));
		Enchant::create(array('enchantsonto' => "Royal Alchemist Boots",'rank' => 10,'effects' => "<ul>
			<li>+12 Damage to water-based Alchemy skills if using \"Royal Alchemist\" title</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Flooded"));
		Enchant::create(array('enchantsonto' => "Handgear, Shoes, Accessories",'rank' => 10,'effects' => "<ul>
			<li>+5~7 Luck If Level 55+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Happiness"));
		Enchant::create(array('enchantsonto' => "Footwear",'rank' => 10,'effects' => "<ul>
			<li>+5 Max Damage if Exploration Level 10+</li>
			<li>+1~3 Fast Attack</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Hawk"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 10,'effects' => "<ul>
			<li>-10 Stamina when Exploration Level 36+</li>
			<li>+3 Str when Exploration Level 4+</li>
			<li>+3 Int when Exploration Level 8+</li>
			<li>+3 Dex when Exploration Level 12+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Hawthorn Tree"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 10,'effects' => "<ul>
			<li>+15 HP if Healing Rank B+</li>
			<li>-20 Stamina if Enchant Rank C+</li>
			<li>+5 Will if Healing Rank B+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Healer"));
		Enchant::create(array('enchantsonto' => "Fomor Weapons",'rank' => 10,'effects' => "<ul>
			<li>+9~12 Max Damage if Charge Rank A+</li>
			<li>+2~4% Critical if Assault Slash Rank A+</li>
			<li>-2% Protection if Smash Rank 5-</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Hoodlum"));
		Enchant::create(array('enchantsonto' => "Gloves",'rank' => 10,'effects' => "<ul>
			<li>+10 Dex When Pet is summoned</li>
			<li>+10 Luck</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Husky"));
		Enchant::create(array('enchantsonto' => "Heavy Armor",'rank' => 10,'effects' => "<ul>
			<li>+10 Str</li>
			<li>+2 Defense</li>
			<li>+2% Protection</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Imp"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 10,'effects' => "<ul>
			<li>+5 HP</li>
			<li>+5 MP</li>
			<li>+1 Defense</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Libra"));
		Enchant::create(array('enchantsonto' => "Light Armor",'rank' => 10,'effects' => "<ul>
			<li>+25 HP when lvl 10+</li>
			<li>-5 Int</li>
			<li>+2% Protection when lvl 20+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Life"));
		Enchant::create(array('enchantsonto' => "Cylinder",'rank' => 10,'effects' => "<ul>
			<li>+10 HP if Life Drain B+</li>
			<li>+10 HP if Water Cannon 9+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Lifesaver"));
		Enchant::create(array('enchantsonto' => "Wind and String Instruments",'rank' => 10,'effects' => "<ul>
			<li>+18 MP</li>
			<li>-12% Balance</li>
			<li>+6% Critical if Composing Rank 9+</li>
			<li>+6% Critical if Musical Knowledge Rank 9+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Melody"));
		Enchant::create(array('enchantsonto' => "Gloves",'rank' => 10,'effects' => "<ul>
			<li>+4 Water Alchemy Damage</li>
			<li>+4 Fire Alchemy Damage while pet is summoned(Partners do not count)</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Mimic"));
		Enchant::create(array('enchantsonto' => "Phoenix Ear MuffsPhoenix Feather SwordMysterious Phoenix Feather Sword",'rank' => 10,'effects' => "<ul>
			<li>+10 Dex if using \"The Phoenix's Witness\"  Title</li>
			<li>+5% Critical</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Phoenix Wings"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 10,'effects' => "<ul>
			<li>-5 MP</li>
			<li>+9~6 Stamina if Elf or Elf-Allied</li>
			<li>+3~1 Poison Resistance if Magnum Shot Rank 8+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Poison Hunter"));
		Enchant::create(array('enchantsonto' => "Knuckles",'rank' => 10,'effects' => "<ul>
			<li>+20 Stamina</li>
			<li>-30 Str When Age 25+</li>
			<li>-20 Str When age 22+</li>
			<li>-10 Str When age 19+</li>
			<li>+5 Max Damage When Counterattack Rank 9+</li>
			<li>+4 Max Damage When Smash Rank B+</li>
			<li>+3 Max Damage When Defense Rank D+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Powerful"));
		Enchant::create(array('enchantsonto' => "Shields",'rank' => 10,'effects' => "<ul>
			<li>+18 MP if Meditation Rank 9+</li>
			<li>+3~6 Int</li>
			<li>+1% Protection</li>
			<li>+2 Magic Defense</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Professor"));
		Enchant::create(array('enchantsonto' => "Shoes",'rank' => 10,'effects' => "<ul>
			<li>+10 MP</li>
			<li>+2 Magic Attack while summoning pet</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Pumpkin"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 10,'effects' => "<ul>
			<li>+20 Str when summoning a pet</li>
			<li>+15 Luck</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Red Panda"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 10,'effects' => "<ul>
			<li>+30 Str if Beast Lord</li>
			<li>+10 Dex if Beast Lord</li>
			<li>+8 Max Damage if Life of Physis Rank 8+</li>
			<li>+6% Balance if Shield of Physis Rank C+</li>
			<li>+5x Repair Cost</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Reliable"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 10,'effects' => "<ul>
			<li>+15 MP</li>
			<li>+10 Int</li>
			<li>+5% Balance</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Safe"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 10,'effects' => "<ul>
			<li>+9 HP</li>
			<li>+9 MP</li>
			<li>+9 Stamina</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Scorpius"));
		Enchant::create(array('enchantsonto' => "Fomor Wands",'rank' => 10,'effects' => "<ul>
			<li>+15 HP when age under 13</li>
			<li>+20 MP when level under 60</li>
			<li>+10 Int when level under 60</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Sinister"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 10,'effects' => "<ul>
			<li>+10 Str</li>
			<li>+10 Int</li>
			<li>+10 Dex</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Sonnet"));
		Enchant::create(array('enchantsonto' => "Two-Handed Weapons",'rank' => 10,'effects' => "<ul>
			<li>+10 HP if Smash Rank C+</li>
			<li>-15 MP</li>
			<li>+18 Stamina if Counter Rank A+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Stimulating"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 10,'effects' => "<ul>
			<li>+12 HP</li>
			<li>+12 MP</li>
			<li>+12 Stamina</li>
			<li>-5 Will</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Sweet Pea"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 10,'effects' => "<ul>
			<li>+5~10 Will when lvl 28+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "the Shine"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 10,'effects' => "<ul>
			<li>-15 HP when lvl 25+</li>
			<li>+10 Luck when lvl 30+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Thief"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 10,'effects' => "<ul>
			<li>+10 Water Alchemy Damage</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Tidal"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 10,'effects' => "<ul>
			<li>+15 Stamina</li>
			<li>+7 Max Damage if Combat Mastery B+</li>
			<li>+5% Balance</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Tireless"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 10,'effects' => "<ul>
			<li>-10 MP</li>
			<li>+10 Str if Potion Poisoned</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Tragic"));
		Enchant::create(array('enchantsonto' => "Two-Handed Weapons",'rank' => 10,'effects' => "<ul>
			<li>-20 Luck</li>
			<li>+20 Max Damage if Windmill Rank 6+</li>
			<li>+5% Critical</li>
			<li>-3% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Violent"));
		Enchant::create(array('enchantsonto' => "Greaves",'rank' => 10,'effects' => "<ul>
			<li>+8 Max Damage if Counterattack Rank 3+</li>
			<li>+1~2 Fast Attack</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Viscount"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 10,'effects' => "<ul>
			<li>+100% Repair Cost</li>
			<li>+5 damage to water-based Alchemy skills</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Water Drop"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 10,'effects' => "<ul>
			<li>+5 HP</li>
			<li>+5 Luck</li>
			<li>+3 Defense</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Whirlpool's"));
		Enchant::create(array('enchantsonto' => "Footwear",'rank' => 10,'effects' => "<ul>
			<li>+6 Max Damage When Pet is summoned</li>
			<li>+2 Magic Attack When Pet is summoned</li>
			<li>+4 Fire Alchemy Damage When Pet is summoned</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "White Tiger"));
		Enchant::create(array('enchantsonto' => "Fomor Wand Weapons",'rank' => 10,'effects' => "<ul>
			<li>+15 HP below Age 13</li>
			<li>+10 Int below lvl 60</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Wicked"));
		Enchant::create(array('enchantsonto' => "Handgear, Footgear, Accessories",'rank' => 10,'effects' => "<ul>
			<li>+3~2 Dex when lvl</li>
			<li>+7</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Wind"));
		Enchant::create(array('enchantsonto' => "Footwear",'rank' => 10,'effects' => "<ul>
			<li>+15 MP if Fireball rank 5+</li>
			<li>+2 Magic Attack if Thunder rank 5+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Lucid"));
		Enchant::create(array('enchantsonto' => "Gloves",'rank' => 10,'effects' => "<ul>
			<li>+3% Critical</li>
			<li>+1~3 Fast Attack</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Owl"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 11,'effects' => "<ul>
			<li>-20~1% Max Injury Rate</li>
			<li>-6~1% Min Injury Rate</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Chicken"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 11,'effects' => "<ul>
			<li>-6~5% Min Injury Rate</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Chicken Summoner's"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 11,'effects' => "<ul>
			<li>-5 Luck</li>
			<li>+6 Max Damage if Exploration lvl 10+</li>
			<li>-5 Min Damage if Exploration lvl 18-</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Corundum"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 11,'effects' => "<ul>
			<li>+1 % Synthesis Success Rate if Synthesis Rank B+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Delicate"));
		Enchant::create(array('enchantsonto' => "Metal Armor and Weapons",'rank' => 11,'effects' => "<ul>
			<li>-5 Will</li>
			<li>+6 Max Damage if Exploration lvl 15+</li>
			<li>-5% Critical when lvl 25-</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Diamond"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 11,'effects' => "<ul>
			<li>+5 Dex</li>
			<li>+12% Balance</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Excavator"));
		Enchant::create(array('enchantsonto' => "Clothing",'rank' => 11,'effects' => "<ul>
			<li>+12 HP if Heat Buster Rank 8+</li>
			<li>+6 Fire Alchemy Damage if Alchemy Mastery Rank A+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Explosive"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 11,'effects' => "<ul>
			<li>+15 Luck</li>
			<li>+5% Balance</li>
			<li>+1 MP Cost Reduction</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Fixed"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 11,'effects' => "<ul>
			<li>+1~4 Max Damage while lvl</li>
			<li>+14</li>
			<li>+1~2 Min Damage while lvl</li>
			<li>+14</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Fox"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 11,'effects' => "<ul>
			<li>+2 Min Damage when lvl 8+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Fox Tamer's"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 11,'effects' => "<ul>
			<li>-12~10 Max Damage</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Hamster Hunter's"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 11,'effects' => "<ul>
			<li>-6~5 Min Damage</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Hamster Tamer's"));
		Enchant::create(array('enchantsonto' => "Weapon",'rank' => 11,'effects' => "<ul>
			<li>-15% Max Injury Rate</li>
			<li>-5% Min Injury Rate</li>
			<li>+10% Critical if Exploration lvl 12+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Lizard"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 11,'effects' => "<ul>
			<li>-30~24% Balance</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Paper Crafted"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 11,'effects' => "<ul>
			<li>-5 HP</li>
			<li>+5% Balance if Defense Rank B+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Plateau's"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 11,'effects' => "<ul>
			<li>+4% Critical when lvl 42+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Polished"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 11,'effects' => "<ul>
			<li>+4% Min Injury Rate when lvl 19+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Raven Summoner's"));
		Enchant::create(array('enchantsonto' => "Cylinders",'rank' => 11,'effects' => "<ul>
			<li>+1 Defense if Summon Golem Rank B+</li>
			<li>+1% Protection if Barrier Spikes Rank B+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Safeguard"));
		Enchant::create(array('enchantsonto' => "Clothes, Armor",'rank' => 11,'effects' => "<ul>
			<li>+5 Dex if Lightning Bolt Rank B+</li>
			<li>+5 Dex if Smash Rank B+</li>
			<li>+5 Dex if Arrow Revolver Rank B+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Scrupulous"));
		Enchant::create(array('enchantsonto' => "Hats (excluding Helmets)",'rank' => 11,'effects' => "<ul>
			<li>+13 MP</li>
			<li>+4% Critical</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Sharp"));
		Enchant::create(array('enchantsonto' => "Weapon",'rank' => 11,'effects' => "<ul>
			<li>+10 MP when lvl</li>
			<li>-20</li>
			<li>-10 Stamina when lvl 10+</li>
			<li>+5% Critical when lvl 5+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Simple"));
		Enchant::create(array('enchantsonto' => "Weapon",'rank' => 11,'effects' => "<ul>
			<li>+3% Max Injury Rate if Windmill Rank F+</li>
			<li>-1% Critical</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Suspicious"));
		Enchant::create(array('enchantsonto' => "Footgear",'rank' => 11,'effects' => "<ul>
			<li>-2% Balance</li>
			<li>+4% Min Injury Rate if Counterattack Rank C+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Swamp's"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 11,'effects' => "<ul>
			<li>+10 MP if Lightning Bolt Rank D+</li>
			<li>-5 Str if Icebolt Rank C+</li>
			<li>+3 Int if Firebolt Rank C+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Will O' The Wisp"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 11,'effects' => "<ul>
			<li>+5 HP</li>
			<li>+5 MP</li>
			<li>+10 Int</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Aquarius"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 11,'effects' => "<ul>
			<li>+5 Stamina</li>
			<li>+3 Str if Stomp Rank C+</li>
			<li>-5 Dex if Ranged Attack Rank A+</li>
			<li>+3 Str if Stomp Rank 9+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Bold"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 11,'effects' => "<ul>
			<li>-15 MP</li>
			<li>+6 Str if Combat Mastery Rank D+</li>
			<li>+6 Dex if Combat Mastery Rank B+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Challenging"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 11,'effects' => "<ul>
			<li>+2~3 Int when lvl 7+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Considerate"));
		Enchant::create(array('enchantsonto' => "Bows, Crossbows",'rank' => 11,'effects' => "<ul>
			<li>-10 Int when lvl 25+</li>
			<li>+6 Dex when lvl 15+</li>
			<li>+8 Max Damage if Ranged Attack Rank B+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Delusional"));
		Enchant::create(array('enchantsonto' => "Footwear",'rank' => 11,'effects' => "<ul>
			<li>+5 Stamina when lvl 10+</li>
			<li>+3 Defense if Rest Rank Novice</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Dire Wolf"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 11,'effects' => "<ul>
			<li>-20 Luck</li>
			<li>+5% Balance</li>
			<li>+5% Critical</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Elm Tree"));
		Enchant::create(array('enchantsonto' => "Weapon",'rank' => 11,'effects' => "<ul>
			<li>+10 HP if Windmill Rank B+</li>
			<li>-5 Stamina when lvl</li>
			<li>-20</li>
			<li>+5 Str when lvl 15+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Fierce"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 11,'effects' => "<ul>
			<li>+5 HP</li>
			<li>+10 MP</li>
			<li>+5 Int</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Forget-me-not"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 11,'effects' => "<ul>
			<li>+1~2 Luck</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Fortune"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 11,'effects' => "<ul>
			<li>+4~7 MP if lvl 8+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Fountain"));
		Enchant::create(array('enchantsonto' => "Gloves",'rank' => 11,'effects' => "<ul>
			<li>+1 % Fragmentation Success Rate if Fragmentation Rank C+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Fragment"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 11,'effects' => "<ul>
			<li>+5 HP if Combat Mastery B+</li>
			<li>+5 Str if Combat Mastery B+</li>
			<li>-15 Int</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Giant"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 11,'effects' => "<ul>
			<li>-15 Str when lvl 18+</li>
			<li>+3~5 Max Damage when lvl</li>
			<li>-8</li>
			<li>+5% Balance when lvl</li>
			<li>-13</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Gold Goblin"));
		Enchant::create(array('enchantsonto' => "Wands",'rank' => 11,'effects' => "<ul>
			<li>+10 MP when lvl</li>
			<li>-30</li>
			<li>-8 Str when lvl 15+</li>
			<li>+10 Will</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Hope"));
		Enchant::create(array('enchantsonto' => "Magic Clothes",'rank' => 11,'effects' => "<ul>
			<li>+10 MP</li>
			<li>-5 Luck if Meditation Rank E-</li>
			<li>+1~2 Decreased MP Consumption if Lightning Bolt Rank 3+[1]</li>
			<li>+1~2 Decreased MP Consumption if Lightning Bolt Rank 7+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Mana Summoner"));
		Enchant::create(array('enchantsonto' => "Knuckles",'rank' => 11,'effects' => "<ul>
			<li>+20 HP</li>
			<li>+8~16 Will If Respite Rank 5+</li>
			<li>+8 Max Damage if Tumble Rank 9+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Master"));
		Enchant::create(array('enchantsonto' => "Cooking Table and Cooking Pot",'rank' => 11,'effects' => "<ul>
			<li>+10 MP</li>
			<li>+5 Defense if Cooking Rank C+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Meat"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 11,'effects' => "<ul>
			<li>+10 Str</li>
			<li>+5 Dex</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Passing rain's"));
		Enchant::create(array('enchantsonto' => "Light Armor",'rank' => 11,'effects' => "<ul>
			<li>-10 MP</li>
			<li>+15 Str when lvl 10+</li>
			<li>+2 Defense when lvl 20+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Pirate"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 11,'effects' => "<ul>
			<li>+5 HP</li>
			<li>+8 Str</li>
			<li>+5 Dex</li>
			<li>+1% Protection</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Pisces"));
		Enchant::create(array('enchantsonto' => "Two-Handed Weapons",'rank' => 11,'effects' => "<ul>
			<li>-20 Int when lvl 20+</li>
			<li>+5% Balance if Critical Rank C+</li>
			<li>+5% Critical if Critical Rank 9+</li>
			<li>-10% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Reckless"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 11,'effects' => "<ul>
			<li>+4 Stamina</li>
			<li>+4 Water Element Alchemy Damage if Water Cannon Rank 6+</li>
			<li>+3 Water Element Alchemy Damage if Water Cannon Rank D+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Ripple"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 11,'effects' => "<ul>
			<li>+6 Str</li>
			<li>+8 Dex</li>
			<li>+1% Protection</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Rose"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 11,'effects' => "<ul>
			<li>+10 Stamina</li>
			<li>+5 Dex</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Sagittarius"));
		Enchant::create(array('enchantsonto' => "Dual Guns",'rank' => 11,'effects' => "<ul>
			<li>+5</li>
			<li>-15% Balance if Reload Rank 9+</li>
			<li>+5</li>
			<li>-10% Critical if Bullet Slide Rank A+</li>
			<li>+4 Attack Speed</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Semi-Auto"));
		Enchant::create(array('enchantsonto' => "Chef's hats",'rank' => 11,'effects' => "<ul>
			<li>+7 Dex if Cooking Rank D+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Spice"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 11,'effects' => "<ul>
			<li>+5~8 Stamina</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Sustainer"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 11,'effects' => "<ul>
			<li>+4 Max Damage</li>
			<li>+4 Min Damage</li>
			<li>+3% Balance</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Swarming"));
		Enchant::create(array('enchantsonto' => "Fomor Bows and Crossbows",'rank' => 11,'effects' => "<ul>
			<li>+10 Stamina when Age</li>
			<li>-13</li>
			<li>+7 Dex when Age</li>
			<li>-55</li>
			<li>-4 Defense</li>
			<li>+13~17 Dex when Age</li>
			<li>-13</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Troublemaker"));
		Enchant::create(array('enchantsonto' => "Large-type Cooking Utensils",'rank' => 11,'effects' => "<ul>
			<li>+30% Critical if Cooking Rank 9+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Vegetable"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 11,'effects' => "<ul>
			<li>+10 Stamina</li>
			<li>+5 Will</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Violet"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 11,'effects' => "<ul>
			<li>+10 Stamina if Tailoring Rank C+</li>
			<li>+3 Dex if Blacksmith Rank C+</li>
			<li>-8~3 Max Damage if Weaving Rank E+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "White Spider"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 11,'effects' => "<ul>
			<li>+1~3 Max Damage when Alchemy Mastery Rank C+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Wild Boar"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 11,'effects' => "<ul>
			<li>+10 MP if Lightning Bolt Rank D+</li>
			<li>-5 Str if Icebolt Rank C+</li>
			<li>+3 Int if Firebolt Rank C+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Will O' The Wisp"));
		Enchant::create(array('enchantsonto' => "Knuckles",'rank' => 11,'effects' => "<ul>
			<li>+20 HP</li>
			<li>+8~16 Will If Recovery Rank 5+</li>
			<li>+8 Max Damage if Backstep Rank 9+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Expert"));
		Enchant::create(array('enchantsonto' => "Large Rolling Pin",'rank' => 12,'effects' => "<ul>
			<li>+40 Max Damage if Cooking Rank 9+</li>
			<li>+20 Min Damage if Cooking Rank E+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Bitter"));
		Enchant::create(array('enchantsonto' => "Helmets",'rank' => 12,'effects' => "<ul>
			<li>-5 Dex when lvl 10+</li>
			<li>+5% Critical if Giant or Giant-Allied</li>
			<li>+5 % Critical if Combat Mastery Rank 9+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Blunt"));
		Enchant::create(array('enchantsonto' => "Chef Hats",'rank' => 12,'effects' => "<ul>
			<li>+15 Dex if Cooking Rank B+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Boiled"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 12,'effects' => "<ul>
			<li>-4% Critical</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Broken"));
		Enchant::create(array('enchantsonto' => "Headgears",'rank' => 12,'effects' => "<ul>
			<li>-5 HP when lvl 10+</li>
			<li>+5 Stamina when lvl</li>
			<li>-20</li>
			<li>+2 Dex if Cooking Rank D+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Convenient"));
		Enchant::create(array('enchantsonto' => "Large Ladle and Large Cooking Knife",'rank' => 12,'effects' => "<ul>
			<li>+30 Max Damage if Cooking Rank 9+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Delicious"));
		Enchant::create(array('enchantsonto' => "Two-Handed Weapons",'rank' => 12,'effects' => "<ul>
			<li>+4 Max Damage if Exploration lvl 6+</li>
			<li>+2 Min Damage if Exploration lvl 9-</li>
			<li>-3% Protection</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Fennec Fox"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 12,'effects' => "<ul>
			<li>+1~3% Balance when lvl 3+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Good"));
		Enchant::create(array('enchantsonto' => "Cooking Table and Cooking Pot",'rank' => 12,'effects' => "<ul>
			<li>+7% Critical if Cooking Rank A+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Honest"));
		Enchant::create(array('enchantsonto' => "Clothing, Armor",'rank' => 12,'effects' => "<ul>
			<li>+20 Marionette Max HP</li>
			<li>+2 Marionette Defense</li>
			<li>+2 Marionette Protection</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Marionette"));
		Enchant::create(array('enchantsonto' => "Shields",'rank' => 12,'effects' => "<ul>
			<li>-10 Int</li>
			<li>+4 Max Damage if Campfire Rank E+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Peculiar"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 12,'effects' => "<ul>
			<li>-1~15% Max Injury Rate</li>
			<li>-1~4% Min Injury Rate</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Penguin"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 12,'effects' => "<ul>
			<li>-5~4% Min Injury Rate</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Penguin Summoner's"));
		Enchant::create(array('enchantsonto' => "Shoes, Boots",'rank' => 12,'effects' => "<ul>
			<li>-1% Balance</li>
			<li>+2% Min Injury Rate if Counterattack Rank E+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Puddle's"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 12,'effects' => "<ul>
			<li>-5 Luck</li>
			<li>+5 Max Damage if Exploration lvl 8+</li>
			<li>-4 Min Damage if Exploration lvl</li>
			<li>-15</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Quartz"));
		Enchant::create(array('enchantsonto' => "Dual Guns",'rank' => 12,'effects' => "<ul>
			<li>+5</li>
			<li>-8 Max Damage if Dual Gun Mastery Rank B+</li>
			<li>+1~3 Min Damage</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Recruit's"));
		Enchant::create(array('enchantsonto' => "Gloves, Boots",'rank' => 12,'effects' => "<ul>
			<li>-6 HP when lvl 25+</li>
			<li>+2 Str when lvl 15+</li>
			<li>+6 Max Damage if Smash Rank < C</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Sacrificial"));
		Enchant::create(array('enchantsonto' => "Heavy Armor",'rank' => 12,'effects' => "<ul>
			<li>+10 Max Damage</li>
			<li>+10% Balance</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Sight"));
		Enchant::create(array('enchantsonto' => "Hat",'rank' => 12,'effects' => "<ul>
			<li>+5 MP when lvl 8+</li>
			<li>+2 Int when lvl</li>
			<li>-10</li>
			<li>+2 Will when lvl 20+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Smart"));
		Enchant::create(array('enchantsonto' => "Helmet",'rank' => 12,'effects' => "<ul>
			<li>+5 HP when lvl 8+</li>
			<li>+2 Str when lvl 10-</li>
			<li>+2 Dex when lvl 20+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Strong"));
		Enchant::create(array('enchantsonto' => "Metal Weapons and Armor",'rank' => 12,'effects' => "<ul>
			<li>-5 Will</li>
			<li>+5 Max Damage if Exploration lvl 12+</li>
			<li>-4% Critical when lvl</li>
			<li>-20</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Topaz"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 12,'effects' => "<ul>
			<li>-24~19% Balance</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Toy"));
		Enchant::create(array('enchantsonto' => "Clothes, Armor",'rank' => 12,'effects' => "<ul>
			<li>-10 Will when lvl 24+</li>
			<li>+6 Max Damage</li>
			<li>-6% Balance when lvl</li>
			<li>-18</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Victorious"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 12,'effects' => "<ul>
			<li>-20 Luck</li>
			<li>+14% Critical</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Vine"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 12,'effects' => "<ul>
			<li>+5 Str if Combat Mastery C+</li>
			<li>-5 Dex when lvl 16+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Wild"));
		Enchant::create(array('enchantsonto' => "Clothes",'rank' => 12,'effects' => "<ul>
			<li>+5 HP if Life Drain B+</li>
			<li>+5 Stamina if Wind Blast A+                       -(In-game text error)-</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Windy"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 12,'effects' => "<ul>
			<li>+4~6 Max Damage when lvl 10+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Wolf Hunter's"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 12,'effects' => "<ul>
			<li>+1 Max Damage</li>
			<li>+1 Min Damage</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Capricornus"));
		Enchant::create(array('enchantsonto' => "Headgears, Footwear, Accessory",'rank' => 12,'effects' => "<ul>
			<li>+1~2 Dex when lvl 2+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Cloud"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 12,'effects' => "<ul>
			<li>-20~16 HP</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Dead Man"));
		Enchant::create(array('enchantsonto' => "Metal Weapons and Armor",'rank' => 12,'effects' => "<ul>
			<li>-5 MP</li>
			<li>+3 Max Damage if using \"the One Who Saw the Library Ghost\" title</li>
			<li>+3 Min Damage if using \"the One Who Saw the Library Ghost\" title</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Fir Tree"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 12,'effects' => "<ul>
			<li>+3 Min Damage</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Hail's"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 12,'effects' => "<ul>
			<li>+2~3 HP</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Health"));
		Enchant::create(array('enchantsonto' => "Gloves, Shoes",'rank' => 12,'effects' => "<ul>
			<li>+5~10 Luck when lvl 28+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Joy"));
		Enchant::create(array('enchantsonto' => "Footwear",'rank' => 12,'effects' => "<ul>
			<li>+15 MP</li>
			<li>+10 Int if Healing Rank C+</li>
			<li>+3% Balance</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Insightful"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 12,'effects' => "<ul>
			<li>-7 Int when lvl 30+</li>
			<li>+4 Dex</li>
			<li>+6 Will when lvl</li>
			<li>-16</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Magnolia"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 12,'effects' => "<ul>
			<li>-2 HP</li>
			<li>+1 Decreased MP Consumption if Magic Mastery Rank C+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Mana Magician"));
		Enchant::create(array('enchantsonto' => "Bows and Crossbows",'rank' => 12,'effects' => "<ul>
			<li>-5 HP if Combat Mastery Rank B+</li>
			<li>+2 Max Damage if Ranged Attack Rank C+</li>
			<li>+2 Min Damage if Ranged Attack Rank A+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Ogre"));
		Enchant::create(array('enchantsonto' => "Magic Clothes",'rank' => 12,'effects' => "<ul>
			<li>+1</li>
			<li>-6 Dex when lvl 20+</li>
			<li>-6 Will if Magnum Shot Rank</li>
			<li>-6</li>
			<li>+1~4 Poison Resistance</li>
			<li>-3 Dex if Ranged Attack -A</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Poison Sniper"));
		Enchant::create(array('enchantsonto' => "Sea Troll Cudgel, Wild Troll Cudgel",'rank' => 12,'effects' => "<ul>
			<li>+25~35 Str</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Shellfish"));
		Enchant::create(array('enchantsonto' => "Bows and Crossbows",'rank' => 12,'effects' => "<ul>
			<li>+5 Max Damage</li>
			<li>+4 Min Damage</li>
			<li>+3% Balance</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Skilled"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 12,'effects' => "<ul>
			<li>-12~9 Dex</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Snail"));
		Enchant::create(array('enchantsonto' => "Clothes",'rank' => 12,'effects' => "<ul>
			<li>+6 HP</li>
			<li>+4 MP</li>
			<li>+6 Stamina</li>
			<li>-5 Will when lvl 15-</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Snappy"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 12,'effects' => "<ul>
			<li>+1~2 Str when lvl 2+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Soldier"));
		Enchant::create(array('enchantsonto' => "Accessory",'rank' => 12,'effects' => "<ul>
			<li>+3 Max Damage</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Sundrop"));
		Enchant::create(array('enchantsonto' => "Clothes, Armor and Shields",'rank' => 12,'effects' => "<ul>
			<li>-20% Balance when lvl 5+</li>
			<li>+1 Defense when lvl</li>
			<li>-10</li>
			<li>+2% Protection when lvl</li>
			<li>-10</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Stone"));
		Enchant::create(array('enchantsonto' => "Footwear",'rank' => 12,'effects' => "<ul>
			<li>+10 Stamina</li>
			<li>+10 Str if Alchemy Mastery Rank B+</li>
			<li>-20 Will when lvl</li>
			<li>-18</li>
			<li>+3 Min Damage</li>
			<li>+10x Repair Cost</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "the Alchemist's"));
		Enchant::create(array('enchantsonto' => "Gloves, Shoes",'rank' => 12,'effects' => "<ul>
			<li>-15 HP if Critical Rank B+</li>
			<li>+5 Stamina if Defense Rank C+</li>
			<li>+3 Str when lvl 25+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "the Earth"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 12,'effects' => "<ul>
			<li>-12~9 Str</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "the Loser"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 12,'effects' => "<ul>
			<li>+1~2 Will if level 8+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "the Twinkle"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 12,'effects' => "<ul>
			<li>-15~10 Stamina</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Tired Man"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 12,'effects' => "<ul>
			<li>-10~8 Max Damage</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Rabbit Hunter's"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 12,'effects' => "<ul>
			<li>-19~13% Balance</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Useless"));
		Enchant::create(array('enchantsonto' => "Hats (Says \"Headgear\" in-game)",'rank' => 13,'effects' => "<ul>
			<li>+14 Luck</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Advantage"));
		Enchant::create(array('enchantsonto' => "Instruments",'rank' => 13,'effects' => "<ul>
			<li>+4 HP if Lullaby Rank B+</li>
			<li>+12 Stamina</li>
			<li>+3 Max Damage</li>
			<li>+1 Music Buff Effect if Playing Instrument Rank B+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Andante"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 13,'effects' => "<ul>
			<li>-5 Luck</li>
			<li>+4 Max Damage if Exploration lvl 6+</li>
			<li>-3 Min Damage if Exploration lvl</li>
			<li>-12</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Apatite"));
		Enchant::create(array('enchantsonto' => "Gloves",'rank' => 13,'effects' => "<ul>
			<li>-15 HP if Combat Mastery Rank D+</li>
			<li>+5 Max Damage</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Cold-Hearted"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 13,'effects' => "<ul>
			<li>-3% Critical</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Cracked"));
		Enchant::create(array('enchantsonto' => "Helmets (Says \"Headgear\" in-game)",'rank' => 13,'effects' => "<ul>
			<li>+10 Will</li>
			<li>+5 Max Damage</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Deserted"));
		Enchant::create(array('enchantsonto' => "Sea Troll CudgelWild Troll Cudgel",'rank' => 13,'effects' => "<ul>
			<li>+20~40 Str</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Dull"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 13,'effects' => "<ul>
			<li>+10 Str</li>
			<li>+8% Critical</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Fang"));
		Enchant::create(array('enchantsonto' => "Weapon",'rank' => 13,'effects' => "<ul>
			<li>-5 HP</li>
			<li>-5 Stamina</li>
			<li>+10 Str</li>
			<li>+10 Will</li>
			<li>+8 Max Damage</li>
			<li>+5 Min Damage</li>
			<li>+10x Repair Cost</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Goddess'"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 13,'effects' => "<ul>
			<li>-5 HP</li>
			<li>+3% Balance if Defense Rank D+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Grassland's"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 13,'effects' => "<ul>
			<li>+16 Stamina</li>
			<li>+6% Balance if Rain Casting Rank C+</li>
			<li>+12 Stamina if Wind Blast Rank A+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Gust"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 13,'effects' => "<ul>
			<li>-13~8% Balance</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Imitation"));
		Enchant::create(array('enchantsonto' => "Clothes, Armor",'rank' => 13,'effects' => "<ul>
			<li>-5 MP</li>
			<li>+3% Critical if Combat Mastery Rank 9+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Masked Goblin"));
		Enchant::create(array('enchantsonto' => "Armor and Clothing",'rank' => 13,'effects' => "<ul>
			<li>+2 HP if Lullaby Rank C+</li>
			<li>+5 Stamina if Playing Instrument Rank 9+</li>
			<li>+4 HP</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Minor"));
		Enchant::create(array('enchantsonto' => "Metal Weapons and Armor",'rank' => 13,'effects' => "<ul>
			<li>-5 Will</li>
			<li>+4 Max Damage if Exploration lvl 9+</li>
			<li>-3% Critical when lvl</li>
			<li>-15</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Orthoclase"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 13,'effects' => "<ul>
			<li>-10% Max Injury Rate</li>
			<li>-3% Min Injury Rate</li>
			<li>+5% Critical if Exploration lvl 8+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Ostrich"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 13,'effects' => "<ul>
			<li>-8~6 Max Damage</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Pig Hunter's"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 13,'effects' => "<ul>
			<li>-4~3 Min Damage</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Pig Tamer's"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 13,'effects' => "<ul>
			<li>+5~10% Max Injury Rate when lvl 24+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Raven Slayer's"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 13,'effects' => "<ul>
			<li>+1~2 Max Damage when lvl 4+</li>
			<li>+1 Min Damage when lvl 4+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Snake"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 13,'effects' => "<ul>
			<li>+1 Min Damage when lvl 3+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Snake Tamer's"));
		Enchant::create(array('enchantsonto' => "Gloves (not gauntlets)",'rank' => 13,'effects' => "<ul>
			<li>+7 Stamina</li>
			<li>+5 Fire Alchemic damage if Flame burst Rank C+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Spark"));
		Enchant::create(array('enchantsonto' => "Metal Boots",'rank' => 13,'effects' => "<ul>
			<li>+16 Str</li>
			<li>+10% Balance</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Strider"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 13,'effects' => "<ul>
			<li>+1% Min Injury Rate when lvl 12+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Swan Summoner's"));
		Enchant::create(array('enchantsonto' => "Shield",'rank' => 13,'effects' => "<ul>
			<li>-5 Str</li>
			<li>+5 Will if Rest Rank E+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Alder Tree"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 13,'effects' => "<ul>
			<li>-1 Will</li>
			<li>+1 Explosion Resistance if Combat Mastery Rank D+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Burst Soldier"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 13,'effects' => "<ul>
			<li>+10 MP</li>
			<li>+10 Max Damage</li>
			<li>+10% Critical</li>
			<li>+10x Repair Cost</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Caliburn"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 13,'effects' => "<ul>
			<li>-9~6 Str</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Cowardly"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 13,'effects' => "<ul>
			<li>-8~6 Defense</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Crab"));
		Enchant::create(array('enchantsonto' => "Clothing, Armor",'rank' => 13,'effects' => "<ul>
			<li>+5 Max Damage</li>
			<li>+5% Balance</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Glass Fragment"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 13,'effects' => "<ul>
			<li>-9~6 Will</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Gloomy"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 13,'effects' => "<ul>
			<li>+3 Str when lvl 25+</li>
			<li>+2 Max Damage when lvl</li>
			<li>-10</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Gray Wolf"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 13,'effects' => "<ul>
			<li>+10 Stamina</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Hedgehog"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 13,'effects' => "<ul>
			<li>+3 Dex when lvl 25+</li>
			<li>+2 Max Damage when lvl</li>
			<li>-10</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Kobold"));
		Enchant::create(array('enchantsonto' => "Weapon",'rank' => 13,'effects' => "<ul>
			<li>+30 Stamina</li>
			<li>+15 Str</li>
			<li>+15 Int</li>
			<li>+10 Luck</li>
			<li>+10x Repair Cost</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Obsidian"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 13,'effects' => "<ul>
			<li>+3~4 Stamina</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Patience"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 13,'effects' => "<ul>
			<li>-15~10 HP</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Patient"));
		Enchant::create(array('enchantsonto' => "Phoenix Feather SwordMysterious Phoenix Feather Sword",'rank' => 13,'effects' => "<ul>
			<li>+20 Luck</li>
			<li>+1~3 Max Damage if using \"The Phoenix's Witness\" Title</li>
			<li>+5~10% Critical</li>
			<li>+50% Repair Cost</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Phoenix's Rage"));
		Enchant::create(array('enchantsonto' => "Headgear, Shields",'rank' => 13,'effects' => "<ul>
			<li>+10 Stamina when lvl 35+</li>
			<li>-1% Protection when lvl</li>
			<li>-10</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Red Bear"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 13,'effects' => "<ul>
			<li>-9~6 Dex</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Scarecrow"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 13,'effects' => "<ul>
			<li>+10 HP when lvl 35+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Skeleton"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 13,'effects' => "<ul>
			<li>+12 MP</li>
			<li>+7 Int</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Sprout"));
		Enchant::create(array('enchantsonto' => "Metal Boots",'rank' => 13,'effects' => "<ul>
			<li>+10 Str if using \"the Aspiring Sailor\" title</li>
			<li>-5 Dex</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Stopping"));
		Enchant::create(array('enchantsonto' => "Headgears",'rank' => 13,'effects' => "<ul>
			<li>+5 MP if Healing Rank D+</li>
			<li>-3 Str when lvl 18+</li>
			<li>+6 Will when lvl 15+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Twilight"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 13,'effects' => "<ul>
			<li>+1~2 Int when lvl 2+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Understanding"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 13,'effects' => "<ul>
			<li>+2~3 MP</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Water"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 13,'effects' => "<ul>
			<li>+3 HP when lvl 5+</li>
			<li>+3 MP when lvl 10+</li>
			<li>+3 Stamina when lvl 15+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "White Fox"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 14,'effects' => "<ul>
			<li>-5 Luck</li>
			<li>+3 Max Damage while Explore lvl 4+</li>
			<li>-2 Min Damage while Explore lvl</li>
			<li>-9</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Calcite"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 14,'effects' => "<ul>
			<li>-8~2% Balance</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Cheap"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 14,'effects' => "<ul>
			<li>-6~4 Max Damage</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Donkey Hunter's"));
		Enchant::create(array('enchantsonto' => "Metal Weapons and Armor",'rank' => 14,'effects' => "<ul>
			<li>-5 Will</li>
			<li>+3 Max Damage while Explore lvl 6+</li>
			<li>-2% Critical while lvl</li>
			<li>-10</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Fluorite"));
		Enchant::create(array('enchantsonto' => "Gloves and Gauntlets",'rank' => 14,'effects' => "<ul>
			<li>-4 Stamina</li>
			<li>+2 Min Damage if Smash Rank E+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Forest"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 14,'effects' => "<ul>
			<li>+4~2 Max Damage while lvl</li>
			<li>+3</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Fox Hunter's"));
		Enchant::create(array('enchantsonto' => "Metal Weapons and Armor",'rank' => 14,'effects' => "<ul>
			<li>+8 HP when lvl</li>
			<li>-18</li>
			<li>+1 Str when lvl 5+</li>
			<li>+3 Dex when lvl 25+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Hard"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 14,'effects' => "<ul>
			<li>+2 HP when lvl 5+</li>
			<li>-2 Stamina when lvl 15+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Hyena"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 14,'effects' => "<ul>
			<li>+3 HP if Giant or Giant-allied</li>
			<li>+3 Stamina if Combat Mastery D+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Lively"));
		Enchant::create(array('enchantsonto' => "Two-Handed Weapons",'rank' => 14,'effects' => "<ul>
			<li>+2 Max Damage when Exploration lvl 3+</li>
			<li>+2 Min Damage when Exploration lvl</li>
			<li>-6</li>
			<li>-1% Protection</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Mongoose"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 14,'effects' => "<ul>
			<li>-1~4%% Max Injury Rate</li>
			<li>-1~2%% Min Injury Rate</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Pelican"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 14,'effects' => "<ul>
			<li>-6~4% Max Injury Rate</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Pelican Slayer's"));
		Enchant::create(array('enchantsonto' => "Shields",'rank' => 14,'effects' => "<ul>
			<li>-5 Int</li>
			<li>+3 Max Damage if Campfire Rank F+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Odd"));
		Enchant::create(array('enchantsonto' => "Clothes",'rank' => 14,'effects' => "<ul>
			<li>+3 Stamina when lvl 25+</li>
			<li>+1 Will when lvl 5+</li>
			<li>+3 Luck when lvl 15+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Restful"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 14,'effects' => "<ul>
			<li>-2% Critical</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Rusty"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 14,'effects' => "<ul>
			<li>+3 HP when lvl 10+</li>
			<li>+3 Stamina when lvl 5+</li>
			<li>-5 Str when lvl</li>
			<li>-15</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Sheep Raising's"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 14,'effects' => "<ul>
			<li>+2% Critical when lvl 12+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Sharp"));
		Enchant::create(array('enchantsonto' => "Clothes and Armor",'rank' => 14,'effects' => "<ul>
			<li>-3 MP</li>
			<li>+2% Critical if Combat Mastery Rank C+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Manchurian Bear"));
		Enchant::create(array('enchantsonto' => "Footwear",'rank' => 14,'effects' => "<ul>
			<li>+8 HP when lvl 25+</li>
			<li>+2 Str when lvl</li>
			<li>-5</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "the Mist"));
		Enchant::create(array('enchantsonto' => "Clothes and Armor",'rank' => 14,'effects' => "<ul>
			<li>-2 Str if Critical Hit Rank E+</li>
			<li>-5% Balance when lvl 13+</li>
			<li>+4% Critical</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Unstable"));
		Enchant::create(array('enchantsonto' => "Gloves and Gauntlets",'rank' => 14,'effects' => "<ul>
			<li>-2 Stamina</li>
			<li>+1 Min Damage if Smash Rank F+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Valley"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 14,'effects' => "<ul>
			<li>+7 Dex</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Wealthy"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 14,'effects' => "<ul>
			<li>-6~3 Str</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Baby"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 14,'effects' => "<ul>
			<li>+2 MP if Mana Crystallization E+</li>
			<li>+3 Stamina if Alchemy Mastery F+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Combined"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 14,'effects' => "<ul>
			<li>-6~4 Defense</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Crayfish"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 14,'effects' => "<ul>
			<li>-9~5 MP</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Dryness"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 14,'effects' => "<ul>
			<li>-4~2% Protection</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Jade"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 14,'effects' => "<ul>
			<li>+5 Will when lvl 8+</li>
			<li>-2% Protection when lvl 10+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Japanese Cedar Tree"));
		Enchant::create(array('enchantsonto' => "Gloves",'rank' => 14,'effects' => "<ul>
			<li>+10 Stamina when lvl 25+</li>
			<li>+2 Dex when lvl</li>
			<li>-5</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Opal"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 14,'effects' => "<ul>
			<li>-1 Str</li>
			<li>+1 Poison Resistance if Ranged Attack Rank E+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Poison Archer"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 14,'effects' => "<ul>
			<li>+2 HP while lvl 5+</li>
			<li>+2 MP while lvl 15+</li>
			<li>+2 Stamina while lvl 10+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Red Fox"));
		Enchant::create(array('enchantsonto' => "Gloves, Footwear, and Accessories",'rank' => 14,'effects' => "<ul>
			<li>+3~2 Luck when lvl 5+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Rich"));
		Enchant::create(array('enchantsonto' => "Helmets",'rank' => 14,'effects' => "<ul>
			<li>+10 Luck if 'Friend of Horse and Ostrich' Title</li>
			<li>-20% Min Injury Rate</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Surviving"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 14,'effects' => "<ul>
			<li>-4~3 Stamina</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Swamp"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 14,'effects' => "<ul>
			<li>+3 HP if Combat Mastery Rank E-</li>
			<li>+2 Str if Combat Mastery Rank B+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "the Brown Bear"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 15,'effects' => "<ul>
			<li>-6 Stamina if Weaving Rank E+</li>
			<li>+3 Dex</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Artless"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 15,'effects' => "<ul>
			<li>+2 Will when Cumulative Level is below 200</li>
			<li>+1 Luck when Cumulative Level is below 200</li>
			<li>+1 Luck when Cumulative Level is above 100</li>
			<li>+2 Will when Cumulative Level is above 100</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Aspiring"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 15,'effects' => "<ul>
			<li>+3 HP when lvl 5-</li>
			<li>-1 Str when lvl 5-</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Beginner's"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 15,'effects' => "<ul>
			<li>+1% Critical when lvl 4+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Fine"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 15,'effects' => "<ul>
			<li>-4~2% Max Injury Rate</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Flamingo Slayer's"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 15,'effects' => "<ul>
			<li>+1 Dex</li>
			<li>-1 Will</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Green"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 15,'effects' => "<ul>
			<li>-4~2 Max Damage</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Hyena Hunter's"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 15,'effects' => "<ul>
			<li>-2~1 Min Damage</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Hyena Tamer's"));
		Enchant::create(array('enchantsonto' => "Weapons",'rank' => 15,'effects' => "<ul>
			<li>-5% Max Injury Rate</li>
			<li>-1% Min Injury Rate</li>
			<li>+3% Critical when Explore lvl 4+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Kiwi"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 15,'effects' => "<ul>
			<li>-1% Critical</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Old"));
		Enchant::create(array('enchantsonto' => "Metal Weapons and Armor",'rank' => 15,'effects' => "<ul>
			<li>-5 Will</li>
			<li>+2 Max Damage when Explore lvl 3+</li>
			<li>-1% Critical when lvl 5-</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Plaster"));
		Enchant::create(array('enchantsonto' => "Headgear",'rank' => 15,'effects' => "<ul>
			<li>-5 HP</li>
			<li>+1% Balance if Defense Rank F+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Prairie's"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 15,'effects' => "<ul>
			<li>+3% Balance</li>
			<li>-2% Critical</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Puppet's"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 15,'effects' => "<ul>
			<li>+1 HP when lvl 3+</li>
			<li>-1 Stamina when lvl 10+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Rabbit"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 15,'effects' => "<ul>
			<li>+2~1 Max Damage</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Snake Hunter's"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 15,'effects' => "<ul>
			<li>+2 Max Damage when Cumulative Level is above 100</li>
			<li>+1 Defense when Cumulative Level is above 100</li>
			<li>+2 Max Damage when Cumulative Level is below 200</li>
			<li>+1 Defense when Cumulative Level is below 200</li>
		</ul>",'personalized' => true,'type' => 1,'name' => "Starting"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 15,'effects' => "<ul>
			<li>+4~2% Max Injury Rate when lvl 6+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Swan Slayer's"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 15,'effects' => "<ul>
			<li>+2~1% Max Injury Rate when lvl 5+</li>
			<li>+1% Min Injury Rate when lvl 5+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Swan's"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 15,'effects' => "<ul>
			<li>-5 Luck</li>
			<li>+2 Max Damage when Explore lvl 2+</li>
			<li>-1 Min Damage when Explore lvl 6-</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Talcum"));
		Enchant::create(array('enchantsonto' => "Armor",'rank' => 15,'effects' => "<ul>
			<li>-1 MP</li>
			<li>+1% Critical if Combat Mastery Rank F+</li>
		</ul>",'personalized' => false,'type' => 1,'name' => "Wild Horse"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 15,'effects' => "<ul>
			<li>+1 Str if Combat Mastery Rank E+</li>
			<li>-1 Int if Combat Mastery Rank E+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Brown Fox"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 15,'effects' => "<ul>
			<li>-3~1 Str</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Farmer"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 15,'effects' => "<ul>
			<li>-3~1 Int</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Forgetful"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 15,'effects' => "<ul>
			<li>-3~1 Will</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Haze"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 15,'effects' => "<ul>
			<li>+3 Str when Cumulative Level is above 100</li>
			<li>+3 Int when Cumulative Level is above 100</li>
			<li>+3 Dex when Cumulative Level is above 100</li>
			<li>+3 Str when Cumulative Level is below 200</li>
			<li>+3 Int when Cumulative Level is below 200</li>
			<li>+3 Dex when Cumulative Level is below 200</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Journeyman's"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 15,'effects' => "<ul>
			<li>-4~2 Defense</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Lobster"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 15,'effects' => "<ul>
			<li>-3~1 Luck</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Misfortune"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 15,'effects' => "<ul>
			<li>-3 HP when lvl 3+</li>
			<li>+1 Dex when lvl 3+</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Raccoon"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 15,'effects' => "<ul>
			<li>-3~1 Dex</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Sluggish"));
		Enchant::create(array('enchantsonto' => "Gauntlets",'rank' => 15,'effects' => "<ul>
			<li>+20 Stamina when using the Butterfinger Title</li>
			<li>-10 Luck</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Staying"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 15,'effects' => "<ul>
			<li>-4~3 MP</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Teardrop"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 15,'effects' => "<ul>
			<li>-2~1% Protection</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Topaz"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 15,'effects' => "<ul>
			<li>+5 HP when Cumulative Level is above 100</li>
			<li>+5 MP when Cumulative Level is above 100</li>
			<li>+5 Stamina when Cumulative Level is above 100</li>
			<li>+5 HP when Cumulative Level is below 200</li>
			<li>+5 MP when Cumulative Level is below 200</li>
			<li>+5 Stamina when Cumulative Level is below 200</li>
		</ul>",'personalized' => true,'type' => 2,'name' => "Traveler's"));
		Enchant::create(array('enchantsonto' => "All",'rank' => 15,'effects' => "<ul>
			<li>-4~3 HP</li>
		</ul>",'personalized' => false,'type' => 2,'name' => "Weak"));

	}
}