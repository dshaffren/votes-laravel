<?php

class Vote extends Eloquent {

    public static function getVotesByColor($colorId)
    {
        $result = DB::select(
            'SELECT COUNT(votes.id) AS votes
            FROM colors
            LEFT JOIN votes
                ON votes.color_id = colors.id
            WHERE colors.id = ?
            GROUP BY colors.id', array($colorId));

        return $result[0]->votes;
    }

}
