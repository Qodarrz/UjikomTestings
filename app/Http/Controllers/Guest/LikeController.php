<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LikeController extends Controller
{
    public function toggle($postId)
    {
        $like = Like::where('user_id', Auth::id())
            ->where('post_id', $postId)
            ->first();

        if ($like) {
            $like->delete();
            $status = 'unliked';
        } else {
            Like::create([
                'user_id' => Auth::id(),
                'post_id' => $postId,
            ]);
            $status = 'liked';
        }

        return response()->json(['status' => $status]);
    }
}
