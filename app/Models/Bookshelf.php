<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Bookshelf
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Book[] $books
 * @property-read int|null $books_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Bookshelf newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bookshelf newQuery()
 * @method static \Illuminate\Database\Query\Builder|Bookshelf onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Bookshelf query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bookshelf whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bookshelf whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bookshelf whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bookshelf whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bookshelf whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bookshelf whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Bookshelf withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Bookshelf withoutTrashed()
 * @mixin \Eloquent
 */
class Bookshelf extends Model
{
    use SoftDeletes;

    protected $table = 'bookshelves';

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'lnk_books_bookshelves');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
