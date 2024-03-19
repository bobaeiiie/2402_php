<?php

// 상속 : 부모클래스의 자원을 자식클래스가 물려받아 사용하거나 재정의하는 것

class Parents {
    protected $name;

    public function __construct($name) { // 생성자 설정해주지 않으면 디폴트 실행하는 데 부모쪽에 있으니 이거 실행
        echo "부모클래스 생성자 실행\n";
    }
    private function home() {
        echo "집은 부모님 겁니다.\n";
    }
    public function car() {
        echo "차는 부모님 자식 다 씁니다.\n";
    }
}
class Child extends Parents {

    public function __construct($name) { // 자식쪽에서 오버라이딩함
        $this->name = $name;
        echo "자식클래스 생성자 실행\n";
    }
    public function dog() {
        echo "강아지는 제 겁니다.\n";
    }
    // 오버라이딩 : 자식 쪽에서 새롭게 정의해서 쓰는 것
    public function car() {
        echo "이 자동차는 이제 제 겁니다.\n";
    }
    public function getName() {
        echo $this->name;
    }
}

$obj = new Child("홍길동"); // 차일드의 생성자가 실행이 됨. 설정해주지 않으면 디폴트(아무것도 x)실행.
$obj->car(); 
// $obj->home(); // 상속 안되므로 에러 
$obj->getName();

