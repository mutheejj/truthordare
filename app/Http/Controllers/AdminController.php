<?php

namespace App\Http\Controllers;

use App\Models\Truth;
use App\Models\Dare;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Dashboard
    public function index()
    {
        $truthsCount = Truth::count();
        $daresCount = Dare::count();
        $activeTruths = Truth::where('is_active', true)->count();
        $activeDares = Dare::where('is_active', true)->count();
        
        return view('admin.index', compact('truthsCount', 'daresCount', 'activeTruths', 'activeDares'));
    }

    // Truths Management
    public function truthsIndex()
    {
        $truths = Truth::latest()->paginate(15);
        return view('admin.truths.index', compact('truths'));
    }

    public function truthsCreate()
    {
        return view('admin.truths.create');
    }

    public function truthsStore(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:1000',
        ]);

        Truth::create([
            'question' => $request->question,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.truths.index')->with('success', 'Truth question added successfully!');
    }

    public function truthsEdit(Truth $truth)
    {
        return view('admin.truths.edit', compact('truth'));
    }

    public function truthsUpdate(Request $request, Truth $truth)
    {
        $request->validate([
            'question' => 'required|string|max:1000',
        ]);

        $truth->update([
            'question' => $request->question,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.truths.index')->with('success', 'Truth question updated successfully!');
    }

    public function truthsDestroy(Truth $truth)
    {
        $truth->delete();
        return redirect()->route('admin.truths.index')->with('success', 'Truth question deleted successfully!');
    }

    // Dares Management
    public function daresIndex()
    {
        $dares = Dare::latest()->paginate(15);
        return view('admin.dares.index', compact('dares'));
    }

    public function daresCreate()
    {
        return view('admin.dares.create');
    }

    public function daresStore(Request $request)
    {
        $request->validate([
            'challenge' => 'required|string|max:1000',
        ]);

        Dare::create([
            'challenge' => $request->challenge,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.dares.index')->with('success', 'Dare challenge added successfully!');
    }

    public function daresEdit(Dare $dare)
    {
        return view('admin.dares.edit', compact('dare'));
    }

    public function daresUpdate(Request $request, Dare $dare)
    {
        $request->validate([
            'challenge' => 'required|string|max:1000',
        ]);

        $dare->update([
            'challenge' => $request->challenge,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.dares.index')->with('success', 'Dare challenge updated successfully!');
    }

    public function daresDestroy(Dare $dare)
    {
        $dare->delete();
        return redirect()->route('admin.dares.index')->with('success', 'Dare challenge deleted successfully!');
    }
}
