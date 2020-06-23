<?php
namespace App\config;

class Rule {

  public static function loginRules()
    {
      return [
        'email' => 'required|email',
        'password' => 'required|min:6|integer',
        ];
    }

  public static function loginMessages()
    {
      return [
        'email.required' => 'メールアドレスは必須です',
        'email.email' => 'メールアドレスの形式が間違っています',
        'password.required' => 'パスワードは必須です',
        'password.min' => 'パスワードは6文字以上です',
        'password.integer' => 'パスワードは整数型で',
        ];
    }

  public static function createRules()
    {
      return [
        'email' => 'required|email',
        'password' => 'required|min:6',
        ];
    }

  public static function createMessages()
    {
      return [
        'email.required' => 'メールアドレスは必須です',
        'email.email' => 'メールアドレスの形式が間違っています',
        'password.required' => 'パスワードは必須です',
        'password.min' => 'パスワードは6文字以上です',
        ];
    }

}