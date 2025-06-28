<?php
class HomeController {
    public function index() {
        // Render view home.php
        require_once dirname(__DIR__) . '/views/pages/home.php';
    }
}
