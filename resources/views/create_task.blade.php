<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{route('store-task')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Task Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Title">
                        </div>
                        <div class="mb-3">
                            <label for="floatingTextarea">Task Description</label>
                            <textarea class="form-control" name="description" placeholder="Description"></textarea>
                          </div>
                        <div class="mb-3">
                            <label for="floatingTextarea">Admin</label>
                            <select class="form-select" name="assigned_by_id">
                                <option selected value="null">Select Admin</option>
                                @forelse ($admins as $admin)
                                    <option value="{{$admin->id}}">{{$admin->name}}</option>
                                @empty
                                    <option value="null">No admins yet run seeder to create admins</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="floatingTextarea">User</label>
                            <select class="form-select" name="assigned_to_id">
                                <option selected value="null">Select User</option>
                                @forelse ($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @empty
                                    <option value="null">No users yet run seeder to create users</option>
                                @endforelse
                            </select>
                        </div>
                        <button type="submit" class="btn btn-lg btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
