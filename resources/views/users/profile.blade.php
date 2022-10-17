<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex flex-col gap-10 m-10 p-10 bg-white rounded-lg shadow-xl">
        <div class="text-6xl uppercase font-bold border-b-4 border-indigo-800 w-max">{{$user->name}}</div>
        <div>
            <div class="flex gap-3 items-end">
                <p class="text-2xl font-bold">フォロー中</p>
                <span>{{$user->follows->count()}}人</span>
            </div>

            @foreach ($user->follows as $follow)
                <p class="px-4 py-1 m-2 rounded bg-gray-200 border-b-4 border-gray-300 w-max">{{$follow->name}}</p>
            @endforeach
        </div>
        <div>
            <div class="flex gap-3 items-end">
                <p class="text-2xl font-bold">フォローワー</p>
                <span>{{$user->followers->count()}}人</span>
            </div>
            @foreach ($user->followers as $follower)
                <p class="px-4 py-1 m-2 rounded bg-gray-200 border-b-4 border-gray-300 w-max">{{$follower->name}}</p>
            @endforeach
        </div>
    </div>

</x-app-layout>
