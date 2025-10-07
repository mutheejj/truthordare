<?php

namespace App\Http\Controllers;

use App\Models\Truth;
use App\Models\Dare;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        return view('game');
    }

    public function getRandomTruth()
    {
        $truth = Truth::active()->inRandomOrder()->first();
        
        if (!$truth) {
            return response()->json([
                'error' => 'No truth questions available'
            ], 404);
        }

        return response()->json([
            'type' => 'TRUTH',
            'text' => $truth->question
        ]);
    }

    public function getRandomDare()
    {
        $dare = Dare::active()->inRandomOrder()->first();
        
        if (!$dare) {
            return response()->json([
                'error' => 'No dare challenges available'
            ], 404);
        }

        return response()->json([
            'type' => 'DARE',
            'text' => $dare->challenge
        ]);
    }
}
