<?php


namespace Ragnok123;

use pocketmine\plugin\PluginBase;
use pocketmine\entity\Entity;
use pocketmine\utils\Random;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\level\Position;
use pocketmine\math\Vector3;
use pocketmine\Player;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\nbt\tag\DoubleTag;
use pocketmine\nbt\tag\FloatTag;
use pocketmine\item\Item;
use pocketmine\event\entity\ProjectileLaunchEvent;
use pocketmine\entity\Snowball;
use pocketmine\scheduler\CallbackTask;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class WallWeapons extends PluginBase implements Listener {

	public function onEnable() {
		$this->getServer ()->getPluginManager ()->registerEvents ( $this, $this );
		$this->getServer()->getScheduler()->scheduleRepeatingTask(new Task($this), 30);
	}

  public function onInteract(PlayerInteractEvent $event){
    $player = $event->getPlayer();
    $item = $event->getItem();
		if($player->getXpLevel() > 0){
			$player->sendPopup(TextFormat::RED . "Gun reloading");
			return;
		}
		foreach($player->getInventory()->getContents() as $item2){
	    if($item2->getID() == 351 && $item2->getDamage() == 8 && $item2->getCount() > 0){
        if($item->getId() == 290 || $item->getId() == 270){
				  $nbt = new CompoundTag ( "", [
							"Pos" => new ListTag ( "Pos", [
								new DoubleTag ( "", $player->x ),
								new DoubleTag ( "", $player->y + $player->getEyeHeight () ),
								new DoubleTag ( "", $player->z )
							] ),
							"Motion" => new ListTag ( "Motion", [
								new DoubleTag ( "", - \sin ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) ),
								new DoubleTag ( "", - \sin ( $player->pitch / 180 * M_PI ) ),
								new DoubleTag ( "",\cos ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) )
							] ),
							"Rotation" => new ListTag ( "Rotation", [
								new FloatTag ( "", $player->yaw ),
								new FloatTag ( "", $player->pitch )
							] )
						] );

					$f = 1.5;
					$snowball = Entity::createEntity ( "Snowball", $player->level, $nbt, $player );
					$snowball->setMotion ( $snowball->getMotion ()->multiply ( $f ) );
					$snowball->spawnToAll ();
					$player->getInventory ()->removeItem ( Item::get(351, 8, 1) );
					$player->setXpLevel(2);
					return;
				}
        if($item->getId() == 256){
					$nbt = new CompoundTag ( "", [
				    "Pos" => new ListTag ( "Pos", [
						new DoubleTag ( "", $player->x ),
						new DoubleTag ( "", $player->y + $player->getEyeHeight () ),
						new DoubleTag ( "", $player->z )
				    ] ),
				    "Motion" => new ListTag ( "Motion", [
						new DoubleTag ( "", - \sin ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "", - \sin ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "",\cos ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) )
				    ] ),
				    "Rotation" => new ListTag ( "Rotation", [
						new FloatTag ( "", $player->yaw ),
						new FloatTag ( "", $player->pitch )
				    ] )
		        ] );
		      $f = 3.0;
		      $snowball = Entity::createEntity ( "Snowball", $player->level, $nbt, $player );
		      $snowball->setMotion ( $snowball->getMotion ()->multiply ( $f ) );
		      $snowball->spawnToAll ();
		      $player->getInventory ()->removeItem ( Item::get(351, 8, 1) );
		      $player->setXpLevel(2);
				  return;
				}
			  if($item->getId() == 271 || $item->getId() == 269){
					$nbt = new CompoundTag ( "", [
						"Pos" => new ListTag ( "Pos", [
								new DoubleTag ( "", $player->x ),
								new DoubleTag ( "", $player->y + $player->getEyeHeight () ),
								new DoubleTag ( "", $player->z )
							] ),
							"Motion" => new ListTag ( "Motion", [
								new DoubleTag ( "", - \sin ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) ),
								new DoubleTag ( "", - \sin ( $player->pitch / 180 * M_PI ) ),
								new DoubleTag ( "",\cos ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) )
							] ),
							"Rotation" => new ListTag ( "Rotation", [
								new FloatTag ( "", $player->yaw ),
								new FloatTag ( "", $player->pitch )
							] )
						] );

				  $f = 1.5;
				  $snowball = Entity::createEntity ( "Snowball", $player->level, $nbt, $player );
					$snowball->setMotion ( $snowball->getMotion ()->multiply ( $f ) );
					$snowball->spawnToAll ();
					$player->getInventory ()->removeItem ( Item::get(351, 8, 1) );
					$player->setXpLevel(1);
					return;
				}
				if($item->getId() == 291){
						$nbt = new CompoundTag ( "", [
				    "Pos" => new ListTag ( "Pos", [
						new DoubleTag ( "", $player->x +1),
						new DoubleTag ( "", $player->y + $player->getEyeHeight () ),
						new DoubleTag ( "", $player->z )
				    ] ),
				    "Motion" => new ListTag ( "Motion", [
						new DoubleTag ( "", - \sin ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "", - \sin ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "",\cos ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) )
				    ] ),
				    "Rotation" => new ListTag ( "Rotation", [
						new FloatTag ( "", $player->yaw ),
						new FloatTag ( "", $player->pitch )
				    ] )
		        ] );
		       $nbt6 = new CompoundTag ( "", [
				   "Pos" => new ListTag ( "Pos", [
					  new DoubleTag ( "", $player->x -1),
						new DoubleTag ( "", $player->y + $player->getEyeHeight () ),
						new DoubleTag ( "", $player->z )
				  ] ),
				  "Motion" => new ListTag ( "Motion", [
						new DoubleTag ( "", - \sin ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "", - \sin ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "",\cos ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) )
				  ] ),
				  "Rotation" => new ListTag ( "Rotation", [
						new FloatTag ( "", $player->yaw ),
						new FloatTag ( "", $player->pitch )
				  ] )
		      ] );
		      $nbt2 = new CompoundTag ( "", [
				  "Pos" => new ListTag ( "Pos", [
						new DoubleTag ( "", $player->x  ),
						new DoubleTag ( "", $player->y + $player->getEyeHeight () ),
						new DoubleTag ( "", $player->z +1)
				  ] ),
				  "Motion" => new ListTag ( "Motion", [
						new DoubleTag ( "", - \sin ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "", - \sin ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "",\cos ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) )
				  ] ),
				  "Rotation" => new ListTag ( "Rotation", [
						new FloatTag ( "", $player->yaw ),
						new FloatTag ( "", $player->pitch )
				  ] )
		      ] );
		      $nbt3 = new CompoundTag ( "", [
				  "Pos" => new ListTag ( "Pos", [
						new DoubleTag ( "", $player->x ),
						new DoubleTag ( "", $player->y + $player->getEyeHeight () ),
						new DoubleTag ( "", $player->z -1)
				  ] ),
				  "Motion" => new ListTag ( "Motion", [
						new DoubleTag ( "", - \sin ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "", - \sin ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "",\cos ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) )
				  ] ),
				  "Rotation" => new ListTag ( "Rotation", [
						new FloatTag ( "", $player->yaw ),
						new FloatTag ( "", $player->pitch )
			  	] )
		      ] );
		      $nbt4 = new CompoundTag ( "", [
				  "Pos" => new ListTag ( "Pos", [
						new DoubleTag ( "", $player->x ),
						new DoubleTag ( "", $player->y + $player->getEyeHeight () +1 ),
						new DoubleTag ( "", $player->z )
				  ] ),
				  "Motion" => new ListTag ( "Motion", [
						new DoubleTag ( "", - \sin ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "", - \sin ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "",\cos ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) )
				  ] ),
				  "Rotation" => new ListTag ( "Rotation", [
						new FloatTag ( "", $player->yaw ),
						new FloatTag ( "", $player->pitch )
				  ] )
		      ] );
		      $nbt5 = new CompoundTag ( "", [
				  "Pos" => new ListTag ( "Pos", [
						new DoubleTag ( "", $player->x ),
						new DoubleTag ( "", $player->y + $player->getEyeHeight () -1),
						new DoubleTag ( "", $player->z )
				  ] ),
				  "Motion" => new ListTag ( "Motion", [
						new DoubleTag ( "", - \sin ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "", - \sin ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "",\cos ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) )
				  ] ),
			  	"Rotation" => new ListTag ( "Rotation", [
						new FloatTag ( "", $player->yaw ),
						new FloatTag ( "", $player->pitch )
				  ] )
		      ] );


		      $f = 1.5;
		      $snowball = Entity::createEntity ( "Snowball", $player->level, $nbt, $player );
		      $snowball2 = Entity::createEntity ( "Snowball", $player->level, $nbt2, $player );
		      $snowball3 = Entity::createEntity ( "Snowball", $player->level, $nbt3, $player );
		      $snowball4 = Entity::createEntity ( "Snowball", $player->level, $nbt4, $player );
		      $snowball5 = Entity::createEntity ( "Snowball", $player->level, $nbt5, $player );
		      $snowball6 = Entity::createEntity ( "Snowball", $player->level, $nbt6, $player );
		      $snowball->setMotion ( $snowball->getMotion ()->multiply ( $f ) );
					$snowball2->setMotion ( $snowball2->getMotion ()->multiply ( $f ) );
					$snowball3->setMotion ( $snowball3->getMotion ()->multiply ( $f ) );
					$snowball4->setMotion ( $snowball4->getMotion ()->multiply ( $f ) );
					$snowball5->setMotion ( $snowball5->getMotion ()->multiply ( $f ) );
					$snowball6->setMotion ( $snowball6->getMotion ()->multiply ( $f ) );
					$snowball->spawnToAll ();
					$snowball2->spawnToAll ();
					$snowball3->spawnToAll ();
					$snowball4->spawnToAll ();
					$snowball5->spawnToAll ();
					$snowball6->spawnToAll ();
					$player->getInventory ()->removeItem ( Item::get(351, 8, 1) );
					if($snowball instanceof Projectile) {
						$this->server->getPluginManager ()->callEvent ( $projectileEv = new ProjectileLaunchEvent ( $snowball ) );
						if ($projectileEv->isCancelled ()) {
							$snowball->kill ();
						}else{
							$this->object_hash [spl_object_hash ( $snowball )] = 1;
							$snowball->spawnToAll ();
						}
					}else{
						$this->object_hash [spl_object_hash ( $snowball )] = 1;
						$snowball->spawnToAll ();
						$player->setXpLevel(4);
						return;
					}
				}
				if($item->getId() == 275){
					$nbt = new CompoundTag ( "", [
						"Pos" => new ListTag ( "Pos", [
						new DoubleTag ( "", $player->x +1),
						new DoubleTag ( "", $player->y + $player->getEyeHeight () ),
						new DoubleTag ( "", $player->z )
						] ),
						"Motion" => new ListTag ( "Motion", [
						new DoubleTag ( "", - \sin ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "", - \sin ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "",\cos ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) )
						] ),
						"Rotation" => new ListTag ( "Rotation", [
						new FloatTag ( "", $player->yaw ),
						new FloatTag ( "", $player->pitch )
						] )
						] );
						$nbt6 = new CompoundTag ( "", [
							"Pos" => new ListTag ( "Pos", [
						new DoubleTag ( "", $player->x -1),
						new DoubleTag ( "", $player->y + $player->getEyeHeight () ),
						new DoubleTag ( "", $player->z )
						] ),
						"Motion" => new ListTag ( "Motion", [
						new DoubleTag ( "", - \sin ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "", - \sin ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "",\cos ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) )
						] ),
						"Rotation" => new ListTag ( "Rotation", [
						new FloatTag ( "", $player->yaw ),
						new FloatTag ( "", $player->pitch )
						] )
						] );



						$f = 1.5;
						$snowball = Entity::createEntity ( "Snowball", $player->level, $nbt, $player );
						$snowball6 = Entity::createEntity ( "Snowball", $player->level, $nbt6, $player );
						$snowball->setMotion ( $snowball->getMotion ()->multiply ( $f ) );
						$snowball6->setMotion ( $snowball6->getMotion ()->multiply ( $f ) );
						$snowball->spawnToAll ();
						$snowball6->spawnToAll ();
						$player->getInventory ()->removeItem ( Item::get(351, 8, 1) );
						if($snowball instanceof Projectile) {
							$this->server->getPluginManager ()->callEvent ( $projectileEv = new ProjectileLaunchEvent ( $snowball ) );
							if($projectileEv->isCancelled()){
								$snowball->kill ();
							}else{

								$this->object_hash [spl_object_hash ( $snowball )] = 1;
								$snowball->spawnToAll ();
							}
						}else{
							$this->object_hash [spl_object_hash ( $snowball )] = 1;
							$snowball->spawnToAll ();
							$player->setXpLevel(2);
							return;
						}
					}
					if($item->getId() == 274){
						$nbt = new CompoundTag ( "", [
							"Pos" => new ListTag ( "Pos", [
						new DoubleTag ( "", $player->x +1),
						new DoubleTag ( "", $player->y + $player->getEyeHeight () ),
						new DoubleTag ( "", $player->z )
						] ),
						"Motion" => new ListTag ( "Motion", [
						new DoubleTag ( "", - \sin ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "", - \sin ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "",\cos ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) )
						] ),
						"Rotation" => new ListTag ( "Rotation", [
						new FloatTag ( "", $player->yaw ),
						new FloatTag ( "", $player->pitch )
						] )
						] );
						$nbt6 = new CompoundTag ( "", [
							"Pos" => new ListTag ( "Pos", [
						new DoubleTag ( "", $player->x -1),
						new DoubleTag ( "", $player->y + $player->getEyeHeight () ),
						new DoubleTag ( "", $player->z )
						] ),
						"Motion" => new ListTag ( "Motion", [
						new DoubleTag ( "", - \sin ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "", - \sin ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "",\cos ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) )
						] ),
						"Rotation" => new ListTag ( "Rotation", [
						new FloatTag ( "", $player->yaw ),
						new FloatTag ( "", $player->pitch )
						] )
						] );
						$nbt2 = new CompoundTag ( "", [
							"Pos" => new ListTag ( "Pos", [
						new DoubleTag ( "", $player->x  ),
						new DoubleTag ( "", $player->y + $player->getEyeHeight () ),
						new DoubleTag ( "", $player->z +1)
						] ),
						"Motion" => new ListTag ( "Motion", [
						new DoubleTag ( "", - \sin ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "", - \sin ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "",\cos ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) )
							] ),
					  "Rotation" => new ListTag ( "Rotation", [
						new FloatTag ( "", $player->yaw ),
						new FloatTag ( "", $player->pitch )
						] )
						] );
						$nbt3 = new CompoundTag ( "", [
							"Pos" => new ListTag ( "Pos", [
						new DoubleTag ( "", $player->x ),
						new DoubleTag ( "", $player->y + $player->getEyeHeight () ),
						new DoubleTag ( "", $player->z -1)
						] ),
						"Motion" => new ListTag ( "Motion", [
						new DoubleTag ( "", - \sin ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "", - \sin ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "",\cos ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) )
						] ),
						"Rotation" => new ListTag ( "Rotation", [
						new FloatTag ( "", $player->yaw ),
						new FloatTag ( "", $player->pitch )
						] )
						] );
						$nbt4 = new CompoundTag ( "", [
							"Pos" => new ListTag ( "Pos", [
						new DoubleTag ( "", $player->x ),
						new DoubleTag ( "", $player->y + $player->getEyeHeight () +1 ),
						new DoubleTag ( "", $player->z )
						] ),
						"Motion" => new ListTag ( "Motion", [
						new DoubleTag ( "", - \sin ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "", - \sin ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "",\cos ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) )
						] ),
					"Rotation" => new ListTag ( "Rotation", [
						new FloatTag ( "", $player->yaw ),
						new FloatTag ( "", $player->pitch )
						] )
						] );
						$nbt5 = new CompoundTag ( "", [
							"Pos" => new ListTag ( "Pos", [
						new DoubleTag ( "", $player->x ),
						new DoubleTag ( "", $player->y + $player->getEyeHeight () -1),
						new DoubleTag ( "", $player->z )
						] ),
						"Motion" => new ListTag ( "Motion", [
						new DoubleTag ( "", - \sin ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "", - \sin ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "",\cos ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) )
						] ),
						"Rotation" => new ListTag ( "Rotation", [
						new FloatTag ( "", $player->yaw ),
						new FloatTag ( "", $player->pitch )
						] )
						] );


						$f = 1.5;
						$snowball = Entity::createEntity ( "Snowball", $player->level, $nbt, $player );
						$snowball2 = Entity::createEntity ( "Snowball", $player->level, $nbt2, $player );
						$snowball3 = Entity::createEntity ( "Snowball", $player->level, $nbt3, $player );
						$snowball4 = Entity::createEntity ( "Snowball", $player->level, $nbt4, $player );
						$snowball5 = Entity::createEntity ( "Snowball", $player->level, $nbt5, $player );
						$snowball6 = Entity::createEntity ( "Snowball", $player->level, $nbt6, $player );
						$snowball->setMotion ( $snowball->getMotion ()->multiply ( $f ) );
						$snowball2->setMotion ( $snowball2->getMotion ()->multiply ( $f ) );
						$snowball3->setMotion ( $snowball3->getMotion ()->multiply ( $f ) );
						$snowball4->setMotion ( $snowball4->getMotion ()->multiply ( $f ) );
						$snowball5->setMotion ( $snowball5->getMotion ()->multiply ( $f ) );
						$snowball6->setMotion ( $snowball6->getMotion ()->multiply ( $f ) );
						$snowball->spawnToAll ();
						$snowball2->spawnToAll ();
						$snowball3->spawnToAll ();
						$snowball4->spawnToAll ();
						$snowball5->spawnToAll ();
						$snowball6->spawnToAll ();
						$player->getInventory ()->removeItem ( Item::get(351, 8, 1) );
						if($snowball instanceof Projectile) {
							$this->server->getPluginManager ()->callEvent ( $projectileEv = new ProjectileLaunchEvent ( $snowball ) );
							if($projectileEv->isCancelled ()) {
								$snowball->kill ();
							}else{
								$this->object_hash [spl_object_hash ( $snowball )] = 1;
								$snowball->spawnToAll ();
							}
						}else{
							$this->object_hash [spl_object_hash ( $snowball )] = 1;
							$snowball->spawnToAll ();
							$player->setXpLevel(2);
							return;
						}
					}
          if($item->getId() == 273){
						$nbt = new CompoundTag ( "", [
							"Pos" => new ListTag ( "Pos", [
						new DoubleTag ( "", $player->x +1),
						new DoubleTag ( "", $player->y + $player->getEyeHeight () ),
						new DoubleTag ( "", $player->z )
						] ),
						"Motion" => new ListTag ( "Motion", [
						new DoubleTag ( "", - \sin ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "", - \sin ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "",\cos ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) )
						] ),
						"Rotation" => new ListTag ( "Rotation", [
						new FloatTag ( "", $player->yaw ),
						new FloatTag ( "", $player->pitch )
						] )
						] );
						$nbt6 = new CompoundTag ( "", [
							"Pos" => new ListTag ( "Pos", [
						new DoubleTag ( "", $player->x -1),
						new DoubleTag ( "", $player->y + $player->getEyeHeight () ),
						new DoubleTag ( "", $player->z )
						] ),
						"Motion" => new ListTag ( "Motion", [
						new DoubleTag ( "", - \sin ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "", - \sin ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "",\cos ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) )
						] ),
						"Rotation" => new ListTag ( "Rotation", [
						new FloatTag ( "", $player->yaw ),
						new FloatTag ( "", $player->pitch )
						] )
						] );
						$nbt2 = new CompoundTag ( "", [
							"Pos" => new ListTag ( "Pos", [
						new DoubleTag ( "", $player->x  ),
						new DoubleTag ( "", $player->y + $player->getEyeHeight () ),
						new DoubleTag ( "", $player->z +1)
						] ),
						"Motion" => new ListTag ( "Motion", [
						new DoubleTag ( "", - \sin ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "", - \sin ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "",\cos ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) )
						] ),
						"Rotation" => new ListTag ( "Rotation", [
						new FloatTag ( "", $player->yaw ),
						new FloatTag ( "", $player->pitch )
						] )
						] );
						$nbt3 = new CompoundTag ( "", [
							"Pos" => new ListTag ( "Pos", [
						new DoubleTag ( "", $player->x ),
						new DoubleTag ( "", $player->y + $player->getEyeHeight () ),
						new DoubleTag ( "", $player->z -1)
						] ),
						"Motion" => new ListTag ( "Motion", [
						new DoubleTag ( "", - \sin ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "", - \sin ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "",\cos ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) )
						] ),
						"Rotation" => new ListTag ( "Rotation", [
						new FloatTag ( "", $player->yaw ),
						new FloatTag ( "", $player->pitch )
						] )
						] );
						$nbt4 = new CompoundTag ( "", [
							"Pos" => new ListTag ( "Pos", [
						new DoubleTag ( "", $player->x ),
						new DoubleTag ( "", $player->y + $player->getEyeHeight () +1 ),
						new DoubleTag ( "", $player->z )
						] ),
						"Motion" => new ListTag ( "Motion", [
							new DoubleTag ( "", - \sin ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "", - \sin ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "",\cos ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) )
						] ),
						"Rotation" => new ListTag ( "Rotation", [
						new FloatTag ( "", $player->yaw ),
						new FloatTag ( "", $player->pitch )
						] )
						] );
						$nbt5 = new CompoundTag ( "", [
							"Pos" => new ListTag ( "Pos", [
						new DoubleTag ( "", $player->x ),
						new DoubleTag ( "", $player->y + $player->getEyeHeight () -1),
						new DoubleTag ( "", $player->z )
						] ),
						"Motion" => new ListTag ( "Motion", [
						new DoubleTag ( "", - \sin ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "", - \sin ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "",\cos ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) )
						] ),
						"Rotation" => new ListTag ( "Rotation", [
						new FloatTag ( "", $player->yaw ),
						new FloatTag ( "", $player->pitch )
						] )
						] );


						$f = 1.5;
						$snowball = Entity::createEntity ( "Snowball", $player->level, $nbt, $player );
						$snowball2 = Entity::createEntity ( "Snowball", $player->level, $nbt2, $player );
						$snowball3 = Entity::createEntity ( "Snowball", $player->level, $nbt3, $player );
						$snowball4 = Entity::createEntity ( "Snowball", $player->level, $nbt4, $player );
						$snowball5 = Entity::createEntity ( "Snowball", $player->level, $nbt5, $player );
						$snowball6 = Entity::createEntity ( "Snowball", $player->level, $nbt6, $player );
						$snowball->setMotion ( $snowball->getMotion ()->multiply ( $f ) );
						$snowball2->setMotion ( $snowball2->getMotion ()->multiply ( $f ) );
						$snowball3->setMotion ( $snowball3->getMotion ()->multiply ( $f ) );
						$snowball4->setMotion ( $snowball4->getMotion ()->multiply ( $f ) );
						$snowball5->setMotion ( $snowball5->getMotion ()->multiply ( $f ) );
						$snowball6->setMotion ( $snowball6->getMotion ()->multiply ( $f ) );
						$snowball->spawnToAll ();
						$snowball2->spawnToAll ();
						$snowball3->spawnToAll ();
						$snowball4->spawnToAll ();
						$snowball5->spawnToAll ();
						$snowball6->spawnToAll ();
						$player->getInventory ()->removeItem ( Item::get(351, 8, 1) );
						if($snowball instanceof Projectile) {
							$this->server->getPluginManager ()->callEvent ( $projectileEv = new ProjectileLaunchEvent ( $snowball ) );
							if($projectileEv->isCancelled ()) {
								$snowball->kill ();
							}else{

								$this->object_hash [spl_object_hash ( $snowball )] = 1;
								$snowball->spawnToAll ();
							}
						}else{
							$this->object_hash [spl_object_hash ( $snowball )] = 1;
							$snowball->spawnToAll ();
							$player->setXpLevel(2);
							return;
						}
					}
				  if($item->getId() == 292 || $item->getId() == 256 || $item->getId() == 257 || $item->getId() == 258){
						$this->getServer ()->getScheduler ()->scheduleDelayedTask ( new CallbackTask ( [$this,"burstSnowball" ], [$player ] ), 0 );
						$this->getServer ()->getScheduler ()->scheduleDelayedTask ( new CallbackTask ( [$this,"burstSnowball" ], [$player ] ), 5 );
						$this->getServer ()->getScheduler ()->scheduleDelayedTask ( new CallbackTask ( [$this,"burstSnowball" ], [$player ] ), 10 );
						$player->getInventory ()->removeItem ( Item::get(351, 8, 1) );
						$player->setXpLevel(2);
						return;
					}
          if($item->getId() == 293 || $item->getId() == 284 || $item->getId() == 285 || $item->getId() == 286){
						$this->getServer ()->getScheduler ()->scheduleDelayedTask ( new CallbackTask ( [$this,"burstSnowball" ], [$player ] ), 0 );
						$this->getServer ()->getScheduler ()->scheduleDelayedTask ( new CallbackTask ( [$this,"burstSnowball" ], [$player ] ), 7 );
						$this->getServer ()->getScheduler ()->scheduleDelayedTask ( new CallbackTask ( [$this,"burstSnowball" ], [$player ] ), 14 );
						$this->getServer ()->getScheduler ()->scheduleDelayedTask ( new CallbackTask ( [$this,"burstSnowball" ], [$player ] ), 21 );
						$this->getServer ()->getScheduler ()->scheduleDelayedTask ( new CallbackTask ( [$this,"burstSnowball" ], [$player ] ), 28 );
						$this->getServer ()->getScheduler ()->scheduleDelayedTask ( new CallbackTask ( [$this,"burstSnowball" ], [$player ] ), 35 );
						$player->getInventory ()->removeItem ( Item::get(351, 8, 1) );
						$player->setXpLevel(5);
						return;
					}
				  if($item->getId() == 294 || $item->getId() == 277){
						$nbt = new CompoundTag ( "", [
							"Pos" => new ListTag ( "Pos", [
						new DoubleTag ( "", $player->x ),
						new DoubleTag ( "", $player->y + $player->getEyeHeight () ),
						new DoubleTag ( "", $player->z )
						] ),
						"Motion" => new ListTag ( "Motion", [
						new DoubleTag ( "", - \sin ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "", - \sin ( $player->pitch / 180 * M_PI ) ),
						new DoubleTag ( "",\cos ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) )
						] ),
						"Rotation" => new ListTag ( "Rotation", [
						new FloatTag ( "", $player->yaw ),
						new FloatTag ( "", $player->pitch )
						] )
						] );
						$f = 3.0;
						$snowball = Entity::createEntity ( "Snowball", $player->level, $nbt, $player );
						$snowball->setMotion ( $snowball->getMotion ()->multiply ( $f ) );
						$snowball->spawnToAll ();
						$player->getInventory ()->removeItem ( Item::get(351, 8, 1) );
						$player->setXpLevel(2);
						return;
					}
				}
			}
		}
	public function burstSnowball(Player $player){
		$nbt = new CompoundTag ( "", [
			"Pos" => new ListTag ( "Pos", [
				new DoubleTag ( "", $player->x ),
				new DoubleTag ( "", $player->y + $player->getEyeHeight () ),
				new DoubleTag ( "", $player->z ) ] ),
		  "Motion" => new ListTag ( "Motion", [
				new DoubleTag ( "", - \sin ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) ),
				new DoubleTag ( "", - \sin ( $player->pitch / 180 * M_PI ) ),
				new DoubleTag ( "",\cos ( $player->yaw / 180 * M_PI ) *\cos ( $player->pitch / 180 * M_PI ) ) ] ),
			"Rotation" => new ListTag ( "Rotation", [
				new FloatTag ( "", $player->yaw ),
				new FloatTag ( "", $player->pitch ) ] ) ] );

		$f = 2.5;
		$snowball = Entity::createEntity ( "Snowball", $player->level, $nbt, $player );
		$snowball->setMotion ( $snowball->getMotion ()->multiply ( $f ) );

		if($snowball instanceof Projectile) {
			$this->server->getPluginManager ()->callEvent ( $projectileEv = new ProjectileLaunchEvent ( $snowball ) );
			if($projectileEv->isCancelled ()) {
				$snowball->kill ();
			}else{

			  $this->object_hash [spl_object_hash ( $snowball )] = 1;
				$snowball->spawnToAll ();
			}
		}else{
			$this->object_hash [spl_object_hash ( $snowball )] = 1;
			$snowball->spawnToAll ();
			$this->timer[$player->getName()] = time() + 2;
		}
	}
}
?>
