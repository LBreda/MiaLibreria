<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Author
 *
 * @property int $id
 * @property int $user_id
 * @property string $full_name
 * @property string|null $name
 * @property string|null $surname
 * @property \Illuminate\Support\Carbon|null $birth_date
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Book[] $books
 * @property-read int|null $books_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Author newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Author newQuery()
 * @method static \Illuminate\Database\Query\Builder|Author onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Author query()
 * @method static \Illuminate\Database\Eloquent\Builder|Author whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Author whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Author whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Author whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Author whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Author whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Author whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Author whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Author whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Author withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Author withoutTrashed()
 * @mixin \Eloquent
 */
class Author extends Model
{
    use SoftDeletes;

    protected $table = 'authors';
    protected $dates = ['birth_date'];

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'lnk_books_authors');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
