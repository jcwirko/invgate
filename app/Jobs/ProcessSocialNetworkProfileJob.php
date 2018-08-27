<?php

namespace App\Jobs;


use App\SocialNetwork\Interfaces\SocialNetworkConsumerInterface;
use App\SocialNetwork\Interfaces\SocialNetworkProfileInterface;

abstract class ProcessSocialNetworkProfileJob extends Job
{

    protected $profile;

    /**
     * Create a new job instance.
     * ProcessSocialNetworkProfileJob constructor.
     * @param $profile
     */
    public function __construct($profile)
    {
        $this->profile = $profile;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(SocialNetworkConsumerInterface $socialNetworkConsume)
    {
        $profile = $socialNetworkConsume->getProfile($this->profile);        
        $this->callback($profile);
    }

    public abstract function callback(SocialNetworkProfileInterface $profile);
}
