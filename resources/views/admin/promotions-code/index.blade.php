@extends('layouts.app')

@section('title', 'Promotions Code Management')
@section('meta_description',
    'Easily manage and track all your university assignments with our efficient Assignments
    Management system. Upload, monitor deadlines, and stay organized effortlessly.')

@section('content')
    <div class="container mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold">Promotions Code</h2>
            <button type="button" id="openAddModalBtn" class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                New Code
            </button>

        </div>

        <div class="overflow-hidden bg-white rounded-lg shadow">
            <div class="overflow-x-auto">
                {{--  <table id="myTable" class=" display min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Promotion Code</th>
                            <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Assigned To</th>
                            <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Discount</th>
                            <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Expiry Date</th>
                            <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                         @forelse($events as $event)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        @if ($event->image)
                                            <div class="flex-shrink-0 w-10 h-10">
                                                <img class="w-10 h-10 rounded-full" src="{{ Storage::url($event->image) }}"
                                                    alt="">
                                            </div>
                                        @endif
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $event->title }}</div>
                                            <div class="text-sm text-gray-500 line-clamp-1">
                                                {{ Str::limit($event->description, 50) }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $event->date->format('M d, Y') }}</div>
                                    <div class="text-sm text-gray-500">{{ $event->time }}</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $event->venue }}</td>
                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                                    <a href="{{ route('admin.events.show', $event) }}"
                                        class="text-indigo-600 hover:text-indigo-900">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.events.edit', $event) }}"
                                        class="ml-2 text-yellow-600 hover:text-yellow-900">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.events.destroy', $event) }}" method="POST"
                                        class="inline ml-2 delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500">No events found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>  --}}
                <div id="tableContainer">

                </div>
            </div>
        </div>

        <x-add-promo-code-modal />
        <x-edit-promo-code-modal />


    </div>
@endsection

@push('scripts')
    <script>
        $('#openAddModalBtn').click(function() {
            $('#addPromoCodeModal').removeClass('hidden');
        })

        function fetchAllPromoCodes() {
            $.ajax({
                url: "{{ route('admin.promotions-code.fetchAllPromoCodes') }}",
                method: 'GET',
                success: function(response) {
                    $('#tableContainer').html(response);
                    $('#myTable').DataTable();
                }

            });
        }
    </script>
@endpush
