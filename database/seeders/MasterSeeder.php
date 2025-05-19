<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;
use App\Models\Kro;
use App\Models\RincianOutput;
use App\Models\Komponen;
use App\Models\SubKomponen;
use App\Models\DetailSubKomponen;
use App\Models\RealisasiBulanan;
use App\Models\User;
use Spatie\Permission\Models\Role;

class MasterSeeder extends Seeder
{
    public function run()
    {
        // 1. Buat Role
        $roles = ['admin', 'Penanggung Jawab', 'Tim Evaluasi', 'Ketua Tim Kerja'];
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role, 'guard_name' => 'web']);
        }

        // 2. Buat User Penanggung Jawab
        $user = User::factory()->create([
            'name' => 'PJ 1',
            'email' => 'penanggungJaw@gmail.com',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('Penanggung Jawab');

        // 3. Buat Program
        $program = Program::create([
            'kode' => '018.09.IL',
            'nama_program' => 'Dukungan Manajemen',
            'total_anggaran' => '11000000000',
            'tahun_anggaran' => 2025,
        ]);

        $activity = Activity::create([
            'program_id' => $program->id,
            'kode' => '6918',
            'nama' => 'Dukungan Manajemen Fasilitasi Standardisasi Instrumen Pertanian',
            'anggaran' => 500000000,
        ]);

        // 4. Buat KRO
        $kro = Kro::create([
            'id' => $program->id,
            'activity_id' => $activity->id,
            'kode' => '6918.EBU',
            'nama_kro' => 'Layanan Dukungan Manajemen Internal',
             'satuan' => 'Layanan',
             'total_anggaran'=> 300000000,
            'volume' => 3,
        ]);

        // 5. Buat Rincian Output
        $ro = RincianOutput::create([
            'kro_id' => $kro->id,
            'kode' => '6918.EBA.956',
            'nama' => 'Layanan BMN',
            'volume' => 1,
            'satuan' => 'Layanan',
            'anggaran' => 150000000,
            'penanggung_jawab_id' => $user->id,
        ]);

        // 6. Komponen
        $komponen = Komponen::create([
            'rincian_output_id' => $ro->id,
            'kode' => '051',
            'nama' => 'Pelaksanaan Pengelolaan BMN',
            'anggaran' => 150000000,
        ]);

        // 7. Sub Komponen A
        $subA = SubKomponen::create([
            'komponen_id' => $komponen->id,
            'kode' => 'A',
            'nama' => 'Pengelolaan Barang Milik Negara',
            'anggaran' => 75000000,
        ]);

        // 8. Detail Sub Komponen A
        DetailSubKomponen::create([
            'sub_komponen_id' => $subA->id,
            'nama' => 'Percetakan, Penggandaan dan Penjilidan',
            'volume' => 1,
            'satuan' => 'KEG',
            'harga_satuan' => 50000000,
            'anggaran' => 50000000,
        ]);

        DetailSubKomponen::create([
            'sub_komponen_id' => $subA->id,
            'nama' => 'Belanja Barang Persediaan',
            'volume' => 1,
            'satuan' => 'KEG',
            'harga_satuan' => 25000000,
            'anggaran' => 25000000,
        ]);

        // 9. Realisasi Bulanan (Maret)
        RealisasiBulanan::create([
            'rincian_output_id' => $ro->id,
            'bulan' => 3,
            'tahun' => 2025,
            'realisasi_fisik' => 30,
            'realisasi_anggaran' => 50000000,
            'catatan' => 'Realisasi Maret 2025',
            'perubahan_anggaran' => 0,
        ]);
    }
}
