<div id="newAssignmentModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-md max-h-screen overflow-y-auto">
        <div class="border-b px-6 py-4">
            <h3 class="text-xl font-semibold text-gray-800">Create New Assignment</h3>
        </div>
        <div class="px-6 py-4">
            <form id="assignmentForm" enctype="multipart/form-data">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="subject">
                        Subject
                    </label>
                    <select class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" id="subject" name="subject" required>
                        <option value="">Select a subject</option>
                        <option>Computer Science(IT)</option>
                        <option>Medicine(Nursing,Pharmacy,Laboratory)</option>
                        <option>Management</option>
                        <option>Accounting</option>
                        <option>Finance</option>
                        <option>Economics</option>
                        <option>Marketing</option>
                        <option>Mathematics</option>
                        <option>Engineering</option>
                        <option>Law</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                        Description
                    </label>
                    <textarea class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" id="description" name="description" rows="3" required></textarea>
                </div>
                
                <!-- File Attachment Section -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Attachments (Optional)
                    </label>
                    <div class="border-2 border-dashed border-gray-300 rounded-md p-4 text-center">
                        <input type="file" id="fileInput" multiple class="hidden" name="attachments[]">
                        <div id="fileDropArea" class="cursor-pointer">
                            <i class="fas fa-cloud-upload-alt text-indigo-500 text-3xl mb-2"></i>
                            <p class="text-sm text-gray-600">Drag & drop files here or click to browse</p>
                            <p class="text-xs text-gray-500 mt-1">Maximum 5 files, 10MB each</p>
                        </div>
                    </div>
                    
                    <!-- Selected files list -->
                    <div id="fileList" class="mt-3 space-y-2 max-h-40 overflow-y-auto hidden">
                        <p class="text-sm font-medium text-gray-700">Selected files:</p>
                        <div id="fileItems" class="space-y-2"></div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="deadline">
                        Deadline
                    </label>
                    <input type="date" class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" id="deadline" name="deadline" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="contactType">
                        Contact Type
                    </label>
                    <select class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" id="contactType" name="contact_type" required>
                        <option value="">Select contact type</option>
                        <option>WhatsApp</option>
                        <option>Telegram</option>
                        <option>Email</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="contactInfo">
                        Contact Information
                    </label>
                    <input type="text" class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" id="contactInfo" name="contact_info" required>
                </div>
                
                <!-- Promo Code Section -->
                <div class="mb-4 p-4 bg-indigo-50 rounded-lg">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="promoCode">
                        Promo Code (Optional)
                    </label>
                    <div class="flex space-x-2">
                        <input type="text" class="flex-1 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" id="promoCode" name="promo_code" placeholder="Enter promo code">
                        <button type="button" id="applyPromo" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Apply
                        </button>
                    </div>
                    <div id="promoMessage" class="mt-2 text-sm hidden"></div>

                    <!-- Discount Calculation -->
                    <div id="discountDetails" class="mt-3 hidden">
                        <div class="flex justify-between text-sm text-green-600">
                            <span>Discount:</span>
                            <span id="discountAmount">-$0.00</span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="border-t px-6 py-4 flex justify-end">
            <button id="cancelAssignment" class="px-4 py-2 text-gray-600 rounded-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                Cancel
            </button>
            <button type="submit" form="assignmentForm" class="ml-2 px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Create Assignment
            </button>
        </div>
    </div>
</div>

