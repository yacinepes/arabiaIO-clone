<?php

/**
 * Description of PostController
 *
 * @author Hichem MHAMED
 */
class PostController extends BaseController
{
    public function getDefault()
    {
        return View::make('posts.browse');
    }
}

?>
