<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Identifier
 *
 * @property int $id
 * @property int $book_id
 * @property int $identifier_type_id
 * @property string $identifier
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Book $book
 * @property-read \App\Models\IdentifierType $type
 * @method static \Illuminate\Database\Eloquent\Builder|Identifier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Identifier newQuery()
 * @method static \Illuminate\Database\Query\Builder|Identifier onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Identifier query()
 * @method static \Illuminate\Database\Eloquent\Builder|Identifier whereBookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Identifier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Identifier whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Identifier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Identifier whereIdentifier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Identifier whereIdentifierTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Identifier whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Identifier withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Identifier withoutTrashed()
 * @mixin \Eloquent
 */
class Identifier extends Model
{
    use SoftDeletes;

    protected $table = 'identifiers';

    public function type(): BelongsTo
    {
        return $this->belongsTo(IdentifierType::class, 'identifier_type_id');
    }

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
