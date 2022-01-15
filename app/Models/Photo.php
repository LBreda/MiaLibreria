<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Photo
 *
 * @property int $id
 * @property int $book_id
 * @property string $filename
 * @property int $width
 * @property int $height
 * @property string $format
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Book $book
 * @method static \Illuminate\Database\Eloquent\Builder|Photo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Photo newQuery()
 * @method static \Illuminate\Database\Query\Builder|Photo onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Photo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereBookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereFormat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereWidth($value)
 * @method static \Illuminate\Database\Query\Builder|Photo withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Photo withoutTrashed()
 * @mixin \Eloquent
 */
class Photo extends Model
{
    use SoftDeletes;

    protected $table = 'photos';

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
