<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Welcome <?php echo Session::get('user_name'); ?></h1>

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <h2 class="text-xl font-semibold mb-4">Dashboard Overview</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="p-4 bg-gray-50 rounded">
                <h3 class="font-medium">Quick Actions</h3>
                <ul class="mt-2 space-y-2">
                    <li><a href="<?php echo Config::get('URL'); ?>ticket/index" class="text-blue-600 hover:underline">View Tickets</a></li>
                    <li><a href="<?php echo Config::get('URL'); ?>user/index" class="text-blue-600 hover:underline">User Settings</a></li>
                </ul>
            </div>
            <div class="p-4 bg-gray-50 rounded">
                <h3 class="font-medium">Account Info</h3>
                <p class="mt-2">Role: <?php echo Session::get('user_account_type'); ?></p>
            </div>
        </div>
    </div>
</div>