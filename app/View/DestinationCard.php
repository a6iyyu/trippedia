<?php

use Vendor\Component;

class DestinationCard extends Component
{
    public string $description, $image, $location, $province, $url;

    public function __construct(string $description, string $image, string $location, string $province, string $url)
    {
        $this->description = $description;
        $this->image = $image;
        $this->location = $location;
        $this->province = $province;
        $this->url = $url;
    }
}