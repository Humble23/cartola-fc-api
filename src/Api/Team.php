<?php

namespace Humble23\CartolaFcClient\Api;

use Humble23\CartolaFcClient\Api\Api;

class Team extends Api
{
    public function teams($teamName = '')
    {
        return $this->get('times', [
            'q' => $teamName
        ]);
    }

    public function team($teamSlug, $round = '')
    {
        $path = sprintf('times/%s/%s', $teamSlug, $round);
        return $this->get($path);
    }

    public function highlights()
    {
        return $this->get('/mercado/destaques');
    }
}
