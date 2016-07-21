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
 * BBCode: fieldSet
 *
 * @package arabcoders\bbcode
 * @author  Abdul.Mohsen B. A. A. <admin@arabcoders.org>
 */
class Fieldset implements FilterInterface
{
    protected $filters = [ ];

    public function __construct( array $options = [ ] )
    {
        $this->filters['[fieldset][/fieldset]'] = [
            'code'     => '#\[fieldset="(.+?)"\](.+?)\[/fieldset\]#s',
            'callback' => function ( $match )
            {
                return sprintf( '<fieldset class="table mw right medium"><legend>%s</legend>%s</fieldset>', $match[1], $match[2] );
            },
        ];
    }

    public function getFilter()
    {
        return $this->filters;
    }
}