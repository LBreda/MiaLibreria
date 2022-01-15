<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Label
 *
 * @property int $id
 * @property int $user_id
 * @property string $label
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Book[] $books
 * @property-read int|null $books_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Label newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Label newQuery()
 * @method static \Illuminate\Database\Query\Builder|Label onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Label query()
 * @method static \Illuminate\Database\Eloquent\Builder|Label whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Label whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Label whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Label whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Label whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Label whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Label withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Label withoutTrashed()
 * @mixin \Eloquent
 */
class Label extends Model
{
    use SoftDeletes;

    protected $table = 'labels';

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'lnk_books_labels');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
