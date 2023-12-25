<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cpl;

class CplsTableSeeder extends Seeder
{
    public function run()
    {
        Cpl::create(['nama' => 'CPL 1', 'desc' => 'Memiliki sikap yang baik, komitmen yang kuat, tanggung jawab, serta senantiasa menjunjung etika dan nomra dalam kehidupan bermasyarakat, berbangsa, dan bernegara atas dasar keyakinan kepada Tuhan Yang Maha Esa.']);
        Cpl::create(['nama' => 'CPL 2', 'desc' => 'Memiliki kompetensi keilmuan dan keahlian di bidang teknik komputer dan bidang terkait lainnya yang menunjang profesionalitas kerja, baik secara individu maupun tim, serta kemampuan beradaptasi dan pengembangan diri di lingkungan kerja']);
        Cpl::create(['nama' => 'CPL 3', 'desc' => 'Memiliki pemahaman keilmuan dan penguasaan keterampilan di bidang teknik komputer, meliputi sistem tertanam dan robotika, jaringan dan keamanan komputer, rekayasa perangkat lunak, multimedia, game dan kecerdasan buatan yang ditopang oleh profesionalitas, pengetahuan sains dasar dan rekayasa yang kuat.']);
        Cpl::create(['nama' => 'CPL 4', 'desc' => 'Memiliki pandangan keilmuan yang kritis dan progresif, mampu beradaptasi terhadap perkembangan IPTEKS di bidang teknik komputer dan bidang terkait lainnya, mampu memilih beragam sumber dalam menyerap pengetahuan, melatih keterampilan secara mandiri dan berkelompok sebagai upaya pembelajaran dan pengembangan diri sepanjang hayat.']);
        Cpl::create(['nama' => 'CPL 5', 'desc' => 'Mampu menganalisis permasalahan yang dihadapi secara kritis serta mampu merancang solusi dengan menerapkan metode dan alat yang tepat untuk menghasilkan solusi sistem yang andai berdasarkan eksperimen baku dengan memperhatikan aspek kebutuhan teknis, ekonomis, sosial, hukum, dan kelestarian lingkungan.']);
        Cpl::create(['nama' => 'CPL 6', 'desc' => 'Mampu menyampaikan ide dan gagasannya dengan baik dalam menghadirkan solusi dari suatu permasalahan berdasarkan pemahaman pengetahuan dan penguasaan keahlian yang kuat.']);
        Cpl::create(['nama' => 'CPL 7', 'desc' => 'Mampu menyajikan dan memaparkan hasil pengembangan solusi produk dan sistem dalam naskah akademik, tulisan non-akademik, dan/atau di forum ilmiah dengan baik, efektif, dan runtut sesuai dengan kaidah yang berlaku.']);
        Cpl::create(['nama' => 'CPL 8', 'desc' => 'Mampu menunjukkan kepeloporan dan kepemimpinan dalam tim, menerapkan manajemen proyek dan praktek bisnis dengan strategi komunikasi yang efektif, kerjasama multidisiplin ilmu, dan bertanggung secara profesional dan etika.']);
        Cpl::create(['nama' => 'CPL 9', 'desc' => 'Mampu mengembangkan produk dan solusi kreatif, inovatif, dan bernilai tambah berbasis teknologi informasi dan komputer yang memenuhi kebutuhan pasar global dengan mengevaluasi aspek keandalan (reluability), rawatan (maintainability), keberlanjutan (sustainability), kemampuan manufaktur (manufacturability), ekonomis dan terjangkau oleh masyarakat (affordanility).']);
    }
}
