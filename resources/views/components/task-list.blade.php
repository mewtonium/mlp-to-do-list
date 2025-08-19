<div class="max-w-5xl w-full bg-white rounded-md border border-gray-400 p-4">
    <div class="overflow-x-auto">
        <table class="min-w-full table-auto text-sm">
            <thead>
                <tr class="border-b-2">
                    <th class="w-12 px-4 py-2 text-left text-lg font-medium">#</th>
                    <th class="px-4 py-2 text-left text-lg font-medium">Task</th>
                    <th class="w-28">&nbsp;</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-gray-800">
                @forelse ($tasks as $task)
                    <tr>
                        <td class="px-4 py-3 text-lg">{{ $task->id }}</td>
                        <td class="px-4 py-3">{{ $task->title }}</td>
                        <td class="px-4 py-3">
                            <div class="flex justify-end gap-2">
                                <x-button variant="success" class="px-2">
                                    <x-heroicon-s-check class="h-4 w-4" />
                                </x-button>

                                <form action="{{ route('tasks.destroy', $task) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this task?');">
                                    @csrf
                                    @method('delete')

                                    <x-button type="submit" variant="danger" class="px-2">
                                        <x-heroicon-s-x-mark class="h-4 w-4" />
                                    </x-button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="px-4 py-3 text-center italic" colspan="3">
                            You have no tasks in your todo list.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>