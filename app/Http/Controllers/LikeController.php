<?php

namespace App\Http\Controllers;

use App\Model\Like;
use App\Model\Reply;
use App\Events\LikeEvent;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function likeIt(Reply $reply)
    {
        $reply->like()->create([
            'user_id'       => auth()->id()
        ]);

        \broadcast(new LikeEvent($reply->id, 1 ))->toOthers();
    }

    public function unlikeIt(Reply $reply)
    {
        $reply->like()->where('user_id', auth()->id())->first()->delete();
        \broadcast(new LikeEvent($reply->id, 1 ))->toOthers();
    }
   
}
