<!doctype html>
<html>
<head>
    <title>Tickify</title>
    <meta charset="utf-8">
    <link rel="icon" href="data:;base64,=">
    <link rel="stylesheet" href="<?php echo Config::get('URL'); ?>css/output.css" />
</head>
<body>
    <nav class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 justify-between">
                <div class="flex">
                    <div class="flex flex-shrink-0 items-center">
                        <a href="<?php echo Config::get('URL'); ?>index/index" class="text-2xl font-bold text-indigo-600">Tickify</a>
                    </div>
                </div>
                <div class="flex items-center">
                    <?php if (Session::userIsLoggedIn()) { ?>
                        <a href="<?php echo Config::get('URL'); ?>dashboard/index" class="rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600">Dashboard</a>
                        <a href="<?php echo Config::get('URL'); ?>ticket/index" class="rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600">Tickets</a>
                        <div class="relative ml-3">
                            <button type="button" onclick="toggleDropdown()" class="flex rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full" src="<?php echo Config::get('URL') . Config::get('PATH_AVATARS_PUBLIC') . Session::get('user_avatar'); ?>" alt="">
                            </button>
                            <div id="dropdown-menu" class="hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                <a href="<?php echo Config::get('URL'); ?>user/index" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                                <a href="<?php echo Config::get('URL'); ?>login/logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>

    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('dropdown-menu');
            dropdown.classList.toggle('hidden');
        }

        // Close dropdown when clicking outside
        window.addEventListener('click', function(e) {
            if (!e.target.closest('button')) {
                const dropdown = document.getElementById('dropdown-menu');
                if (!dropdown.classList.contains('hidden')) {
                    dropdown.classList.add('hidden');
                }
            }
        });
    </script>
</body>
</html>