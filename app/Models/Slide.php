<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Auth;
class Slide extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['title'];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function add($data)
    {
        $this->setTranslation('title' , 'ar' , $data['title']['ar']);
        $this->setTranslation('title' , 'en' , $data['title']['en']);
        $this->user_id = Auth::id();
        $this->link = $data['link'];
        return $this->save();
    }
    public function edit($data)
    {
        $this->setTranslation('title' , 'ar' , $data['title']['ar']);
        $this->setTranslation('title' , 'en' , $data['title']['en']);
        $this->link = $data['link'];
        $this->active = isset($data['active']) ? 1 : 0;
        return $this->save();
    }

}
