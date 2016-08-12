<?php
namespace Cz\AdminBundle\Routing;

use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Generator\UrlGenerator;

class ChambreLoader extends Loader
{
    private $loaded = false;

    public function load($resource, $type = null)
    {
        if (true === $this->loaded) {
            throw new \RuntimeException('Do not add the "extra" loader twice');
        }

        $routes = new RouteCollection();
        $routes->add('show_post', new Route('/show/{slug}'));

        $context = new RequestContext('/');

        $generator = new UrlGenerator($routes, $context);

        $url = $generator->generate('show_post', array(
            'slug' => 'my-blog-post',
        ));
        /*******************************/
        $routes = new RouteCollection();

        // prepare a new route
        $path = '/admin/{}';
        $defaults = array(
            '_controller' => 'CzAdminBundle:ChambreDetails:index',
        );
        $requirements = array(
            'parameter' => '\d+',
        );
        $route = new Route($path, $defaults);

        // add the new route to the route collection
        $routeName = 'extraRoute';
        $routes->add($routeName, $route);

        $this->loaded = true;
        /*******************************/

        return $routes;
    }

    public function supports($resource, $type = null)
    {
        return 'extra' === $type;
    }
}