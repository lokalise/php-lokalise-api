<?php

namespace Lokalise;

class Utils
{

    /**
     * Get base64 encoded contents with leading mime type
     * @param string $path Relative|Absolute path to a file
     * @return null|string Base64 string with leading mime type
     */
    public static function base64FileEncode($path)
    {
        $realPath = realpath($path);

        if (!empty($realPath)) {
            $fileInfo = new \finfo(FILEINFO_MIME_TYPE);
            $type = $fileInfo->file($realPath);
            if ($type === false) {
                return null;
            }
            return 'data:' . $type . ';base64,' . base64_encode(file_get_contents($realPath));
        }
        return null;
    }

}
