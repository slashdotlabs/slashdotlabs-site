<?php

// Generate urls for the wordpress site
function wordpress_url($path)
{
    return config('app.wordpress_url').$path;
}
