<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Admin Utama
        \App\Models\User::create([
            'name' => 'Admin Amikom',
            'email' => 'admin@amikom.ac.id',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // 2. Insert Kategori Event 
        $category1 = \App\Models\Category::create([
            'name' => 'UI/UX Masterclass',
            'slug' => 'ui-ux-masterclass',
        ]);

        $category2 = \App\Models\Category::create([
            'name' => 'E-Sport U-Champ',
            'slug' => 'e-sport-u-champ',
        ]);

        $category3 = \App\Models\Category::create([
            'name' => 'Digital Marketing Workshop',
            'slug' => 'digital-marketing-workshop',
        ]);

        // 3. Insert Sampel Events 
        \App\Models\Event::create([
            'category_id' => $category1->id,
            'title' => 'Figma Advanced Techniques',
            'description' => 'Pelajari teknik-teknik lanjutan dalam desain UI/UX menggunakan Figma. Workshop interaktif dengan mentor berpengalaman dari industri desain digital.',
            'date' => '2026-05-10 10:00:00',
            'location' => 'Design Studio Amikom',
            'price' => 150000,
            'stock' => 50,
            'poster_path' => 'posters/figma-workshop.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $category1->id,
            'title' => 'User Research & Analysis Seminar',
            'description' => 'Memahami mendalam tentang metodologi user research dan cara menganalisis data pengguna untuk menciptakan produk yang user-centered.',
            'date' => '2026-05-15 14:00:00',
            'location' => 'Ruang Seminar D',
            'price' => 100000,
            'stock' => 80,
            'poster_path' => 'posters/user-research.png',
        ]);

        // Event Category 2: E-Sport U-Champ
        \App\Models\Event::create([
            'category_id' => $category2->id,
            'title' => 'Mobile Legends Championship 2026',
            'description' => 'Kompetisi e-sports terbesar dengan hadiah total miliaran rupiah. Daftarkan tim Anda sekarang dan buktikan skill gaming Anda!',
            'date' => '2026-06-01 18:00:00',
            'location' => 'Arena Gaming Amikom',
            'price' => 200000,
            'stock' => 200,
            'poster_path' => 'posters/ml-championship.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $category2->id,
            'title' => 'VALORANT Pro League Qualifier',
            'description' => 'Kesempatan emas untuk berkompetisi di level profesional. Pemenang lokal akan mewakili Amikom di regional championship.',
            'date' => '2026-06-10 19:00:00',
            'location' => 'Esports Arena Utama',
            'price' => 150000,
            'stock' => 150,
            'poster_path' => 'posters/valorant-league.png',
        ]);

        // Event Category 3: Digital Marketing Workshop
        \App\Models\Event::create([
            'category_id' => $category3->id,
            'title' => 'Social Media Marketing Strategy',
            'description' => 'Belajar strategi marketing di era digital dengan fokus pada platform social media. Dapatkan insights terbaru dari praktisi marketing sukses.',
            'date' => '2026-05-20 09:00:00',
            'location' => 'Ruang Pelatihan A',
            'price' => 120000,
            'stock' => 60,
            'poster_path' => 'posters/social-media-marketing.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $category3->id,
            'title' => 'SEO & SEM Masterclass',
            'description' => 'Optimalkan website Anda di search engine dengan teknik SEO terbaru dan strategi SEM yang efektif untuk meningkatkan traffic dan konversi.',
            'date' => '2026-05-25 13:30:00',
            'location' => 'Tech Hub Amikom',
            'price' => 130000,
            'stock' => 70,
            'poster_path' => 'posters/seo-sem-masterclass.png',
        ]);
    }
}