<?php

namespace Database\Seeders;

use App\Models\StudyMode;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StudyModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modes = [
            [
                'nama' => 'Reguler',
                'ringkasan' => 'Program perkuliahan standar dengan tatap muka secara penuh di kampus.',
                'deskripsi' => 'Perkuliahan Reguler dilaksanakan sepenuhnya secara tatap muka di kampus dengan jadwal yang terstruktur pada hari kerja.',
                'karakteristik' => 'Tatap muka penuh, jadwal terstruktur, interaksi langsung dengan dosen dan sesama mahasiswa.',
                'bentuk_pembelajaran' => 'Kuliah tatap muka, praktikum laboratorium, diskusi kelas, dan tugas kelompok.',
                'keunggulan' => "1. Interaksi langsung dengan dosen.\n2. Fasilitas laboratorium lengkap.\n3. Jaringan akademik yang kuat.\n4. Pembimbingan akademik terstruktur.",
                'persyaratan' => 'Lulusan SMA/SMK/MA sederajat, lulus jalur seleksi penerimaan mahasiswa baru.',
                'kebutuhan_mahasiswa' => 'Kehadiran fisik di kampus sesuai jadwal perkuliahan.',
                'mekanisme' => '1. Pendaftaran secara online.\n2. Mengikuti ujian seleksi masuk.\n3. Pengumuman kelulusan dan registrasi ulang.\n4. Mengikuti orientasi kampus.',
                'hasil_pendidikan' => 'Gelar Sarjana sesuai program studi dengan kompetensi akademik dan praktik yang terstandar.',
                'durasi' => '8 Semester',
                'image' => null,
                'urutan' => 1,
            ],
            [
                'nama' => 'Hybrid',
                'ringkasan' => 'Kombinasi antara perkuliahan tatap muka (offline) dan pembelajaran daring (online).',
                'deskripsi' => 'Perkuliahan Hybrid memadukan sesi tatap muka di kampus dengan pembelajaran daring melalui platform digital secara fleksibel.',
                'karakteristik' => 'Fleksibel, kombinasi tatap muka dan daring, didukung teknologi pembelajaran modern.',
                'bentuk_pembelajaran' => 'Kuliah tatap muka terjadwal, kelas daring melalui LMS, diskusi online dan offline.',
                'keunggulan' => "1. Akses materi digital 24/7.\n2. Diskusi online & offline.\n3. Teknologi pembelajaran modern.",
                'persyaratan' => 'Lulusan SMA/SMK/MA sederajat, memiliki perangkat dan akses internet yang memadai.',
                'kebutuhan_mahasiswa' => 'Laptop/smartphone, koneksi internet stabil, akses ke platform LMS kampus.',
                'mekanisme' => '1. Pendaftaran secara online.\n2. Mengikuti ujian seleksi masuk.\n3. Pengumuman kelulusan dan registrasi ulang.\n4. Orientasi penggunaan platform pembelajaran daring.',
                'hasil_pendidikan' => 'Gelar Sarjana sesuai program studi dengan kompetensi akademik yang setara program reguler.',
                'durasi' => '8 Semester',
                'image' => null,
                'urutan' => 2,
            ],
            [
                'nama' => 'PJJ (Pendidikan Jarak Jauh)',
                'ringkasan' => 'Program perkuliahan yang sepenuhnya dilakukan secara daring (online) menggunakan sistem e-learning.',
                'deskripsi' => 'Perkuliahan PJJ dirancang bagi mahasiswa yang membutuhkan fleksibilitas penuh, dengan seluruh proses belajar dilakukan secara daring.',
                'karakteristik' => 'Sepenuhnya daring, fleksibel waktu dan tempat, mengandalkan sistem e-learning.',
                'bentuk_pembelajaran' => 'Kelas daring melalui LMS, video conference, materi rekaman, dan forum diskusi online.',
                'keunggulan' => "1. Belajar dari mana saja.\n2. Cocok untuk mahasiswa pekerja.\n3. Materi & rekaman kelas lengkap.\n4. Ekonomis & fleksibel biaya.",
                'persyaratan' => 'Lulusan SMA/SMK/MA sederajat, memiliki perangkat dan koneksi internet yang stabil.',
                'kebutuhan_mahasiswa' => 'Laptop/smartphone, koneksi internet stabil, akses ke platform e-learning kampus.',
                'mekanisme' => '1. Pendaftaran secara online.\n2. Mengikuti ujian seleksi masuk online.\n3. Pengumuman kelulusan dan registrasi ulang.\n4. Orientasi sistem PJJ.',
                'hasil_pendidikan' => 'Gelar Sarjana sesuai program studi dengan kompetensi akademik yang terverifikasi.',
                'durasi' => '8 Semester',
                'image' => null,
                'urutan' => 3,
            ],
            [
                'nama' => 'Fast-Track',
                'ringkasan' => 'Program akselerasi berprestasi untuk menyelesaikan program S1 dan S2 dalam waktu yang lebih singkat.',
                'deskripsi' => 'Program Fast-Track memungkinkan mahasiswa berprestasi mengambil sejumlah mata kuliah magister sejak masa sarjana untuk mempercepat masa studi.',
                'karakteristik' => 'Akselerasi, terintegrasi S1-S2, khusus mahasiswa berprestasi.',
                'bentuk_pembelajaran' => 'Kuliah tatap muka/hybrid, pembimbingan intensif, riset lanjutan.',
                'keunggulan' => "1. Lulus S1/S2 lebih cepat.\n2. Pembimbingan berkelanjutan.\n3. Peluang riset lebih awal.",
                'persyaratan' => 'Mahasiswa aktif dengan IPK memenuhi syarat minimum, lolos seleksi program Fast-Track.',
                'kebutuhan_mahasiswa' => 'Komitmen waktu dan akademik yang tinggi, kesiapan mengambil beban studi tambahan.',
                'mekanisme' => '1. Pengajuan seleksi internal program Fast-Track.\n2. Evaluasi akademik dan wawancara.\n3. Penetapan peserta program.\n4. Penyusunan rencana studi gabungan S1-S2.',
                'hasil_pendidikan' => 'Gelar Sarjana dan Magister dengan masa studi yang lebih efisien.',
                'durasi' => '10 Semester (S1+S2)',
                'image' => null,
                'urutan' => 4,
            ],
            [
                'nama' => 'Kelas Karyawan / Eksekutif',
                'ringkasan' => 'Program perkuliahan yang disesuaikan dengan waktu pekerja, biasanya di malam hari atau akhir pekan.',
                'deskripsi' => 'Kelas Karyawan/Eksekutif dirancang bagi mahasiswa yang telah bekerja, dengan jadwal perkuliahan di luar jam kerja.',
                'karakteristik' => 'Jadwal malam hari atau akhir pekan, berorientasi pada profesional yang bekerja.',
                'bentuk_pembelajaran' => 'Kuliah tatap muka pada malam hari/akhir pekan, studi kasus berbasis pengalaman kerja.',
                'keunggulan' => "1. Jadwal fleksibel untuk pekerja.\n2. Studi kasus relevan dengan dunia kerja.\n3. Jaringan profesional yang luas.",
                'persyaratan' => 'Lulusan SMA/SMK/MA sederajat, diutamakan telah/sedang bekerja.',
                'kebutuhan_mahasiswa' => 'Kesiapan mengikuti perkuliahan di luar jam kerja reguler.',
                'mekanisme' => '1. Pendaftaran secara online.\n2. Mengikuti ujian seleksi masuk.\n3. Pengumuman kelulusan dan registrasi ulang.\n4. Penyesuaian jadwal perkuliahan.',
                'hasil_pendidikan' => 'Gelar Sarjana sesuai program studi dengan kompetensi akademik yang relevan dengan dunia kerja.',
                'durasi' => '8 Semester',
                'image' => null,
                'urutan' => 5,
            ],
        ];

        foreach ($modes as $mode) {
            $mode['slug'] = Str::slug($mode['nama']);
            StudyMode::updateOrCreate(['slug' => $mode['slug']], $mode);
        }
    }
}