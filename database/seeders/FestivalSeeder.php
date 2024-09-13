<?php
namespace Database\Seeders;

use App\Http\Models\Festival;
use Illuminate\Database\Seeder;

class FestivalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $festivals = [
            [
                'name' => 'Awakenings',
                'points' => 90,
            ],
            [
                'name' => 'Time Warp',
                'points' => 140,
            ],
            [
                'name' => 'Tomorrowland',
                'points' => 50,
            ],
        ];

        foreach ($festivals as $festival) {
            Festival::firstOrCreate(['name' => $festival['name']], $festival);
        }
    }
}
