<?php $this->renderFeedbackMessages(); ?>

<div class="min-h-screen bg-gray-100 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-lg shadow">
        <div>
            <h2 class="text-center text-2xl font-bold text-gray-900">Login</h2>
            <p class="mt-2 text-center text-sm text-gray-600">Login to your account to continue</p>
        </div>

        <form class="mt-8 space-y-6" action="<?php echo Config::get('URL'); ?>login/login" method="post" id="loginForm">
            <div class="rounded-md shadow-sm -space-y-px">
                <div class="mb-4">
                    <input id="user_name" name="user_name" type="text" required 
                           class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                           placeholder="Username" />
                </div>

                <div class="mb-4 relative">
                    <input id="user_password" name="user_password" type="password" required 
                           class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
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
                    <input id="set_remember_me_cookie" name="set_remember_me_cookie" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label for="set_remember_me_cookie" class="ml-2 block text-sm text-gray-900">Remember me</label>
                </div>

                <div class="text-sm">
                    <a href="<?php echo Config::get('URL'); ?>login/requestPasswordReset" class="font-medium text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                </div>
            </div>

            <input type="hidden" name="csrf_token" value="<?= Csrf::makeToken(); ?>" />
            <?php if (!empty($this->redirect)) { ?>
                <input type="hidden" name="redirect" value="<?php echo $this->encodeHTML($this->redirect); ?>" />
            <?php } ?>

            <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-[#0F172A] hover:bg-[#1E293B] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Login
            </button>
        </form>
    </div>
    <div class="mt-6">
                <div class="relative">
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">
                            No account yet?
                            <a href="<?php echo Config::get('URL'); ?>register/index" class="font-medium text-indigo-600 hover:text-indigo-500">
                                Register here
                            </a>
                        </span>
                    </div>
                </div>
            </div>
</div>

<script>
function togglePassword() {
    const passwordInput = document.getElementById('user_password');
    passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
}

// Handle Enter key press
document.addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        document.getElementById('loginForm').submit();
    }
});
</script>