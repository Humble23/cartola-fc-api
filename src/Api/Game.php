<?php

namespace Humble23\CartolaFcClient\Api;

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
     * List all clubs.
     *
     * @return json|array|xml
     */
    public function clubs()
    {
        return $this->get('/clubes');
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
     * @return bool
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
     * @return int
     */
    public function currentRound()
    {
        return $this->withTemporaryReturnType(function ($api) {
            return $api->get('/mercado/status');
        })['rodada_atual'];
    }
}
