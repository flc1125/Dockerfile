<?php

class App
{
    public function response()
    {
        print_r($_SERVER);
        echo 'Hello World!333!!';
    }
}

(new App)->response();
