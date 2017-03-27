<?php

declare(strict_types=1);

namespace FondBot\Channels;

use FondBot\Channels\Exceptions\ChannelNotFoundException;

class ChannelManager
{
    /** @var array */
    private $channels;

    /**
     * Add channel.
     *
     * @param string $name
     * @param array  $parameters
     */
    public function add(string $name, array $parameters): void
    {
        $this->channels[$name] = $parameters;
    }

    /**
     * Create channel.
     *
     * @param string $name
     *
     * @return Channel
     * @throws ChannelNotFoundException
     */
    public function create(string $name): Channel
    {
        if (!isset($this->channels[$name])) {
            throw new ChannelNotFoundException('Channel `'.$name.'` not found.');
        }

        return new Channel($name, $this->channels[$name]);
    }
}
