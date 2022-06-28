<?php
namespace App\Models;

class Listi
{
    public static function all()
    {
        return [
            [
                'id' => 1,
                'title' => 'Listing One',
                'description' => 'Aliquip pariatur velit amet officia
                 occaecat cillum elit minim adipisicing.'
            ],
            [
                'id' => 2,
                'title' => 'Listing Two',
                'description' => 'Aliquip pariatur velit amet officia
                     occaecat cillum elit minim adipisicing.'
            ]
        ];
    }

    public static function find($id)
    {
        $listings = self::all();

        foreach ($listings as $listing) {
            if ($listing['id'] == $id) {
                return $listing;
            }
        }
        ;
    }

}

?>