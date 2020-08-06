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

    // 商品登録
  public static function createProductRules()
    {
      return [
        'title' => 'required',
        'detail' => 'required',
        'explanation' => 'required',
        'price' => 'required|integer',
        'categories' => 'required|array',

        ];
    }

  public static function createProductMessages()
    {
      return [
        'title.required' => 'タイトル入力は必須です',
        'detail.required' => '商品内容入力は必須です',
        'explanation.required' => '商品解説入力は必須です',
        'price.required' => '価格入力は必須です',
        'categories.required' => 'カテゴリー選択は必須です',
        'price.integer' => '価格は半角数値で入力してください',
        ];
    }
    // こだわり登録
  public static function createCommitmentRules()
    {
      return [
        'title' => 'required',
        'contents' => 'required',
        ];
    }

  public static function createCommitmentMessages()
    {
      return [
        'title.required' => 'こだわりタイトル入力は必須です',
        'contents.required' => '詳細内容入力は必須です',
        ];
    }

    // メンバー基本情報編集
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
// お届け先登録
  public static function createMemberDeliveryRules()
    {
      return [
        'name' => 'required',
        'zip' => 'required|integer',
        'prefecture' => 'required',
        'municipality' => 'required',
        'ward' => 'required',
        'tel' => 'required|integer',
        ];
    }

  public static function createMemberDeliveryMessages()
    {
      return [
        'name.required' => '名前は必須です',
        'zip.required' => '郵便番号は必須です',
        'zip.integer' => '郵便番号は数値で入力してください',
        'prefecture.required' => '都道府県は必須です',
        'municipality.required' => '市入力は必須です',
        'ward.required' => '区長村入力は必須です',
        'tel.required' => '電話番号は必須です',
        'tel.integer' => '電話番号は半角数値で入力してください',
        ];
    }
    // メンバーパスワード変更
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


// 商品購入
  public static function purchaseRules()
    {
      return [
        'delivery_id' => 'required',
        'shipping' => 'required',
        'number' => 'required',
        ];
    }

  public static function purchaseMessages()
    {
      return [
        'delivery_id.required' => 'お届け先選択は必須です',
        'shipping.required' => '発送日入力は必須です',
        'number.required' => '購入個数入力は必須です',
        ];
    }

    // レビュー作成
  public static function reviewRules()
    {
      return [
        'score' => 'required',
        'comment' => 'required',
        ];
    }

  public static function reviewMessages()
    {
      return [
        'score.required' => '評価選択は必須です',
        'comment.required' => 'レビュー入力は必須です',
        ];
    }


    // 生産地情報登録、編集

  public static function createProductAreaRules()
    {
      return [
        'area_name' => 'required',
        'tel' => 'required|integer',
        'zip' => 'required|integer',
        'prefecture' => 'required',
        'municipality' => 'required',
        'ward' => 'required',
        'introduce' => 'required',
        'shipping' => 'required',
        'shipping_info' => 'required',
        ];
    }

  public static function createProductAreaMessages()
    {
      return [
        'area_name.required' => '生産地名入力は必須です',
        'tel.required' => '電話番号は必須です',
        'tel.integer' => '電話番号は半角数値で入力してください',
        'zip.required' => '郵便番号は必須です',
        'zip.integer' => '郵便番号は数値で入力してください',
        'prefecture.required' => '都道府県は必須です',
        'municipality.required' => '市入力は必須です',
        'ward.required' => '区長村入力は必須です',
        'introduce.required' => '紹介文入力は必須です',
        'shipping.required' => '発送曜日入力は必須です',
        'shipping_info.required' => '発送に関するお知らせの入力は必須です',
        ];
    }

}