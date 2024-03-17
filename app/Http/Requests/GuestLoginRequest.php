<?php 
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GuestLoginRequest extends FormRequest
{
    public function authorize()
    {
        return true; // 通常は、このメソッドを適切な認可ロジックで置き換えます
    }

    public function rules()
    {
      if(Auth::check() && Auth::id() == 1){
        return [];
      }
        return [
            'email' => 'required|email', // メールアドレスが必須であることを指定
            'password' => 'required', // パスワードが必須であることを指定
        ];
    }
}

?>