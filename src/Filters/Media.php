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
 * BBCode: Media
 *
 * @package arabcoders\bbcode
 * @author  Abdul.Mohsen B. A. A. <admin@arabcoders.org>
 */
class Media implements FilterInterface
{
    protected $filters = [ ];

    public function __construct( array $options = [ ] )
    {

        $this->filters['[yt][/yt]'] = [
            'code'     => '#\[yt\](.*)\[/yt\]#s',
            'callback' => function ( $match )
            {
                $pat = '#(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})#i';

                $id = ( preg_match( $pat, $match[1], $found ) ) ? $found[1] : false;

                if ( !empty( $id ) )
                {
                    return sprintf( '<iframe class="youtube" width="250" height="150" src="//www.youtube.com/embed/%s" frameborder="0" allowfullscreen></iframe>', $id );
                }
            },
        ];

        $this->filters['[keek][/keek]'] = [
            'code'     => '#\[keek\](.*)\[/keek\]#s',
            'callback' => function ( $match )
            {
                $pat = '#(http\:\/\/|https\:\/\/|http\:\/\/www.|https\:\/\/www.|www.)keek.com/(.+?/keeks/|embed/|.+?\#)(.*)#is';

                $id = ( preg_match( $pat, $match[1], $found ) ) ? array_pop( $found ) : false;

                if ( !empty( $id ) )
                {
                    return sprintf( '<iframe class="keek" width="250" height="150" src="//www.keek.com/embed/%s" frameborder="0" allowfullscreen></iframe>', $id );
                }
            },
        ];

        $this->filters['[instagram][/instagram]'] = [
            'code'     => '#\[instagram\](.*)\[/instagram\]#s',
            'callback' => function ( $match )
            {
                $regex = '#instagr(\.am|am\.com)/p/(.*)#is';

                preg_match( $regex, $match[1], $found );

                if ( !empty( $found[2] ) )
                {
                    $found[2] = str_replace( [ '/', '#' ], '', $found[2] );

                    return sprintf( '<a target="_blank" href="http://instagram.com/p/%s/">
                                    <img class="instagram" src="http://instagr.am/p/%s/media/?size=m">',
                                    $found[2], $found[2]
                    );
                }
            }
        ];
    }

    public function getFilter()
    {
        return $this->filters;
    }
}