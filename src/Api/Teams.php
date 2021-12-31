<?php

namespace Humble23\CartolaFcClient\Api;

class Teams extends Api
{
    public function all($teamName = '')
    {
        return $this->get('times', [
            'q' => $teamName,
        ]);
    }

    public function find($teamSlug, $round = '')
    {
        $path = sprintf('times/%s/%s', $teamSlug, $round);

        return $this->get($path);
    }

    public function highlights()
    {
        return $this->get('/mercado/destaques');
    }
}
