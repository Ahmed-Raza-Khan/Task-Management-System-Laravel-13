<x-app-layout>
    <div class="max-w-7xl mx-auto p-6 mt-10">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 border-b pb-6">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900">{{ $task->title }}</h1>
                <p class="text-sm text-gray-500 mt-1">Task ID: #{{ $task->id }} • Created {{ $task->created_at->diffForHumans() }}</p>
            </div>
            <div class="mt-4 md:mt-0 flex space-x-3">
                <a href="{{ route('tasks.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition">
                    Back to List
                </a>
                <a href="{{ route('tasks.edit', $task) }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 transition">
                    Edit Task
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content: Description -->
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Description</h3>
                    <p class="text-gray-600 leading-relaxed italic">
                        {{ $task->description ?? 'No description provided for this task.' }}
                    </p>
                </div>
            </div>

            <!-- Sidebar: Metadata -->
            <div class="space-y-4">
                <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                    <h3 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-4">Details</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <span class="block text-xs font-medium text-gray-500 uppercase">Status</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium mt-1
                                {{ $task->status === 'completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                            </span>
                        </div>

                        <div>
                            <span class="block text-xs font-medium text-gray-500 uppercase">Priority</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium mt-1
                                {{ $task->priority === 'high' ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800' }}">
                                {{ ucfirst($task->priority) }}
                            </span>
                        </div>

                        <div>
                            <span class="block text-xs font-medium text-gray-500 uppercase">Assigned To</span>
                            <p class="text-sm font-semibold text-gray-800 mt-1">{{ $task->user->name }}</p>
                        </div>

                        <div>
                            <span class="block text-xs font-medium text-gray-500 uppercase">Due Date</span>
                            <p class="text-sm font-semibold text-gray-800 mt-1 {{ $task->due_date && $task->due_date->isPast() && $task->status !== 'completed' ? 'text-red-600' : '' }}">
                                {{ $task->due_date ? $task->due_date->format('M d, Y') : 'No date set' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
