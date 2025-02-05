
<!DOCTYPE html>
<html>
<head>
    <title>Login - Tickify</title>
    <meta charset="utf-8">
    <link rel="icon" href="data:;base64,=">
    <link rel="stylesheet" href="<?php echo Config::get('URL'); ?>css/output.css" />
</head>
<body class="bg-gray-50">
    <div class="flex min-h-screen flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Login</h2>
            <p class="text-center text-sm text-gray-600">Login to your account to continue</p>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <?php $this->renderFeedbackMessages(); ?>
            
            <form class="space-y-6" action="<?php echo Config::get('URL'); ?>login/login" method="post">
                <div>
                    <input id="user_name" name="user_name" type="text" required 
                           class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           placeholder="Username" />
                </div>

                <div>
                    <div class="relative">
                        <input id="user_password" name="user_password" type="password" required 
                               class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                               placeholder="Password" />
                        <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600" name="remember_me">
                        <label class="ml-2 block text-sm text-gray-900">Remember me</label>
                    </div>

                    <div class="text-sm">
                        <a href="<?php echo Config::get('URL'); ?>login/requestPasswordReset" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                    </div>
                </div>

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-[#0F172A] px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-[#1E293B] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Login
                    </button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                No account yet?
                <a href="<?php echo Config::get('URL'); ?>register" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Register here</a>
            </p>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('user_password');
            passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
        }

        document.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                document.querySelector('form').submit();
            }
        });
    </script>
</body>
</html>
