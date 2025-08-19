@props(['task'])

<tr>
    <td class="px-4 py-3 text-lg">
        {{ $task->id }}
    </td>
    <td class="px-4 py-3 {{ $task->completed_at ? 'line-through' : '' }}">
        {{ $task->title }}
    </td>
    <td class="px-4 py-3">
        @if (! $task->completed_at)
            <div class="flex justify-end gap-2">
                <form action="{{ route('tasks.complete', $task) }}" method="post">
                    @csrf

                    <x-button type="submit" variant="success" class="px-2">
                        <x-heroicon-s-check class="h-4 w-4" />
                    </x-button>
                </form>

                <form action="{{ route('tasks.destroy', $task) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this task?');">
                    @csrf
                    @method('delete')

                    <x-button type="submit" variant="danger" class="px-2">
                        <x-heroicon-s-x-mark class="h-4 w-4" />
                    </x-button>
                </form>
            </div>
        @endif
    </td>
</tr>
