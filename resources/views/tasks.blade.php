<x-main-layout>
    <div class="w-1/4">
        <form action="{{ route('tasks.store') }}" method="post" class="space-y-4 flex flex-col">
            @csrf

            <div>
                <x-text-input name="title" placeholder="Insert task name" class="w-full" />
                <x-input-error :message="$errors->first('title')" />
            </div>

            <div>
                <x-button type="submit" variant="primary" class="w-full">
                    Add
                </x-button>
            </div>
        </form>
    </div>
    <div class="w-3/4">
        {{ $tasks }} {{-- TODO output tasks --}}
    </div>
</x-main-layout>
