<?php


class Type
{
    public static function getType(string $extension): string
    {
        if ($extension === 'jpg' || $extension === 'jpeg') {
            return 'image';
        }
        if ($extension === 'mp4v' || $extension === 'mp4') {
            return 'video';
        }
        if ($extension === 'pdf') {
            return 'pdf';
        }
    }
}
