<?php

namespace Trollweb;

class ValidationHelper
{
    public function url($url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            echo("$url is a valid URL");
        } else {
            urlencode($url);

        }
    }

    public function email($email)
    {
    }

    public function ip($ip)
    {
    }

    public function validate($content, $rules)
    {
    }
}
