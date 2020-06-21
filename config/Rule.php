<?php
namespace App\config;

class Rule {

  public static function loginRules()
    {
      return [
        'email' => 'required|email',
        'password' => 'required',
        ];
    }

  public static function loginMessages()
    {
      return [
        'email.required' => 'メールアドレスは必須です',
        'email.email' => 'メールアドレスの形式が間違っています',
        'password.required' => 'パスワードは必須です',
        ];
    }

}