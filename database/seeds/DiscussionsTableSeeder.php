<?php

use Illuminate\Database\Seeder;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t1 = 'Implementing OAUTH2 with laravel Passport';
        $t2 = 'Pagination in VueJs doesnt work';
        $t3 = 'Laravel 5.3 with Auth::id() has some errors';
        $t4 = 'Whats next after Laravel';

        $d1 = [
        	'title' => $t1,
        	'content'=>'Nothing much',
        	'channel_id'=>1,
        	'user_id'=>2,
        	'slug'=>str_slug($t1)

        ];
        $d2 = [
        	'title' => $t2,
        	'content'=>'Something is better',
        	'channel_id'=>1,
        	'user_id'=>2,
        	'slug'=>str_slug($t2)

        ];
        $d3 = [
        	'title' => $t3,
        	'content'=>'Nothing much',
        	'channel_id'=>2,
        	'user_id'=>1,
        	'slug'=>str_slug($t3)

        ];
        $d4 = [
        	'title' => $t4,
        	'content'=>'Lorem Epsum',
        	'channel_id'=>2,
        	'user_id'=>1,
        	'slug'=>str_slug($t1)

        ];

        App\Discussion::create($d1);
        App\Discussion::create($d2);
        App\Discussion::create($d3);
        App\Discussion::create($d4);
    }
}
