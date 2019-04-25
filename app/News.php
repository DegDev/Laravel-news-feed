<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\News
 *
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Category $category
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\News whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class News extends Model
{
    protected $with = [ 'category'];

    protected $fillable = [
      'category_id',
      'title',
      'body'
    ];

    public function path()
    {
        return "/news/{$this->category->slug}/{$this->id}";
    }

    public function category()
    {

        return $this->belongsTo(Category::class);
    }
}
