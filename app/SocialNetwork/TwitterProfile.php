<?php

namespace App\SocialNetwork;

use App\SocialNetwork\Interfaces\SocialNetworkProfileInterface;

class TwitterProfile implements SocialNetworkProfileInterface
{

    public function toArray()
    {
        return (array) $this;
    }

}
