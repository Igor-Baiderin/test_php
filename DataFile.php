<?php

class DataFile
{
    private array $files;
    private array $data;
    private array $iniArray;
    private array $toolArray;
    private array $authorArray;

    public function __construct()
    {
        $this->getDataFiles();
    }

    private function getDataFiles()
    {
        $this->iniArray = parse_ini_file("test.ini");
        $this->files = scandir($this->iniArray['directory']);
        $this->absDirectory = __DIR__ . DIRECTORY_SEPARATOR . $this->iniArray['directory'];
        $this->files = array_values(array_filter($this->files, function ($item) {
            return strripos($item, '.md');
        }));
    }

    private function getConfigFiles()
    {
        foreach ($this->files as $key => $file) {

            $item = file_get_contents($this->absDirectory . DIRECTORY_SEPARATOR . $file);
//            Получение контента, если есть необходимость
//            $chars = preg_split('/---/', $item, -1, PREG_SPLIT_OFFSET_CAPTURE);
//            if (isset($chars[2][0]) && strlen($chars[2][0]) > 0) {
//                echo '<pre>';
//                print_r($chars[2][0]);
//            }

            $regexp = "/(?<=---)[\s\S]+?(?=---)/ui";
            $match = [];
            preg_match($regexp, $item, $match);
//            $dataArr = yaml_parse(trim($match[0]));   //  синтаксическая ошибка
            $arr = explode(PHP_EOL, trim($match[0]));
            $dataArr = [];
            foreach ($arr as $value) {
                $i = explode(': ', $value);
                $dataArr[trim($i[0])] = str_replace('"', '', trim($i[1]));;
            }
            $dataArr['file'] = $file;
            $dataArr['id'] = $key + 1;
            $this->data[] = $dataArr;
        }
    }

    public function getConfig()
    {
        $this->getConfigFiles();
        foreach ($this->data as $item) {
            $this->toolArray[] = $item['tool'];
        }
        $this->toolArray = array_unique($this->toolArray);
        foreach ($this->data as $item) {
            if (isset($item['author']) && $item['author']) {
                $this->authorArray[] = $item['author'];
            }
        }
        $this->authorArray = array_unique($this->authorArray);
        return $this->data;
    }

    public function getAuthor()
    {
        return $this->authorArray;
    }

    public function getTool()
    {
        return $this->toolArray;
    }
}
