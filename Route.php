<?php
/**
 * @author        Adriano Campiotti in cooperation with Jesse Boyer <contact@jream.com>
 * @license        GNU General Public License 3 (http://www.gnu.org/licenses/)
 *                Refer to the LICENSE file distributed within the package.
 *
 * @link        http://jream.com
 *
 * @internal    Inspired by Klein @ https://github.com/chriso/klein.php
 */

class Route
{
    /**
     * submit - Looks for a match for the URI and runs the related function
     */
    function shutdownHandler()
    {
        $error = error_get_last();
        /*if ($error['type'] == E_ERROR) {
            header('/base/error404');
            die();
        }
        header('/base/error');*/
        //require_once('view/layout/header.php');
        require_once('Error.php');

    }

    public function submit()
    {
        ini_set('display_errors', 0);
        ini_set('log_errors',1);
        ini_set('error_log', __DIR__ . '/error/Error.log');
        register_shutdown_function('shutdownHandler');
        $uri = isset($_REQUEST['uri']) ? $_REQUEST['uri'] : '/';
        $routerFragments = explode("/",$uri);
        $con=$routerFragments[0];
        $routerFragments[0] = ucfirst($routerFragments[0]) . "Controller";
        $namespace = "\Controller\\" . $routerFragments[0];
        $function = $routerFragments[1];
        //echo __DIR__ . "/view/controller/" . $con . "/" . $routerFragments[1] . ".php";
        /*if(class_exists($namespace)) {
            $controller = new $namespace;
            //UserController->index();
            $function = $routerFragments[1];
            // array( $obj, 'method' )
            // [$obj, 'method']
            // TODO MODIFIED
            $controller->viewTemplate = $function . ".php";
            //counts Views/Calls for all function for analitical purposes.
            $cookieManager = new \services\CookieManager();
            if ($cookieManager->isCookieSet($namespace . "\\" . $function)) {
                $cookieManager->setCookie($namespace . "\\" . $function, $cookieManager->getCookie($namespace . "\\" . $function) + 1);
            } else {
                $cookieManager->setCookie($namespace . "\\" . $function, 1);
            }
            if (method_exists($controller, $function) ||
                file_exists(__DIR__ . "\\view\\controller\\" . $con . "\\" . $routerFragments[1] . ".php") ||
                file_exists(__DIR__ . $uri)) {
                @call_user_func_array([$controller, $function], array_slice($routerFragments, 2));
                die();
            }*/
            if(class_exists($namespace) && (method_exists($namespace,$function)
                    || file_exists(__DIR__."/view/view/controller/".$con."/".$function.".php"))){
                $controller = new $namespace;
                $controller->viewTemplate = $function . ".php";
                @call_user_func_array([$controller, $function], array_slice($routerFragments, 2));
                //die();
        }else{
                //require_once('view/layout/header.php');
                require_once('Error.php');
                //require_once('view/layout/footer.php');
                /*echo __DIR__."/view/controller/".$con."/".$function.".php";
                echo "File:".file_exists(__DIR__."/view/view/controller/".$con."/".$function.".php");
                echo "Method:".method_exists($namespace,$function);
                echo "Class:".class_exists($namespace);*/
            /*throw new Error("Damn Daniel back at nonexistent pages again😂😂😂😂😂😂😂
             Page not found!!!!!!!!!!!!!!!!!", 404);*/?>

        <?php
        }

    }

}










