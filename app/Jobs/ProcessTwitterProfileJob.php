<?php

namespace App\Jobs;


use App\Http\Repositories\Twitter\TwitterRepository;
use App\SocialNetwork\Interfaces\SocialNetworkConsumerInterface;
use App\SocialNetwork\Interfaces\SocialNetworkProfileInterface;

class ProcessTwitterProfileJob extends ProcessSocialNetworkProfileJob
{
    private $twitterRepo;

    public function __construct($profile, TwitterRepository $twitterRepository)
    {
        parent::__construct($profile);

        $this->twitterRepo = $twitterRepository;
    }

    public function callback(SocialNetworkProfileInterface $profile)
    {
        $this->twitterRepo->create($profile->toArray());
    }
}
