<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenis')->insert([
            [
                'kode' => '470',
                'name' => 'Surat Keterangan Domisili',
                'isi' => 'Bahwa yang bersangkutan benar merupakan penduduk yang berdomisili dan bertempat tinggal di wilayah kelurahan setempat sesuai dengan alamat yang tercantum tersebut di atas.

Berdasarkan data dan keterangan dari lingkungan setempat, yang bersangkutan tercatat sebagai warga aktif dan hingga surat keterangan ini diterbitkan tidak pernah berpindah domisili.

Surat keterangan ini dibuat untuk menerangkan domisili yang bersangkutan dan dapat dipergunakan sebagaimana mestinya.',
            ],
            [
                'kode' => '460',
                'name' => 'Surat Keterangan Tidak Mampu',
                'isi' => 'Bahwa yang bersangkutan benar merupakan warga kelurahan setempat dan berdasarkan data serta keterangan dari lingkungan setempat, yang bersangkutan berasal dari keluarga kurang mampu secara ekonomi.

Surat keterangan ini diberikan untuk keperluan administrasi bantuan sosial, pendidikan, kesehatan, maupun keperluan lain yang memerlukan keterangan tidak mampu.

Surat keterangan ini dibuat dengan sebenar-benarnya untuk dapat dipergunakan sebagaimana mestinya.',
            ],
            [
                'kode' => '503',
                'name' => 'Surat Keterangan Usaha',
                'isi' => 'Bahwa yang bersangkutan benar merupakan warga kelurahan setempat dan berdasarkan keterangan yang ada, yang bersangkutan memiliki serta menjalankan usaha secara mandiri dan aktif sebagaimana keterangan yang disampaikan.

Usaha tersebut masih berjalan hingga surat keterangan ini diterbitkan.

Surat keterangan ini dibuat sebagai persyaratan administrasi usaha dan dapat dipergunakan sebagaimana mestinya.',
            ],
            [
                'kode' => '470',
                'name' => 'Surat Keterangan Belum Menikah',
                'isi' => 'Bahwa yang bersangkutan benar merupakan warga kelurahan setempat dan berdasarkan data kependudukan serta keterangan dari lingkungan setempat, yang bersangkutan hingga saat surat keterangan ini diterbitkan berstatus belum menikah.

Surat keterangan ini dibuat untuk keperluan administrasi dan dapat dipergunakan sebagaimana mestinya.',
            ],
        ]);
    }
}
