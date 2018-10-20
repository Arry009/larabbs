<?php

namespace App\Models;

class Topic extends Model
{
    //'user_id' 'last_reply_user_id',  'order','reply_count', 'view_count',
    protected $fillable = ['title', 'body',  'category_id',   'excerpt', 'slug'];

    //关联设定，分类的用户一对一的关系 一个话题一个分类，一个话题一个作者
    public function category()
    {
        return $this->belongsTo(Category::class); //一对一的关系
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeWithOrder($query,$order)
    {
        switch ($order){
            case 'recent':
                $query->recent();
                break;
            default:
                $query->recentReplied();
                break;
        }

        return $query->with('user','category');
    }

    public function scopeRecentReplied($query)
    {
        // 当话题有新回复时，我们将编写逻辑来更新话题模型的 reply_count 属性，
        // 此时会自动触发框架对数据模型 updated_at 时间戳的更新
        return $query->orderBy('updated_at', 'desc');
    }

    public function scopeRecent($query)
    {
        // 按照创建时间排序
        return $query->orderBy('created_at', 'desc');
    }

    public function link($params = [])
    {
        return route('topics.show', array_merge([$this->id, $this->slug], $params));
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
