<?php

namespace Humble23\CartolaFcClient\Api;

class Market extends Api
{
    public function status()
    {
        return $this->get('/mercado/status');
    }

    public function highlights()
    {
        return $this->get('/mercado/destaques');
    }
}
