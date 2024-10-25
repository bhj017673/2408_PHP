<?php
namespace PHP\oop;

require_once('./Mammal.php');
require_once('./Swim.php');

use PHP\oop\Mammal;
use PHP\oop\Swim;

class Whale extends mammal implements Swim {
    // 수영 메소드
    public function swimming() {
        return " 수영합니다.";
    }

    public function printInfo() {
        return "고래고래고래";
    }
}

// -----------------------기본-----------------------
// class Whale {
//     //프로퍼티
//     public $name = "고래";
//     private $age = "20";

//     //생성자
//     public function __construct($name, $age) {
//         $this->name = $name;
//         $this->age = $age;    
//     }
     

//     //메소드
//     public function breathe() {
//         echo "숨을 쉽니다.";
//     }
    
//     public function printInfo() {
//         echo $this->name."는".$this->age."살 입니다.";
//     }

//     // getter/setter 메소드.
//     public function getAge() {
//         return $this->age;
//     }

//     public function setAge($age) {
//         $this->age = $age;
//     }

//     // static method
//     // 인스턴스화를 하지않고도 사용할수있는 메소드
//     public static function dance() {
//         return '고래가 춤을 춥니다.';
//     }
// }


// echo Whale::dance();
// Whale 인스턴스화

// $whale = new Whale('핑크고래', 40);
// echo $whale->printInfo();