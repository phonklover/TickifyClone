<?php

/**
 * Class Redirect
 *
 * Simple abstraction for redirecting the user to a certain page
 */
class Redirect
{
    

    /**
     * To the homepage
     */
    public static function home()
    {
        header("location: " . Config::get('URL'));
    }

    /**
     * To the defined page, uses a relative path (like "user/profile")
     *
     * Redirects to a RELATIVE path, like "user/profile" (which works very fine unless you are using tickify inside tricky
     * sub-folder structures)
     *
     * @see https://github.com/panique/tickify/issues/770
     * @see https://github.com/panique/tickify/issues/754
     *
     * @param $path string
     */
    public static function to($path)
    {
        header("location: " . rtrim(Config::get('URL'), '/') . '/' . ltrim($path, '/'));
    }
}
