<?php

namespace Kay313\Homesystem\forms;

use Kay313\Homesystem\Main;
use jojoe77777\FormAPI\CustomForm;
use pocketmine\Player;
use pocketmine\item\Item;
use pocketmine\command\Command;

class HomeForm extends CustomForm {

    public function __construct() {

        $callable = function (Player $player, $data) {

            if ($data == null) return;

            $player->getServer()->getCommandMap()->dispatch($player, "home ".$data[0]);

        };

        parent::__construct($callable);

        $this->setTitle("§l§3Homesystem");

        $this->addInput("§3Gebe hier den Namen des Homes ein zu dem du dich tpn willst");
    }

}