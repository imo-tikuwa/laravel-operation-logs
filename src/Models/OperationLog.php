<?php

namespace ImoTikuwa\OperationLogs\Models;

use DateInterval;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OperationLog
 *
 * @property int $id
 * @property string $client_ip クライアントIP
 * @property string $user_agent ユーザーエージェント
 * @property string $request_url リクエストURL
 * @property \Illuminate\Support\Carbon $request_time リクエスト日時
 * @property \Illuminate\Support\Carbon $response_time レスポンス日時
 * @property DateInterval $diff レスポンス日時 - リクエスト日時 の差分
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

    /**
     * Do not use created_at and updated_at.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Request date and time and response date and time cast settings.
     *
     * @var array
     */
    protected $casts = [
        'request_time' => 'datetime:Y-m-d H:i:s.u',
        'response_time' => 'datetime:Y-m-d H:i:s.u',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'diff',
    ];

    /**
     * Returns the difference between the request date and time and the response date and time.
     *
     * @return DateInterval
     */
    public function getDiffAttribute()
    {
        return $this->request_time->diff($this->response_time);
    }
}
