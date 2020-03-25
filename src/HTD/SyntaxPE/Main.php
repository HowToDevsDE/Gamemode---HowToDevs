<?php

namespace HTD\SyntaxPE;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class Main extends PluginBase{

    public function onEnable(){
        $this->getLogger->info("Das Gamemode Plugin wurde geladen! By SyntaxPE - HowToDevs!");
        $this->getServer()->getCommandMap()->unregister($this->getServer()->getCommandMap()->getCommand("gamemode"));
    }

    public function onCommand(CommandSender $sender, Command $cmd, sting $label, array $args): bool{
        if ($cmd->getName() == "gm"){
            if($sender instanceof Player) {
                if ($sender->hasPermission("gm.command")) {
                    if (!empty($args[0])) {
                        if ($args[0] === "0" ) {
                            $sender->sendMessage("§cHow§7To§bDevs§6>> §aDein Gamemode wurde zu §2Survival §agewechselt!");
                            $sender->setGamemode(0);
                            $this->plugin->getLogger()->info("Der Spieler {$sender->getName()} hat sein Gamemode zu §2Survival §8gewechselt!");
                        }elseif ($args[0] === "1" )  {
                            $sender->sendMessage("§cHow§7To§bDevs§6>> §aDein Gamemode wurde zu §2Creative §agewechselt!");
                            $sender->setGamemode(1);
                            $this->plugin->getLogger()->info("Der Spieler {$sender->getName()} hat sein Gamemode zu §2Creative §8gewechselt!");
                        }elseif ($args[0] === "2" )  {
                            $sender->sendMessage("§cHow§7To§bDevs§6>> §aDein Gamemode wurde zu §2Adventure §agewechselt!");
                            $sender->setGamemode(2);
                            $this->plugin->getLogger()->info("Der Spieler {$sender->getName()} hat sein Gamemode zu §2Adventure §8gewechselt!");
                        }elseif ($args[0] === "3" )  {
                            $sender->sendMessage("§cHow§7To§bDevs§6>> §aDein Gamemode wurde zu §2Spectator §agewechselt!");
                            $sender->setGamemode(3);
                            $this->plugin->getLogger()->info("Der Spieler {$sender->getName()} hat sein Gamemode zu §2Spectator §8gewechselt!");
                        }
                    }else{
                        $sender->sendMessage("/gm [0|1|2|3]");
                    }
                }else{
                    $sender->sendMessage("§cDu hast keine Berechtigung diesen Befehl auszuführen!");
                }
            }else{
                $sender->sendMessage("§cDu bist nicht im Spiel");
            }
        }
    }
}