<script>
    // File upload functionality
    const fileInput = document.getElementById('fileInput');
    const fileDropArea = document.getElementById('fileDropArea');
    const fileList = document.getElementById('fileList');
    const fileItems = document.getElementById('fileItems');
    
    // Click to select files
    fileDropArea.addEventListener('click', () => {
        fileInput.click();
    });
    
    // Drag and drop functionality
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        fileDropArea.addEventListener(eventName, preventDefaults, false);
    });
    
    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }
    
    ['dragenter', 'dragover'].forEach(eventName => {
        fileDropArea.addEventListener(eventName, highlight, false);
    });
    
    ['dragleave', 'drop'].forEach(eventName => {
        fileDropArea.addEventListener(eventName, unhighlight, false);
    });
    
    function highlight() {
        fileDropArea.classList.add('bg-indigo-50');
        fileDropArea.classList.add('border-indigo-300');
    }
    
    function unhighlight() {
        fileDropArea.classList.remove('bg-indigo-50');
        fileDropArea.classList.remove('border-indigo-300');
    }
    
    fileDropArea.addEventListener('drop', handleDrop, false);
    
    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        handleFiles(files);
    }
    
    fileInput.addEventListener('change', function() {
        handleFiles(this.files);
    });
    
    function handleFiles(files) {
        if (files.length === 0) return;
        
        // Check if we're exceeding the file limit
        const existingFiles = document.querySelectorAll('.file-item').length;
        if (existingFiles + files.length > 5) {
            alert('You can only upload up to 5 files');
            return;
        }
        
        // Process each file
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            
            // Check file size (10MB max)
            if (file.size > 10 * 1024 * 1024) {
                alert(`File "${file.name}" is too large. Maximum size is 10MB.`);
                continue;
            }
            
            // Create file item
            const fileItem = document.createElement('div');
            fileItem.className = 'file-item flex items-center justify-between bg-gray-50 p-2 rounded';
            fileItem.innerHTML = `
                <div class="flex items-center truncate">
                    <i class="fas fa-file text-indigo-500 mr-2"></i>
                    <span class="text-sm truncate">${file.name}</span>
                    <span class="text-xs text-gray-500 ml-2">(${formatFileSize(file.size)})</span>
                </div>
                <button type="button" class="remove-file text-red-500 hover:text-red-700">
                    <i class="fas fa-times"></i>
                </button>
            `;
            
            // Add remove functionality
            const removeBtn = fileItem.querySelector('.remove-file');
            removeBtn.addEventListener('click', function() {
                fileItem.remove();
                updateFileListVisibility();
            });
            
            fileItems.appendChild(fileItem);
        }
        
        updateFileListVisibility();
    }
    
    function updateFileListVisibility() {
        if (fileItems.children.length > 0) {
            fileList.classList.remove('hidden');
        } else {
            fileList.classList.add('hidden');
        }
    }
    
    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }
    
    // Form submission
    document.getElementById('assignmentForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Here you would typically handle the form submission
        // For example, using Fetch API or FormData to send to server
        
        alert('Assignment created successfully!');
        document.getElementById('newAssignmentModal').classList.add('hidden');
        this.reset();
        fileItems.innerHTML = '';
        updateFileListVisibility();
    });
    
    // Modal functionality
    document.getElementById('cancelAssignment').addEventListener('click', function() {
        document.getElementById('newAssignmentModal').classList.add('hidden');
    });

    // Close modal when clicking outside
    window.addEventListener('click', function(event) {
        const modal = document.getElementById('newAssignmentModal');
        if (event.target === modal) {
            modal.classList.add('hidden');
        }
    });

    // Promo code functionality
    document.getElementById('applyPromo').addEventListener('click', function() {
        const promoCode = document.getElementById('promoCode').value;
        const promoMessage = document.getElementById('promoMessage');
        
        // Reset messages
        promoMessage.classList.add('hidden');
        
        if (!promoCode) {
            promoMessage.textContent = 'Please enter a promo code';
            promoMessage.classList.remove('hidden');
            promoMessage.classList.remove('text-green-600');
            promoMessage.classList.add('text-red-600');
            return;
        }
        
        // Simulate promo code validation
        let discountRate = 0;
        let validPromo = false;
        
        if (promoCode.toUpperCase() === 'SUMMER2023') {
            discountRate = 0.15; // 15% discount
            validPromo = true;
        } else if (promoCode.toUpperCase() === 'STUDENT15') {
            discountRate = 0.10; // 10% discount
            validPromo = true;
        } else if (promoCode.toUpperCase() === 'FIRSTORDER') {
            discountRate = 0.20; // 20% discount
            validPromo = true;
        }
        
        if (validPromo) {
            document.getElementById('discountAmount').textContent = `${discountRate * 100}% off`;
            
            promoMessage.textContent = 'Promo code applied successfully!';
            promoMessage.classList.remove('hidden');
            promoMessage.classList.remove('text-red-600');
            promoMessage.classList.add('text-green-600');
            
            document.getElementById('discountDetails').classList.remove('hidden');
        } else {
            promoMessage.textContent = 'Invalid promo code';
            promoMessage.classList.remove('hidden');
            promoMessage.classList.remove('text-green-600');
            promoMessage.classList.add('text-red-600');
        }
    });
</script>