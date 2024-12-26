<!-- Modal -->
<div id="deleteTaskModal" class="fixed inset-0 z-50 items-center justify-center hidden bg-gray-800 bg-opacity-75">
    <div class="absolute left-1/2 top-1/2 translate-x-[-50%] translate-y-[-50%] bg-white rounded-lg shadow-lg w-full max-w-md p-6">
        <div class="flex items-center justify-between border-b pb-3">
            <h5 class="text-lg font-medium text-gray-900">Delete task</h5>
            <button onclick="toggleModal('deleteTaskModal')" class="text-gray-400 hover:text-gray-600">
                ✕
            </button>
        </div>
        <div class="mt-4">
            <!-- Form with input -->
            <form id="deleteBoard" action="" method="POST" class="space-y-6 max-w-md gap-4 min-w-[320px]">
                @csrf
                @method('DELETE')

                <p>Are you sure you want to delete this task?</p>
                <div class="flex items-center justify-end">
                    <button type="button" class="px-4 py-2 mr-2 bg-gray-300 rounded-md hover:bg-gray-400" onclick="toggleModal('deleteTaskModal')">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
