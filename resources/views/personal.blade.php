@extends('master')

@section('content')

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <div class="bg-gray-50 dark:bg-gray-700 dark:text-black flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
            <div class="bg-gray-50 dark:bg-gray-700 dark:text-black flex items-center flex-1 space-x-4">
                <h5>
                    <span class="dark:text-black"> {{ __('traduccion.llistausuaris') }}</span>
                </h5>
            </div>
        </div>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    {{ __('traduccion.usuaris') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{ __('traduccion.rol') }}
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Jese image">
                    <div class="ps-3">
                        <div class="text-base font-semibold">{{ $user->name }}</div>
                        <div class="font-normal text-gray-500">{{ $user->email }}</div>
                    </div>
                </th>
                <td class="px-6 py-4">
                    {{ $user->role }}
                </td>
                <td class="px-6 py-4">
                <div class="flex items-center">
    <div class="h-2.5 w-2.5 rounded-full {{ $user->id === Auth::id() ? 'bg-green-500' : 'bg-red-400' }} me-2"></div>
    {{ $user->id === Auth::id() ? __('perfil.online') : __('perfil.offline') }}
</div>

                </td>
                <td class="px-6 py-4">
                    @if($user->id === Auth::user()->id)
                    <button type="button" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                    <a href="{{ route('profile.edit') }}" class="text-black" style="text-decoration: none; font-weight: bold;">{{ __('perfil.edit') }}</a>
                </button>
 @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
