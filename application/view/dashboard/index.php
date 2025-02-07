<div class="min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <div class="fixed left-0 top-0 h-full w-64 bg-white shadow-lg">
        <div class="p-4">
            <div class="flex items-center space-x-2 mb-8">
                <span class="text-lg font-semibold"><?php echo Session::get('user_name'); ?></span>
                <span class="text-sm text-gray-500">Account</span>
            </div>

            <nav>
                <div class="mb-8">
                    <a href="<?php echo Config::get('URL'); ?>dashboard" class="block py-2 text-blue-600">Dashboard</a>
                    <a href="<?php echo Config::get('URL'); ?>ticket/create" class="block py-2 text-gray-600 hover:text-blue-600">+ Create Ticket</a>
                </div>

                <div class="mb-4">
                    <h3 class="text-sm font-medium text-gray-500 mb-2">Queues</h3>
                    <a href="<?php echo Config::get('URL'); ?>ticket" class="block py-2 text-gray-600 hover:text-blue-600">All Tickets</a>
                    <a href="<?php echo Config::get('URL'); ?>ticket?filter=my" class="block py-2 text-gray-600 hover:text-blue-600">My Tickets</a>
                    <a href="<?php echo Config::get('URL'); ?>ticket?filter=pending" class="block py-2 text-gray-600 hover:text-blue-600">Pending Tickets</a>
                    <a href="<?php echo Config::get('URL'); ?>ticket?filter=unassigned" class="block py-2 text-gray-600 hover:text-blue-600">Unassigned</a>
                    <a href="<?php echo Config::get('URL'); ?>ticket?filter=today" class="block py-2 text-gray-600 hover:text-blue-600">Due Today</a>
                </div>

                <div class="mb-4">
                    <h3 class="text-sm font-medium text-gray-500 mb-2">Status</h3>
                    <a href="<?php echo Config::get('URL'); ?>ticket?status=new" class="block py-2 text-gray-600 hover:text-blue-600">New</a>
                    <a href="<?php echo Config::get('URL'); ?>ticket?status=open" class="block py-2 text-gray-600 hover:text-blue-600">Open</a>
                    <a href="<?php echo Config::get('URL'); ?>ticket?status=on-hold" class="block py-2 text-gray-600 hover:text-blue-600">On Hold</a>
                    <a href="<?php echo Config::get('URL'); ?>ticket?status=solved" class="block py-2 text-gray-600 hover:text-blue-600">Solved</a>
                    <a href="<?php echo Config::get('URL'); ?>ticket?status=closed" class="block py-2 text-gray-600 hover:text-blue-600">Closed</a>
                </div>

                <div>
                    <h3 class="text-sm font-medium text-gray-500 mb-2">Categories</h3>
                    <a href="<?php echo Config::get('URL'); ?>ticket?category=billing" class="block py-2 text-gray-600 hover:text-blue-600">Billing & Returns</a>
                </div>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <div class="ml-64 p-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold">Dashboard</h1>
            <div class="relative">
                <input type="text" placeholder="Search tickets..." class="pl-10 pr-4 py-2 border rounded-lg">
                <svg class="w-5 h-5 absolute left-3 top-2.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>

        <div class="space-y-4">
            <?php foreach ($this->tickets as $ticket): ?>
                <div class="bg-white p-4 rounded-lg shadow">
                    <div class="flex justify-between items-center mb-2">
                        <div>
                            <h3 class="font-semibold"><?= htmlspecialchars($ticket->title) ?></h3>
                            <span class="text-sm text-gray-500"><?= htmlspecialchars($ticket->status) ?></span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="px-2 py-1 text-xs rounded <?= $ticket->priority === 'high' ? 'bg-red-100 text-red-800' : 'bg-gray-100' ?>">
                                <?= htmlspecialchars($ticket->priority) ?>
                            </span>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm"><?= htmlspecialchars($ticket->description) ?></p>
                    <div class="flex justify-between items-center mt-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-gray-400 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-sm text-gray-500"><?= htmlspecialchars($ticket->created_at) ?></span>
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <button class="text-gray-600 hover:text-gray-900">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </button>
                            <button class="text-gray-600 hover:text-gray-900">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>