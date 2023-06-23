<?php

namespace phpTest;

class DataFile
{
    private string $directory;
    private array $filesDraft;
    private array $files;
    private array $data;


    public function __construct()
    {
        $this->directory = 'articles';
        $this->filesDraft = scandir($this->directory);
        $this->absDirectory = __DIR__ . DIRECTORY_SEPARATOR . $this->directory;
        $this->getDataFiles();
    }


    private function getDataFiles()
    {
        $this->files = array_values(array_filter($this->filesDraft, function ($file) {
            return strlen($file) > 3;
        }));
    }

    private function getDataFile()
    {
        foreach ($this->files as $file) {
            if (count($item = getDataFile($file)) > 0) {
                $this->data += $item;
            }
        }
    }


    public function getBlocks()
    {
//        $this->getDataFile();
//        foreach ()
//            $handle = fopen($this->absDirectory . DIRECTORY_SEPARATOR . $file, "r");
    }
}

//
//function getDataFile($file): array
//{
//    global $absDirectory;
//    $handle = fopen($absDirectory . DIRECTORY_SEPARATOR . $file, "r");
//    var_dump(getConfig($handle));
//    fclose($handle);
//    return [];
//}
//
//function getConfig($handle)
//{
//    $stringFile = getStringFile($handle);
//    if ($stringFile = '---') {
//        $data = getContent($handle);
//        return $data;
//    }
//    echo $stringFile;
//    return [];
//}
//
//function
//
//function getStringFile($handle)
//{
//    return fgets($handle);
//}
