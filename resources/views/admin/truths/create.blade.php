@extends('admin.layout')

@section('title', 'Add New Truth')

@section('content')
<div class="mb-8">
    <h1 class="text-4xl font-bold mb-2">Add New Truth Question</h1>
    <p class="text-gray-600">Create a new truth question for the game</p>
</div>

<div class="bg-white border-4 border-black p-8 max-w-2xl">
    <form action="{{ route('admin.truths.store') }}" method="POST">
        @csrf
        
        <div class="mb-6">
            <label for="question" class="block text-sm font-bold text-gray-700 mb-2">Truth Question</label>
            <textarea 
                id="question" 
                name="question" 
                rows="4" 
                class="w-full border-2 border-black px-4 py-2 focus:outline-none focus:ring-2 focus:ring-black @error('question') border-red-500 @enderror"
                placeholder="Enter your truth question..."
                required
            >{{ old('question') }}</textarea>
            @error('question')
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
                Create Truth
            </button>
            <a href="{{ route('admin.truths.index') }}" class="border-2 border-black px-6 py-3 font-semibold hover:bg-gray-100 transition">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection

