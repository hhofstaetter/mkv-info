<?php

namespace Hhofstaetter\MkvInfo;


class MkvInfoTrackContainer {

    /**
     * Type of the track.
     * enum(video, audio, subtitles).
     * @var string
     */
    protected $type;

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $codec;

    /**
     * @var array
     */
    protected $properties;

    public function __construct(string $type, int $id, string $codec, array $properties) {
        $this->type = $type;
        $this->id = $id;
        $this->codec = $codec;
        $this->properties = $properties;
    }

    /**
     * @return string
     */
    public function getType(): string {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCodec(): string {
        return $this->codec;
    }

    /**
     * @return array
     */
    public function getProperties(): array {
        return $this->properties;
    }

}
