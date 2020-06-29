<?php
namespace App\config;

class Rule {

  public static function loginRules()
    {
      return [
        'email' => 'required|email',
        'password' => 'required|min:6',
        'scope' => 'required',
        ];
    }

  public static function loginMessages()
    {
      return [
        'email.required' => 'メールアドレスは必須です',
        'email.email' => 'メールアドレスの形式が間違っています',
        'password.required' => 'パスワードは必須です',
        'password.min' => 'パスワードは6文字以上です',
        'scope.required' => 'ログイン認証に失敗しました',
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
        'price' => 'required|integer',
        ];
    }

  public static function createProductMessages()
    {
      return [
        'title.required' => 'タイトルは必須です',
        'detail.required' => '詳細は必須です',
        'price.required' => '価格は必須です',
        'price.integer' => '価格は数値で入力してください',
        ];
    }

}