#!/usr/bin/php

<?php
echo "INSERT IGNORE INTO colors(name) VALUES
('Red'),
('Orange'),
('Yellow'),
('Green'),
('Blue'),
('Indigo'),
('Violet');\n";

echo "\n";

echo "INSERT IGNORE INTO cities(name) VALUES
('Anchorage'),
('Brooklyn'),
('Detroit'),
('Selma');\n";

generate_vote_inserts('Anchorage', 'Blue',   10000);
generate_vote_inserts('Anchorage', 'Yellow', 15000);
generate_vote_inserts('Brooklyn',  'Red',    100000);
generate_vote_inserts('Brooklyn',  'Blue',   250000);
generate_vote_inserts('Detroit',   'Red',    160000);
generate_vote_inserts('Selma',     'Yellow', 15000);
generate_vote_inserts('Selma',     'Violet', 5000);

function generate_vote_inserts($cityName, $colorName, $votes)
{
    echo "SELECT 'Generating $votes $colorName votes for $cityName...' AS ' ';\n";

    echo
        "SELECT id
        FROM colors
        WHERE name = '$colorName'
        INTO @color_id;\n";

    echo
        "SELECT id
        FROM cities
        WHERE name = '$cityName'
        INTO @city_id;\n";

    echo "\n";

    echo "INSERT INTO votes (color_id, city_id) VALUES\n";

    echo str_repeat(
        "    (@color_id, @city_id),\n",
       $votes - 1);

    echo "    (@color_id, @city_id);\n";
}
?>
