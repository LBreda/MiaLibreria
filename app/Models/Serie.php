<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Serie
 *
 * @property int $id
 * @property int $user_id
 * @property string $serie
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Book[] $books
 * @property-read int|null $books_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Serie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Serie newQuery()
 * @method static \Illuminate\Database\Query\Builder|Serie onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Serie query()
 * @method static \Illuminate\Database\Eloquent\Builder|Serie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Serie whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Serie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Serie whereSerie($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Serie whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Serie whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Serie withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Serie withoutTrashed()
 * @mixin \Eloquent
 */
class Serie extends Model
{
    use SoftDeletes;

    protected $table = 'series';

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'lnk_books_series');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
