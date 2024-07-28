<?php

namespace App\Imports;

use App\Models\Siswa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            $siswa = Siswa::where('nama', $row['nama'])->first();
            if ($siswa) {

                $siswa->update([
                    'alamat' => $row['alamat'],
                    'no_telpon' => $row['no_telpon'],
                    'jurusan_id' => $row['jurusan_id'],
                ]);

            } else {

                Siswa::create([
                    'nama' => $row['nama'],
                    'alamat' => $row['alamat'],
                    'no_telpon' => $row['no_telpon'],
                    'jurusan_id' => $row['jurusan_id']
                ]);
            }
        }
    }
}
