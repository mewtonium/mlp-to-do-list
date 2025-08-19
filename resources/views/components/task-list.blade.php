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
                    <x-task-list-item :task="$task" />
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

@if ($tasks->count() > 0)
    <div class="mt-4">
        {{ $tasks->links() }}
    </div>
@endif
