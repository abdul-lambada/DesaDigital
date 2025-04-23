<?php

namespace Database\Seeders;

use App\Models\Desa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Delete existing data safely
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Desa::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $desas = [
            [
                'nama_desa' => 'Desa Sukamaju',
                'kode_desa' => '3201012001',
                'kecamatan' => 'Sukamaju',
                'kabupaten' => 'Kabupaten Sukamaju',
                'provinsi' => 'Jawa Barat',
                'alamat' => 'Jl. Raya Sukamaju No. 123',
                'telepon' => '021-1234567',
                'email' => 'desa.sukamaju@example.com',
                'website' => 'www.sukamaju.desa.id',
                'logo' => 'logo-sukamaju.png',
                'foto_kantor' => 'kantor-sukamaju.jpg',
                'visi' => 'Mewujudkan Desa Sukamaju yang Mandiri, Sejahtera, dan Berbudaya',
                'misi' => '1. Meningkatkan kualitas sumber daya manusia
2. Mengembangkan potensi ekonomi lokal
3. Memperkuat tata kelola pemerintahan desa
4. Melestarikan budaya dan kearifan lokal',
                'sejarah' => 'Desa Sukamaju didirikan pada tahun 1950 dan telah mengalami berbagai perkembangan hingga saat ini.',
                'geografis' => 'Desa Sukamaju terletak di dataran rendah dengan ketinggian 100 mdpl, memiliki curah hujan sedang.',
                'demografis' => 'Mayoritas penduduk bekerja sebagai petani dan pedagang, dengan tingkat pendidikan yang terus meningkat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_desa' => 'Desa Mekarjaya',
                'kode_desa' => '3201012002',
                'kecamatan' => 'Mekarjaya',
                'kabupaten' => 'Kabupaten Mekarjaya',
                'provinsi' => 'Jawa Barat',
                'alamat' => 'Jl. Mekarjaya No. 45',
                'telepon' => '021-2345678',
                'email' => 'desa.mekarjaya@example.com',
                'website' => 'www.mekarjaya.desa.id',
                'logo' => 'logo-mekarjaya.png',
                'foto_kantor' => 'kantor-mekarjaya.jpg',
                'visi' => 'Mewujudkan Desa Mekarjaya yang Maju, Mandiri, dan Berdaya Saing',
                'misi' => '1. Mengembangkan potensi ekonomi kreatif
2. Meningkatkan kualitas pendidikan
3. Memperkuat infrastruktur desa
4. Mengembangkan pariwisata desa',
                'sejarah' => 'Desa Mekarjaya berdiri sejak tahun 1960 dan telah menjadi salah satu desa berkembang di wilayahnya.',
                'geografis' => 'Terletak di perbukitan dengan ketinggian 200 mdpl, memiliki pemandangan alam yang indah.',
                'demografis' => 'Penduduk beragam dengan mayoritas bekerja di sektor pertanian dan jasa.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_desa' => 'Desa Ciputat',
                'kode_desa' => '3201012003',
                'kecamatan' => 'Ciputat',
                'kabupaten' => 'Kabupaten Ciputat',
                'provinsi' => 'Jawa Barat',
                'alamat' => 'Jl. Ciputat Raya No. 67',
                'telepon' => '021-3456789',
                'email' => 'desa.ciputat@example.com',
                'website' => 'www.ciputat.desa.id',
                'logo' => 'logo-ciputat.png',
                'foto_kantor' => 'kantor-ciputat.jpg',
                'visi' => 'Mewujudkan Desa Ciputat yang Modern, Sejahtera, dan Berbudaya',
                'misi' => '1. Mengembangkan ekonomi digital
2. Meningkatkan kualitas kesehatan
3. Memperkuat kelembagaan desa
4. Melestarikan lingkungan hidup',
                'sejarah' => 'Desa Ciputat memiliki sejarah panjang sejak masa kolonial dan terus berkembang hingga kini.',
                'geografis' => 'Terletak di dataran rendah dengan akses transportasi yang baik.',
                'demografis' => 'Penduduk beragam dengan tingkat urbanisasi yang tinggi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_desa' => 'Desa Parung',
                'kode_desa' => '3201012004',
                'kecamatan' => 'Parung',
                'kabupaten' => 'Kabupaten Parung',
                'provinsi' => 'Jawa Barat',
                'alamat' => 'Jl. Parung Indah No. 89',
                'telepon' => '021-4567890',
                'email' => 'desa.parung@example.com',
                'website' => 'www.parung.desa.id',
                'logo' => 'logo-parung.png',
                'foto_kantor' => 'kantor-parung.jpg',
                'visi' => 'Mewujudkan Desa Parung yang Berdaya Saing dan Berkelanjutan',
                'misi' => '1. Mengembangkan ekonomi kreatif
2. Meningkatkan kualitas SDM
3. Memperkuat tata kelola desa
4. Mengembangkan wisata desa',
                'sejarah' => 'Desa Parung memiliki sejarah sebagai pusat perdagangan sejak zaman dahulu.',
                'geografis' => 'Terletak di dataran rendah dengan akses transportasi yang strategis.',
                'demografis' => 'Penduduk beragam dengan aktivitas ekonomi yang dinamis.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_desa' => 'Desa Sawangan',
                'kode_desa' => '3201012005',
                'kecamatan' => 'Sawangan',
                'kabupaten' => 'Kabupaten Sawangan',
                'provinsi' => 'Jawa Barat',
                'alamat' => 'Jl. Sawangan Baru No. 12',
                'telepon' => '021-5678901',
                'email' => 'desa.sawangan@example.com',
                'website' => 'www.sawangan.desa.id',
                'logo' => 'logo-sawangan.png',
                'foto_kantor' => 'kantor-sawangan.jpg',
                'visi' => 'Mewujudkan Desa Sawangan yang Mandiri dan Berbudaya',
                'misi' => '1. Mengembangkan potensi lokal
2. Meningkatkan kualitas pendidikan
3. Memperkuat kelembagaan desa
4. Melestarikan budaya lokal',
                'sejarah' => 'Desa Sawangan memiliki sejarah sebagai desa pertanian yang berkembang pesat.',
                'geografis' => 'Terletak di dataran rendah dengan lahan pertanian yang subur.',
                'demografis' => 'Mayoritas penduduk bekerja di sektor pertanian dan jasa.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data
        foreach ($desas as $desa) {
            Desa::create($desa);
        }
    }
}