<?php

namespace Kay313\Homesystem\forms;

use Kay313\Homesystem\Main;
use jojoe77777\FormAPI\CustomForm;
use pocketmine\Player;
use pocketmine\item\Item;
use pocketmine\command\Command;

class SetHomeForm extends CustomForm {

    public function __construct() {

        $callable = function (Player $player, $data) {

            if ($data == null) return;

            $player->getServer()->getCommandMap()->dispatch($player, "sethome ".$data[0]);

        };

        parent::__construct($callable);

        $this->setTitle("§l§3Homesystem");

        $this->addInput("§3Enter the name of the new home here");
    }

}
