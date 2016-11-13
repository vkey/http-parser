<?php

/**
 * User: jairo.rodriguez <jairo@bfunky.net>
 * Date: 16/04/2016
 * Time: 11:17
 */

namespace BFunky\HttpParser\Entity;


class HttpRequestHeader implements HttpHeaderInterface
{
    /**
     * @var string
     */
    protected $method;

    /**
     * @var string
     */
    protected $scheme;

    /**
     * @var string
     */
    protected $path;


    /**
     * @var string
     */
    protected $query;

    /**
     * @var string
     */
    protected $protocol;

    /**
     * HttpRequestHeader constructor.
     * @param string $method
     * @param string $path
     * @param string $protocol
     */
    public function __construct($method, $path, $protocol)
    {
        $this->method = $method;
        if(substr($path, 0, 4) == 'http'){
            $parts = parse_url($path);
            $this->path = $parts['path'];
            $this->scheme = $parts['scheme'];
            $this->query = $parts['query'];
        }
        else{
            $this->path = $path;
        }
        
        $this->protocol = $protocol;
    }


    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     * @return HttpRequestHeader
     */
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return HttpRequestHeader
     */
    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @return string
     */
    public function getScheme()
    {
        return $this->scheme;
    }

    /**
     * @param string $path
     * @return HttpRequestHeader
     */
    public function setScheme($scheme)
    {
        $this->scheme = $scheme;
        return $this;
    }

    /**
     * @return string
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param string $path
     * @return HttpRequestHeader
     */
    public function setQuery($query)
    {
        $this->query = $query;
        return $this;
    }

    /**
     * @return string
     */
    public function getProtocol()
    {
        return $this->protocol;
    }

    /**
     * @param string $protocol
     * @return HttpRequestHeader
     */
    public function setProtocol($protocol)
    {
        $this->protocol = $protocol;
        return $this;
    }
}