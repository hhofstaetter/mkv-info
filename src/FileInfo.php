<?php

namespace Hhofstaetter\MkvInfo;
use Symfony\Component\Process\Exception\RuntimeException;
use Symfony\Component\Process\Process;

class FileInfo {

    public function __construct() {
        $process = new Process(['file', '--version']);
        $process->run();
        if (!$process->isSuccessful()) {
            throw new RuntimeException("'file' not executable!");
        }
        # TODO: Add version check for 5.x
    }

    public function getFileInfo($filepath) {
        $process = new Process(['file', '--brief', '--mime', $filepath]);
        $process->run();
        if (!$process->isSuccessful()) {
            return NULL;
        }
        $output = $process->getOutput();
        list($mimeType, $charset) = explode('; ', $output);
        list(, $charset) = explode('=', $charset);
        return new FileInfoContainer($mimeType, $charset, $filepath);
    }

}
