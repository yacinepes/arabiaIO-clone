<?php

/**
 * Description of CommunitiesController
 *
 * @author Hichem MHAMED
 */
use ArabiaIOClone\Repositories\CommunityRepositoryInterface;


class CommunityController extends BaseController
{
    
    
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
        $lists = $this->communities->findAll();
        
        return View::make('communities.index');
    }
    
    public function getMostActive()
    {
        $lists = $this->communities->findAll();
        return View::make('communities.index');
    }
    
    public function getMostRecent()
    {
        $lists = $this->communities->findAll();
        return View::make('communities.index');
    }
}

?>
