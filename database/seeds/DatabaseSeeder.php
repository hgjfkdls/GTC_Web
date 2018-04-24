<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    const pattern_doc_contractuales = '/^(\d{8}) (RESOLUCION DGOP \d{4}(?: EXENTO)?|DECRETO SUPREMO(?: MOP)? \d{4}(?: EXENTO)?|PDO|CIRCULAR(?: \d{3}(?:-\d{3})*)?|BALI(?: \d{2})?(?: REFUNDIDA)?|ACTA(?: \d{3})?) (.+)(\.\w+)$/';

    private $param_190_correspondencia = [
        'id_obra' => 190,
        'root_folder' => 'C:/FTP/Compartida/Correspondencia/190',
        'doc_folder' => 'PDF',
        'txt_folder' => 'TXT',
        'sub_folders' => [
            'LDO' => [
                'from' => 'IF-SC',
                'to' => 'IF-SC',
                'pattern' => '/^(\d{8}) (LDO \d{3}) (.+)(\.\w+)$/'
            ],
            'ORD' => [
                'from' => 'IF',
                'to' => 'SC',
                'pattern' => '/^(\d{8}) (ORD \d{4} RDD \d{4}[A-Z]?) (.+)(\.\w+)$/'
            ],
            'GG_IF' => [
                'from' => 'SC',
                'to' => 'IF',
                'pattern' => '/^(\d{8}) (GG-IF-\d{4}[A-Z]?-\d{2}) (.+)(\.\w+)$/'
            ],
            'GG_SACYR' => [
                'from' => 'SC',
                'to' => 'CC',
                'pattern' => '/^(\d{8}) (GG-SACYR-\d{4}[A-Z]?-\d{2}) (.+)(\.\w+)$/'
            ],
            'SCH' => [
                'from' => 'CC',
                'to' => 'SC',
                'pattern' => '/^(\d{8}) (SCH-IQQ-\d{4}[A-Z]?-\d{2}) (.+)(\.\w+)$/'
            ],
        ],
    ];
    private $param_190_doc_contractuales = [
        'id_obra' => 190,
        'root_folder' => 'C:/FTP/Compartida/Documentos Contractuales/190',
        'doc_folder' => null,
        'txt_folder' => null,
        'sub_folders' => [
            '1. PROCESO DE LICITACION' => [
                'from' => 'IF-SC',
                'to' => 'IF-SC',
                'pattern' => self::pattern_doc_contractuales
            ],
            '2. PROCESO DE ADJUDICACION' => [
                'from' => 'IF-SC',
                'to' => 'IF-SC',
                'pattern' => self::pattern_doc_contractuales
            ],
            '3. PROCESO DE CONSTRUCCION' => [
                'from' => 'IF-SC',
                'to' => 'IF-SC',
                'pattern' => self::pattern_doc_contractuales
            ],
            '4. MODIFICACION DE OBRAS Y CONVENIOS' => [
                'from' => 'IF-SC',
                'to' => 'IF-SC',
                'pattern' => self::pattern_doc_contractuales
            ],
            '5. OTROS DECRETOS Y RESOLUCIONES' => [
                'from' => 'IF-SC',
                'to' => 'IF-SC',
                'pattern' => self::pattern_doc_contractuales
            ],
            '6. OTROS DOCUMENTOS' => [
                'from' => 'IF-SC',
                'to' => 'IF-SC',
                'pattern' => self::pattern_doc_contractuales
            ],
        ],
    ];

    private $param_230_correspondencia = [
        'id_obra' => 230,
        'root_folder' => 'C:/FTP/Compartida/Correspondencia/230',
        'doc_folder' => 'PDF',
        'txt_folder' => 'TXT',
        'sub_folders' => [
            'LDO' => [
                'from' => 'IF-SC',
                'to' => 'IF-SC',
                'pattern' => '/^(\d{8}) (LDO \d{3}) (.+)(\.\w+)$/'
            ],
            'ORD' => [
                'from' => 'IF',
                'to' => 'SC',
                'pattern' => '/^(\d{8}) (ORD \d{4} SCRA \d{4}[A-Z]?) (.+)(\.\w+)$/'
            ],
            'SCRDA_IF' => [
                'from' => 'SC',
                'to' => 'IF',
                'pattern' => '/^(\d{8}) (SCRDA-IF-\d{4}[A-Z]?-\d{2}) (.+)(\.\w+)$/'
            ],
            'SCRDA' => [
                'from' => 'SC',
                'to' => 'CC',
                'pattern' => '/^(\d{8}) (SCRDA-\d{4}[A-Z]?-\d{2}) (.+)(\.\w+)$/'
            ],
            'SCH' => [
                'from' => 'CC',
                'to' => 'SC',
                'pattern' => '/^(\d{8}) (SCH-CLSV-GC-\d{4}[A-Z]?-\d{2}) (.+)(\.\w+)$/'
            ],
        ],
    ];
    private $param_230_doc_contractuales = [
        'id_obra' => 230,
        'root_folder' => 'C:/FTP/Compartida/Documentos Contractuales/230',
        'doc_folder' => null,
        'txt_folder' => null,
        'sub_folders' => [
            '1. PROCESO DE LICITACION' => [
                'from' => 'IF-SC',
                'to' => 'IF-SC',
                'pattern' => self::pattern_doc_contractuales
            ],
            '2. PROCESO DE ADJUDICACION' => [
                'from' => 'IF-SC',
                'to' => 'IF-SC',
                'pattern' => self::pattern_doc_contractuales
            ],
            '3. PROCESO DE CONSTRUCCION' => [
                'from' => 'IF-SC',
                'to' => 'IF-SC',
                'pattern' => self::pattern_doc_contractuales
            ],
            '4. MODIFICACION DE OBRAS Y CONVENIOS' => [
                'from' => 'IF-SC',
                'to' => 'IF-SC',
                'pattern' => self::pattern_doc_contractuales
            ],
            '5. OTROS DECRETOS Y RESOLUCIONES' => [
                'from' => 'IF-SC',
                'to' => 'IF-SC',
                'pattern' => self::pattern_doc_contractuales
            ],
            '6. OTROS DOCUMENTOS' => [
                'from' => 'IF-SC',
                'to' => 'IF-SC',
                'pattern' => self::pattern_doc_contractuales
            ],
        ],
    ];

    private $param_260_correspondencia = [
        'id_obra' => 260,
        'root_folder' => 'C:/FTP/Compartida/Correspondencia/260',
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
            'SCRDL' => [
                'from' => 'SC',
                'to' => 'CC',
                'pattern' => '/^(\d{8}) (SCRDL-\d{4}[A-Z]?-\d{2}) (.+)(\.\w+)$/'
            ],
            'SCH' => [
                'from' => 'CC',
                'to' => 'SC',
                'pattern' => '/^(\d{8}) (SCH-CLSO-GC-\d{4}[A-Z]?-\d{2}) (.+)(\.\w+)$/'
            ],
        ],
    ];
    private $param_260_doc_contractuales = [
        'id_obra' => 260,
        'root_folder' => 'C:/FTP/Compartida/Documentos Contractuales/260',
        'doc_folder' => null,
        'txt_folder' => null,
        'sub_folders' => [
            '1. PROCESO DE LICITACION' => [
                'from' => 'IF-SC',
                'to' => 'IF-SC',
                'pattern' => self::pattern_doc_contractuales
            ],
            '2. PROCESO DE ADJUDICACION' => [
                'from' => 'IF-SC',
                'to' => 'IF-SC',
                'pattern' => self::pattern_doc_contractuales
            ],
            '3. PROCESO DE CONSTRUCCION' => [
                'from' => 'IF-SC',
                'to' => 'IF-SC',
                'pattern' => self::pattern_doc_contractuales
            ],
            '4. MODIFICACION DE OBRAS Y CONVENIOS' => [
                'from' => 'IF-SC',
                'to' => 'IF-SC',
                'pattern' => self::pattern_doc_contractuales
            ],
            '5. OTROS DECRETOS Y RESOLUCIONES' => [
                'from' => 'IF-SC',
                'to' => 'IF-SC',
                'pattern' => self::pattern_doc_contractuales
            ],
            '6. OTROS DOCUMENTOS' => [
                'from' => 'IF-SC',
                'to' => 'IF-SC',
                'pattern' => self::pattern_doc_contractuales
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
//        $this->call(UsersTableSeeder::class);
        echo "update: " . date("Y/m/d h:i:sa") . "\n";
        if (Schema::hasTable('correspondencia')) {
            DB::table('correspondencia')->truncate();
            $this->add($this->param_190_doc_contractuales);
            $this->add($this->param_190_correspondencia);
            $this->add($this->param_230_doc_contractuales);
            $this->add($this->param_230_correspondencia);
            $this->add($this->param_260_doc_contractuales);
            $this->add($this->param_260_correspondencia);
        }
    }

    /**
     * @param $param
     */
    private function add($param)
    {
        foreach (array_keys($param['sub_folders']) as $folder) {
            $this->add_dir(
                $param['root_folder'] . '/' . (is_null($param['doc_folder']) ? '' : $param['doc_folder'] . '/') . $folder,
                $param['root_folder'] . '/' . (is_null($param['txt_folder']) ? '' : $param['txt_folder'] . '/') . $folder,
                $param['id_obra'],
                $param['sub_folders'][$folder]['pattern'],
                $param['sub_folders'][$folder]['from'],
                $param['sub_folders'][$folder]['to']
            );
        }
    }

    /**
     * @param $doc_dir
     * @param $txt_dir
     * @param $id_obra
     * @param $pattern
     * @param $from
     * @param $to
     */
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
                            $ruta_doc = $doc_dir . '/' . preg_replace('/\\\/', '/', $archivo);
                            $ruta_txt = $txt_dir . '/' . basename($archivo, '.' . pathinfo($archivo, PATHINFO_EXTENSION)) . '.txt';

//                            $data = DB::table('correspondencia')->where('codigo', $matches[2]);
//                            if (count($data->get()) == 0) {
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
//                            } else {
//                                $data->update([
//                                    'fecha_emisor' => $fecha === 0 ? null : $fecha,
//                                    'fecha_receptor' => $fecha === 0 ? null : $fecha,
//                                    'id_obra' => $id_obra,
//                                    'emisor' => $from,
//                                    'receptor' => $to,
//                                    'nombre' => $matches[3],
//                                    'ruta_doc' => $ruta_doc,
//                                    'ruta_txt' => $ruta_txt,
//                                    'created_at' => date_create(),
//                                    'updated_at' => date_create(),
//                                ]);
//                            }

                            $file_ok++;
                        } else {
                            $file_error++;
                            echo "    - Error: pattern file -> " . $archivo . "\n";
                        }
                    } else {
                        //echo "  - Error: is directory -> " . $archivo . "\n";
                    }
                }
            } else {
                echo "    - Error: las rutas de archivo no existen.\n";
            }
        } else {
            echo "    - Error: la tabla correspondencia no existe en la DB.\n";
        }
        $total = $file_error + $file_ok;
        echo "  - $doc_dir -> Total: $total = Successful: $file_ok + Errors: $file_error\n";
    }
}
