
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Welcome to Your Dashboard</h1>

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Quick Actions Card -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4">Quick Actions</h2>
            <div class="space-y-3">
                <a href="<?php echo Config::get('URL'); ?>ticket/index" 
                   class="block w-full py-2 px-4 bg-indigo-600 text-white rounded hover:bg-indigo-700 text-center">
                    View All Tickets
                </a>
                <a href="<?php echo Config::get('URL'); ?>ticket/create" 
                   class="block w-full py-2 px-4 bg-green-600 text-white rounded hover:bg-green-700 text-center">
                    Create New Ticket
                </a>
            </div>
        </div>

        <!-- Stats Card -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4">Your Statistics</h2>
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <span class="text-gray-600">Open Tickets</span>
                    <span class="font-semibold">0</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-gray-600">Closed Tickets</span>
                    <span class="font-semibold">0</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-gray-600">Total Tickets</span>
                    <span class="font-semibold">0</span>
                </div>
            </div>
        </div>

        <!-- Profile Card -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4">Profile Overview</h2>
            <div class="space-y-4">
                <div class="flex items-center space-x-4">
                    <img src="<?php echo Config::get('URL'); ?>avatars/default.jpg" 
                         class="w-16 h-16 rounded-full" alt="Profile Picture">
                    <div>
                        <p class="font-medium"><?php echo Session::get('user_name'); ?></p>
                        <p class="text-sm text-gray-600"><?php echo Session::get('user_email'); ?></p>
                    </div>
                </div>
                <a href="<?php echo Config::get('URL'); ?>user/index" 
                   class="block w-full py-2 px-4 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 text-center">
                    Edit Profile
                </a>
            </div>
        </div>
    </div>
</div>
