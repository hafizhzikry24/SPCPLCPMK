<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mata_kuliah;

class MataKuliahSeeder extends seeder
{
    public function run()
    {
        Mata_kuliah::create(['kode_MK' => 'PTSK6103', 'Mata_Kuliah' => 'Dasar Komputer & Pemrograman', 'semester' => '1', 'SKS' => 2]);
        Mata_kuliah::create(['kode_MK' => 'PTSK6104', 'Mata_Kuliah' => 'Teknologi Informasi', 'semester' => '1', 'SKS' => 2]);
        Mata_kuliah::create(['kode_MK' => 'PTSK6105', 'Mata_Kuliah' => 'Kalkulus', 'semester' => '1', 'SKS' => 4]);
        Mata_kuliah::create(['kode_MK' => 'PTSK6106', 'Mata_Kuliah' => 'Fisika Dasar 1', 'semester' => '1', 'SKS' => 3]);
        Mata_kuliah::create(['kode_MK' => 'UUW00003', 'Mata_Kuliah' => 'Pancasila & Kewarganegaraan', 'semester' => '1', 'SKS' => 3]);
        Mata_kuliah::create(['kode_MK' => 'UUW00004', 'Mata_Kuliah' => 'Bahasa Indonesia', 'semester' => '1', 'SKS' => 2]);
        Mata_kuliah::create(['kode_MK' => 'UUW00007', 'Mata_Kuliah' => 'Bahasa Inggris', 'semester' => '1', 'SKS' => 2]);
        Mata_kuliah::create(['kode_MK' => 'UUW00011', 'Mata_Kuliah' => 'Pendidikan Agama', 'semester' => '1', 'SKS' => 2]);

        Mata_kuliah::create(['kode_MK' => 'PTSK6201', 'Mata_Kuliah' => 'Praktikum Fisika Dasar I', 'semester' => '2', 'SKS' => 1]);
        Mata_kuliah::create(['kode_MK' => 'PTSK6202', 'Mata_Kuliah' => 'Praktikum Dasar Komputer dan Pemrograman', 'semester' => '2', 'SKS' => 1]);
        Mata_kuliah::create(['kode_MK' => 'PTSK6206', 'Mata_Kuliah' => 'Elektronika Dasar', 'semester' => '2', 'SKS' => 3]);
        Mata_kuliah::create(['kode_MK' => 'PTSK6208', 'Mata_Kuliah' => 'Algoritma & Pemrograman', 'semester' => '2', 'SKS' => 2]);
        Mata_kuliah::create(['kode_MK' => 'PTSK6210', 'Mata_Kuliah' => 'Aljabar Linear', 'semester' => '2', 'SKS' => 4]);
        Mata_kuliah::create(['kode_MK' => 'PTSK6211', 'Mata_Kuliah' => 'Matematika Teknik', 'semester' => '2', 'SKS' => 4]);
        Mata_kuliah::create(['kode_MK' => 'PTSK6212', 'Mata_Kuliah' => 'Fisika Dasar II', 'semester' => '2', 'SKS' => 3]);
        Mata_kuliah::create(['kode_MK' => 'PTSK6213', 'Mata_Kuliah' => 'Kimia', 'semester' => '2', 'SKS' => 4]);

        // Mata_kuliah::create(['kode_MK' => 'PTSK6209', 'Mata_Kuliah' => 'Pengenalan Jaringan Komputer', 'semester' => '3', 'SKS' => 3]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6301', 'Mata_Kuliah' => 'Praktikum Fisika Dasar II', 'semester' => '3', 'SKS' => 1]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6302', 'Mata_Kuliah' => 'Praktikum Elektronika Dasar', 'semester' => '3', 'SKS' => 1]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6305', 'Mata_Kuliah' => 'Sistem Digital', 'semester' => '3', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6306', 'Mata_Kuliah' => 'Struktur Data', 'semester' => '3', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6307', 'Mata_Kuliah' => 'Transduser Dan Sensor', 'semester' => '3', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6308', 'Mata_Kuliah' => 'Rekayasa Perangkat Lunak', 'semester' => '3', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6310', 'Mata_Kuliah' => 'Organisasi dan Arsitektur Komputer', 'semester' => '3', 'SKS' => 3]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6311', 'Mata_Kuliah' => 'Probabilitas dan Statistik', 'semester' => '3', 'SKS' => 3]);
        // Mata_kuliah::create(['kode_MK' => 'UUW00005', 'Mata_Kuliah' => 'Olahraga', 'semester' => '3', 'SKS' => 1]);
        // Mata_kuliah::create(['kode_MK' => 'UUW00006', 'Mata_Kuliah' => 'Internet of Things (IoT)', 'semester' => '3', 'SKS' => 2]);

        // Mata_kuliah::create(['kode_MK' => 'PTSK6303', 'Mata_Kuliah' => 'Praktikum Pengenalan Jaringan Komputer', 'semester' => '4', 'SKS' => 1]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6309', 'Mata_Kuliah' => 'Switching, Routing dan Jaringan Nirkabel', 'semester' => '4', 'SKS' => 3]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6401', 'Mata_Kuliah' => 'Praktikum Sistem Digital', 'semester' => '4', 'SKS' => 1]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6402', 'Mata_Kuliah' => 'Praktikum Rekayasa Perangkat Lunak', 'semester' => '4', 'SKS' => 1]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6405', 'Mata_Kuliah' => 'Multimedia', 'semester' => '4', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6407', 'Mata_Kuliah' => 'Sistem Basis Data', 'semester' => '4', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6408', 'Mata_Kuliah' => 'Sistem Operasi', 'semester' => '4', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6409', 'Mata_Kuliah' => 'Pemrograman Perangkat Bergerak', 'semester' => '4', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6410', 'Mata_Kuliah' => 'Sistem Tertanam', 'semester' => '4', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6412', 'Mata_Kuliah' => 'Metode Numerik', 'semester' => '4', 'SKS' => 3]);

        // Mata_kuliah::create(['kode_MK' => 'PTSK6502', 'Mata_Kuliah' => 'Metodologi Penelitian', 'semester' => '5', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6403', 'Mata_Kuliah' => 'Praktikum Switching, Routing dan Jaringan Nirkabel', 'semester' => '5', 'SKS' => 1]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6503', 'Mata_Kuliah' => 'Praktikum Pemrograman Perangkat Bergerak', 'semester' => '5', 'SKS' => 1]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6504', 'Mata_Kuliah' => 'Praktikum Sistem Basis Data', 'semester' => '5', 'SKS' => 1]);
        // // Mata_kuliah::create(['kode_MK' => 'PTSK6506', 'Mata_Kuliah' => 'Sistem Digital Lanjut', 'semester' => '5', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6507', 'Mata_Kuliah' => 'Bahasa Pemrograman Rakitan', 'semester' => '5', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6508', 'Mata_Kuliah' => 'Teknik Mikroprosesor dan Antarmuka', 'semester' => '5', 'SKS' => 3]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6509', 'Mata_Kuliah' => 'Pengolahan Sinyal', 'semester' => '5', 'SKS' => 3]);
        // Mata_kuliah::create(['kode_MK' => 'UUW00008', 'Mata_Kuliah' => 'Kewirausahaan', 'semester' => '5', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6406', 'Mata_Kuliah' => 'Pemrograman Berorientasi Objek', 'semester' => '5', 'SKS' => 3]);

        // Mata_kuliah::create(['kode_MK' => 'PTSK6602', 'Mata_Kuliah' => 'Praktikum Sistem Digital Lanjut', 'semester' => '6', 'SKS' => 1]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6501', 'Mata_Kuliah' => 'Kerja Praktek', 'semester' => '6', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6603', 'Mata_Kuliah' => 'Praktikum Teknik Mikroprosesor dan Antarmuka', 'semester' => '6', 'SKS' => 1]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6604', 'Mata_Kuliah' => 'Teknik Kendali dan Otomasi', 'semester' => '6', 'SKS' => 3]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6605', 'Mata_Kuliah' => 'Kecerdasan Buatan', 'semester' => '6', 'SKS' => 3]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6606', 'Mata_Kuliah' => 'Rekayasa Perangkat Lunak Berbasis Komponen', 'semester' => '6', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6701', 'Mata_Kuliah' => 'Kuliah Kerja Lapangan', 'semester' => '6', 'SKS' => 1]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6706', 'Mata_Kuliah' => 'Interaksi Manusia dan Komputer', 'semester' => '6', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6802', 'Mata_Kuliah' => 'Proyek Desain Capstone', 'semester' => '6', 'SKS' => 2]);

        // Mata_kuliah::create(['kode_MK' => 'PTSK6702', 'Mata_Kuliah' => 'Etika Profesi', 'semester' => '7', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6703', 'Mata_Kuliah' => 'Praktikum Multimedia', 'semester' => '7', 'SKS' => 1]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6704', 'Mata_Kuliah' => 'Praktikum Rekayasa Perangkat Lunak Berbasis Komponen', 'semester' => '7', 'SKS' => 1]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6705', 'Mata_Kuliah' => 'Praktikum Teknik Kendali dan Otomasi', 'semester' => '7', 'SKS' => 1]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6707', 'Mata_Kuliah' => 'Sistem Operasi Waktu Nyata', 'semester' => '7', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6708', 'Mata_Kuliah' => 'Pemrograman Jaringan', 'semester' => '7', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6709', 'Mata_Kuliah' => 'Kriptografi', 'semester' => '7', 'SKS' => 3]);
        // Mata_kuliah::create(['kode_MK' => 'UUW00009', 'Mata_Kuliah' => 'Kuliah Kerja Nyata', 'semester' => '7', 'SKS' => 3]);

        // Mata_kuliah::create(['kode_MK' => 'PTSK6801', 'Mata_Kuliah' => 'Tugas Akhir', 'semester' => '8', 'SKS' => 4]);

        // Mata_kuliah::create(['kode_MK' => 'PTSK6505', 'Mata_Kuliah' => 'Praktikum Jaringan Skala Besar, Keamanan dan Otomasi', 'semester' => 'Pilihan Ganjil', 'SKS' => 1]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6601', 'Mata_Kuliah' => 'Kecakapan Antar Personal', 'semester' => 'Pilihan Ganjil', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6608', 'Mata_Kuliah' => 'Perancangan Mikroprosesor', 'semester' => 'Pilihan Ganjil', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6710', 'Mata_Kuliah' => 'Visi Komputer', 'semester' => 'Pilihan Ganjil', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6711', 'Mata_Kuliah' => 'Keamanan Jaringan Komputer', 'semester' => 'Pilihan Ganjil', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6751', 'Mata_Kuliah' => 'Perancangan System-on-a-Chip (SoC)', 'semester' => 'Pilihan Ganjil', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6752', 'Mata_Kuliah' => 'Jaringan Syaraf Tiruan', 'semester' => 'Pilihan Ganjil', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6753', 'Mata_Kuliah' => 'Logika Fuzzy', 'semester' => 'Pilihan Ganjil', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6754', 'Mata_Kuliah' => 'Pemrograman Game', 'semester' => 'Pilihan Ganjil', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6755', 'Mata_Kuliah' => 'Pengolahan Citra Dan Pengenalan Pola', 'semester' => 'Pilihan Ganjil', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6756', 'Mata_Kuliah' => 'Sistem Informasi', 'semester' => 'Pilihan Ganjil', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6757', 'Mata_Kuliah' => 'Sistem Terintegrasi', 'semester' => 'Pilihan Ganjil', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6758', 'Mata_Kuliah' => 'Software Defined Network', 'semester' => 'Pilihan Ganjil', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6759', 'Mata_Kuliah' => 'Audit SI/TI', 'semester' => 'Pilihan Ganjil', 'SKS' => 2]);

        // Mata_kuliah::create(['kode_MK' => 'PTSK6411', 'Mata_Kuliah' => 'Jaringan Skala Besar, Keamanan dan Otomasi', 'semester' => 'Pilihan Genap', 'SKS' => 3]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6607', 'Mata_Kuliah' => 'Keamanan Sistem Informasi', 'semester' => 'Pilihan Genap', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6651', 'Mata_Kuliah' => 'Data Mining', 'semester' => 'Pilihan Genap', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6652', 'Mata_Kuliah' => 'Grafika Komputer', 'semester' => 'Pilihan Genap', 'SKS' => 3]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6653', 'Mata_Kuliah' => 'Perencanaan Strategis SI/TI', 'semester' => 'Pilihan Genap', 'SKS' => 3]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6654', 'Mata_Kuliah' => 'Pemrograman Basis Data', 'semester' => 'Pilihan Genap', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6655', 'Mata_Kuliah' => 'Pemrograman Berorientasi Objek Lanjut', 'semester' => 'Pilihan Genap', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6656', 'Mata_Kuliah' => 'Pengenalan Ucapan', 'semester' => 'Pilihan Genap', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6657', 'Mata_Kuliah' => 'Pengolahan Paralel', 'semester' => 'Pilihan Genap', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6658', 'Mata_Kuliah' => 'Sistem Tertanam Terdistribusi', 'semester' => 'Pilihan Genap', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6659', 'Mata_Kuliah' => 'Jaringan Komputer Ad-hoc', 'semester' => 'Pilihan Genap', 'SKS' => 2]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6660', 'Mata_Kuliah' => 'Simulasi Jaringan Komputer', 'semester' => 'Pilihan Genap', 'SKS' => 3]);
        // Mata_kuliah::create(['kode_MK' => 'PTSK6661', 'Mata_Kuliah' => 'Manajemen Proyek Teknologi Informasi', 'semester' => 'Pilihan Genap', 'SKS' => 2]);
    }
}
