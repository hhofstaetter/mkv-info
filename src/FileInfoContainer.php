<?php

namespace Hhofstaetter\MkvInfo;
/**
 * Container for file information.
 * @author hhofstaetter <hannes.hofstaetter@gmail.com>
 * @license MIT
 */
class FileInfoContainer {

    /**
     * The mime type of the file.
     * @var string
     */
    protected $mimeType;

    /**
     * The charset of the file.
     * @var string
     */
    protected $charset;

    /**
     * The filename of the file.
     * @var string
     */
    protected $filename;

    /**
     * The full path of the file.
     * @var string
     */
    protected $path;

    public function __construct($mimeType, $charset, $path) {
        $this->mimeType = $mimeType;
        $this->charset = $charset;
        $this->path = $path;
        $this->filename = basename($path);
    }

    /**
     * @return string
     */
    public function getMimeType() {
        return $this->mimeType;
    }

    /**
     * @return string
     */
    public function getCharset() {
        return $this->charset;
    }

    /**
     * @return string
     */
    public function getFilename() {
        return $this->filename;
    }

    /**
     * @return string
     */
    public function getPath() {
        return $this->path;
    }

}
