<?php

// 클래스(Class) : 동종의 객체들을 모아 정의한 것

class Whale { // 첫 글자 대문자, 관습적으로 파일명과 클래스명 동일하게 지어준다 Whale.php
    
    // 프로퍼티
    // 접근 제어 지시자 / 클래스의 외부, 상속 관계 접근 가능 여부 
    // public : Class 외부, 내부 어디에서나 접근 가능
    public $str; // 공간만 만들고 싶다하면 값 없어도 변수는 만들어짐
    // private : Class 내부에서만 접근 가능, 외부는 접근 불가능, 무조건 나만
    private $i; 
    // protected : Class 내부애서만 접근 가능, 외부는 접근 불가능, 단, 상속 관계에서는 접근 가능
    protected $boo;

    private $name;

    // 생성자 메소드, 관습적으로 프로퍼티 바로 아래에 컨스트럭트 적음
    // $name = 고래 하지 않음
    public function __construct($name) { // 생성자 메소드는 얘로 고정
        $this->name = $name; // 한 클래스 안의 this는 나 자신을 의미. 함수 밖 name 지정
    }

    // getter / setter 프라이빗,프로텍티드로 설정된 프로퍼티에 접근을 위해 사용하는 메소드

    // getter 메소드
    public function getName() { // 카멜기법 사용함
        return $this->name;
    }
    // setter 메소드
    public function setName($name) {
        $this->name = $name;
    }

    // 메소드
    // class에 정의되어 있는 함수. 
    // 처리의 최소단위. 하나의 메소드는 하나의 처리만 함
    public function swim($opt) {
        echo $opt.$this->name." 헤엄 칩니다.\n";
    }
    public function breathe() {
        echo $this->name." 호흡 한다.\n";
    }

    // static 메소드 : 인스턴스 생성 없이 사용할 수 있는 메소드
    public static function big() {
        echo $this->$name."매우 크다"; // static이 붙으면 메모리에 바로 올려둠
        // $this->$name 붙이면 에러뜸. 다른 애들은 메모리에 없기 때문.
    }
    
}


// 클래스 인스턴스 생성
$obj_whale = new Whale("고래"); // 메모리에 생성
$obj_whale->swim("흰 수염 "); // -> 클래스 속의 메소드 호출할 때 사용하는 문법, 관습적으로 띄쓰x
// 퍼블릭이기 때문에 접근 가능
// echo $obj_whale->name; // private라서 에러남
echo $obj_whale->getName()."\n";
$obj_whale->breathe();

$obj_whale->setName("참새");
$obj_whale->swim("흰 수염 ");
$obj_whale->breathe();
// 호출만 해서 처리를 이어나가는 모습
echo "\n";

// static 메소드 호출
Whale::big();
// 메모리의 영역을 사용하는 것이기 때문에 처리에 사용할 용량에 영향 줄 수 있음
// 많은 곳에서 자주 이용하는 것이라면 쓸만함
// 유틸. 암호화 처리 등
echo "\n\n";


// Shark 클래스를 만들어주세요.
// 프로퍼티 : private $name
// 생성자 메소드 : Whale 클래스랑 동일하게
// 메소드 : public swim, public breathe 

class Shark { // Shark 클래스 만들기. 
    private $name; // 상속 관계만 접근 가능 프로퍼티

    public function __construct($name) { // 생성자 메소드. 파라미터는 $name
        $this->name = $name;
    }

    public function swim($opt) {
        echo $opt.$this->name." 헤엄 칩니다.\n";
    } 

    public function breathe($opt) {
        echo $opt.$this->name." 호흡 합니다.\n";
    }

}

// 인스턴스 생성
$objShark = new Shark("상어"); // DB연동할 때 쓰기 때문에 사용법 익혀라
$objShark->swim("아기 ");
$objShark->breathe("엄마 ");
