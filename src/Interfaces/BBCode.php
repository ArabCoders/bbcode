<?php
/**
 * This file is part of {@see \arabcoders\bbcode} package.
 *
 * (c) 2015-2016 Abdulmohsen B. A. A.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace arabcoders\bbcode\Interfaces;

/**
 * BBCode Parser Interface.
 *
 * @package arabcoders\bbcode
 * @author  Abdul.Mohsen B. A. A. <admin@arabcoders.org>
 */
interface BBCode
{
    /**
     * Parse string.
     *
     * @param string $text
     *
     * @return string
     */
    public function parse( string $text ): string;

    /**
     * strip bbcodes out of text.
     *
     * @param string $text
     *
     * @return string
     */
    public function text( string $text ): string;

    /**
     * Register bbCode Filters.
     *
     * @param array $filters list of filters that implementation {@see \arabcoders\bbcode\Interfaces\Filter}.
     *
     * @return BBCode
     */
    public function registerFilters( array $filters ): BBCode;

    /**
     * Single Filter Registration.
     *
     * @param string   $name    The BBcode style example ([b][/b]), to allow unregistration and override.
     * @param string   $regex   Regex filter.
     * @param \Closure $closure Callback
     *
     * @return self
     */
    public function registerFilter( string $name, string $regex, \Closure $closure );

    /**
     * un-register Filter.
     *
     * @param string $name The BBcode style name example ([b][/b]).
     *
     * @return BBCode
     */
    public function unRegisterFilter( string $name ):BBCode;

    /**
     * Check if filter exists
     *
     * @param string $name The BBcode style name example ([b][/b]).
     *
     * @return boolean
     */
    public function hasFilter( string $name ): bool;

    /**
     * Get All Registered Filters
     *
     * @return array
     */
    public function getFilters(): array;
}