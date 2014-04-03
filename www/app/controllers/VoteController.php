<?php

class VoteController extends BaseController {

	public function getColorCount($colorId)
	{
            return Response::json(
                array('colorId' => $colorId,
                      'votes'   => Vote::getVotesByColor($colorId)));
	}

}
