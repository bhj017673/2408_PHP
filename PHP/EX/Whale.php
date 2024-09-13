<?php
// class : 동종의 객체들을 모아 정의한 것
// 관습적으로 파일명과 클래스명을 동일하게 지어준다.

class whale {
    // 프로퍼티 :클래스 내에 정의 된 변수 
    // 접근제어지시자 
    // public : 클래스 내외부 어디에서든 접근가능
    public $name ="고래";
    // private : 클래스 내부에서만 접근 가능
    private $age ="30";
    // protected : 클래스 내부 및 상속관계에서 접근가능 ( 외부접근 X)
    protected $gender;

    // 메소드(method)
    function breath () {
        echo "숨을 쉽니다.";
    }

    function info() {
        //$this : class 내의 프로퍼티나 메소드에 접근하기위해 사용
        echo "나이는".$this->age;
    }
    // static 메소드
    public static function myStatic() {
        echo "스테틱 메소드";
    }
}

