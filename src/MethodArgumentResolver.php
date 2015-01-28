<?php

namespace JeremyWorboys\ContainerAware;

use Illuminate\Container\Container;
use ReflectionMethod;
use ReflectionParameter;

class MethodArgumentResolver
{
    /** @var \Illuminate\Container\Container */
    private $container;

    /**
     * @param \Illuminate\Container\Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Resolve method arguments.
     *
     * @param \ReflectionMethod $method
     * @param array             $parameters
     * @return array
     */
    public function resolve(ReflectionMethod $method, array $parameters = [])
    {
        $dependencies = [];

        foreach ($method->getParameters() as $key => $param) {
            $dependencies[] = $this->resolveMethodArgument($param, $parameters);
        }

        return array_merge($dependencies, $parameters);
    }

    /**
     * Get the dependency for the given call parameter.
     *
     * @param  \ReflectionParameter $param
     * @param  array                $parameters
     * @return mixed
     */
    protected function resolveMethodArgument(ReflectionParameter $param, array &$parameters)
    {
        if ($this->parameterIsDefined($param, $parameters)) {
            return $this->extractParameter($param, $parameters);
        }

        if ($param->getClass()) {
            return $this->container->make($param->getClass()->name);
        }

        if ($param->isDefaultValueAvailable()) {
            return $param->getDefaultValue();
        }

        return array_shift($parameters);
    }

    /**
     * Determine a value for the the given parameter was passed in.
     *
     * @param \ReflectionParameter $param
     * @param array                $parameters
     * @return bool
     */
    protected function parameterIsDefined(ReflectionParameter $param, array $parameters)
    {
        return isset($parameters[$param->name]);
    }

    /**
     * Retrieve the value of a parameter that was passed in.
     *
     * @param \ReflectionParameter $param
     * @param array                $parameters
     * @return mixed
     */
    protected function extractParameter(ReflectionParameter $param, array &$parameters)
    {
        $value = $parameters[$param->name];

        unset($parameters[$param->name]);

        return $value;
    }
}
