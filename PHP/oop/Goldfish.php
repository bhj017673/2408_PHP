<?php
namespace PHP\oop;

require_once('./Swim.php');
require_once('./Pet.php');

use PHP\oop\Pet;
use PHP\oop\Swim;

class Goldfish implements Swim, Pet {
    private $name = "금붕어";

    public function swimming() {
        return "수영합니다.";
    }

    public function printPet() {
        return '펫입니다. 첨벙첨벙';
    }
}
