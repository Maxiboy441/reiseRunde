<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws \Exception
     */
    public function definition()
    {
        $startDate = $this->faker->dateTimeBetween('now', '+2 years');
        $endDate = $this->faker->dateTimeBetween($startDate, '+2 years');

        $minTavelers = $this->faker->numberBetween(1,5);
        $maxTavelers = $minTavelers + $this->faker->numberBetween(1,5);

        $seederImages = [
            'https://www.travel-tip.de/wp-content/uploads/0-AbdoaodallaiStock-6381948-1130x565.jpg',
            'https://rp-online.de/imgs/32/2/2/5/1/5/9/1/5/tok_8928fea73f42717d6e5e52b783e4d598/w940_h528_x470_y264_135870421a08660f.jpg',
            'https://www.travel-tip.de/wp-content/uploads/6-ventdusudiStock-622806180-750x500.jpg',
            'https://img.ev.mu/images/articles/600x/903298.jpg',
            'https://i.ds.at/YD7T4Q/rs:fill:750:0/plain/2015/06/11/1.-Basilica-of-the-Sagrada-Familia-Spain-3.jpg',
            'https://static.bnn.de/nachrichten/kultur/urn-newsml-dpacom-20090101-231013-99-549969-u66rsr/alternates/LANDSCAPE_16x9_BASE/urn-newsml-dpacom-20090101-231013-99-549969',
            'https://lovingnewyork.de/wp-content/uploads/2023/06/160912163706001.jpg',
            'https://img.welt.de/img/mediathek/reportage/sport/mobile244674986/1071350807-ci16x9-w1200/RXXL-Megahotels-Das-neue-Wahrzeichen-Dohas.jpg'
        ];

        $timespan = $this->faker->boolean;

        if(!$timespan){
            $carbonDate1 = Carbon::parse($startDate);
            $carbonDate2 = Carbon::parse($endDate);
            $duration = $carbonDate1->diffInDays($carbonDate2) - random_int(1,5);
        }
        else{
            $carbonDate1 = Carbon::parse($startDate);
            $carbonDate2 = Carbon::parse($endDate);
            $duration = $carbonDate1->diffInDays($carbonDate2);
        }


        return [
            'destination' => $this->faker->city,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'timespan' => $timespan,
            'description' => $this->faker->paragraph,
            'vehicle' => $this->faker->randomElement(['car', 'plane', 'train', 'motorbike']),
            'image_link' => $this->faker->randomElement($seederImages),
            'trip_link' => $this->faker->url(),
            'name' => $this->faker->city,
            'min_travelers' => $minTavelers,
            'max_travelers' => $maxTavelers,
            'duration_in_days' => $duration
        ];
    }
}
