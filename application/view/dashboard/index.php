
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

        <!-- Tickets List -->
        <div class="space-y-4">
            <?php foreach ($this->tickets as $ticket): ?>
            <div class="bg-white rounded-lg shadow p-4">
                <div class="flex justify-between items-start">
                    <div>
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="px-2 py-1 text-xs rounded <?php echo $ticket->status === 'on-hold' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100'; ?>">
                                <?php echo ucfirst($ticket->status); ?>
                            </span>
                            <h3 class="font-medium"><?php echo htmlspecialchars($ticket->title); ?></h3>
                        </div>
                        <p class="text-sm text-gray-600"><?php echo htmlspecialchars($ticket->description); ?></p>
                    </div>
                    <div class="flex items-center space-x-6">
                        <div class="flex items-center space-x-2">
                            <div class="w-6 h-6 rounded-full bg-gray-200 flex items-center justify-center">
                                <span class="text-xs"><?php echo substr($ticket->assigned_to ?: 'UA', 0, 2); ?></span>
                            </div>
                            <div class="text-sm">
                                <div><?php echo $ticket->assigned_to ?: 'Unassigned'; ?></div>
                                <div class="text-xs text-gray-500">Assignee</div>
                            </div>
                        </div>
                        <div class="text-sm text-right">
                            <div>Priority: <?php echo ucfirst($ticket->priority); ?></div>
                            <div class="text-xs text-gray-500">Due on: <?php echo date('n.j.Y', strtotime($ticket->due_date)); ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
