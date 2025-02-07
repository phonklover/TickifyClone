
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="bg-slate-800 text-white w-64 py-4 px-6 hidden md:block">
            <div class="flex items-center space-x-2 mb-8">
                <span class="text-lg font-semibold"><?php echo Session::get('user_name'); ?></span>
            </div>
            
            <nav>
                <div class="mb-8">
                    <a href="<?php echo Config::get('URL'); ?>dashboard" class="block py-2.5 px-4 rounded transition duration-200 bg-blue-600 text-white mb-1">Dashboard</a>
                    <a href="<?php echo Config::get('URL'); ?>ticket/create" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-600 text-gray-300 hover:text-white">Create Ticket</a>
                </div>

                <div class="mb-8">
                    <h3 class="text-sm font-medium text-gray-400 mb-2 uppercase">Tickets</h3>
                    <a href="<?php echo Config::get('URL'); ?>ticket" class="block py-2 text-gray-300 hover:text-white">All Tickets</a>
                    <a href="<?php echo Config::get('URL'); ?>ticket?filter=my" class="block py-2 text-gray-300 hover:text-white">My Tickets</a>
                    <a href="<?php echo Config::get('URL'); ?>ticket?filter=pending" class="block py-2 text-gray-300 hover:text-white">Pending</a>
                    <a href="<?php echo Config::get('URL'); ?>ticket?filter=unassigned" class="block py-2 text-gray-300 hover:text-white">Unassigned</a>
                </div>

                <div>
                    <h3 class="text-sm font-medium text-gray-400 mb-2 uppercase">Account</h3>
                    <a href="<?php echo Config::get('URL'); ?>user/editusername" class="block py-2 text-gray-300 hover:text-white">Settings</a>
                    <a href="<?php echo Config::get('URL'); ?>login/logout" class="block py-2 text-gray-300 hover:text-white">Logout</a>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            <!-- Top Nav -->
            <div class="bg-white shadow-sm">
                <div class="flex justify-between items-center py-4 px-8">
                    <h1 class="text-2xl font-semibold text-gray-800">Dashboard</h1>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <input type="text" placeholder="Search..." class="pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                            <svg class="w-5 h-5 absolute left-3 top-2.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dashboard Content -->
            <div class="p-8">
                <!-- Stats -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-gray-500 text-sm font-medium">Total Tickets</h3>
                        <p class="text-3xl font-semibold text-gray-800 mt-2"><?php echo count($this->tickets); ?></p>
                    </div>
                    <!-- Add more stat boxes as needed -->
                </div>

                <!-- Recent Tickets -->
                <div class="bg-white rounded-lg shadow">
                    <div class="p-6 border-b">
                        <h2 class="text-lg font-semibold text-gray-800">Recent Tickets</h2>
                    </div>
                    <div class="p-6">
                        <?php if (!empty($this->tickets)): ?>
                            <?php foreach ($this->tickets as $ticket): ?>
                                <div class="border-b last:border-0 pb-4 mb-4 last:mb-0">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h3 class="font-medium text-gray-800"><?= htmlspecialchars($ticket->title) ?></h3>
                                            <p class="text-sm text-gray-500 mt-1"><?= htmlspecialchars($ticket->description) ?></p>
                                        </div>
                                        <span class="px-3 py-1 text-sm rounded-full <?= $ticket->priority === 'high' ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800' ?>">
                                            <?= htmlspecialchars($ticket->priority) ?>
                                        </span>
                                    </div>
                                    <div class="flex items-center mt-3 text-sm text-gray-500">
                                        <span><?= htmlspecialchars($ticket->created_at) ?></span>
                                        <span class="mx-2">•</span>
                                        <span class="capitalize"><?= htmlspecialchars($ticket->status) ?></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-gray-500 text-center py-4">No tickets found</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
