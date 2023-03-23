<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MatchPost;
use App\Models\User;
use App\Http\Resources\MatchPostResource;
use App\Http\Requests\StoreMatchPostRequest;
use App\Http\Requests\UpdateMatchPostRequest;

use Illuminate\Support\Facades\Log;



class MatchPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $match_posts = MatchPost::all();
        return MatchPostResource::collection($match_posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMatchPostRequest $request, User $user)
    {
        $validated = $request->validated();

        $created = $user->match_posts()->create($validated);
        $created->ranks()->sync(explode(",", $request->ranks));
        return new MatchPostResource($created);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $match_post = MatchPost::find($id);

        return new MatchPostResource($match_post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMatchPostRequest $request, string $id, User $user)
    {
        $match_post = MatchPost::find($id);
        $validated = $request->validated();
        $match_post->fill($validated)->save();
        $match_post->ranks()->sync(explode(",", $request->ranks));
        return new MatchPostResource($match_post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $match_post = MatchPost::find($id)->delete();

        return response()->json([
            $match_post,
            'message' => '投稿を削除しました',
        ], 200);
    }
}
