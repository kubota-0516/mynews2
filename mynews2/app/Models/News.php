<?php

// Modelでデータを保存する前に、フォームから受け取ったデータの内容が正しいかどうかを確認する必要がある場合があります。
// たとえば、ニュースへ追加するときにタイトルが入力されていなかった場合は、不完全なデータを登録してしまうことになります。
// このようなデータの不備をあらかじめ防ぐために検証する仕組みがValidationです。
// Validationを設定するにはたくさんの方法がありますが、今回はModelに定義します。

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $guarded = array('id');
    public static $rules = array(
        'title' => 'required',
        'body' => 'required',
    );
}
