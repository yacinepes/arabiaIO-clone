<?php

/**
 * Description of PostsTableSeeder
 *
 * @author Hichem MHAMED
 */
class PostsTableSeeder extends Seeder
{
    public function run()
    {
        $userHichem = User::whereUsername('hichem')->first();
        $communityWebDev = Community::whereName('webdev')->first();
        
        
        
    }
}

?>
