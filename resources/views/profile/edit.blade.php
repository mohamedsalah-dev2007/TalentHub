<x-app-layout>
    <x-slot name="header">
        <div class="max-w-4xl mx-auto">
            @include('layouts.navbar', [
                'role' => 'Employee',
                'links' => [
                    'dashboard' => route('employee.dashboard'),
                    'Find Jobs' => route('employee.jobs'),
                    'My Applications' => route('employee.applications'),
                    'Profile' => route('profile.edit')
                ]
            ])
        </div>
    </x-slot>

    <div style="background-color: #8FDFF3; min-height: calc(100vh - 73px);">
        
        <div class="py-12 w-full">
            <div class="max-w-xl mx-auto space-y-6 px-4 sm:px-6 lg:px-8">

                <!-- 1. Profile Header Card -->
                <div class="p-6 sm:p-8 bg-white shadow sm:rounded-lg flex flex-col items-center text-center">
                    <div class="mb-4">
                        @if($user->profile_photo_path)
                            <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="Profile Picture" style="width: 130px; height: 130px; object-fit: cover; border-radius: 50% !important;" class="border-4 border-gray-200 shadow-md mx-auto block">
                        @else
                            <div style="width: 130px; height: 130px; border-radius: 50% !important;" class="bg-slate-800 text-white flex items-center justify-center text-3xl font-bold shadow-md mx-auto">
                                {{ strtoupper(substr($user->name, 0, 2)) }}
                            </div>
                        @endif
                    </div>
                    <h1 class="text-xl font-bold text-gray-900 mt-2">{{ $user->name }}</h1>
                    <p class="text-sm text-gray-500 mt-1">{{ $user->email }}</p>
                    <div class="mt-3">
                        <span class="inline-flex items-center px-3.5 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-200">
                            Employee / Job Seeker
                        </span>
                    </div>
                </div>

                <!-- 2. Profile Information Form Card -->
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl mx-auto">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <!-- 3. Update Password Form Card -->
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl mx-auto">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <!-- 4. CV & Documents Management Card -->
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl mx-auto">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">
                            CV & Documents Management
                        </h3>

                        @if($user->cv_path)
                            <div class="mb-6 p-4 bg-gray-50 rounded-xl border border-gray-200 flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Current CV File</p>
                                    <a href="{{ asset('storage/' . $user->cv_path) }}" target="_blank" class="text-xs text-blue-600 hover:underline font-semibold">View / Download CV</a>
                                </div>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('profile.files') }}" enctype="multipart/form-data" class="space-y-4">
                            @csrf
                
                            <div>
                                <label for="cv" class="block font-medium text-sm text-gray-700 mb-1">Upload New CV (.pdf, .doc, .docx)</label>
                                <input type="file" name="cv" id="cv" accept=".pdf,.doc,.docx" class="w-full p-2 border border-gray-300 rounded-lg bg-gray-50 text-sm">
                            </div>

                            <div>
                                <label for="profile_picture" class="block font-medium text-sm text-gray-700 mb-1">Update Profile Picture</label>
                                <input type="file" name="profile_picture" id="profile_picture" accept="image/*" class="w-full p-2 border border-gray-300 rounded-lg bg-gray-50 text-sm">
                            </div>

                            <div class="pt-2">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Save & Upload Documents
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- 5. Delete Account Form Card -->
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl mx-auto">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>

            </div>
        </div>

    </div>
</x-app-layout>