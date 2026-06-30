<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EnglishLearningSeeder extends Seeder
{
    public function run()
    {
        // 1. Teacher
        $teacher = [
            'username'   => 'guru1',
            'password'   => password_hash('password123', PASSWORD_DEFAULT),
            'full_name'  => 'Budi Santoso, S.Pd'
        ];
        $this->db->table('teachers')->insert($teacher);
        $teacherId = $this->db->insertID();

        // 2. Classes
        $classes = [
            ['class_name' => '7A', 'teacher_id' => $teacherId],
            ['class_name' => '7B', 'teacher_id' => $teacherId],
            ['class_name' => '8A', 'teacher_id' => $teacherId],
        ];
        $this->db->table('classes')->insertBatch($classes);

        // 3. Levels
        $levels = [
            ['level_name' => 'Beginner', 'description' => 'Kelas 7 - Dasar'],
            ['level_name' => 'Intermediate', 'description' => 'Kelas 8 - Menengah'],
            ['level_name' => 'Advanced', 'description' => 'Kelas 9 - Lanjutan'],
        ];
        $this->db->table('levels')->insertBatch($levels);

        // 4. Sample Materials (akan di-generate audio TTS nanti)
        $materials = [
            [
                'level_id' => 1,
                'text_en' => 'Good Morning',
                'text_id' => 'Selamat Pagi',
                'pronunciation' => 'gʊd ˈmɔːrnɪŋ',
                'created_by' => $teacherId
            ],
            [
                'level_id' => 1,
                'text_en' => 'Thank You',
                'text_id' => 'Terima Kasih',
                'pronunciation' => 'θæŋk juː',
                'created_by' => $teacherId
            ],
            [
                'level_id' => 1,
                'text_en' => 'How are you?',
                'text_id' => 'Apa kabar?',
                'pronunciation' => 'haʊ ɑːr juː',
                'created_by' => $teacherId
            ],
        ];
        $this->db->table('materials')->insertBatch($materials);

        // 5. Sample Questions
        $questions = [
            [
                'level_id' => 1,
                'text_en' => 'Good Morning',
                'text_id' => 'Selamat Pagi',
                'created_by' => $teacherId
            ],
            [
                'level_id' => 1,
                'text_en' => 'My name is',
                'text_id' => 'Nama saya',
                'created_by' => $teacherId
            ],
        ];
        $this->db->table('questions')->insertBatch($questions);

        echo "✅ Seeder selesai dijalankan!\n";
    }
}