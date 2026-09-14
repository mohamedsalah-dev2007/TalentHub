<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">

                    <h3 class="text-lg font-medium text-gray-900">
                        Employee Documents
                    </h3>
@if($user->profile_picture)
    <div class="mt-4">
        <p class="font-medium text-sm text-gray-700">Profile Picture</p>
    <img
    src="{{ asset('storage/' . $user->profile_picture) }}"
    alt="Profile Picture"
    style="width: 140px; height: 140px; border-radius: 50%; object-fit: cover;"
>
    </div>
@endif

@if($user->cv)
    <div class="mt-4">
        <p class="font-medium text-sm text-gray-700">CV</p>
        <a
            href="{{ asset('storage/' . $user->cv) }}"
            target="_blank"
            class="text-blue-600 underline"
        >
            View CV
        </a>
    </div>
@endif
                    <form method="POST" action="{{ route('profile.files') }}" enctype="multipart/form-data">
                        @csrf
    
                        <div>
                            <label for="cv" class="block font-medium text-sm text-gray-700">
                                CV
                            </label>

                            <input
                                type="file"
                                name="cv"
                                id="cv"
                                accept=".pdf,.doc,.docx"
                                class="mt-1 block w-full"
                            >
                        </div>

                        <div>
                            <label for="profile_picture" class="block font-medium text-sm text-gray-700">
                                Profile Picture
                            </label>

                            <input
                                type="file"
                                name="profile_picture"
                                id="profile_picture"
                                accept="image/*"
                                class="mt-1 block w-full"
                            >
                        </div>

                        <button
                            type="submit"
                            class="px-4 py-2 bg-gray-800 text-white rounded-md"
                        >
                            Upload
                        </button>
                    </form>

                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
