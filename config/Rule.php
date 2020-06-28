<?php
namespace App\config;

class Rule {

  public static function loginRules()
    {
      return [
        'email' => 'required|email',
        'password' => 'required|min:6',
        ];
    }

  public static function loginMessages()
    {
      return [
        'email.required' => 'メールアドレスは必須です',
        'email.email' => 'メールアドレスの形式が間違っています',
        'password.required' => 'パスワードは必須です',
        'password.min' => 'パスワードは6文字以上です',
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

  public static function createProductRules()
    {
      return [
        'title' => 'required',
        'detail' => 'required',
        'price' => 'required',
        ];
    }

  public static function createProductMessages()
    {
      return [
        'title.required' => 'タイトルは必須です',
        'detail.required' => '詳細は必須です',
        'price.required' => '価格は必須です',
        ];
    }

}