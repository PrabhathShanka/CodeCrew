@extends('layouts.main')

@section('title', 'Home')
@section('meta_description', 'This is the home page of my Laravel Breeze project with phone number field.')

@section('content')
    <!-- Hero Section -->
    <section
        class="relative flex items-center justify-center h-screen overflow-hidden text-white bg-gradient-to-r from-indigo-500 to-purple-600">
        <!-- Background elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-0 left-0 w-64 h-64 bg-white rounded-full bg-opacity-10 filter blur-3xl"></div>
            <div class="absolute bottom-0 right-0 bg-purple-400 rounded-full w-96 h-96 bg-opacity-10 filter blur-3xl"></div>
        </div>

        <div class="relative z-10 px-4 text-center sm:px-6 lg:px-8">
            <h1 class="mb-6 text-4xl font-bold md:text-6xl">Welcome to <span class="text-indigo-200">ModernApp</span></h1>
            <p class="max-w-3xl mx-auto mb-8 text-xl md:text-2xl">
                The most intuitive platform for managing your business
            </p>
            <div class="flex flex-col justify-center gap-4 sm:flex-row">
                <a href="/register"
                    class="px-8 py-3 font-semibold text-indigo-600 transition duration-300 bg-white rounded-lg shadow-lg hover:bg-gray-100">
                    Get Started Free
                </a>
                <a href="#events"
                    class="px-8 py-3 font-semibold text-white transition duration-300 border-2 border-white rounded-lg hover:bg-white hover:bg-opacity-10">
                    View Events
                </a>
            </div>
        </div>
    </section>



    <!-- Registration Modal -->
    <div id="registrationModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
        <div class="w-full max-w-md p-6 mx-4 bg-white rounded-lg shadow-xl">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold text-gray-900">Event Registration</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-500">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <form id="registrationForm" class="space-y-4">
                @csrf
                <input type="hidden" id="eventUrl" name="event_url">

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" id="name" name="name" required
                        class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" required
                        class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                    <input type="tel" id="phone" name="phone" required
                        class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div class="flex justify-end pt-4 space-x-3">
                    <button type="button" onclick="closeModal()"
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Cancel
                    </button>
                    <button type="submit" id="submitRegistration"
                        class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Open Modal and set event registration URL
        function openModal(eventUrl) {
            document.getElementById('registrationModal').classList.remove('hidden');
            document.getElementById('eventUrl').value = eventUrl; // Store route in hidden input
        }

        // Close Modal
        function closeModal() {
            document.getElementById('registrationModal').classList.add('hidden');
            document.getElementById('registrationForm').reset();
        }

        // Handle form submit with AJAX
        document.getElementById('registrationForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const eventUrl = document.getElementById('eventUrl').value;
    const formData = new FormData(this);

    fetch(eventUrl, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                icon: 'success',
                title: 'Registered!',
                text: data.message,
                timer: 2000,
                showConfirmButton: false
            });
            closeModal();
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!'
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            icon: 'error',
            title: 'Failed!',
            text: 'Registration failed. Please try again.'
        });
    });
});

    </script>
@endpush
