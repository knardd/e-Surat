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
                'slug' => 'surat-keterangan-domisili',
                'kode' => '470',
                'name' => 'Surat Keterangan Domisili',
                'isi' => 'Bahwa yang bersangkutan benar merupakan penduduk yang berdomisili dan bertempat tinggal di wilayah kelurahan setempat sesuai dengan alamat yang tercantum tersebut di atas. Berdasarkan data dan keterangan dari lingkungan setempat, yang bersangkutan tercatat sebagai warga aktif dan hingga surat keterangan ini diterbitkan tidak pernah berpindah domisili. Surat keterangan ini dibuat untuk menerangkan domisili yang bersangkutan dan dapat dipergunakan sebagaimana mestinya.',
            ],
            [
                'slug' => 'surat-keterangan-tidak-mampu',
                'kode' => '460',
                'name' => 'Surat Keterangan Tidak Mampu',
                'isi' => 'Bahwa yang bersangkutan benar merupakan warga kelurahan setempat dan berdasarkan data serta keterangan dari lingkungan setempat, yang bersangkutan berasal dari keluarga kurang mampu secara ekonomi. Surat keterangan ini diberikan untuk keperluan administrasi bantuan sosial, pendidikan, kesehatan, maupun keperluan lain yang memerlukan keterangan tidak mampu.',
            ],
            [
                'slug' => 'surat-keterangan-usaha',
                'kode' => '503',
                'name' => 'Surat Keterangan Usaha',
                'isi' => 'Bahwa yang bersangkutan benar merupakan warga kelurahan setempat dan berdasarkan keterangan yang ada, yang bersangkutan memiliki serta menjalankan usaha secara mandiri dan aktif sebagaimana keterangan yang disampaikan. Usaha tersebut masih berjalan hingga surat keterangan ini diterbitkan.',
            ],
            [
                'slug' => 'surat-keterangan-belum-menikah',
                'kode' => '470',
                'name' => 'Surat Keterangan Belum Menikah',
                'isi' => 'Bahwa yang bersangkutan benar merupakan warga kelurahan setempat dan berdasarkan data kependudukan serta keterangan dari lingkungan setempat, yang bersangkutan hingga saat surat keterangan ini diterbitkan berstatus belum menikah.',
            ],
            [
                'slug' => 'surat-keterangan-pengantar',
                'kode' => '470',
                'name' => 'Surat Keterangan Pengantar',
                'isi' => 'Bahwa yang bersangkutan benar merupakan warga kelurahan setempat sebagaimana tercatat dalam data kependudukan dan berdomisili di wilayah administrasi kelurahan ini. Surat keterangan pengantar ini dibuat sebagai surat pengantar resmi dari kelurahan untuk keperluan administrasi lanjutan pada instansi atau lembaga yang dituju. Berdasarkan data serta keterangan dari lingkungan setempat, yang bersangkutan merupakan warga yang tercatat aktif dan berkelakuan baik di lingkungan tempat tinggalnya.',
            ],
            [
                'slug' => 'surat-keterangan-keluarga',
                'kode' => '471',
                'name' => 'Surat Keterangan Keluarga',
                'isi' => 'Bahwa yang bersangkutan benar merupakan warga kelurahan setempat dan tercatat sebagai bagian dari suatu keluarga sebagaimana tercantum dalam data kependudukan yang berlaku. Keterangan ini diberikan berdasarkan data kependudukan serta hasil konfirmasi dari lingkungan setempat mengenai susunan dan status keluarga yang bersangkutan. Surat keterangan keluarga ini dibuat untuk keperluan administrasi kependudukan, pendidikan, kesehatan, maupun keperluan lain yang memerlukan keterangan mengenai status keluarga.',
            ],
            [
                'slug' => 'surat-keterangan-kematian',
                'kode' => '474',
                'name' => 'Surat Keterangan Kematian',
                'isi' => 'Bahwa berdasarkan laporan dari pihak keluarga serta keterangan dari lingkungan setempat, benar telah meninggal dunia seorang warga kelurahan setempat sebagaimana data yang tercatat dalam administrasi kependudukan. Peristiwa meninggal dunia tersebut telah dikonfirmasi oleh pihak terkait dan dicatat dalam administrasi kelurahan sesuai ketentuan yang berlaku. Surat keterangan kematian ini dibuat untuk keperluan administrasi kependudukan, pengurusan akta kematian, perubahan data keluarga, maupun keperluan lain yang memerlukan keterangan resmi.',
            ],
            [
                'slug' => 'surat-keterangan-kelahiran',
                'kode' => '472',
                'name' => 'Surat Keterangan Kelahiran',
                'isi' => 'Bahwa berdasarkan laporan dari orang tua serta keterangan dari lingkungan setempat, benar telah lahir seorang anak sebagaimana data yang tercatat dalam administrasi kependudukan. Keterangan kelahiran ini diberikan berdasarkan data yang disampaikan dan hasil pencatatan oleh pihak kelurahan sesuai dengan ketentuan yang berlaku. Surat keterangan kelahiran ini dibuat sebagai persyaratan pengurusan administrasi kependudukan, akta kelahiran, maupun keperluan lain yang memerlukan keterangan kelahiran.',
            ],
            [
                'slug' => 'surat-keterangan-berkelakuan-baik',
                'kode' => '470',
                'name' => 'Surat Keterangan Berkelakuan Baik',
                'isi' => 'Bahwa yang bersangkutan benar merupakan warga kelurahan setempat dan berdasarkan data serta keterangan dari lingkungan setempat, yang bersangkutan dikenal berkelakuan baik dan tidak pernah terlibat perbuatan yang melanggar hukum maupun norma yang berlaku di masyarakat. Keterangan ini diberikan berdasarkan hasil pengamatan serta informasi dari Ketua RT dan RW setempat. Surat keterangan berkelakuan baik ini dibuat untuk keperluan administrasi pekerjaan, pendidikan, maupun keperluan lain yang memerlukan keterangan berkelakuan baik.',
            ],
            [
                'slug' => 'surat-keterangan-kepemilikan-rumah',
                'kode' => '593',
                'name' => 'Surat Keterangan Kepemilikan Rumah',
                'isi' => 'Bahwa yang bersangkutan benar merupakan warga kelurahan setempat dan berdasarkan data serta keterangan dari lingkungan setempat, yang bersangkutan memiliki atau menempati sebuah rumah/tanah yang berlokasi di {alamat_rumah} dengan luas tanah {luas_tanah} m² dan luas bangunan {luas_bangunan} m². Keterangan kepemilikan rumah/tanah ini diberikan berdasarkan pernyataan yang bersangkutan serta hasil konfirmasi dari lingkungan setempat. Surat keterangan kepemilikan rumah/tanah ini dibuat untuk keperluan administrasi, pengurusan dokumen, maupun keperluan lain yang memerlukan keterangan kepemilikan rumah/tanah.',
            ],
        ]);
    }
}