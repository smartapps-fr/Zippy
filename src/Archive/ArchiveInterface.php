<?php

/*
 * This file is part of Zippy.
 *
 * (c) Alchemy <info@alchemy.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Alchemy\Zippy\Archive;

use Alchemy\Zippy\Exception\RuntimeException;
use Alchemy\Zippy\Exception\InvalidArgumentException;

interface ArchiveInterface extends \IteratorAggregate, \Countable
{
    /**
     * Adds a file or a folder into the archive
     *
     * @param string|array|\SplFileInfo $sources   The path to the file or a folder
     * @param bool                      $recursive Recurse into sub-directories
     *
     * @return ArchiveInterface
     *
     * @throws InvalidArgumentException In case the provided source path is not valid
     * @throws RuntimeException         In case of failure
     */
    public function addMembers($sources, $recursive = true);

    /**
     * Removes a file from the archive
     *
     * @param string|array $sources The path to an archive or a folder member
     *
     * @return ArchiveInterface
     *
     * @throws RuntimeException In case of failure
     */
    public function removeMembers($sources);

    /**
     * Lists files and directories archive members
     *
     * @return MemberInterface[] An array of File
     *
     * @throws RuntimeException In case archive could not be read
     */
    public function getMembers();

    /**
     * Extracts current archive to the given directory
     *
     * @param string $toDirectory The path the extracted archive
     *
     * @return ArchiveInterface
     *
     * @throws RuntimeException In case archive could not be extracted
     */
    public function extract($toDirectory);

    /**
     * Extracts specific members from the archive
     *
     * @param string|MemberInterface[] $members     An array of members path
     * @param string                   $toDirectory The destination $directory
     * @param bool                     $overwrite   Whether to overwrite existing files in destination directory
     *
     * @return ArchiveInterface
     *
     * @throws RuntimeException In case member could not be extracted
     */
    public function extractMembers($members, $toDirectory = null, $overwrite = false);
}
