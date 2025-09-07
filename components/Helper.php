<?php

namespace app\components;

use yii\base\Component;
use \app\models\Survey;

class Helper extends Component
{

    public static function getRandStr($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public static function getDirFilesCount($dir)
    {
        $d = opendir($dir);
        $count = 0;
        while ($file = readdir($d)) {
            if ($file == '.' || $file == '..' || is_dir($dir . $file)) {
                continue;
            }
            $count++;
        }
        return $count;
    }

    public static function makeDir($basePath)
    {
        $dirname = self::getRandStr(10);
        $path = $basePath . '/' . $dirname;
        mkdir($path);
        return $path;
    }

    public static function alternate_chunck($array, $parts)
    {
        $t = 0;
        $result = array();
        $max = ceil(count($array) / $parts);
        foreach (array_chunk($array, $max) as $v) {
            if ($t < $parts) {
                $result[] = $v;
            } else {
                foreach ($v as $d) {
                    $result[] = array($d);
                }
            }
            $t += count($v);
        }
        return $result;
    }

    public static function fill_chunck($array, $parts)
    {
        $t = 0;
        $result = array_fill(0, $parts - 1, array());
        $max = ceil(count($array) / $parts);
        foreach ($array as $v) {
            count($result[$t]) >= $max and $t++;
            $result[$t][] = $v;
        }
        return $result;
    }

        public static function getSurveyQuestionResultMap()
    {
        return [
            'question1' => [
                1 => [
                    Survey::TAG_TECH => 7,
                    Survey::TAG_DIPLOMACY => 6,
                    Survey::TAG_SPORTS => 5,
                    Survey::TAG_CREATIVE => 4,
                    Survey::TAG_BUSINESS => 3,
                    Survey::TAG_ADVENTURE => 2,
                    Survey::TAG_ANALYSIS => 1,
                ],
                2 => [
                    Survey::TAG_TECH => 6,
                    Survey::TAG_DIPLOMACY => 5,
                    Survey::TAG_SPORTS => 4,
                    Survey::TAG_CREATIVE => 3,
                    Survey::TAG_BUSINESS => 2,
                    Survey::TAG_ADVENTURE => 1,
                    Survey::TAG_ANALYSIS => 7,
                ],
                3 => [
                    Survey::TAG_TECH => 5,
                    Survey::TAG_DIPLOMACY => 4,
                    Survey::TAG_SPORTS => 3,
                    Survey::TAG_CREATIVE => 2,
                    Survey::TAG_BUSINESS => 1,
                    Survey::TAG_ADVENTURE => 7,
                    Survey::TAG_ANALYSIS => 6,
                ],
                4 => [
                    Survey::TAG_TECH => 4,
                    Survey::TAG_DIPLOMACY => 3,
                    Survey::TAG_SPORTS => 2,
                    Survey::TAG_CREATIVE => 1,
                    Survey::TAG_BUSINESS => 7,
                    Survey::TAG_ADVENTURE => 6,
                    Survey::TAG_ANALYSIS => 5,
                ],
                5 => [
                    Survey::TAG_TECH => 3,
                    Survey::TAG_DIPLOMACY => 2,
                    Survey::TAG_SPORTS => 1,
                    Survey::TAG_CREATIVE => 7,
                    Survey::TAG_BUSINESS => 6,
                    Survey::TAG_ADVENTURE => 5,
                    Survey::TAG_ANALYSIS => 4,
                ],
            ],
            'question2' => [
                1 => [
                    Survey::TAG_TECH => 6,
                    Survey::TAG_DIPLOMACY => 5,
                    Survey::TAG_SPORTS => 4,
                    Survey::TAG_CREATIVE => 3,
                    Survey::TAG_BUSINESS => 2,
                    Survey::TAG_ADVENTURE => 1,
                    Survey::TAG_ANALYSIS => 7,
                ],
                2 => [
                    Survey::TAG_TECH => 5,
                    Survey::TAG_DIPLOMACY => 4,
                    Survey::TAG_SPORTS => 3,
                    Survey::TAG_CREATIVE => 2,
                    Survey::TAG_BUSINESS => 1,
                    Survey::TAG_ADVENTURE => 7,
                    Survey::TAG_ANALYSIS => 6,
                ],
                3 => [
                    Survey::TAG_TECH => 4,
                    Survey::TAG_DIPLOMACY => 3,
                    Survey::TAG_SPORTS => 2,
                    Survey::TAG_CREATIVE => 1,
                    Survey::TAG_BUSINESS => 7,
                    Survey::TAG_ADVENTURE => 6,
                    Survey::TAG_ANALYSIS => 5,
                ],
                4 => [
                    Survey::TAG_TECH => 3,
                    Survey::TAG_DIPLOMACY => 2,
                    Survey::TAG_SPORTS => 1,
                    Survey::TAG_CREATIVE => 7,
                    Survey::TAG_BUSINESS => 6,
                    Survey::TAG_ADVENTURE => 5,
                    Survey::TAG_ANALYSIS => 4,
                ],
                5 => [
                    Survey::TAG_TECH => 2,
                    Survey::TAG_DIPLOMACY => 1,
                    Survey::TAG_SPORTS => 7,
                    Survey::TAG_CREATIVE => 6,
                    Survey::TAG_BUSINESS => 5,
                    Survey::TAG_ADVENTURE => 4,
                    Survey::TAG_ANALYSIS => 3,
                ],
            ],
            'question3' => [
                1 => [
                    Survey::TAG_TECH => 5,
                    Survey::TAG_DIPLOMACY => 4,
                    Survey::TAG_SPORTS => 3,
                    Survey::TAG_CREATIVE => 2,
                    Survey::TAG_BUSINESS => 1,
                    Survey::TAG_ADVENTURE => 7,
                    Survey::TAG_ANALYSIS => 6,
                ],
                2 => [
                    Survey::TAG_TECH => 4,
                    Survey::TAG_DIPLOMACY => 3,
                    Survey::TAG_SPORTS => 2,
                    Survey::TAG_CREATIVE => 1,
                    Survey::TAG_BUSINESS => 7,
                    Survey::TAG_ADVENTURE => 6,
                    Survey::TAG_ANALYSIS => 5,
                ],
                3 => [
                    Survey::TAG_TECH => 3,
                    Survey::TAG_DIPLOMACY => 2,
                    Survey::TAG_SPORTS => 1,
                    Survey::TAG_CREATIVE => 7,
                    Survey::TAG_BUSINESS => 6,
                    Survey::TAG_ADVENTURE => 5,
                    Survey::TAG_ANALYSIS => 4,
                ],
                4 => [
                    Survey::TAG_TECH => 2,
                    Survey::TAG_DIPLOMACY => 1,
                    Survey::TAG_SPORTS => 7,
                    Survey::TAG_CREATIVE => 6,
                    Survey::TAG_BUSINESS => 5,
                    Survey::TAG_ADVENTURE => 4,
                    Survey::TAG_ANALYSIS => 3,
                ],
                5 => [
                    Survey::TAG_TECH => 1,
                    Survey::TAG_DIPLOMACY => 7,
                    Survey::TAG_SPORTS => 6,
                    Survey::TAG_CREATIVE => 5,
                    Survey::TAG_BUSINESS => 4,
                    Survey::TAG_ADVENTURE => 3,
                    Survey::TAG_ANALYSIS => 2,
                ],
            ],
            'question4' => [
                1 => [
                    Survey::TAG_TECH => 4,
                    Survey::TAG_DIPLOMACY => 3,
                    Survey::TAG_SPORTS => 2,
                    Survey::TAG_CREATIVE => 1,
                    Survey::TAG_BUSINESS => 7,
                    Survey::TAG_ADVENTURE => 6,
                    Survey::TAG_ANALYSIS => 5,
                ],
                2 => [
                    Survey::TAG_TECH => 3,
                    Survey::TAG_DIPLOMACY => 2,
                    Survey::TAG_SPORTS => 1,
                    Survey::TAG_CREATIVE => 7,
                    Survey::TAG_BUSINESS => 6,
                    Survey::TAG_ADVENTURE => 5,
                    Survey::TAG_ANALYSIS => 4,
                ],
                3 => [
                    Survey::TAG_TECH => 2,
                    Survey::TAG_DIPLOMACY => 1,
                    Survey::TAG_SPORTS => 7,
                    Survey::TAG_CREATIVE => 6,
                    Survey::TAG_BUSINESS => 5,
                    Survey::TAG_ADVENTURE => 4,
                    Survey::TAG_ANALYSIS => 3,
                ],
                4 => [
                    Survey::TAG_TECH => 1,
                    Survey::TAG_DIPLOMACY => 7,
                    Survey::TAG_SPORTS => 6,
                    Survey::TAG_CREATIVE => 5,
                    Survey::TAG_BUSINESS => 4,
                    Survey::TAG_ADVENTURE => 3,
                    Survey::TAG_ANALYSIS => 2,
                ],
                5 => [
                    Survey::TAG_TECH => 7,
                    Survey::TAG_DIPLOMACY => 6,
                    Survey::TAG_SPORTS => 5,
                    Survey::TAG_CREATIVE => 4,
                    Survey::TAG_BUSINESS => 3,
                    Survey::TAG_ADVENTURE => 2,
                    Survey::TAG_ANALYSIS => 1,
                ],
            ],
            'question5' => [
                1 => [
                    Survey::TAG_TECH => 3,
                    Survey::TAG_DIPLOMACY => 2,
                    Survey::TAG_SPORTS => 1,
                    Survey::TAG_CREATIVE => 7,
                    Survey::TAG_BUSINESS => 6,
                    Survey::TAG_ADVENTURE => 5,
                    Survey::TAG_ANALYSIS => 4,
                ],
                2 => [
                    Survey::TAG_TECH => 2,
                    Survey::TAG_DIPLOMACY => 1,
                    Survey::TAG_SPORTS => 7,
                    Survey::TAG_CREATIVE => 6,
                    Survey::TAG_BUSINESS => 5,
                    Survey::TAG_ADVENTURE => 4,
                    Survey::TAG_ANALYSIS => 3,
                ],
                3 => [
                    Survey::TAG_TECH => 1,
                    Survey::TAG_DIPLOMACY => 7,
                    Survey::TAG_SPORTS => 6,
                    Survey::TAG_CREATIVE => 5,
                    Survey::TAG_BUSINESS => 4,
                    Survey::TAG_ADVENTURE => 3,
                    Survey::TAG_ANALYSIS => 2,
                ],
                4 => [
                    Survey::TAG_TECH => 7,
                    Survey::TAG_DIPLOMACY => 6,
                    Survey::TAG_SPORTS => 5,
                    Survey::TAG_CREATIVE => 4,
                    Survey::TAG_BUSINESS => 3,
                    Survey::TAG_ADVENTURE => 2,
                    Survey::TAG_ANALYSIS => 1,
                ],
                5 => [
                    Survey::TAG_TECH => 6,
                    Survey::TAG_DIPLOMACY => 5,
                    Survey::TAG_SPORTS => 4,
                    Survey::TAG_CREATIVE => 3,
                    Survey::TAG_BUSINESS => 2,
                    Survey::TAG_ADVENTURE => 1,
                    Survey::TAG_ANALYSIS => 7,
                ],
            ],
            'question6' => [
                1 => [
                    Survey::TAG_TECH => 2,
                    Survey::TAG_DIPLOMACY => 1,
                    Survey::TAG_SPORTS => 7,
                    Survey::TAG_CREATIVE => 6,
                    Survey::TAG_BUSINESS => 5,
                    Survey::TAG_ADVENTURE => 4,
                    Survey::TAG_ANALYSIS => 3,
                ],
                2 => [
                    Survey::TAG_TECH => 1,
                    Survey::TAG_DIPLOMACY => 7,
                    Survey::TAG_SPORTS => 6,
                    Survey::TAG_CREATIVE => 5,
                    Survey::TAG_BUSINESS => 4,
                    Survey::TAG_ADVENTURE => 3,
                    Survey::TAG_ANALYSIS => 2,
                ],
                3 => [
                    Survey::TAG_TECH => 7,
                    Survey::TAG_DIPLOMACY => 6,
                    Survey::TAG_SPORTS => 5,
                    Survey::TAG_CREATIVE => 4,
                    Survey::TAG_BUSINESS => 3,
                    Survey::TAG_ADVENTURE => 2,
                    Survey::TAG_ANALYSIS => 1,
                ],
                4 => [
                    Survey::TAG_TECH => 6,
                    Survey::TAG_DIPLOMACY => 5,
                    Survey::TAG_SPORTS => 4,
                    Survey::TAG_CREATIVE => 3,
                    Survey::TAG_BUSINESS => 2,
                    Survey::TAG_ADVENTURE => 1,
                    Survey::TAG_ANALYSIS => 7,
                ],
                5 => [
                    Survey::TAG_TECH => 5,
                    Survey::TAG_DIPLOMACY => 4,
                    Survey::TAG_SPORTS => 3,
                    Survey::TAG_CREATIVE => 2,
                    Survey::TAG_BUSINESS => 1,
                    Survey::TAG_ADVENTURE => 7,
                    Survey::TAG_ANALYSIS => 6,
                ],
            ],
            'question7' => [
                1 => [
                    Survey::TAG_TECH => 1,
                    Survey::TAG_DIPLOMACY => 7,
                    Survey::TAG_SPORTS => 6,
                    Survey::TAG_CREATIVE => 5,
                    Survey::TAG_BUSINESS => 4,
                    Survey::TAG_ADVENTURE => 3,
                    Survey::TAG_ANALYSIS => 2,
                ],
                2 => [
                    Survey::TAG_TECH => 7,
                    Survey::TAG_DIPLOMACY => 6,
                    Survey::TAG_SPORTS => 5,
                    Survey::TAG_CREATIVE => 4,
                    Survey::TAG_BUSINESS => 3,
                    Survey::TAG_ADVENTURE => 2,
                    Survey::TAG_ANALYSIS => 1,
                ],
                3 => [
                    Survey::TAG_TECH => 6,
                    Survey::TAG_DIPLOMACY => 5,
                    Survey::TAG_SPORTS => 4,
                    Survey::TAG_CREATIVE => 3,
                    Survey::TAG_BUSINESS => 2,
                    Survey::TAG_ADVENTURE => 1,
                    Survey::TAG_ANALYSIS => 7,
                ],
                4 => [
                    Survey::TAG_TECH => 5,
                    Survey::TAG_DIPLOMACY => 4,
                    Survey::TAG_SPORTS => 3,
                    Survey::TAG_CREATIVE => 2,
                    Survey::TAG_BUSINESS => 1,
                    Survey::TAG_ADVENTURE => 7,
                    Survey::TAG_ANALYSIS => 6,
                ],
                5 => [
                    Survey::TAG_TECH => 4,
                    Survey::TAG_DIPLOMACY => 3,
                    Survey::TAG_SPORTS => 2,
                    Survey::TAG_CREATIVE => 1,
                    Survey::TAG_BUSINESS => 7,
                    Survey::TAG_ADVENTURE => 6,
                    Survey::TAG_ANALYSIS => 5,
                ],
                6 => [
                    Survey::TAG_TECH => 7,
                    Survey::TAG_DIPLOMACY => 5,
                    Survey::TAG_SPORTS => 6,
                    Survey::TAG_CREATIVE => 4,
                    Survey::TAG_BUSINESS => 2,
                    Survey::TAG_ADVENTURE => 3,
                    Survey::TAG_ANALYSIS => 1,
                ],
            ],
            'question8' => [
                1 => [
                    Survey::TAG_TECH => 7,
                    Survey::TAG_DIPLOMACY => 6,
                    Survey::TAG_SPORTS => 5,
                    Survey::TAG_CREATIVE => 4,
                    Survey::TAG_BUSINESS => 3,
                    Survey::TAG_ADVENTURE => 2,
                    Survey::TAG_ANALYSIS => 1,
                ],
                2 => [
                    Survey::TAG_TECH => 6,
                    Survey::TAG_DIPLOMACY => 5,
                    Survey::TAG_SPORTS => 4,
                    Survey::TAG_CREATIVE => 3,
                    Survey::TAG_BUSINESS => 2,
                    Survey::TAG_ADVENTURE => 1,
                    Survey::TAG_ANALYSIS => 7,
                ],
                3 => [
                    Survey::TAG_TECH => 5,
                    Survey::TAG_DIPLOMACY => 4,
                    Survey::TAG_SPORTS => 3,
                    Survey::TAG_CREATIVE => 2,
                    Survey::TAG_BUSINESS => 1,
                    Survey::TAG_ADVENTURE => 7,
                    Survey::TAG_ANALYSIS => 6,
                ],
                4 => [
                    Survey::TAG_TECH => 4,
                    Survey::TAG_DIPLOMACY => 3,
                    Survey::TAG_SPORTS => 2,
                    Survey::TAG_CREATIVE => 1,
                    Survey::TAG_BUSINESS => 7,
                    Survey::TAG_ADVENTURE => 6,
                    Survey::TAG_ANALYSIS => 5,
                ],
                5 => [
                    Survey::TAG_TECH => 3,
                    Survey::TAG_DIPLOMACY => 2,
                    Survey::TAG_SPORTS => 1,
                    Survey::TAG_CREATIVE => 7,
                    Survey::TAG_BUSINESS => 6,
                    Survey::TAG_ADVENTURE => 5,
                    Survey::TAG_ANALYSIS => 4,
                ],
            ],
        ];
    }
}
