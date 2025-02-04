
<?php $this->renderFeedbackMessages(); ?>

<div class="min-h-screen bg-gray-100 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
            Welcome to Tickify
        </h2>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
            <form class="space-y-6" action="<?php echo Config::get('URL'); ?>login/login" method="post">
                <div>
                    <label for="user_name" class="block text-sm font-medium text-gray-700">
                        Username or Email
                    </label>
                    <div class="mt-1">
                        <input id="user_name" name="user_name" type="text" required 
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>

                <div>
                    <label for="user_password" class="block text-sm font-medium text-gray-700">
                        Password
                    </label>
                    <div class="mt-1">
                        <input id="user_password" name="user_password" type="password" required 
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="set_remember_me_cookie" name="set_remember_me_cookie" type="checkbox" 
                               class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="set_remember_me_cookie" class="ml-2 block text-sm text-gray-900">
                            Remember me for 2 weeks
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="<?php echo Config::get('URL'); ?>login/requestPasswordReset" class="font-medium text-indigo-600 hover:text-indigo-500">
                            Forgot your password?
                        </a>
                    </div>
                </div>

                <input type="hidden" name="csrf_token" value="<?= Csrf::makeToken(); ?>" />
                <?php if (!empty($this->redirect)) { ?>
                    <input type="hidden" name="redirect" value="<?php echo $this->encodeHTML($this->redirect); ?>" />
                <?php } ?>

                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Sign in
                    </button>
                </div>
            </form>

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
    </div>
</div>
