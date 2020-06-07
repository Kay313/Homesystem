<?php

namespace Kay313\Homesystem;

use pocketmine\command\Command;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\plugin\PluginBase;
use Kay313\Homesystem\libs\jojoe77777\FormAPI\SimpleForm;
use Kay313\Homesystem\libs\jojoe77777\FormAPI\CustomForm;
use Kay313\Homesystem\forms\HomeForm;
use Kay313\Homesystem\forms\SetHomeForm;
use Kay313\Homesystem\forms\DelHomeForm;

class Main extends PluginBase implements Listener{
	


    public function onEnable(){
        $this->getServer()->getLogger()->info("Homesystem enabled!");
    }
    public function onDisable(){
	$this->getServer()->getLogger()->info("Homesystem disabled");
    }
    

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool {
		if($cmd->getName() == "h"){
			$this->h($sender);
		}
		return true;
	}

	

	public function h($player) {
        $form = new SimpleForm(function (Player $player, int $data = null){
 

            $result = $data;
            if($result === null){
                return true;
            }
            switch($result){
            case 0:
            break;

            case 1:
            if ($data == 1) {
                $player->sendForm(new HomeForm());
            }
            break;

            case 2:
            if ($data == 2) {
                $player->sendForm(new SetHomeForm());
            }
            break;

            case 3:
            if ($data == 3) {
                $player->sendForm(new DelHomeForm());
            }
            break;


            }

 

        });

 

        $form->setTitle("§l§3Homesystem");
        $form->setContent("§aWhat do you want to do?");
        $form->addButton("§4Exit");
        $form->addButton("§bHome \nTeleport to a Home");
        $form->addButton("§bSethome \nCreate a Home");
        $form->addButton("§bDelhome \nDelete a Home");
        $form->sendToPlayer($player);
        return $form;

			}

		}
