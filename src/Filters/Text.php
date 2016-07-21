<?php
/**
 * This file is part of {@see \arabcoders\bbcode} package.
 *
 * (c) 2015-2016 Abdulmohsen B. A. A.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace arabcoders\bbcode\Filters;

use \arabcoders\bbcode\Interfaces\Filter as FilterInterface;

/**
 * BBCode: Text
 *
 * @package arabcoders\bbcode
 * @author  Abdul.Mohsen B. A. A. <admin@arabcoders.org>
 */
class Text implements FilterInterface
{
    protected $filters = [ ];

    public function __construct( array $options = [ ] )
    {
        $this->filters['[b][/b]'] = [
            'code'     => '#\[b\](.*?)\[/b\]#is',
            'callback' => function ( $match )
            {
                return sprintf( '<strong>%s</strong>', $match[1] );
            },
        ];

        $this->filters['[i][/i]'] = [
            'code'     => '#\[i\](.*?)\[/i\]#is',
            'callback' => function ( $match )
            {
                return sprintf( '<em>%s</em>', $match[1] );
            },
        ];

        $this->filters['[u][/u]'] = [
            'code'     => '#\[u\](.*?)\[/u\]#is',
            'callback' => function ( $match )
            {
                return sprintf( '<span style="text-decoration: underline;">%s</span>', $match[1] );
            },
        ];

        $this->filters['[color][/color]'] = [
            'code'     => '/\[color\=(\#[0-9A-F]{6}|[a-z]+)\](.*?)\[\/color\]/is',
            'callback' => function ( $match )
            {
                return sprintf( '<span style="color: %s">%s</span>', $match[1], $match[2] );
            },
        ];

        $this->filters['[bg][/bg]'] = [
            'code'     => '!\[bg=(#[0-9a-f]{3}|#[0-9a-f]{6}|[a-z\-]+)\](.*?)\[/bg\]!is',
            'callback' => function ( $match )
            {
                return sprintf( '<p style="background-color: %s">%s</p>', $match[1], $match[2] );
            },
        ];

        $this->filters['[size][/size]'] = [
            'code'     => '/\[size=([\d]{1,2})\](.*?)\[\/size\]/is',
            'callback' => function ( $match )
            {
                return sprintf( '<span style="font-size: %spx;">%s</span>', $match[1], $match[2] );
            },
        ];

        $this->filters['[ltr][/ltr]'] = [
            'code'     => '#\[ltr\](.*?)\[/ltr\]#is',
            'callback' => function ( $match )
            {
                return sprintf( '<div style="display: inline; direction: ltr; text-align: left;">%s</div>', $match[1] );
            },
        ];

        $this->filters['[hide][/hide]'] = [
            'code'     => '#\[hide\](.*?)\[/hide\]#is',
            'callback' => function ( $match )
            {
                return sprintf( '<span style="display: none;">%s</span>', $match[1] );
            },
        ];

        $this->filters['[acr][/acr]'] = [
            'code'     => '#\[acr="(.+?)"\](.*?)\[/acr\]#is',
            'callback' => function ( $match )
            {
                return sprintf( '<abbr title="%s">%s</abbr>', $match[1], $match[2] );
            },
        ];

        $this->filters['[hr][br]'] = [
            'code'     => '#\[(hr|br)\]#is',
            'callback' => function ( $match )
            {
                return ( strtolower( $match[1] ) == 'br' ) ? '<br>' : '<hr>';
            },
        ];

    }

    public function getFilter()
    {
        return $this->filters;
    }
}