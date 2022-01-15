<?php

namespace App\Models;

use App\Traits\HasMetaJson;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use LBreda\LaravelLangDb\Models\Language;

/**
 * App\Models\Book
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string|null $subtitle
 * @property string|null $original_title
 * @property int $language_id
 * @property int $original_language_id
 * @property string|null $published_date
 * @property string|null $description
 * @property string $meta_json
 * @property int $publisher_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Author[] $authors
 * @property-read int|null $authors_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Bookshelf[] $bookshelves
 * @property-read int|null $bookshelves_count
 * @property string|null $country
 * @property int|null $edition
 * @property int|null $height
 * @property int|null $page_count
 * @property int|null $reprint
 * @property int|null $thickness
 * @property int|null $width
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Identifier[] $identifiers
 * @property-read int|null $identifiers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Bookshelf[] $labels
 * @property-read int|null $labels_count
 * @property-read Language $language
 * @property-read Language $original_language
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Photo[] $photos
 * @property-read int|null $photos_count
 * @property-read \App\Models\Publisher $publisher
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Serie[] $series
 * @property-read int|null $series_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Book newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Book newQuery()
 * @method static \Illuminate\Database\Query\Builder|Book onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Book query()
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereMetaJson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereOriginalLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereOriginalTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book wherePublishedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book wherePublisherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Book withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Book withoutTrashed()
 * @mixin \Eloquent
 */
class Book extends Model
{
    use SoftDeletes, HasMetaJson;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'language_id');
    }

    public function original_language(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'original_language_id');
    }

    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class, 'lnk_books_authors');
    }

    public function bookshelves(): BelongsToMany
    {
        return $this->belongsToMany(Bookshelf::class, 'lnk_books_bookshelves');
    }

    public function labels(): BelongsToMany
    {
        return $this->belongsToMany(Bookshelf::class, 'lnk_books_bookshelves');
    }

    public function identifiers(): HasMany
    {
        return $this->hasMany(Identifier::class);
    }

    public function series(): BelongsToMany
    {
        return $this->belongsToMany(Serie::class, 'lnk_books_series');
    }

    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class);
    }

    public function getCountryAttribute(): string|null
    {
        $this->getMeta('country');
    }

    public function setCountryAttribute(?string $country)
    {
        $this->setMeta('country', $country);
    }

    public function getEditionAttribute(): int|null
    {
        $this->getMeta('edition');
    }

    public function setEditionAttribute(?int $page_count)
    {
        $this->setMeta('edition', $page_count);
    }

    public function getReprintAttribute(): int|null
    {
        $this->getMeta('reprint');
    }

    public function setReprintAttribute(?int $page_count)
    {
        $this->setMeta('reprint', $page_count);
    }

    public function getPageCountAttribute(): int|null
    {
        $this->getMeta('page_count');
    }

    public function setPageCountAttribute(?int $page_count)
    {
        $this->setMeta('page_count', $page_count);
    }

    public function getWidthAttribute(): int|null
    {
        $this->getMeta('width');
    }

    public function setWidthAttribute(?int $page_count)
    {
        $this->setMeta('width', $page_count);
    }

    public function getHeightAttribute(): int|null
    {
        $this->getMeta('height');
    }

    public function setHeightAttribute(?int $page_count)
    {
        $this->setMeta('height', $page_count);
    }

    public function getThicknessAttribute(): int|null
    {
        $this->getMeta('thickness');
    }

    public function setThicknessAttribute(?int $page_count)
    {
        $this->setMeta('thickness', $page_count);
    }
}
