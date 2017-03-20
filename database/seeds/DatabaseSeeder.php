<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private $param_260 = [
        'id_obra' => 260,
        'root_folder' => 'C:/FTP/Public/260',
        'doc_folder' => 'PDF',
        'txt_folder' => 'TXT',
        'sub_folders' => [
            'LDO' => [
                'from' => 'IF-SC',
                'to' => 'IF-SC',
                'pattern' => '/^(\d{8}) (LDO \d{2} F \d{2}-\d{2}) (.+)(\.\w+)$/',
            ],
            'ORD' => [
                'from' => 'IF',
                'to' => 'SC',
                'pattern' => '/^(\d{8}) (ORD \d{4} SCRL \d{4}) (.+)(\.\w+)$/'
            ],
            'SCRDL_IF' => [
                'from' => 'SC',
                'to' => 'IF',
                'pattern' => '/^(\d{8}) (SCRDL-IF-\d{4}[A-Z]?-\d{2}) (.+)(\.\w+)$/'
            ],
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        if (Schema::hasTable('correspondencia')) {
            DB::table('correspondencia')->delete();
            $this->add($this->param_260);
        }
    }

    private function add($param)
    {
        foreach (array_keys($param['sub_folders']) as $folder) {
            $this->add_dir(
                $param['root_folder'] . '/' . $param['doc_folder'] . '/' . $folder,
                $param['root_folder'] . '/' . $param['txt_folder'] . '/' . $folder,
                $param['id_obra'],
                $param['sub_folders'][$folder]['pattern'],
                $param['sub_folders'][$folder]['from'],
                $param['sub_folders'][$folder]['to']
            );
        }
    }

    private function add_dir($doc_dir, $txt_dir, $id_obra, $pattern, $from, $to)
    {
        $file_ok = 0;
        $file_error = 0;
        if (Schema::hasTable('correspondencia')) {
            if (file_exists($doc_dir) || file_exists($txt_dir)) {
                $directorio = opendir($doc_dir);
                while ($archivo = readdir($directorio)) {
                    if (!is_dir($archivo)) {
                        $match = preg_match($pattern, $archivo, $matches);
                        if ($match) {
                            $fecha = date_create_from_format('!Ymd', $matches[1]);
                            $ruta_doc = $doc_dir . '\\' . $archivo;
                            $ruta_txt = $txt_dir . '\\' . basename($archivo, '.' . pathinfo($archivo, PATHINFO_EXTENSION)) . '.txt';
                            DB::table('correspondencia')->insert(
                                [
                                    'fecha_emisor' => $fecha === 0 ? null : $fecha,
                                    'fecha_receptor' => $fecha === 0 ? null : $fecha,
                                    'id_obra' => $id_obra,
                                    'codigo' => $matches[2],
                                    'emisor' => $from,
                                    'receptor' => $to,
                                    'nombre' => $matches[3],
                                    'ruta_doc' => $ruta_doc,
                                    'ruta_txt' => $ruta_txt,
                                    'created_at' => date_create(),
                                    'updated_at' => date_create(),
                                ]
                            );
                            $file_ok++;
                        } else {
                            $file_error++;
                            echo "  - Error: pattern file -> " . $archivo . "\n";
                        }
                    } else {
                        //echo "  - Error: is directory -> " . $archivo . "\n";
                    }
                }
            } else {
                echo "  - Error: las rutas de archivo no existen.";
            }
        } else {
            echo "  - Error: la tabla correspondencia no existe en la DB.";
        }
        $total = $file_error + $file_ok;
        echo "  - $doc_dir -> Total: $total = Successful: $file_ok + Errors: $file_error\n";
    }
}
