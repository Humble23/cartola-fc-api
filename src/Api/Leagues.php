<?php

namespace Humble23\CartolaFcClient\Api;

class Leagues extends Api
{
    public function all($leagueName = '')
    {
        return $this->get('/ligas', [
            'q' => $leagueName,
        ]);
    }
}
