<?php
require($root . '/mod/routerBase.php');

switch ($routerUrl->path[0]) {
    case '':
        include('views/homepage.php');
        break;
    case 'watch':
        include('views/watch.php');
        break;
    case 'shorts': // redirect to watch
        ob_end_clean();
        header ('Location: /watch?v=' . $routerUrl->path[1]);
        exit();
        break;
    case 'forcefatal':
        $template = 'sdsadasds';
        break;
    case 'attribution':
        include('views/attribution.php');
        break;
    case 'debug':
        include('debug.php');
        break;
    case 'redirect':
        // temporary logic?
        // youtube has a redirect confirmation page in some cases
        // TODO: research
        ob_end_clean();
        if (isset($_GET['q'])) {
            header("Location:" . $_GET('q'));
        } else {
            header("Location: /");
        }
        exit();
        break;
    case 's':
        include('simplefunnel.php');
        die();
        break;
    case 'feed':
        switch($routerUrl->path[1]) {
            case 'what_to_watch':
                header("Location: /");
                break;
            default:
                header("Location: /");
                break;
        }
        break;
    default:
        $template = '404';
        break;
}