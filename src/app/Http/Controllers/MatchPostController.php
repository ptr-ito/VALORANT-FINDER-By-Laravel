<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\MatchPostResource;
use App\Models\MatchPost;
use App\Models\Mode;
use App\Models\Mood;
use App\Services\MatchPost\CreateMatchPost;
use App\Services\MatchPost\UpdateMatchPost;
use Illuminate\Http\Request;

class MatchPostController extends Controller
{
    public function search(Request $request)
    {
        $query = MatchPost::query();

        $rankInput = $request->get('rank');

        if ($request->filled('keyword')) {
            $query->where('title', 'like', '%'.$request->get('keyword').'%')
                ->orWhere('content', 'LIKE', '%'.$request->get('keyword').'%');

            $query->orderBy('updated_at', 'desc')->paginate(15);
        }

        if ($request->filled('mode')) {
            $mode_id = Mode::where('name', $request->mode)->first()->id;
            $query->where('mode_id', $mode_id);

            $query->orderBy('updated_at', 'desc')->paginate(15);
        }

        if ($request->filled('mood')) {
            $mood_id = Mood::where('name', $request->mood)->first()->id;
            $query->where('mood_id', $mood_id);

            $query->orderBy('updated_at', 'desc')->paginate(15);
        }

        if ($request->filled('rank')) {
            MatchPost::whereHas('ranks', function ($query) use ($rankInput) {
                $query->where('name', 'LIKE', '%'.$rankInput.'%');
            })->get();

            $query->orderBy('updated_at', 'desc')->paginate(15);
        }

        return MatchPostResource::collection($query->get());
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matchPosts = MatchPost::all();

        return MatchPostResource::collection($matchPosts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $matchPost = app(CreateMatchPost::class)->execute([
            'user_id' => auth()->user()->id,
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'mode_id' => $request->input('mode_id'),
            'mood_id' => $request->input('mood_id'),
        ]);

        $matchPost->ranks()->sync(explode(',', $request->ranks));

        return new MatchPostResource($matchPost);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $matchPost = MatchPost::find($id);

        return new MatchPostResource($matchPost);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MatchPost $matchPost)
    {
        $matchPost = app(UpdateMatchPost::class)->execute([
            'user_id' => auth()->user()->id,
            'match_post_id' => $matchPost->id,
            'content' => $request->input('content'),
            'title' => $request->input('title'),
            'mode_id' => $request->input('mode_id'),
            'mood_id' => $request->input('mood_id'),
        ]);

        $matchPost->ranks()->sync(explode(',', $request->ranks));

        return new MatchPostResource($matchPost);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $matchPost = MatchPost::find($id)->delete();

        return response()->json([
            $matchPost,
            'message' => '投稿を削除しました',
        ], 200);
    }
}
