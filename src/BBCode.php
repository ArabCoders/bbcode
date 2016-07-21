<?php
/**
 * This file is part of {@see \arabcoders\bbcode} package.
 *
 * (c) 2015-2016 Abdulmohsen B. A. A.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace arabcoders\bbcode;

use arabcoders\bbcode\Interfaces\BBCode as BBCodeInterface;

/**
 * BBCode Parser
 *
 * @package arabcoders\bbcode
 * @author  Abdul.Mohsen B. A. A. <admin@arabcoders.org>
 */
class BBCode implements BBCodeInterface
{
    /**
     * @var string  parsed text
     */
    protected $text;

    /**
     * @var array Registered Filters.
     */
    protected $filters = [ ];

    /**
     * BBCode constructor.
     *
     * @param array $options
     */
    public function __construct( array $options = [ ] )
    {
    }

    public function parse( string $text ): string
    {
        $this->text = $text;

        if ( empty( $this->filters ) )
        {
            return $text;
        }

        foreach ( $this->filters as $row )
        {
            $this->text = preg_replace_callback( $row['code'], $row['callback'], $this->text );
        }

        return $this->text;
    }

    public function text( string $text ): string
    {
        return preg_replace( '|[[\/\!]*?[^\[\]]*?]|si', '', $text );
    }

    public function registerFilters( array $filters ): BBCodeInterface
    {
        if ( empty( $filters ) )
        {
            return $this;
        }

        foreach ( $filters as $name => $row )
        {
            $this->registerFilter( $name, $row['code'], $row['callback'] );
        }

        return $this;
    }

    public function registerFilter( string $name, string $regex, \Closure $callback ): BBCodeInterface
    {
        $this->filters[$name] = [
            'code'     => $regex,
            'callback' => $callback
        ];

        return $this;
    }

    public function unRegisterFilter( string $name ): BBCodeInterface
    {
        if ( array_key_exists( $name, $this->filters ) )
        {
            unset( $this->filters[$name] );
        }

        return $this;
    }

    public function hasFilter( string $name ): bool
    {
        return (bool) array_key_exists( $name, $this->filters );
    }

    public function getFilters(): array
    {
        return $this->filters;
    }
}