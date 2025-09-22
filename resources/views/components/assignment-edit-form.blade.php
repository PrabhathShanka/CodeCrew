<div id="editAssignmentModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl max-h-screen overflow-y-auto">
        <div class="border-b px-6 py-4 flex justify-between items-center">
            <h3 class="text-xl font-semibold text-gray-800">Edit Assignment</h3>
            <button onclick="closeEditModal()" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="px-6 py-4">
            <form id="editAssignmentForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" id="editAssignmentId" name="id">

                <!-- Title -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Title <span class="text-red-500">*</span></label>
                    <input type="text" id="editTitle" name="title"
                        class="border border-gray-300 rounded-md px-3 py-2 w-full focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Deadline -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Deadline <span class="text-red-500">*</span></label>
                    <input type="date" id="editDeadline" name="deadline"
                        class="border border-gray-300 rounded-md px-3 py-2 w-full focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Contact Type -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Contact Type <span class="text-red-500">*</span></label>
                    <select id="editContactType" name="contact_type"
                        class="border border-gray-300 rounded-md px-3 py-2 w-full focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Select contact type</option>
                        <option value="WhatsApp">WhatsApp</option>
                        <option value="Telegram">Telegram</option>
                        <option value="Email">Email</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <!-- Contact Info -->
                <div class="mb-4" id="editContactInfoInput" style="display:none;">
                    <label id="editContactInfoLabel" class="block text-gray-700 text-sm font-bold mb-2">Contact Information</label>
                    <input type="text" id="editContactInfo" name="contact_info"
                        class="border border-gray-300 rounded-md px-3 py-2 w-full focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Subject -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Subject <span class="text-red-500">*</span></label>
                    <select id="editSubject" name="subject"
                        class="border border-gray-300 rounded-md px-3 py-2 w-full focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Select subject</option>
                        @foreach (App\Enums\Subject::values() as $value => $name)
                            <option value="{{ $value }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Price + Price Type -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Price Type <span class="text-red-500">*</span></label>
                        <select id="editPriceType" name="price_type"
                            class="border border-gray-300 rounded-md px-3 py-2 w-full focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="Rs">Rs</option>
                            <option value="$">$</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Price <span class="text-red-500">*</span></label>
                        <input type="number" step="0.01" id="editPrice" name="price"
                            class="border border-gray-300 rounded-md px-3 py-2 w-full focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                    <textarea id="editDescription" name="description" rows="3"
                        class="border border-gray-300 rounded-md px-3 py-2 w-full focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                </div>


                <!-- Promo Code -->
                <div class="mb-4 p-4 bg-indigo-50 rounded-lg">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Promo Code</label>
                    <div class="flex space-x-2">
                        <input type="text" id="editPromoCode" name="promo_code"
                            class="flex-1 border border-gray-300 rounded-md px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Enter promo code">
                        <button type="button" id="editApplyPromo"
                            class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Apply</button>
                    </div>
                    <div id="editPromoMessage" class="mt-2 text-sm hidden"></div>
                </div>

                <div class="border-t px-6 py-4 flex justify-end">
                    <button type="button" onclick="closeEditModal()"
                        class="px-4 py-2 bg-gray-300 text-gray-900 rounded-md hover:bg-gray-500">Cancel</button>
                    <button type="submit"
                        class="ml-2 px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
