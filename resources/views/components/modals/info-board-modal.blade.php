<!-- Modal -->
<div id="infoBoardModal" class="fixed inset-0 z-50 items-center justify-center hidden bg-gray-800 bg-opacity-75">
    <div class="absolute left-1/2 top-1/2 translate-x-[-50%] translate-y-[-50%] bg-white rounded-lg shadow-lg w-full max-w-md p-6">
        <div class="flex items-center justify-between border-b pb-3">
            <h5 class="text-lg font-medium text-gray-900">Info board</h5>
            <button onclick="toggleModal('infoBoardModal')" class="text-gray-400 hover:text-gray-600">
                ✕
            </button>
        </div>
        <div class="mt-4">
        <p class="mt-4"><strong>Created at:</strong>  {{ date('d', strtotime($board->created_at)) }}/{{ date('m', strtotime($board->created_at)) }}/{{ date('Y', strtotime($board->created_at)) }}</p>
        <p><strong>Updated at:</strong> {{ date('d', strtotime($board->updated_at)) }}/{{ date('m', strtotime($board->updated_at)) }}/{{ date('Y', strtotime($board->updated_at)) }}</p>
        </div>
    </div>
</div>
