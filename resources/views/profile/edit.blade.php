<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-tight flex items-center gap-2">
                <svg class="w-7 h-7 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"/></svg>
                {{ __('Profile Settings') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-50 via-white to-indigo-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <!-- Profile Information -->
            <div class="bg-white/90 backdrop-blur-md shadow-xl rounded-2xl p-8">
                <div class="flex items-center gap-4 mb-6">
                    <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <h3 class="text-lg font-bold text-blue-700">Profile Information</h3>
                </div>
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="bg-white/90 backdrop-blur-md shadow-xl rounded-2xl p-8">
                <div class="flex items-center gap-4 mb-6">
                    <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 11c0-1.657-1.343-3-3-3s-3 1.343-3 3m6 0c0-1.657 1.343-3 3-3s3 1.343 3 3m-6 0v2a2 2 0 002 2h4a2 2 0 002-2v-2m-6 0H6a2 2 0 00-2 2v2a2 2 0 002 2h4a2 2 0 002-2v-2z"/></svg>
                    <h3 class="text-lg font-bold text-green-700">Update Password</h3>
                </div>
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account -->
            <div class="bg-white/90 backdrop-blur-md shadow-xl rounded-2xl p-8">
                <div class="flex items-center gap-4 mb-6">
                    <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12"/></svg>
                    <h3 class="text-lg font-bold text-red-700">Delete Account</h3>
                </div>
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
