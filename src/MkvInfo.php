<?php

namespace Hhofstaetter\MkvInfo;

use Symfony\Component\Process\Process;

class MkvInfo {

    public function __construct() {
        $process = new Process(['mkvmerge', '--version']);
        $process->run();
        if (!$process->isSuccessful()) {
            throw new RuntimeException("'file' not executable!");
        }
        # TODO: check for v8.8.0
    }

    public function getFileInfo($path) {
        $process = new Process(['mkvmerge', '--identify', $path, '--identification-format', 'json']);
        $process->run();
        if (!$process->isSuccessful()) {
            return NULL;
        }
        $output = $process->getOutput();

        return new MkvInfoContainer(json_decode($output, true));
    }

}
