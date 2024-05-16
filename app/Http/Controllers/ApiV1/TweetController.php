<?php

namespace App\Http\Controllers\ApiV1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTweetRequest;
use App\Http\Requests\UpdateTweetRequest;
use App\Http\Resources\TweetResource;
use App\Models\Tweet;
use App\Services\TweetService;
use App\Support\QuerySearch\SearchQuery;
use App\Support\Requests\SearchRequest;
use App\Support\Resources\EmptyResource;

class TweetController extends Controller
{

    public function __construct(
        private TweetService $tweetService
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(SearchRequest $request, SearchQuery $queryFilter)
    {
        return TweetResource::collection(Tweet::filter($queryFilter)->cursorPaginate(20));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTweetRequest $request)
    {
        return new TweetResource($this->tweetService->upsert($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Tweet $tweet)
    {
        return new TweetResource($tweet);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTweetRequest $request, Tweet $tweet)
    {
        return new TweetResource($this->tweetService->upsert($request->validated(), $tweet));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tweet $tweet): EmptyResource
    {
        $this->tweetService->destroy($tweet);
        return new EmptyResource();
    }
}
