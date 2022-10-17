<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="m-10">
        @foreach ($users as $user)
            @if (auth()->id() != $user->id)
                <div class="flex justify-between mx-10 my-5 px-10 py-4 rounded shadow-xl bg-white">
                    <div>
                        {{$user->name}}
                    </div>
                    <div>
                        フォロワー : {{$user->followers->count()}}
                    </div>
                    @if ($following_users_list->contains($user->id))
                        <form action={{route("unfollow", $user->id)}} method="POST">
                            @csrf
                            <button class="px-2 py-1 rounded-md font-bold bg-gray-100 text-black border border-black shadow hover:bg-opacity-70 active:scale-95 duration-200">フォロー解除</button>
                        </form>
                    @else
                        <form action={{route("follow", $user->id)}} method="POST">
                            @csrf
                            <button class="px-2 py-1 rounded-md font-bold bg-blue-500 text-white shadow hover:bg-opacity-70 active:scale-95 duration-200">フォローする</button>
                        </form>
                    @endif
                </div>
            @endif
        @endforeach
    </div>

</x-app-layout>
