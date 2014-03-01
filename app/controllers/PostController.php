<?php

/**
 * Description of PostController
 *
 * @author Hichem MHAMED
 */

use ArabiaIOClone\Repositories\CommunityRepositoryInterface;
use ArabiaIOClone\Repositories\PostRepositoryInterface;


class PostController extends BaseController
{
    
    protected $communities;
    protected $posts;
    
    public function __construct(
            CommunityRepositoryInterface $communities,
            PostRepositoryInterface $posts
            ) 
    {
        //parent::__construct();
        $this->communities = $communities;
        $this->posts = $posts;
        
    }
    
    public function getDefault()
    {
        $posts = $this->posts->findMostPopular();
        return View::make('posts.browse')
                ->with('posts',$posts);
    }
    
    public function getSubmit()
    {
        $communities = $this->communities->findAll('created_at','asc')->lists('name','id');
        return View::make('posts.submit')
                ->with('communities',$communities);
    }
    
    public function postSubmit()
    {
        
        
        $form = $this->posts->getPostSubmitForm();
        if(!$form->isValid())
        {
            return Redirect::route('post-submit')
                    ->withInput()
                    ->withErrors($form->getErrors());
        }
        
        $data = $form->getInputData();
        $data['user_id'] = Auth::user()->id;

        $post = $this->posts->create($data);

        if($post)
        {
            return Redirect::route('default')
                ->with('success',[Lang::get('success.post_submit')]);
        }else
        {
            return Redirect::route('post-submit')
                    ->withInput()
                    ->withErrors(Lang::get('errors.post_submit'));
        }
        
    }
}

?>
