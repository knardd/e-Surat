<?php

namespace Database\Seeders;

use App\Models\Jenis;
use App\Models\Surat;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenisIds = Jenis::pluck('id')->toArray();

        if (empty($jenisIds)) {
            $this->command->info('Tabel jenis kosong!');
            return;
        }

        for ($i = 1; $i <= 200; $i++) {

            $tanggal = Carbon::createFromTimestamp(
                rand(
                    strtotime('2026-01-01'),
                    strtotime('2026-12-31')
                )
            );

            $noUrut = rand(1, 999);

            Surat::create([
                'jenis_id' => $jenisIds[array_rand($jenisIds)],
                'no_surat' => '470/' . str_pad($noUrut, 3, '0', STR_PAD_LEFT) . '/' . $tanggal->format('m') . '/' . $tanggal->format('Y'),
                'tanggal_surat' => $tanggal,
                'no_urut' => $noUrut,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
