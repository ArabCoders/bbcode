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
 * BBCode: Table
 *
 * @package arabcoders\bbcode
 * @author  Abdul.Mohsen B. A. A. <admin@arabcoders.org>
 */
class Table implements FilterInterface
{
    protected $filters = [ ];

    public function __construct( array $options = [ ] )
    {
        $this->filters['[table][/table]'] = [
            'code'     => '#\[table\](.+?)\[/table\]#s',
            'callback' => function ( $match )
            {
                return sprintf( '<table class="medium mw table">%s</table>', $match[1] );
            },
        ];

        $this->filters['[th][/th]'] = [
            'code'     => '#\[th\](.+?)\[/th\]#s',
            'callback' => function ( $match )
            {
                return sprintf( '<th>%s</th>', $match[1] );
            },
        ];

        $this->filters['[tr][/tr]'] = [
            'code'     => '#\[tr\](.+?)\[/tr\]#s',
            'callback' => function ( $match )
            {
                return sprintf( '<tr>%s</tr>', $match[1] );
            },
        ];

        $this->filters['[td][/td]'] = [
            'code'     => '#\[td\](.+?)\[/td\]#s',
            'callback' => function ( $match )
            {
                return sprintf( '<td>%s</td>', $match[1] );
            },
        ];
    }

    public function getFilter()
    {
        return $this->filters;
    }
}