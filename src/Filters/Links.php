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
 * BBCode: Links
 *
 * @package arabcoders\bbcode
 * @author  Abdul.Mohsen B. A. A. <admin@arabcoders.org>
 */
class Links implements FilterInterface
{
    protected $filters = [ ];

    public function __construct( array $options = [ ] )
    {
        $this->filters['[a][/a]'] = [
            'code'     => '#\[a=([^\[]+?)\](.+?)\[/a\]#s',
            'callback' => function ( $match )
            {
                return sprintf( '<a href="%s">%s</a>', $match[1], $match[2] );
            },
        ];

        $this->filters['[ab][/ab]'] = [
            'code'     => '#\[ab=([^\[]+?)\](.+?)\[/ab\]#s',
            'callback' => function ( $match )
            {
                return sprintf( '<a target="_blank" rel="nofollow" href="%s">%s</a>', $match[1], $match[2] );
            },
        ];
    }

    public function getFilter()
    {
        return $this->filters;
    }

}