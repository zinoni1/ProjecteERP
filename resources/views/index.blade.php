@extends('master')

@section('content')
<section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
    <div class="px-4 mx-auto max-w-screen-lg lg:px-8">
        <div class="overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
            <div class="px-6 py-4 bg-gray-200 dark:bg-gray-700">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ __('perfil.lastusers') }}</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
                    <thead class="bg-gray-200 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-xs font-semibold tracking-wider uppercase">{{ __('perfil.name') }}</th>
                            <th class="px-6 py-3 text-xs font-semibold tracking-wider uppercase">{{ __('perfil.email') }}</th>
                            <th class="px-6 py-3 text-xs font-semibold tracking-wider uppercase">{{ __('perfil.role') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($users as $user)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-800">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->role }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
