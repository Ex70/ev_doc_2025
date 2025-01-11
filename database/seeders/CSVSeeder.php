<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Bom;
use League\Csv\CharsetConverter;
use League\Csv\Reader;

class CSVSeeder extends Seeder{
    public function run(): void{
        // $csv = Reader::createFromPath(database_path() . '/csv/datosMixto-01042025.csv', 'r');
        // $csv = Reader::createFromPath(database_path() . '/csv/ISC701.csv', 'r');
        // $csv = Reader::createFromPath(database_path() . '/csv/ISC501.csv', 'r');
        // $csv = Reader::createFromPath(database_path() . '/csv/ISC301.csv', 'r');
        // $csv = Reader::createFromPath(database_path() . '/csv/ISC101.csv', 'r');
        // $csv = Reader::createFromPath(database_path() . '/csv/IND701.csv', 'r');
        // $csv = Reader::createFromPath(database_path() . '/csv/IND301.csv', 'r');
        // $csv = Reader::createFromPath(database_path() . '/csv/IME701.csv', 'r');
        // $csv = Reader::createFromPath(database_path() . '/csv/IME301.csv', 'r');
        // $csv = Reader::createFromPath(database_path() . '/csv/IME101.csv', 'r');
        // $csv = Reader::createFromPath(database_path() . '/csv/ARQ901.csv', 'r');
        // $csv = Reader::createFromPath(database_path() . '/csv/ARQ501.csv', 'r');
        // $csv = Reader::createFromPath(database_path() . '/csv/ARQ301.csv', 'r');
        // $csv = Reader::createFromPath(database_path() . '/csv/ARQ101.csv', 'r');
        // MIXTOS
        // $csv = Reader::createFromPath(database_path() . '/csv/ARQ102A.csv', 'r');
        // $csv = Reader::createFromPath(database_path() . '/csv/ARQ102B.csv', 'r');
        // $csv = Reader::createFromPath(database_path() . '/csv/ARQ302B.csv', 'r');
        // $csv = Reader::createFromPath(database_path() . '/csv/ARQ502.csv', 'r');
        // $csv = Reader::createFromPath(database_path() . '/csv/ARQ702.csv', 'r');
        // $csv = Reader::createFromPath(database_path() . '/csv/ARQ902.csv', 'r');
        // $csv = Reader::createFromPath(database_path() . '/csv/ISC102.csv', 'r');
        // $csv = Reader::createFromPath(database_path() . '/csv/ISC302.csv', 'r');
        // $csv = Reader::createFromPath(database_path() . '/csv/ISC502.csv', 'r');
        // $csv = Reader::createFromPath(database_path() . '/csv/ISC702.csv', 'r');
        $csv = Reader::createFromPath(database_path() . '/csv/ISC902.csv', 'r');
        $csv->setHeaderOffset(0);
        $csv->setDelimiter(';');
        $csv->setEscape('');
        // $csv->setOutputBOM(Bom::Utf8);
        // $inputBom = Bom::tryFrom($csv->getInputBOM());
        $inputBom = Bom::tryFrom($csv->getInputBOM());
        if ($inputBom instanceof Bom && !$inputBom->isUtf8()) {
            CharsetConverter::addTo($csv, $inputBom->encoding(), Bom::Utf8->encoding());
        }

        foreach ($csv as $record) {
            DB::table('cuestionarios')->insert([
                'marca_temporal' => $record['marca_temporal'],
                'correo' => $record['correo'],
                'docente' => utf8_encode($record['docente']),
                'pregunta1' => $record['pregunta1'],
                'pregunta2' => $record['pregunta2'],
                'pregunta3' => $record['pregunta3'],
                'pregunta4' => $record['pregunta4'],
                'pregunta5' => $record['pregunta5'],
                'pregunta6' => $record['pregunta6'],
                'pregunta7' => $record['pregunta7'],
                'pregunta8' => $record['pregunta8'],
                'pregunta9' => $record['pregunta9'],
                'pregunta10' => $record['pregunta10'],
                'pregunta11' => $record['pregunta11'],
                'pregunta12' => utf8_encode($record['pregunta12'])
            ]);
        }
    }
}
