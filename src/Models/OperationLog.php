<?php

namespace ImoTikuwa\OperationLogs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OperationLog
 *
 * @property int $id
 * @property string $client_ip クライアントIP
 * @property string $user_agent ユーザーエージェント
 * @property string $request_url リクエストURL
 * @property string $request_time リクエスト日時
 * @property string $response_time レスポンス日時
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|OperationLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OperationLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OperationLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|OperationLog whereClientIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OperationLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OperationLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OperationLog whereRequestTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OperationLog whereRequestUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OperationLog whereResponseTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OperationLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OperationLog whereUserAgent($value)
 * @mixin \Eloquent
 */
class OperationLog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_ip',
        'user_agent',
        'request_url',
        'request_time',
        'response_time',
    ];

    /**
     * micro datetime format.
     *
     * @var string
     */
    protected $dateFormat = "Y/m/d H:i:s.u";
}
