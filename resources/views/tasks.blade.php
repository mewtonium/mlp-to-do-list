<x-main-layout>
    <div class="grid grid-cols-3 gap-8">
        <div class="col-span-1">
            <form action="{{ route('tasks.store') }}" method="post" class="flex flex-col">
                @csrf

                <div class="space-y-4">
                    <div>
                        <x-text-input name="title" placeholder="Insert task name" class="w-full" />
                        <x-input-error :message="$errors->first('title')" />
                    </div>

                    <div>
                        <x-button type="submit" variant="primary" class="w-full">
                            Add
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-span-2">
            <x-task-list />
        </div>
    </div>
</x-main-layout>
