@extends('admin.layout')

@section('title', 'Manage Dares')

@section('content')
<div class="mb-8 flex justify-between items-center">
    <div>
        <h1 class="text-4xl font-bold mb-2">Dare Challenges</h1>
        <p class="text-gray-600">Manage all dare challenges</p>
    </div>
    <a href="{{ route('admin.dares.create') }}" class="bg-black text-white px-6 py-3 font-semibold hover:bg-gray-900 transition">
        + Add New Dare
    </a>
</div>

@if($dares->count() > 0)
    <div class="bg-white border-4 border-black overflow-hidden">
        <table class="min-w-full divide-y-2 divide-black">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Challenge</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider w-24">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider w-48">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($dares as $dare)
                    <tr>
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">{{ $dare->challenge }}</div>
                        </td>
                        <td class="px-6 py-4">
                            @if($dare->is_active)
                                <span class="px-2 py-1 text-xs font-semibold bg-green-100 text-green-800">Active</span>
                            @else
                                <span class="px-2 py-1 text-xs font-semibold bg-gray-100 text-gray-800">Inactive</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm font-medium flex gap-2">
                            <a href="{{ route('admin.dares.edit', $dare) }}" class="border border-black px-3 py-1 hover:bg-gray-100">Edit</a>
                            <form action="{{ route('admin.dares.destroy', $dare) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-3 py-1 hover:bg-red-700">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="mt-4">
        {{ $dares->links() }}
    </div>
@else
    <div class="bg-white border-4 border-black p-12 text-center">
        <p class="text-gray-600 text-lg mb-4">No dare challenges yet.</p>
        <a href="{{ route('admin.dares.create') }}" class="bg-black text-white px-6 py-3 font-semibold hover:bg-gray-900 transition inline-block">
            Add Your First Dare
        </a>
    </div>
@endif
@endsection

