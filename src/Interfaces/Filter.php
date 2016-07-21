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
 * Filter Interface
 *
 * @package arabcoders\bbcode
 * @author  Abdul.Mohsen B. A. A. <admin@arabcoders.org>
 */

interface Filter
{
    /**
     * Get the Filters..
     *
     * @return array
     */
    public function getFilter();
}