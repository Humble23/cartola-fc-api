<?php

namespace Humble23\CartolaFcClient\Api;

class Teams extends Api
{
    public function all()
    {
        return $this->get('/times');
    }

    public function find($teamName)
    {
        $path = sprintf('/times?q=%s', $teamName);

        return $this->get($path);
    }

    public function athletes($teamId, $round = 1)
    {
        $path = sprintf("/time/id/%s/%s", $teamId, $round);

        return $this->get($path);
    }
}
