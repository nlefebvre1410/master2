<?php
/**
 * Created by PhpStorm.
 * User: nicolaslefebvre
 * Date: 13/08/2016
 * Time: 17:07
 */

namespace Cz\AdminBundle\Routing;


use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Routing\Router as BaseRouter;
class Router implements RouterInterface
{
    /** @var BaseRouter */
    private $router;
    /** @var RequestStack */
    private $request;

    /**
     * Router constructor.
     * @param BaseRouter $router
     * @param RequestStack $request
     */
    public function __construct(BaseRouter $router, RequestStack $request)
    {
        $this->router = $router;
        $this->request = $request;
    }
    /**
     * {@inheritdoc}
     */
    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        $url = parent::generate($params, $context, $absolute);
        // custom code here to modify urls
        $parameters = $this->request->getCurrentRequest()->query;
        $url .= "CUSTOM CODE BLAH";
        return $url;
    }
    /**
     * {@inheritdoc}
     */
    public function getRouteCollection()
    {
        return $this->router->getRouteCollection();
    }
    /**
     * {@inheritdoc}
     */
    public function match($pathinfo)
    {
        return $this->router->match($pathinfo);
    }
    /**
     * {@inheritdoc}
     */
    public function getContext()
    {
        return $this->router->getContext();
    }
    /**
     * {@inheritdoc}
     */
    public function setContext(RequestContext $context)
    {
        $this->router->setContext($context);
    }
}
