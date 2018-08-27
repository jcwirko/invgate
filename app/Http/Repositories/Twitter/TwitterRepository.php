<?php

namespace App\Http\Repositories\Twitter;

use App\Http\Repositories\Base\BaseRepository;
use App\Twitter;


class TwitterRepository extends BaseRepository
{

    /**
     * @return Twitter
     */
    public function getModel()
    {
        return new Twitter();
    }


}
