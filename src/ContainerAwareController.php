<?php

namespace JeremyWorboys\ContainerAware;

use Illuminate\Routing\Controller;
use ReflectionMethod;

abstract class ContainerAwareController extends Controller implements ContainerAware
{
    use ContainerAwareTrait;

    /**
     * Execute an action on the controller.
     *
     * @param string $method
     * @param array  $parameters
     * @return \Illuminate\Http\Response
     */
    public function callAction($method, $parameters)
    {
        $rMethod = new ReflectionMethod($this, $method);
        $resolver = new MethodArgumentResolver($this->container);

        return Controller::callAction($method, $resolver->resolve($rMethod, $parameters));
    }

    /**
     * Get a service from the Container.
     *
     * @param string $service
     * @return mixed
     */
    protected function get($service)
    {
        return $this->container->make($service);
    }

    /**
     * Determine if the has a binding for the service.
     *
     * @param string $service
     * @return boolean
     */
    protected function has($service)
    {
        return $this->container->bound($service);
    }
}
