<?php

namespace App\Common;

class Type
{
    public const IMAGE_FILE_TYPE = 'image';
    public const VIDEO_FILE_TYPE = 'video';
    public const PDF_FILE_TYPE = 'pdf';

    private const JPG = 'jpg';
    private const JPEG = 'jpeg';
    private const MP4V = 'mp4v';
    private const MP4 = 'mp4';
    private const PDF = 'pdf';

    public static function getType(string $extension): string
    {
        if ($extension === self::JPG || $extension === self::JPEG) {
            return self::IMAGE_FILE_TYPE;
        }
        if ($extension === self::MP4V || $extension === self::MP4) {
            return self::VIDEO_FILE_TYPE;
        }
        if ($extension === self::PDF) {
            return self::PDF_FILE_TYPE;
        }
    }
}
