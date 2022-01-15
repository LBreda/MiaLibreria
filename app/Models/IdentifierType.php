<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\IdentifierType
 *
 * @property int $id
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Identifier[] $identifiers
 * @property-read int|null $identifiers_count
 * @method static \Illuminate\Database\Eloquent\Builder|IdentifierType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IdentifierType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IdentifierType query()
 * @method static \Illuminate\Database\Eloquent\Builder|IdentifierType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IdentifierType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IdentifierType whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IdentifierType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class IdentifierType extends Model
{
    protected $table = 'identifier_types';

    public function identifiers(): HasMany
    {
        return $this->hasMany(Identifier::class);
    }
}
