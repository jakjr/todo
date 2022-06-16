<?php

namespace App\Support\Keeper;

use Illuminate\Http\Request;
use Illuminate\Session\Store as SessionInterface;

class Keeper
{

    private $context = null;
    private $session;

    function __construct($context, SessionInterface $session)
    {
        $this->session = $session;

        if (is_object($context)) {
            $this->context = get_class($context);
        }

        if (is_string($context)) {
            $this->context = $context;
        }

        if (is_null($this->context)) {
            throw new \InvalidArgumentException('Invalid context');
        }
    }

    private function getContext($passedContext = null)
    {
        if (!is_null($passedContext)) {
            return $passedContext;
        }

        if (!is_null($this->context)) {
            return $this->context;
        }

        throw new \InvalidArgumentException('No context defined');
    }

    public function keep($inputs, $context = null)
    {
        $contextToUse = $this->getContext($context);

        if ($inputs instanceof Request) {
            $inputs = $inputs->query->all();
        }

        foreach ($inputs as $key => $value) {
            if (filled($value)) {
                $this->session->put("keeper.$contextToUse.$key", $value);
            } else {
                $this->forget($key, $context);
            }
        }
    }

    public function get($key, $context = null)
    {
        $contextToUse = $this->getContext($context);

        return $this->session->get("keeper.$contextToUse.$key");
    }

    public function has($key, $context = null)
    {
        $contextToUse = $this->getContext($context);

        return $this->session->has("keeper.$contextToUse.$key");
    }

    public function forget($key = null, $context = null)
    {
        $contextToUse = $this->getContext($context);

        is_null($key) ?
            $this->session->forget("keeper.$contextToUse") :
            $this->session->forget("keeper.$contextToUse.$key");
    }

    public function all($context = null)
    {
        $contextToUse = $this->getContext($context);

        if (!$this->session->has("keeper.$contextToUse")) {
            return [];
        }

        return $this->session->get("keeper.$contextToUse");
    }

    public function any($context = null)
    {
        $all = $this->all($context);
        if (is_array($all)) {
            return !empty($all);
        }

        return !is_null($this->all($context));
    }

    public function __get($key)
    {
        return $this->get($key);
    }

}
