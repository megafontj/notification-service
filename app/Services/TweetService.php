<?php

namespace App\Services;

use App\Models\Tweet;

final class TweetService
{
    public function upsert(array $data, ?Tweet $tweet = null): Tweet
    {
        return Tweet::updateOrCreate(
            ['id' => $tweet?->id],
            $data
        );
    }

    public function destroy(Tweet $tweet)
    {
        $tweet->delete();
    }
}
