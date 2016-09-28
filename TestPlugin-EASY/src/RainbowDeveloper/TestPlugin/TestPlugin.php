<?php
	
namespace RainbowDeveloper\TestPlugin; 

use pocketmine\Player;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;

class TestPlugin extends PluginBase implements Listener {
	
	public function onLoad() { 
		$this->getLogger()->info(TextFormat::RED."Loading Plugin..."); // Red color, only the console can see this
	}
	
	public function onEnable() { 
		$this->getServer()->getPluginManager()->registerEvents($this, $this); 
		$this->getLogger()->info(TextFormat::GREEN."Plugin activated"); 
	}
	
	public function onDisable() {
		$this->getLogger()->info(TextFormat::RED."Plugin disabled. Did the server stop?"); 
	}
	
	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) { 
		if($cmd->getName() == "test") { 
			$sender->sendMessage(TextFormat::GREEN."This is a ".TextFormat::YELLOW."TestPlugin."); 
		}
	}
	
	public function onJoin(PlayerJoinEvent $event) { 
		$event->getPlayer()->sendMessage(TextFormat::BOLD.TextFormat::AQUA."Welcome to our server, this message is from".TextFormat::YELLOW." TestPlugin"); 
	}
}
