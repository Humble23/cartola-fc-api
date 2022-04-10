<?php

namespace Humble23\CartolaFcClient\Api;

class Leagues extends Api
{
    public function all($leagueName = '')
    {
        $path = sprintf('/ligas?q=%s', $leagueName);

        return $this->get($path);
    }
}
