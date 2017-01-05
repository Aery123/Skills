<?php
   namespace FightTheSky;
   use spl\BaseClassLoader;
   use pocketmine\event\player\PlayerJoinEvent;
   use pocketmine\entity\Effect;
   use pocketmine\item\ItemBlock;
   use pocketmine\entity\InstantEffect; 
   use pocketmine\event\Listener;
   use pocketmine\Player;
   use pocketmine\plugin\PluginBase;
   use pocketmine\utils\TextFormat;
   use pocketmine\item\Item;
   use pocketmine\level\Level;
   use pocketmine\math\Vector3;
   use pocketmine\inventory\PlayerInventory; 
   use pocketmine\event\entity\EntityDamageByEntityEvent;
   use pocketmine\event\entity\EntityShootBowEvent;
   use pocketmine\block\block;
   
   use pocketmine\Server;
   use onebone\economyapi\EconomyAPI; 
   use pocketmine\event\entity\EntityDamageEvent;
   use pocketmine\inventory\Inventory;
   use pocketmine\entity\Entity;
   use pocketmine\scheduler\PluginTask;
   use pocketmine\utils\Config;
   use pocketmine\event\player\PlayerMoveEvent;
   use pocketmine\event\player\PlayerItemHeldEvent;
   use pocketmine\event\player\PlayerInteractEvent;
   use pocketmine\command\CommandSender;
   use pocketmine\command\Command;
   use pocketmine\event\entity\EntityDespawnEvent;
	use pocketmine\level\particle\BubbleParticle;
	use pocketmine\level\particle\CriticalParticle;
	use pocketmine\level\particle\DustParticle;
	use pocketmine\level\particle\EnchantParticle;
	use pocketmine\level\particle\ExplodeParticle;
	use pocketmine\level\particle\FlameParticle;
	use pocketmine\level\particle\HeartParticle;
	use pocketmine\level\particle\InkParticle;
	use pocketmine\level\particle\ItemBreakParticle;
	use pocketmine\level\particle\LavaDripParticle;	use pocketmine\level\particle\LavaParticle;
	use pocketmine\level\particle\Particle;
	use pocketmine\level\particle\MobSpawnParticle;
	use pocketmine\level\particle\PortalParticle;
	use pocketmine\level\particle\RedstoneParticle;
	use pocketmine\level\particle\SmokeParticle;
	use pocketmine\level\particle\SplashParticle;
	use pocketmine\level\particle\SporeParticle;
	use pocketmine\level\particle\TerrainParticle;
	use pocketmine\level\particle\WaterDripParticle;
	use pocketmine\level\particle\WaterParticle;
	use pocketmine\scheduler\CallbackTask;
   
   
 class Main extends PluginBase implements Listener{
	 public $fire_players = [];
	 public $gift_players = [];
	 public $ball_players = [];


   	public function onEnable(){
   		$this->getServer()->getPluginManager()->registerEvents($this,$this);
   		$this->getLogger()->info(TextFormat::GREEN." By: Aery123   ");
		@mkdir($this->getDataFolder(),0777,true);
		@mkdir($this->getDataFolder() . "players/" ,0777,true);
		$this->firedata=new Config($this->getDataFolder() . "fire.yml",Config::YAML,array());
		$this->world=new Config($this->getDataFolder(). "canPvpWorld.yml",Config::YAML,array('world'=>array(),'particle'=>'on'));

   	}
   	 public function onDisable(){
   		$this->getLogger()->info(TextFormat::RED."Plugin Has Been Disable !");
   		}
		
//-------------------Cauculator
public function fire($name)
{
	$result=array_search($name,$this->fire_players);
	if($result !== false)
	{
		array_splice($this->fire_players,$result,1);
	}
	unset($result);
}
public function gift($name)
{
	$result=array_search($name,$this->gift_players);
	if($result !== false)
	{
		array_splice($this->gift_players,$result,1);
	}
	unset($result);
}
public function ball($name)
{
	$result=array_search($name,$this->ball_players);
	if($result !== false)
	{
		array_splice($this->ball_players,$result,1);
	}
	unset($result);
}
