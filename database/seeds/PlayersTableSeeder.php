<?php

use App\Player;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (($handle = fopen(database_path().'/seeds/players.csv', 'r')) !== false) {
            $columns = ['name', 'batting_average', 'bowling_average', 'playing', 'avatar'];
            $records = [];

            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                $fields = [];
                foreach ($columns as $key => $value) {
                    $fields[$value] = $data[$key];
                }

                Storage::put(
                    $fields['avatar'],
                    file_get_contents(database_path().'/seeds/player-avatars/'.$fields['avatar'])
                );

                $records[] = array_merge($fields, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            fclose($handle);

            if (count($records)) {
                Player::insert($records);
            }
        }
    }
}
