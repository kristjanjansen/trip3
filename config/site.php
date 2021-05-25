<?php

return [
    "name" => "Trip.ee",
    "image_path_original" => env("IMAGE_CDN", "") . "/original/",
    "image_path_site" => env("IMAGE_CDN", "") . "/site/",
    "links" => [
        "index" => ["title" => "Trip.ee", "route" => "forum.index"],
        "header" => [
            ["title" => "Flight offers", "route" => ""],
            ["title" => "Travelmates", "route" => ""],
            ["title" => "News", "route" => ""],
            ["title" => "Forum", "route" => "forum.index"],
            ["title" => "Photos", "route" => "photo.index"],
            ["title" => "My Trip.ee", "route" => ""],
        ],
        "footerFirst" => [
            ["title" => "Flight offers", "route" => ""],
            ["title" => "Travelmates", "route" => ""],
            ["title" => "News", "route" => ""],
            ["title" => "Blogs", "route" => ""],
            ["title" => "Photos", "route" => "photo.index"],
            ["title" => "Destinations", "route" => ""],
        ],
        "footerSecond" => [
            ["title" => "General forum", "route" => "forum.index"],
            ["title" => "Buy and sell", "route" => "forum.index"],
            ["title" => "Expats", "route" => "forum.index"],
            ["title" => "Misc", "route" => "forum.index"],
        ],
        "footerThird" => [
            ["title" => "About", "route" => ""],
            ["title" => "Contact", "route" => ""],
            ["title" => "Usage policy", "route" => ""],
            ["title" => "Privacy policy", "route" => ""],
            ["title" => "Ads", "route" => ""],
            ["title" => "Log in", "route" => ""],
            ["title" => "Register", "route" => ""],
        ],
        "footerSocial" => [
            ["title" => "Facebook", "route" => ""],
            ["title" => "Twitter", "route" => ""],
            ["title" => "Flight offers RSS", "route" => ""],
            ["title" => "News RSS", "route" => ""],
        ],
    ],
];
