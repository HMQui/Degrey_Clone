<?php
class StaticPageController
{
    public function about()
    {
        include 'views/about.php';
    }

    public function stores()
    {
        include 'views/stores.php';
    }
}
