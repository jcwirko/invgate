<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class SocialNetworkTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function obtener_mensaje_de_procesamiento_en_la_primer_solicitud()
    {
        $response = $this->json('GET', 'api/v1/twitter/get_profile/gonbonadeo1963');

        $response->seeJsonEquals([
            'Mensaje' => 'Se está procesando la solicitud',
            'status' => 0
        ]);
    }

    /** @test */
    public function obtener_perfil_de_usuario_twitter_a_partir_de_la_segunda_solicitud()
    {
        $profile = 'gonbonadeo1963';

        $response = $this->json('GET', "api/v1/twitter/get_profile/$profile");

        $response = $this->json('GET', "api/v1/twitter/get_profile/$profile");

        $response->seeJson([
            'profile' => $profile,
            'status' => 1
        ]);
    }


}
