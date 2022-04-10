<?php

namespace Humble23\CartolaFcClient\Api;

class Athletes extends Api
{
    public function market()
    {
        return $this->get('/atletas/mercado');
    }

    public function score()
    {
        return $this->get('/atletas/pontuados');
    }
}
