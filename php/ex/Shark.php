<?php

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
