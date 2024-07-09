<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    use HasFactory;

    /**
     * モデルの日付カラムの保存用フォーマット
     *
     * @var string
     */
    protected $dateFormat = 'U';

    /**
     * insert時にtimestamp項目も更新するようにオーバーライドする
     *
     * @param array $attributes
     */
    public static function insert($attributes)
    {
        $now = time();
        foreach ($attributes as $key => $value) {
            $attributes[$key]['created_at'] = $now;
            $attributes[$key]['updated_at'] = $now;
        }

        return (new static())->forwardCallTo((new static())->newQuery(), 'insert', [$attributes]);
    }
}
