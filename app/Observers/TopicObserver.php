<?php

namespace App\Observers;

use App\Models\Topic;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

//模型监控器
class TopicObserver
{
    public function creating(Topic $topic)
    {
        //
    }

    public function updating(Topic $topic)
    {
        //
    }

    public function saving(Topic $topic)
    {
        $topic->body = clean($topic->body,'user_topics_body');
        $topic->excerpt = make_excerpt($topic->body);
    }
}