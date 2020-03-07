<?php

use App\Models\Item;
use App\Models\Room;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Item::class, 30)->create([
			'room_id' => function () {
				return Room::all()->random()->id;
			},
		]);
    }
}
