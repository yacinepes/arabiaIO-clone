<?php

/**
 * Description of UsersTableSeeder
 *
 * @author Hichem MHAMED
 */
class UsersTableSeeder extends Seeder
{
   public function run()
   {
       $usersArray = array(
           array(
               'email' => 'user1@gmail.com',
                'fullname'=>'هشام محمد',
	        'username'=>'hichem',
                'website'=>'http://www.arabia.io',
	        'password' =>'password',
                'bio' =>'good guy',
                'active' => 1
           ),
           array(
               'email' => 'user2@gmail.com',
                'fullname'=>'أم كلثوم',
	        'username'=>'kolthoum',
                'website'=>'',
	        'password' =>'password',
                'bio' =>'good singer',
                'active' =>1
           ),
           array(
               'email' => 'user3@gmail.com',
                'fullname'=>'أبو الحروف',
	        'username'=>'abo.7oroof',
                'website'=>'',
	        'password' =>'password',
                'bio' =>'',
                'active' =>1
           ),
           array(
               'email' => 'user4@gmail.com',
                'fullname'=>'',
	        'username'=>'ahmed',
                'website'=>'',
	        'password' =>'',
                'bio' =>'',
                'active' =>1
           ),
           array(
               'email' => 'user5@gmail.com',
                'fullname'=>'',
	        'username'=>'Mohamed',
                'website'=>'',
	        'password' =>'',
                'bio' =>'',
                'active' =>1
           )
           
       );
       
       foreach($usersArray as $user)
       {
           User::create($user);
       }
   }
}

?>
