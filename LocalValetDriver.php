<?php
/**
 * Laravel Valet Driver for ExpressionEngine
 * To install:
 * 1) Install Valet
 * 2) Add this file to the document/project root
 */

class LocalValetDriver extends ValetDriver
{

    /**
     * Determine if the driver serves the request.
     *
     * @param  string  $sitePath
     * @param  string  $siteName
     * @param  string  $uri
     * @return bool
     */
    public function serves($sitePath, $siteName, $uri)
    {
        return true;
    }

    /**
     * Determine if the incoming request is for a static file.
     *
     * @param  string  $sitePath
     * @param  string  $siteName
     * @param  string  $uri
     * @return string|false
     */
    public function isStaticFile($sitePath, $siteName, $uri)
    {
        if (file_exists($staticFilePath = $sitePath . '/public/' . $uri)) {
            return $staticFilePath;
        }

        return false;
    }

    /**
     * Get the fully resolved path to the application's front controller. Includes checking for admin panel
     *
     * @param  string  $sitePath
     * @param  string  $siteName
     * @param  string  $uri
     * @return string
     */
    public function frontControllerPath($sitePath, $siteName, $uri)
    {
        if (strpos($uri, '/admin') === 0) {
            return $sitePath . '/public/admin.php';
        }
        return $sitePath . '/public/index.php';
    }
}
