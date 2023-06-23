<?php
class DataFile
{
    private array $filesDraft;
    private array $files;
    private array $data;
    private array $iniArray;

    public function __construct()
    {
        $this->getDataFiles();
    }

    private function getDataFiles()
    {
        $this->iniArray = parse_ini_file("test.ini");
        $this->filesDraft = scandir($this->iniArray['directory']);
        $this->absDirectory = __DIR__ . DIRECTORY_SEPARATOR . $this->iniArray['directory'];
        $this->files = array_values(array_filter($this->filesDraft, function ($file) {
            return strlen($file) > 3;
        }));
    }

    private function getConfigFiles()
    {
        foreach ($this->files as $file) {
            $item = file_get_contents($this->absDirectory . DIRECTORY_SEPARATOR . $file);
            $regexp = "/(?<=---)[\s\S]+?(?=---)/ui";
            $match = [];
            preg_match($regexp, $item, $match);
            $arr = explode(PHP_EOL, trim($match[0]));
            $dataArr = [];
            foreach ($arr as $value) {
                $i = explode(':', $value);
                $dataArr[trim($i[0])] = str_replace('"', '', trim($i[1]));;
            }
            $dataArr['file'] = $file;
            $this->data[] = $dataArr;
        }
    }

    public function getConfig()
    {
        $this->getConfigFiles();
        return $this->data;
    }
}
