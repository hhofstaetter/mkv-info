<?php

namespace Hhofstaetter\MkvInfo;


class MkvInfoContainer {

    /**
     * File name of the file.
     * @var string
     */
    protected $filename;

    /**
     * Full path of the file.
     * @var string
     */
    protected $path;

    /**
     * Duration in seconds.
     * @var integer
     */
    protected $duration;

    /**
     * Container type of the file.
     * e.g. AVI, Matroska
     * @var string
     */
    protected $containerType;

    /**
     * @var MkvInfoTrackContainer[]
     */
    protected $audioTracks = [];

    /**
     * @var MkvInfoTrackContainer[]
     */
    protected $videoTracks = [];

    /**
     * @var MkvInfoTrackContainer[]
     */
    protected $subtitleTracks = [];

    public function __construct(array $mkvInfo) {
        $this->path = $mkvInfo['file_name'];
        $this->filename = basename($this->path);
        if (isset($mkvInfo['container']['properties']['duration'])) {
            $duration = $mkvInfo['container']['properties']['duration'];
            $this->duration = (int)($duration / 1000 / 1000);
        }
        $this->containerType = $mkvInfo['container']['type'];
        if (!isset($mkvInfo['tracks'])) {
            return;
        }
        foreach ($mkvInfo['tracks'] as $trackInfo) {
            $track = new MkvInfoTrackContainer($trackInfo['type'], $trackInfo['id'], $trackInfo['codec'], $trackInfo['properties']);
            if ($track->getType() === 'video') {
                $this->videoTracks[] = $track;
            }
            if ($track->getType() === 'audio') {
                $this->audioTracks[] = $track;
            }
            if ($track->getType() === 'subtitles') {
                $this->subtitleTracks[] = $track;
            }
        }
    }

}
