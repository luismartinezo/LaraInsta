<?php

use Illuminate\Database\Seeder;
use App\Image;
use Faker\Factory as Faker;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $imageLinks = array(
        	"https://videotutoriales.com/maspa/maspa1",
        	"https://videotutoriales.com/maspa/maspa2",
        	"https://videotutoriales.com/maspa/maspa3",
        	"https://videotutoriales.com/maspa/maspa4",
        	"https://videotutoriales.com/maspa/maspa5",
        );

        foreach($imageLinks as $imageLink) {
        	Image::create([
        		// 'title' => $faker->text(80),
        		'description' => $content = $faker->paragraph(10),
        		'image_path' => $imageLink."jpg",
        		// 'imageLink' => $imageLink."-1.jpg",
        		'user_id' => $faker->numberBetween($min = 1, $max = 5),
        	]);
        }
    }
}
