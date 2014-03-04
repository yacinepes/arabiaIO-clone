<?php

/**
 * Description of CommentController
 *
 * @author Hichem MHAMED
 */
use ArabiaIOClone\Repositories\PostRepositoryInterface;
use ArabiaIOClone\Repositories\CommentRepositoryInterface;

class CommentController extends BaseController
{
    protected $comments;
    protected $posts;
    
    public function __construct(
            CommentRepositoryInterface $comments,
            PostRepositoryInterface $posts
            ) 
    {
        //parent::__construct();
        $this->comments = $comments;
        $this->posts = $posts;
        
    }
    
    public function postSubmit($postId, $parentId=null)
    {
        if(!Auth::check())
        {
            return  Redirect::back()
                    ->withInput()
                    ->withErrors(array(Lang::get('errors.comment_auth')));
        }
        
        if (Auth::user()->reputation < Config::get("user.enoughKarmaToComment"))
        {
            return  Redirect::back()
                    ->withInput()
                    ->withErrors(array(Lang::get('errors.comment_not_enough_reputation')));
        }
        
        $form = $this->comments->getPostSubmitForm();
        if(!$form->isValid())
        {
            return Redirect::back()
                    ->withInput()
                    ->withErrors($form->getErrors());
        }
        
        $data = $form->getInputData();
        $data['user_id'] = Auth::user()->id;
        $data['post_id'] = $postId;

        $comment = $this->comments->create($data,$parentId);

        if($comment)
        {
            return Redirect::back()
                ->with('success',[Lang::get('success.comment_submit')]);
        }else
        {
            return Redirect::back()
                    ->withInput()
                    ->withErrors(Lang::get('errors.comment_submit'));
        }
    }
}

?>
