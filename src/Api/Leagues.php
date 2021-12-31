<?php

namespace Humble23\CartolaFcClient\Api;

use Humble23\CartolaFcClient\Api\Api;

class Leagues extends Api
{
    public function all($leagueName = '')
    {
        return $this->get('/ligas', [
            'q' => $leagueName,
        ]);
    }
}
