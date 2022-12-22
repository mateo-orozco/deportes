<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Sport;
use App\Models\Team;
use App\Models\Player;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionSeeder::class,
        ]);
        User::factory(3)->create();
        $admin=User::find(1);
        $admin->assignRole('admin');
        $coach=User::find(2);
        $coach->assignRole('coach');
        $player=User::find(3);
        $player->assignRole('player');
        Sport::factory(5)->create();
        Team::factory(8)->create();
        Player::factory(15)->create();
        
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
