<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreMatchPostRequest;
use App\Http\Requests\UpdateMatchPostRequest;
use App\Http\Resources\MatchPostResource;
use App\Models\MatchPost;
use App\Models\User;

class MatchPostController extends Controller
{
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
    public function store(StoreMatchPostRequest $request)
    {
        $validated = $request->validated();

        $created = MatchPost::create($validated);
        $created->ranks()->sync(explode(',', $request->ranks));

        return new MatchPostResource($created);
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
    public function update(UpdateMatchPostRequest $request, string $id, User $user)
    {
        $matchPost = MatchPost::find($id);
        $validated = $request->validated();
        $matchPost->fill($validated)->save();
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
