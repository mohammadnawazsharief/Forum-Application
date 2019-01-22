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
        $channel1 = ['title'=>'Laravel','slug'=>str_slug('Laravel')];
        $channel2 = ['title'=>'PHP','slug'=>str_slug('PHP')]; 
        $channel3 = ['title'=>'MySQL','slug'=>str_slug('MySQL')];
        $channel4 = ['title'=>'JavaScript','slug'=>str_slug('JavaScript')];
        $channel5 = ['title'=>'RubyOnRails','slug'=>str_slug('RubyOnRails')];

        Channel::create($channel1);
        Channel::create($channel2);
        Channel::create($channel3);
        Channel::create($channel4);
        Channel::create($channel5);
    }
}
