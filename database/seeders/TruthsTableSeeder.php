<?php

namespace Database\Seeders;

use App\Models\Truth;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TruthsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $truths = [
            "What's the most embarrassing thing you've ever done?",
            "What's your biggest fear that no one knows about?",
            "Have you ever lied to your best friend? What about?",
            "What's the last lie you told?",
            "What's something you've never told anyone?",
            "Who was your first crush?",
            "What's the most childish thing you still do?",
            "What's a secret you've never shared with your family?",
            "If you could change one thing about yourself, what would it be?",
            "What's the most trouble you've ever been in?",
            "Have you ever cheated on a test?",
            "What's your most embarrassing moment in public?",
            "What's something you're glad your parents don't know about you?",
            "Who in this room would you most want to switch lives with?",
            "What's the worst thing you've ever said to someone?",
            "Have you ever ghosted someone? Why?",
            "What's your biggest insecurity?",
            "What's the meanest thing you've thought but never said out loud?",
            "Have you ever pretended to like a gift you actually hated?",
            "What's the most embarrassing thing in your search history?",
            "Have you ever had a crush on someone in this room?",
            "What's the longest you've gone without showering?",
            "What's something you do when you're alone that you'd never do in front of others?",
            "Have you ever stolen something?",
            "What's your most irrational fear?",
            "What's the worst date you've ever been on?",
            "Have you ever spread a rumor about someone?",
            "What's something you've done that you're not proud of?",
            "Who do you secretly envy?",
            "What's the most awkward thing that's happened to you on a date?"
        ];

        foreach ($truths as $question) {
            Truth::create([
                'question' => $question,
                'is_active' => true,
            ]);
        }
    }
}
