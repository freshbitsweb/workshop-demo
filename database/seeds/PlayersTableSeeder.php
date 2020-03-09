<?php

use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $player = new App\Player();
        $player->name = 'Sachin Tendulkar';
        $player->batting_average = '97';
        $player->bowling_average = '63';
        $player->playing = '1';
        $player->avatar = 'sachin.webp';
        $player->save();

        $player = new App\Player();
        $player->name = 'Zaheer Khan';
        $player->batting_average = '48';
        $player->bowling_average = '22';
        $player->playing = '1';
        $player->avatar = 'zaheer-khan.webp';
        $player->save();

        $player = new App\Player();
        $player->name = 'Jasprit Bumrah';
        $player->batting_average = '38';
        $player->bowling_average = '33';
        $player->playing = '0';
        $player->avatar = 'jasprit-bumrah.webp';
        $player->save();

        $player = new App\Player();
        $player->name = 'Cheteshwar Pujara';
        $player->batting_average = '66';
        $player->bowling_average = '15';
        $player->playing = '1';
        $player->avatar = 'cheteshwar-pujara.webp';
        $player->save();

        $player = new App\Player();
        $player->name = 'Rohit Sharma';
        $player->batting_average = '85';
        $player->bowling_average = '15';
        $player->playing = '0';
        $player->avatar = 'rohit-sharma.webp';
        $player->save();

        $player = new App\Player();
        $player->name = 'Shikhar-Dhawan';
        $player->batting_average = '76';
        $player->bowling_average = '10';
        $player->playing = '0';
        $player->avatar = 'shikhar-dhawan.webp';
        $player->save();

        $player = new App\Player();
        $player->name = 'Hardik Pandya';
        $player->batting_average = '38';
        $player->bowling_average = '25';
        $player->playing = '0';
        $player->avatar = 'hardik-pandya.webp';
        $player->save();

        $player = new App\Player();
        $player->name = 'Ravindra Jadeja';
        $player->batting_average = '49';
        $player->bowling_average = '12';
        $player->playing = '0';
        $player->avatar = 'ravindra-jadeja.webp';
        $player->save();

        $player = new App\Player();
        $player->name = 'Lokesh Rahul';
        $player->batting_average = '66.78';
        $player->bowling_average = '15.20';
        $player->playing = '0';
        $player->avatar = 'lokesh-rahul.webp';
        $player->save();

        $player = new App\Player();
        $player->name = 'Mohammed Shami';
        $player->batting_average = '25';
        $player->bowling_average = '15';
        $player->playing = '0';
        $player->avatar = 'mohammed-shami.webp';
        $player->save();

        $player = new App\Player();
        $player->name = 'Kuldeep Yadav';
        $player->batting_average = '33.25';
        $player->bowling_average = '18';
        $player->playing = '1';
        $player->avatar = 'kuldeep-yadav.webp';
        $player->save();

        $player = new App\Player();
        $player->name = 'Yuzvendra Chahal';
        $player->batting_average = '66.78';
        $player->bowling_average = '25';
        $player->playing = '0';
        $player->avatar = 'yuzvendra-chahal.webp';
        $player->save();

        $player = new App\Player();
        $player->name = 'Bhuvneshwar Kumar';
        $player->batting_average = '12.25';
        $player->bowling_average = '18';
        $player->playing = '0';
        $player->avatar = 'bhuvneshwar-kumar.webp';
        $player->save();
    }
}
