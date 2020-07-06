<?php
namespace App\config;

class Rule {

  // 各ログイン
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

    // 管理者登録
  public static function createAdminRules()
    {
      return [
        'email' => 'required|email',
        'password' => 'required|min:6',
        ];
    }

  public static function createAdminMessages()
    {
      return [
        'email.required' => 'メールアドレスは必須です',
        'email.email' => 'メールアドレスの形式が間違っています',
        'password.required' => 'パスワードは必須です',
        'password.min' => 'パスワードは6文字以上です',
        ];
    }
    
    // 生産者登録
  public static function createClientRules()
    {
      return [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6',
        ];
    }

  public static function createClientMessages()
    {
      return [
        'name.required' => '名前は必須です',
        'email.required' => 'メールアドレスは必須です',
        'email.email' => 'メールアドレスの形式が間違っています',
        'password.required' => 'パスワードは必須です',
        'password.min' => 'パスワードは6文字以上です',
        ];
    }
  public static function createMemberRules()
    {
      return [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6',
        ];
    }

    // メンバー登録
  public static function createMemberMessages()
    {
      return [
        'name.required' => '名前は必須です',
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

  public static function editMemberRules()
    {
      return [
        'name' => 'required',
        'email' => 'required',
        ];
    }

  public static function editMemberMessages()
    {
      return [
        'name.required' => '名前は必須です',
        'email.required' => 'メールは必須です',
        ];
    }

  public static function createMemberDeliveryRules()
    {
      return [
        'name' => 'required',
        'zip' => 'required|integer',
        'address' => 'required',
        'tel' => 'required|integer',
        ];
    }

  public static function createMemberDeliveryMessages()
    {
      return [
        'name.required' => '名前は必須です',
        'zip.required' => '郵便番号は必須です',
        'zip.integer' => '郵便番号は数値で入力してください',
        'address.required' => '住所は必須です',
        'tel.required' => '電話番号は必須です',
        'tel.integer' => '電話番号は数値で入力してください',
        ];
    }
  public static function editMemberPasswordRules()
    {
      return [
        'password' => 'required|min:6',
        ];
    }

  public static function editMemberPasswordMessages()
    {
      return [
        'password.required' => 'パスワードは必須です',
        'password.min' => 'パスワードは6文字以上です',
        ];
    }

}