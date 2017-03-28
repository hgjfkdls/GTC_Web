<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Correspondencia extends Model
{
    //
    protected $table = 'correspondencia';
    protected $fillable = ['id'];
    static $valid_characters;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        static::$valid_characters = '\w\.\-\n:,;\t ñÑ¬~$ºª°\'" ' . utf8_encode('áäàâéëèêíïìîóöòôúüùûÁÄÀÂÉËÈÊÍÏÌÎÓÖÒÔÚÜÙÛ');
    }

    public static function whereContent($pattern, $patterns = null, $array = null, $regExp = true, $ignoreCase = true)
    {
        $response = [];
        if (!isset($patterns)) $patterns = $pattern;
        if (!isset($array)) {
            foreach (static::all() as $data) {
                if (file_exists($data->ruta_txt)) {
                    $fileContent = static::getFileContent($data->ruta_txt);
                    if (preg_match('/' . $pattern . '/' . ($ignoreCase ? 'i' : '') . 'm', $fileContent)) {
                        if (preg_match_all('/^.*(' . $patterns . ').*$/' . ($ignoreCase ? 'i' : '') . 'm', $fileContent, $matches)) {
                            $response[$data->codigo] = ['data' => $data, 'matches' => $matches];
                        }
                    }
                }
            }
        } else {
            foreach (array_keys($array) as $key) {
                $data = $array[$key]['data'];
                if (file_exists($data->ruta_txt)) {
                    $fileContent = static::getFileContent($data->ruta_txt);
                    if (preg_match('/' . $pattern . '/im', $fileContent)) {
                        if (preg_match_all('/^.*(' . $patterns . ').*$/' . ($ignoreCase ? 'i' : '') . 'm', $fileContent, $matches)) {
                            $response[$data->codigo] = ['data' => $data, 'matches' => $matches];
                        }
                    } else {
                        unset($array[$key]);
                    }
                }
            }
        }
        return $response;
    }

    public static function orWhereContent($pattern, $patterns = null, $array = null, $regExp = true, $ignoreCase = true)
    {
        $response = [];
        if (!isset($patterns)) $patterns = $pattern;
        foreach (static::all() as $data) {
            if (file_exists($data->ruta_txt)) {
                $fileContent = static::getFileContent($data->ruta_txt);
                if (preg_match('/' . $pattern . '/im', $fileContent)) {
                    if (preg_match_all('/^.*(' . $patterns . ').*$/' . ($ignoreCase ? 'i' : '') . 'm', $fileContent, $matches)) {
                        $response[$data->codigo] = ['data' => $data, 'matches' => $matches];
                    }
                }
            }
        }
        if (isset($array)) {
            $response = array_merge($array, $response);
        }
        return $response;
    }

    private static function getFileContent($filePath)
    {
        $content = '';
        if (file_exists($filePath)) {
            $file = fopen($filePath, 'r');
            $content = utf8_encode(fread($file, filesize($filePath)));
            $content = preg_replace('/[^' . static::$valid_characters . ']/im', '', $content);
            fclose($file);
        }
        return $content;
    }
}
