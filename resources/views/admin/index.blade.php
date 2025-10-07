@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="mb-8">
    <h1 class="text-4xl font-bold mb-2">Dashboard</h1>
    <p class="text-gray-600">Manage your Truth or Dare game content</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white border-4 border-black p-6">
        <div class="text-sm font-semibold text-gray-600 mb-1">Total Truths</div>
        <div class="text-4xl font-bold">{{ $truthsCount }}</div>
    </div>
    
    <div class="bg-white border-4 border-black p-6">
        <div class="text-sm font-semibold text-gray-600 mb-1">Active Truths</div>
        <div class="text-4xl font-bold text-green-600">{{ $activeTruths }}</div>
    </div>
    
    <div class="bg-white border-4 border-black p-6">
        <div class="text-sm font-semibold text-gray-600 mb-1">Total Dares</div>
        <div class="text-4xl font-bold">{{ $daresCount }}</div>
    </div>
    
    <div class="bg-white border-4 border-black p-6">
        <div class="text-sm font-semibold text-gray-600 mb-1">Active Dares</div>
        <div class="text-4xl font-bold text-green-600">{{ $activeDares }}</div>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white border-4 border-black p-6">
        <h2 class="text-2xl font-bold mb-4">Truths Management</h2>
        <p class="text-gray-600 mb-6">Add, edit, or remove truth questions for your game.</p>
        <div class="flex gap-3">
            <a href="{{ route('admin.truths.index') }}" class="border-2 border-black px-6 py-2 font-semibold hover:bg-gray-100 transition">View All</a>
            <a href="{{ route('admin.truths.create') }}" class="bg-black text-white px-6 py-2 font-semibold hover:bg-gray-900 transition">Add New</a>
        </div>
    </div>
    
    <div class="bg-white border-4 border-black p-6">
        <h2 class="text-2xl font-bold mb-4">Dares Management</h2>
        <p class="text-gray-600 mb-6">Add, edit, or remove dare challenges for your game.</p>
        <div class="flex gap-3">
            <a href="{{ route('admin.dares.index') }}" class="border-2 border-black px-6 py-2 font-semibold hover:bg-gray-100 transition">View All</a>
            <a href="{{ route('admin.dares.create') }}" class="bg-black text-white px-6 py-2 font-semibold hover:bg-gray-900 transition">Add New</a>
        </div>
    </div>
</div>
@endsection

