@extends('admin.layout')

@section('title', 'Add New Dare')

@section('content')
<div class="mb-8">
    <h1 class="text-4xl font-bold mb-2">Add New Dare Challenge</h1>
    <p class="text-gray-600">Create a new dare challenge for the game</p>
</div>

<div class="bg-white border-4 border-black p-8 max-w-2xl">
    <form action="{{ route('admin.dares.store') }}" method="POST">
        @csrf
        
        <div class="mb-6">
            <label for="challenge" class="block text-sm font-bold text-gray-700 mb-2">Dare Challenge</label>
            <textarea 
                id="challenge" 
                name="challenge" 
                rows="4" 
                class="w-full border-2 border-black px-4 py-2 focus:outline-none focus:ring-2 focus:ring-black @error('challenge') border-red-500 @enderror"
                placeholder="Enter your dare challenge..."
                required
            >{{ old('challenge') }}</textarea>
            @error('challenge')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="flex items-center">
                <input type="checkbox" name="is_active" class="w-4 h-4 border-2 border-black" checked>
                <span class="ml-2 text-sm font-medium text-gray-700">Active (show in game)</span>
            </label>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="bg-black text-white px-6 py-3 font-semibold hover:bg-gray-900 transition">
                Create Dare
            </button>
            <a href="{{ route('admin.dares.index') }}" class="border-2 border-black px-6 py-3 font-semibold hover:bg-gray-100 transition">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection

