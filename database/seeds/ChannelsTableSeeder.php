<?php

use Illuminate\Database\Seeder;
use App\Channel;
class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // App\Channel::create([
        // 	'title'=>'Laravel'
        // ]);
        $channel1 = ['title'=>'Laravel'];
        $channel2 = ['title'=>'PHP']; 
        $channel3 = ['title'=>'MySQL'];
        $channel4 = ['title'=>'JavaScript'];
        $channel5 = ['title'=>'RubyOnRails'];

        Channel::create($channel1);
        Channel::create($channel2);
        Channel::create($channel3);
        Channel::create($channel4);
        Channel::create($channel5);
    }
}
