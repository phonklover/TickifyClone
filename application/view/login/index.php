
<!DOCTYPE html>
<html>
<head>
    <title>Login - Tickify</title>
    <meta charset="utf-8">
    <link rel="icon" href="data:;base64,=">
    <link rel="stylesheet" href="<?php echo Config::get('URL'); ?>css/output.css" />
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full bg-white rounded-lg shadow-sm p-8 space-y-8">
            <div>
                <h2 class="text-center text-2xl font-bold text-gray-900">Sign in to your account</h2>
            </div>

            <?php $this->renderFeedbackMessages(); ?>

            <form method="post" action="<?php echo Config::get('URL'); ?>login/login" class="mt-8 space-y-6">
                <div class="-space-y-px rounded-md">
                    <div>
                        <label for="username" class="sr-only">Username or email</label>
                        <input id="username" name="user_name" type="text" class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Username or email" required />
                    </div>
                    <div class="mt-2">
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="user_password" type="password" class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password" required />
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember" name="set_remember_me_cookie" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-900">Remember me</label>
                    </div>
                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Sign in
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
