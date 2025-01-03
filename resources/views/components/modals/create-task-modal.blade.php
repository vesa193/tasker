<!-- Modal -->
<div id="createTaskModal" class="fixed inset-0 z-50 items-center justify-center hidden bg-gray-800 bg-opacity-75">
    <div class="absolute left-1/2 top-1/2 translate-x-[-50%] translate-y-[-50%] bg-white rounded-lg shadow-lg w-full max-w-md p-6">
        <div class="flex items-center justify-between border-b pb-3">
            <h5 class="text-lg font-medium text-gray-900">Create ticket</h5>
            <button onclick="toggleModal('createTaskModal')" class="text-gray-400 hover:text-gray-600">
                ✕
            </button>
        </div>
        <div class="mt-4">
        <form action="{{ route('tasks.store') }}" method="POST" class="space-y-6 max-w-md gap-4 min-w-[320px]">
                @csrf
                <div class="flex flex-col gap-3">
                    <textarea required type="text" id="description" name="description" placeholder="Ticket Description*"
                    class="mt-1 block w-full h-[100px] px-3 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>

                    <input readonly type="number" min="0" max="${board.columns.length}" step="1" id="column_id" name="column_id" placeholder="Column Id"
                    class="invisible mt-1 block w-full h-0 px-3 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <input readonly type="number" min="0" max="${board.columns.length}" step="1" id="board_id" name="board_id" placeholder="Board Id"
                    class="invisible mt-1 block w-full h-0 px-3 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div class="flex items-center justify-end">
                    <button type="button" class="px-4 py-2 mr-2 bg-gray-300 rounded-md hover:bg-gray-400" onclick="toggleModal('createTaskModal')">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
