<?php

namespace App\Utils;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MyEncrypt {

    /**
     * base64 URL 인코드
     * @param String $json
     * 
     * @return String base64 URL encode
     */

     public function base64UrlEncode(String $json) {
        
        return rtrim(strtr(base64_encode($json), '+/', '-_'), '=');
     }

     /**
      * bade64 URL 디코드
      * @param String base64 URL encode
      * @return String $json
      */

      public function base64UrlDecode(String $base64) {

         return strtr(base64_decode($base64), '-_', '+/');
      }

      /**
       * 암호화한 문자열 생성
       * 
       * @param String $alg 알고리즘명
       * @param String $str 암호화할 문자열
       * @param String $salt 솔트
       * 
       * @return String 암호화된 문자열
       */
      public function hashWithSalt(string $alg, string $str, string $salt = '') {    

         return hash($alg, $str).$salt;
      }

      /**
       * 특정 길이만큼의 랜덤한 문자열 생성
       * 
       * @param int $saltLength 솔트 길이
       * 
       * @return String 랜덤문자열
       */

      public function makeSalt(int $saltLength) {

         return Str::random($saltLength);
      }
      
      /**
       * 특정 길이의 솔드를 제거한 문자열 반환
       * 
       * @param string $signature 시그니처
       * @param int $saltLength 솔트 길이
       * 
       * @return String 솔트 제거한 문자열
       */
      public function subSalt(string $signature, int $saltLength) {

         return mb_substr($signature, 0, (-1 * $saltLength));
      }
}