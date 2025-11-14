<?php

namespace Database\Seeders;

use App\Models\Publicite;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PubliciteSeeder extends Seeder
{
    public function run(): void
    {
        $userIds = User::pluck('id')->toArray();
        if (empty($userIds)) {
            $user = User::factory()->create();
            $userIds = [$user->id];
        }

        for ($i = 1; $i <= 100; $i++) {
            $status = collect(['active', 'inactive', 'expiré'])->random();

            // Génération de dates aléatoires
            $startDate = Carbon::now()->subDays(rand(0, 60));
            $endDate = (clone $startDate)->addDays(rand(5, 30));

            Publicite::create([
                'title' => 'Publicité ' . $i,
                'description' => Str::limit(fake()->sentence(20), 255),
                'image_path' => 'publicites/pub.jpg',
                'link_url' => fake()->url(),
                'width' => rand(300, 728),
                'height' => rand(90, 600),
                'status' => $status,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'user_id' => fake()->randomElement($userIds),
                'created_at' => $startDate,
                'updated_at' => now(),
            ]);
        }
    }
}
