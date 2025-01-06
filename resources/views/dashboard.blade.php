<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teacher Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>Welcome, Teacher!</p>
                    <ul>
                        <li><a href="{{ route('teacher.courses.index') }}" class="text-blue-500 hover:underline">My Courses</a></li>
                        <li><a href="{{ route('teacher.create_course') }}" class="text-blue-500 hover:underline">Create New Course</a></li>
                        <li><a href="{{ route('teacher.profile') }}" class="text-blue-500 hover:underline">View Profile</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
