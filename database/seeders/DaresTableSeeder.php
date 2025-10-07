<?php

namespace Database\Seeders;

use App\Models\Dare;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DaresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dares = [
            "Do your best impression of someone in the room.",
            "Speak in an accent for the next 3 rounds.",
            "Let someone else style your hair and keep it that way.",
            "Dance with no music for 1 minute.",
            "Act like your favorite animal until your next turn.",
            "Sing everything you say for the next 10 minutes.",
            "Do 20 pushups right now.",
            "Let the group send a text from your phone to anyone.",
            "Post an embarrassing photo of yourself on social media.",
            "Call a random contact and sing them a song.",
            "Do your best celebrity impression.",
            "Eat a spoonful of a condiment of the group's choosing.",
            "Speak in rhymes for the next 3 rounds.",
            "Do a 1-minute stand-up comedy routine.",
            "Let someone tickle you for 30 seconds.",
            "Wear socks on your hands for the next 3 rounds.",
            "Do the worm dance move.",
            "Talk without closing your mouth for 2 minutes.",
            "Let someone draw on your face with a pen.",
            "Try to juggle 3 items of the group's choosing.",
            "Do your best evil villain laugh.",
            "Pretend to be a mannequin for 1 minute.",
            "Let someone go through your phone for 1 minute.",
            "Eat a raw onion slice.",
            "Do your best impression of a crying baby.",
            "Plank for 1 minute.",
            "Speak in a whisper for the next 5 minutes.",
            "Do your best runway model walk.",
            "Let the group pose you and stay frozen for 3 minutes.",
            "Attempt to breakdance for 30 seconds."
        ];

        foreach ($dares as $challenge) {
            Dare::create([
                'challenge' => $challenge,
                'is_active' => true,
            ]);
        }
    }
}
