<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use League\CommonMark\DocParser;
use League\CommonMark\Environment;
use League\CommonMark\HtmlRenderer;
use Spatie\Tags\HasTags;
class Post extends Model

{

    protected $guarded = [];
    use HasFactory;
    use HasTags;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function image()
    {
        return $this->hasMany(Image::class);
    }
    // public static function boot()
    // {
    //     parent::boot();

    //     self::saving( function($model) {
    //         		// Set up a container for any hashtags that get parsed
    //     App::singleton('tagqueue', function() {
    //         return new \App\TagQueue;
    //     });
    //         $environment = Environment::createCommonMarkEnvironment();
    //         $environment->addInlineParser(new \App\Parsers\HashtagParser());
    //         $parser = new DocParser($environment);
    //         $htmlRenderer = new HtmlRenderer($environment);

    //         $text = $parser->parse($model->body);

    //         $model->html = $htmlRenderer->renderBlock($text);
    //     });
    //     self::saved( function($model) {
    //         $model->syncTags(app('tagqueue')->getTags());
    //     });
    // }
    
}
