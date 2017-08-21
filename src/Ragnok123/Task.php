<?php
namespace Ragnok123;

use pocketmine\scheduler\PluginTask;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
use pocketmine\item\Item;

class Task extends PluginTask{

  public function __construct(WallWeapons $plugin){
    parent::__construct($plugin);
    $this->plugin = $plugin;
  }

  public function onRun($Tick){
    foreach($this->plugin->getServer()->getOnlinePlayers() as $p){
      if($p->getXpLevel() > 0){
        $p->setXpLevel($p->getXpLevel() - 1);
        $p->getInventory()->sendContents($p);
      }
    }
  }
}
