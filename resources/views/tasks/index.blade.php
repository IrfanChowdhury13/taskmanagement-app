<x-layout>
    <div class="container mx-auto p-6 sm:px-20 bg-white border-b border-gray-200">
        <div class="mt-8 text-2xl">
            All Tasks
        </div>
        <div class="mt-6 text-gray-500">
            Laravel has wonderful, through documentation covering every aspect of the framework. Whether you are new to Laravel or have previous experience, we recommend reading all of the documentation from beginning to end.
        </div>
        
        <x-task-status :status="request()->get('status')"/>
        
        <p class="mt-5">
            Total Task : {{ count($tasks) }}
        </p>

    </div>
    
    <div class="container mx-auto mt-6">
        @foreach ($tasks as $task)
        <div class="relative p-5 rounded-lg border bg-card text-card-foreground shadhow-sm" data-b0-t="card">
            <div class="p-6 space-y-3">
                <div>
                    <h3 class="text-lg font-medium">{{ $task->id }}: {{ $task->title }}</h3>
                    <p class="text-muted-foreground">{{ $task->description }}</p>
                </div>
                <div class="flex items-center justify-between">
                    <div class="text-sm text-muted-foreground">{{ \Carbon\Carbon::parse($task->due_date)->diffForHumans() }}</div>
                    <p class="text-red-500 absolute top-0 right-5 inline-flex items-center justify-center whitespace-nowraptext-sm py-2 px-2 ">{{ $task->status }}</p>

                </div>
                <div class="item-center p-6 flex justify-end" data-id="16">
                    <form action="{{ route('tasks.update', $task) }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <input type="hidden" name="status" value=" {{ $task->status=='completed'?'pending':'completed' }} ">
                        <button type="submit" class="rounded border border-gray-300 p-2">
                            Mark As {{ $task->status=='completed'?'pending':'completed' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    </div> 
</x-layout>
