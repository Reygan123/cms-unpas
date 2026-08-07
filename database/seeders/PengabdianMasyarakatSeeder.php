<?php

namespace Database\Seeders;

use App\Models\Departement;
use App\Models\PengabdianMasyarakat;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PengabdianMasyarakatSeeder extends Seeder
{
    private function parseIndonesianDate(string $value): string
    {
        $bulan = [
            'Januari' => '01', 'Februari' => '02', 'Maret' => '03', 'April' => '04',
            'Mei' => '05', 'Juni' => '06', 'Juli' => '07', 'Agustus' => '08',
            'September' => '09', 'Oktober' => '10', 'November' => '11', 'Desember' => '12',
        ];

        $value = str_replace(array_keys($bulan), array_values($bulan), $value);

        return Carbon::createFromFormat('d m Y', $value)->format('Y-m-d');
    }

    public function run(): void
    {
        $items = [
            [
                'judul' => 'Kerja Sama Pengembangan Sorgum sebagai Ikon Unggulan Desa Beber',
                'kategori' => 'Pemberdayaan Ekonomi',
                'lokasi' => 'Desa Beber, Kecamatan Beber, Kabupaten Cirebon',
                'tanggal' => '21 Juli 2026',
                'deskripsi' => 'Fakultas Teknik UNPAS menjalin kerja sama resmi dengan Pemerintah Desa Beber melalui penandatanganan Perjanjian Kerja Sama, dengan fokus mengembangkan sorgum sebagai komoditas unggulan sekaligus penggerak ekonomi desa. Tim lintas bidang keilmuan memberikan pendampingan mulai dari budidaya, pengelolaan sumber daya air dan lingkungan, pengolahan hasil, digitalisasi tata kelola, hingga branding dan pemasaran, bekerja sama dengan Kelompok Tani Sorgum Silihwangi dan didukung rencana pelibatan BUMDes ke depannya.',
                'gambar' => 'https://img.jabartandang.com/2026/07/IMG-20260721-WA0077.jpg',
                'dosen_penanggung_jawab' => [
                    'Prof. Dr. Ir. Wisnu Cahyadi, M.Si.',
                    'Dr. Ayi Purbasari, S.T., M.T.',
                    'Dr. Ir. Riza Fathoni Ishak, M.T.',
                    'Prof. Dr. Yonik M. Yustiani, S.T., M.T.',
                    'Nabila Marthia, S.T., M.S.IP.',
                ],
                'prodi' => [
                    'Teknologi Pangan',
                    'Teknik Lingkungan',
                    'Teknik Informatika',
                    'Teknik Industri',
                ],
                'sumber' => 'https://jabartandang.com/2026/07/21/fakultas-teknik-unpas-dan-pemerintah-desa-beber-resmi-jalin-kerja-sama-sorgum-diproyeksikan-jadi-ikon-unggulan-desa/',
                'status' => 'published',
            ],
            [
                'judul' => 'Sosialiasi SMK fast Track Sarjana Teknik FT Unpas dan Aplikasi KUNCI sistem mutu sekolah, Sekolah SMK Swasta Kab Karawang, di Hotel Brits Karawang tgl 5 Agustus 2026',
                'kategori' => 'Pendidikan',
                'lokasi' => 'Hotel Brits Karawang, Kabupaten Karawang',
                'tanggal' => '5 Agustus 2026',
                'deskripsi' => 'Fakultas Teknik UNPAS menyelenggarakan kegiatan sosialisasi program SMK Fast Track Sarjana Teknik serta pengenalan Aplikasi KUNCI untuk sistem manajemen mutu sekolah. Acara ini ditujukan bagi sekolah-sekolah SMK Swasta di Kabupaten Karawang sebagai upaya meningkatkan kualitas tata kelola pendidikan dan percepatan studi ke jenjang perguruan tinggi.',
                'gambar' => 'pengabdian-image/sosialisasi.webp',
                'dosen_penanggung_jawab' => [
                    'Dr. Ir. H. Jaja Suteja, M.T., IPU',
                    'Dr. Ayi Purbasari, S.T., M.T.',
                    'Dr. Ir. Riza Fathoni Ishak, M.T.',
                ],
                'prodi' => [
                    'Teknik Informatika',
                    'Teknik Industri',
                ],
                'sumber' => null,
                'status' => 'published',
            ],
        ];

        foreach ($items as $item) {
            $prodiNames = $item['prodi'];
            unset($item['prodi']);

            $item['slug'] = Str::slug($item['judul']).'-'.Str::random(6);
            $item['tanggal'] = $this->parseIndonesianDate($item['tanggal']);

            $pengabdian = PengabdianMasyarakat::create($item);

            $departementIds = collect($prodiNames)
                ->map(function ($nama) {
                    return Departement::where('name', 'like', "%{$nama}%")->value('id');
                })
                ->filter()
                ->unique()
                ->values()
                ->all();

            $pengabdian->departements()->sync($departementIds);

            $this->command->info("Pengabdian '{$pengabdian->judul}' tersimpan, terhubung ke ".count($departementIds).' prodi.');
        }
    }
}