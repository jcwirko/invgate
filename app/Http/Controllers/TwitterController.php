<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Twitter\TwitterRepository;
use App\Jobs;
use App\Jobs\ProcessTwitterProfileJob;
use function GuzzleHttp\Promise\queue;

class TwitterController extends Controller
{
    /**
     * @var TwitterRepository
     */
    private $twitterRepo;

    /**
     * TwitterController constructor.
     * @param TwitterRepository $twitterRepository
     */
    public function __construct(TwitterRepository $twitterRepository)
    {
        $this->twitterRepo = $twitterRepository;
    }

    /**
     * OBTENGO EL NOMBRE, LA DESCRIPCIÓN Y URL DE LA IMAGEN
     * @param $profile
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProfile($profile)
    {
        $userProfile = $this->twitterRepo->findBy('profile', $profile);

        if ($userProfile) {
            $userProfile->status = 1;
            return response()->json($userProfile);
        }

        dispatch(new ProcessTwitterProfileJob($profile, $this->twitterRepo));

        return response()->json([
            "status" => 0,
            "Mensaje" => 'Se está procesando la solicitud'
        ]);
    }

}
