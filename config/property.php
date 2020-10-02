<?php
return [
    /*
    * The directory in disk where the cover image of property will be stored
     */
    'image_directory' => 'property',

    'types' => [
        'house' => 'House',
        'land' => 'Land',
        'room' => 'Room'
    ],

    'status' => [
        'available' => '1',
        'sold' => '2',
        'booked' => '3',
        'hidden' => '4',
    ],

    'price_unit' => 'NRs.'
];
