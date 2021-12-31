<?php

namespace Humble23\CartolaFcClient\Api;

use Humble23\CartolaFcClient\Api\Api;

class Game extends Api
{
    /**
     * List all rounds from the current season.
     *
     * @return void
     */
    public function rounds()
    {
        return $this->get('/rodadas');
    }

    /**
     * Get the current round.
     *
     * @return json|array|xml
     */
    public function round($round)
    {
        return $this->get('/rodadas/' . $round);
    }

    /**
     * List all clubs.
     *
     * @return json|array|xml
     */
    public function clubs()
    {
        return $this->get('/clubs');
    }

    /**
     * List all sponsors.
     *
     * @return json|array|xml
     */
    public function sponsors()
    {
        return $this->get('/patrocinadores');
    }

    /**
     * Check if the game is over.
     *
     * @return boolean
     */
    public function isGameOver()
    {
        return $this->withTemporaryReturnType(function ($api) {
            return $api->get('/mercado/status');
        })['game_over'];
    }

    /**
     * Get the current game round.
     *
     * @return integer
     */
    public function currentRound()
    {
        return $this->withTemporaryReturnType(function ($api) {
            return $api->get('/mercado/status');
        })['rodada_atual'];
    }
}
