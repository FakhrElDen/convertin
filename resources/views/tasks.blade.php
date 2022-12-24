<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tasks') }}
            </h2>
            <a href="{{route('create-task')}}" class="btn btn-primary">Create Task</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table" id="tasks_table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Assigned by</th>
                                <th scope="col">Assigned to</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tasks as $key => $task)   
                                <tr>
                                    <th>{{ $key + 1 }}</th>
                                    <td>{{ $task->title }}</td>
                                    <td>{!! Str::limit($task->description, 10, ' ...') !!}</td>
                                    <td>{{ $task->admin->name }}</td>
                                    <td>{{ $task->user->name }}</td>
                                </tr>
                            @empty
                                <h3 class="p-3 fs-3 fw-bold">No tasks created yet</h3>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
