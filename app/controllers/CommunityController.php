<?php

/**
 * Description of CommunitiesController
 *
 * @author Hichem MHAMED
 */
use ArabiaIOClone\Repositories\CommunityRepositoryInterface;


class CommunityController extends BaseController
{
    
   

   public function postSubscribe($id)
   {
       $community = $this->communities->findById($id);
       $user = Auth::user();
       $this->users->subscribeToCommunity($user, $community);
       return Response::json(['success'=>true]);
   }
   
   public function postUnsubscribe($id)
   {
       $community = $this->communities->findById($id);
       $user = Auth::user();
       $this->users->unsubscribeToCommunity($user, $community);
       return Response::json(['success'=>true]);
   }
    
   public function getViewCommunity($communitySlug)
   {
       $community = $this->communities->findBySlug($communitySlug);
       
       if($community)
       {
           $posts = $this->posts->findMostPopularByCommunity($community);
           return View::make('communities.view')
                   ->with(compact('community','posts'));
       }
   }
   
   public function getViewCommunityRecent($communitySlug)
   {
       $community = $this->communities->findBySlug($communitySlug);
       
       if($community)
       {
           $posts = $this->posts->findMostRecentByCommunity($community);
           return View::make('communities.view')
                   ->with(compact('community','posts'));
       }
   }
   
   public function getViewCommunityTop($communitySlug)
   {
       $community = $this->communities->findBySlug($communitySlug);
       
       if($community)
       {
           $posts = $this->posts->findTopByCommunity($community);
           return View::make('communities.view')
                   ->with(compact('community','posts'));
       }
   }
    
    public function getBrowse()
    {
        if(Auth::check())
        {
            $communities = $this->communities->findByUserPaginated(Auth::user(),$perPage = 10);
        }else
        {
            $communities = $this->communities->findMostActivePaginated($perPage = 10);
        }
        return View::make('communities.index')
                ->with(compact('communities'));
    }
    
    public function postCreate()
    {
        $user = Auth::user();
        if(!$user)
        {
            return Redirect::route('account-login');
                    
        }
        $form = $this->communities->getCommunityCreateForm();
        if(!$form->isValid())
        {
            return Redirect::route('communities-create')
                    ->withInput()
                    ->withErrors($form->getErrors());
        }
        $data = $form->getInputData();
        $data['createdbyuser'] = $user->is_admin ? false:true;
        $data['creator_id'] = $user->id ;
        if($community = $this->communities->create($data))
        {
            $community->subscribers()->attach($user);
            return Redirect::route('communities-browse-recent')
                    ->with('success',[Lang::get('success.community_create')]);
        }else
        {
            return Redirect::route('communities-create')
                    ->withInput()
                    ->withErrors(Lang::get('errors.community_create'));
        }
    }
    
    public function  getCreate()
   {
       return View::make('communities.create');
   }
    
    public function getMostActive()
    {
        $communities = $this->communities->findMostActivePaginated($perPage = 10);
        return View::make('communities.index')
                ->with(compact('communities'));
    }
    
    public function getMostRecent()
    {
        $communities = $this->communities->findMostRecentPaginated($perPage = 10);
        return View::make('communities.index')
                ->with(compact('communities'));
    }
}

?>
