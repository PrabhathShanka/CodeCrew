<div id="editPromoCodeModal" class="fixed hidden inset-0 z-50 flex items-center justify-center  bg-gray-900 bg-opacity-50">
    <div class="w-[60vh] max-h-[60vh] bg-white p-6 rounded-2xl shadow-lg overflow-y-auto">
        <h2 class="text-xl font-semibold mb-4">Edit Promo Code</h2>

        <form id="promoCodeEditForm" method="POST" action="#">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Promo Code</label>
                <input type="text" name="promo_code" id="promo_code"
                    class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
            </div>

            <div class="flex gap-4 flex-wrap">

                <!-- Discount Percentage -->
                <div class="mb-4 flex-1">
                    <label class="block text-sm font-medium mb-1">Discount Percentage</label>
                    <input type="number" step="0.01" name="discount_percentage" id="discount_percentage"
                        class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                </div>

                <!-- Expiry Date -->
                <div class="mb-4 flex-1">
                    <label class="block text-sm font-medium mb-1">Expiry Date</label>
                    <input type="date" name="expiry_date" id="expiry_date"
                    class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                </div>

                <!-- Status -->
                <div class="mb-4 flex-1">
                    <label class="block text-sm font-medium mb-1">Status</label>
                    <select name="status"
                    class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                    {{--  <option value="1" {{ $promoCode->status == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $promoCode->status == 0 ? 'selected' : '' }}>Inactive</option>  --}}
                </select>
            </div>

        </div>

            <div class="flex items-center justify-between space-x-2 pt-2">
                <button type="button" id="closeDiscountBtn"
                    class="px-4 py-2 text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300">Cancel</button>
                <button type="submit" id="submitDiscount"
                    class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Edit</button>
            </div>
        </form>
    </div>
</div>
