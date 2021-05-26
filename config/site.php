<?php

return [
    "name" => "Trip.ee",
    "description" =>
        "'Trip.ee koondab kokku kõik reisimiseks vajaliku: reisijate kogemused ja reisisoovitused, reisiideed, odavad piletid, reisikaaslaste otsingu ja reisivarustuse ost ja müük'",
    "image_cdn" => env("IMAGE_CDN", ""),
    "links" => [
        "index" => ["title" => "Trip.ee", "route" => "frontpage.index"],
        "header" => [
            ["title" => "Flight offers", "route" => "flight.index"],
            ["title" => "Travelmates", "route" => ""],
            ["title" => "News", "route" => ""],
            ["title" => "Forum", "route" => "forum.index.general"],
            ["title" => "Photos", "route" => "photo.index"],
            ["title" => "My Trip.ee", "route" => ""],
        ],
        "footerFirst" => [
            ["title" => "Flight offers", "route" => "flight.index"],
            ["title" => "Travelmates", "route" => ""],
            ["title" => "News", "route" => ""],
            ["title" => "Blogs", "route" => ""],
            ["title" => "Photos", "route" => "photo.index"],
            ["title" => "Destinations", "route" => ""],
        ],
        "footerSecond" => [
            ["title" => "General forum", "route" => "forum.index.general"],
            ["title" => "Buy and sell", "route" => "forum.index.buysell"],
            ["title" => "Expats", "route" => "forum.index.expat"],
            ["title" => "Misc", "route" => "forum.index.misc"],
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
