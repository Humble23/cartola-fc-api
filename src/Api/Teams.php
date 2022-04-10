<?php

namespace Humble23\CartolaFcClient\Api;

class Teams extends Api
{
    public function all($teamName = '')
    {
        return $this->get('/times', [
            'q' => $teamName,
        ]);
    }

    public function find($teamSlug)
    {
        $path = sprintf('/times?q=%s', $teamSlug);

        return $this->get($path);
    }

    public function athletes($teamId, $round = 1)
    {
        $path = sprintf("/time/id/%s/%s", $teamId, $round);

        return $this->get($path);
    }
}
