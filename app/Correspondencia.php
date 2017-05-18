<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Exception;

class Correspondencia extends Model
{
    //
    protected $table = 'correspondencia';

//    protected $fillable = ['id_obra', 'codigo', 'fecha_emisor', 'fecha_receptor', 'nombre', 'ruta_doc', 'ruta_txt', 'emisor', 'receptor', 'materia', 'referencia', 'clasificacion', 'anteriores'];
    protected $guarded = ['id'];

    static $valid_characters;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        static::$valid_characters = '\w\.\-\n:,;\t ñÑ¬~$ºª°\'" ' . utf8_encode('áäàâéëèêíïìîóöòôúüùûÁÄÀÂÉËÈÊÍÏÌÎÓÖÒÔÚÜÙÛ');
    }

    public function etiquetas()
    {
        return $this->belongsToMany('App\Clasificacion', 'correspondencia_clasificacion', 'id_correspondencia', 'id_clasificacion');
    }

    public static function whereRegexContent($pattern, $patterns = null, $array = null, $ignoreCase = true, $id_obra = 260)
    {
        set_time_limit(0);
        $response = [];
        if (!isset($patterns)) $patterns = $pattern;
        if (!isset($array)) {
            foreach (static::all()->where('id_obra', $id_obra) as $data) {
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
                    if (preg_match('/' . $pattern . '/' . ($ignoreCase ? 'i' : '') . 'm', $fileContent)) {
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

    public static function orWhereRegexContent($pattern, $patterns = null, $array = null, $ignoreCase = true, $id_obra = 260)
    {
        set_time_limit(0);
        $response = [];
        if (!isset($patterns)) $patterns = $pattern;
        foreach (static::all()->where('id_obra', $id_obra) as $data) {
            if (file_exists($data->ruta_txt)) {
                $fileContent = static::getFileContent($data->ruta_txt);
                if (preg_match('/' . $pattern . '/' . ($ignoreCase ? 'i' : '') . 'm', $fileContent)) {
                    if (preg_match_all('/^.*(' . $patterns . ').*$/' . ($ignoreCase ? 'i' : '') . 'm', $fileContent, $matches)) {
                        $response[$data->codigo] = ['data' => $data, 'matches' => $matches];
                    }
                }
            }
        }
        if (isset($array)) $response = array_merge($array, $response);
        return $response;
    }

    private static function getFileContent($filePath)
    {
        $content = '';
        if (file_exists($filePath)) {
            try {
                $file = fopen($filePath, 'r');
                if (filesize($filePath) > 0) {
                    $content = utf8_encode(fread($file, filesize($filePath)));
                    $content = preg_replace('/[^' . static::$valid_characters . ']/im', '', $content);
                }
            } catch (Exception $e) {
            } finally {
                fclose($file);
            }
        }
        return $content;
    }
}
