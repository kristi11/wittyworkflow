<?php

namespace App\Services;

class ManifestService
{
    public function generate()
    {
        $manifest = [
            "background_color" => "#ffffff",
            "description" => "Boost your online presence with services, appointment management, a stunning gallery, and customizable features. Elevate your business effortlessly",
            "dir" => "ltr",
            "display" => "fullscreen",
            "name" => "Witty workflow",
            "orientation" => "portrait-primary",
            "scope" => "/",
            "short_name" => "Wittyworkflow",
            "start_url" => "/",
            "theme_color" => "#ffffff",
            "icons" => [
                [
                    "src" => "/favicon.ico",
                    "type" => "image/x-icon"
                ],
                // ... (rest of the icon entries)
            ],
            "id" => "1491",
            "lang" => "en",
            "display_override" => [
                "window-controls-overlay"
            ],
            "prefer_related_applications" => false,
            "categories" => [
                "business"
            ]
        ];

        return json_encode($manifest, JSON_PRETTY_PRINT); // Using JSON_PRETTY_PRINT for better readability
    }
}
