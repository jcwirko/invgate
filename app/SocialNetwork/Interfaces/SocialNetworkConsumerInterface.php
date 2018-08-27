<?php

namespace App\SocialNetwork\Interfaces;


interface SocialNetworkConsumerInterface
{

    /**
     * @return mixed
     */
    public function getProfile($profile): SocialNetworkProfileInterface;

}
