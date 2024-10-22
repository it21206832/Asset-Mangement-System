<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

             <!-- user tpye -->
             <div class="mt-4">
                <x-input-label for="userType" :value="__('User Type')" />
                <select id="userType" class="block mt-1 w-full" name="userType" :value="old('userType')" required autofocus autocomplete="userType">
                    <option value="Other">{{ __('User') }}</option>
                    <option value="Admin">{{ __('Admin') }}</option>
                    <option value="Branch">{{ __('Branch') }}</option>
                </select>
                <x-input-error :messages="$errors->get('userType')" class="mt-2" />
            </div>

            <!-- Branch Code (hidden by default) -->
            <div class="mt-4" id="branchCodeContainer" style="display:none;">
                <x-input-label for="branchCode" :value="__('Branch Code')" />
                <select id="branchCode" class="block mt-1 w-full" name="branchCode">
                    <option value="">{{ __('Select Branch Code') }}</option>
                    <option value="B001">{{ __('B001 - Colombo') }}</option>
                    <option value="B002">{{ __('B002 - Ambalangoda') }}</option>
                    <option value="B003">{{ __('B003 - Galle') }}</option>
                </select>
                <x-input-error :messages="$errors->get('branchCode')" class="mt-2" />
            </div>

        
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<script>
    document.getElementById('userType').addEventListener('change', function () {
        var branchCodeContainer = document.getElementById('branchCodeContainer');
        if (this.value === 'Branch') {
            branchCodeContainer.style.display = 'block';
        } else {
            branchCodeContainer.style.display = 'none';
        }
    });
</script>
