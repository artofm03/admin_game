<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEnglishLearningSystem extends Migration
{
    public function up()
    {
        // 1. Teachers
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'auto_increment' => true],
            'username'   => ['type' => 'VARCHAR', 'constraint' => 100, 'unique' => true],
            'password'   => ['type' => 'VARCHAR', 'constraint' => 255],
            'full_name'  => ['type' => 'VARCHAR', 'constraint' => 150],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('teachers');

        // 2. Classes
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'auto_increment' => true],
            'class_name'  => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => false],
            'teacher_id'  => ['type' => 'INT', 'null' => true],        // Harus NULL
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('teacher_id', 'teachers', 'id', 'CASCADE', 'SET NULL');
        $this->forge->createTable('classes');

        // 3. Students
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'auto_increment' => true],
            'nisn'        => ['type' => 'VARCHAR', 'constraint' => 20, 'unique' => true],
            'full_name'   => ['type' => 'VARCHAR', 'constraint' => 150],
            'class_id'    => ['type' => 'INT', 'null' => true],        // Harus NULL
            'password'    => ['type' => 'VARCHAR', 'constraint' => 255],
            'is_active'   => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('class_id', 'classes', 'id', 'CASCADE', 'SET NULL');
        $this->forge->createTable('students');

        // 4. Levels
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'auto_increment' => true],
            'level_name'  => ['type' => 'VARCHAR', 'constraint' => 50],
            'description' => ['type' => 'TEXT', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('levels');

        // 5. Materials
        $this->forge->addField([
            'id'           => ['type' => 'INT', 'auto_increment' => true],
            'level_id'     => ['type' => 'INT', 'null' => true],       // ← PERBAIKAN
            'text_en'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'text_id'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'pronunciation'=> ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'audio_path'   => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_by'   => ['type' => 'INT', 'null' => true],
            'created_at'   => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('level_id', 'levels', 'id', 'CASCADE', 'SET NULL');
        $this->forge->addForeignKey('created_by', 'teachers', 'id', 'CASCADE', 'SET NULL');
        $this->forge->createTable('materials');

        // 6. Questions
        $this->forge->addField([
            'id'           => ['type' => 'INT', 'auto_increment' => true],
            'level_id'     => ['type' => 'INT', 'null' => true],       // ← PERBAIKAN
            'material_id'  => ['type' => 'INT', 'null' => true],
            'text_en'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'text_id'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_by'   => ['type' => 'INT', 'null' => true],
            'created_at'   => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('level_id', 'levels', 'id', 'CASCADE', 'SET NULL');
        $this->forge->addForeignKey('material_id', 'materials', 'id', 'CASCADE', 'SET NULL');
        $this->forge->addForeignKey('created_by', 'teachers', 'id', 'CASCADE', 'SET NULL');
        $this->forge->createTable('questions');

        // 7. Game Sessions
        $this->forge->addField([
            'id'               => ['type' => 'INT', 'auto_increment' => true],
            'student_id'       => ['type' => 'INT', 'null' => false],
            'level_id'         => ['type' => 'INT', 'null' => true],
            'total_questions'  => ['type' => 'INT', 'default' => 10],
            'correct_answers'  => ['type' => 'INT', 'default' => 0],
            'score'            => ['type' => 'FLOAT', 'default' => 0],
            'session_date'     => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('student_id', 'students', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('level_id', 'levels', 'id', 'CASCADE', 'SET NULL');
        $this->forge->createTable('game_sessions');

        // 8. Session Questions
        $this->forge->addField([
            'id'                          => ['type' => 'INT', 'auto_increment' => true],
            'session_id'                  => ['type' => 'INT'],
            'question_id'                 => ['type' => 'INT'],
            'student_pronunciation_score' => ['type' => 'FLOAT', 'null' => true],
            'is_correct'                  => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('session_id', 'game_sessions', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('question_id', 'questions', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('session_questions');

        // 9. Student Levels
        $this->forge->addField([
            'id'                  => ['type' => 'INT', 'auto_increment' => true],
            'student_id'          => ['type' => 'INT'],
            'level_id'            => ['type' => 'INT'],
            'progress_percentage' => ['type' => 'FLOAT', 'default' => 0],
            'unlocked'            => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('student_id', 'students', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('level_id', 'levels', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('student_levels');
    }

    public function down()
    {
        $this->forge->dropTable('student_levels', true);
        $this->forge->dropTable('session_questions', true);
        $this->forge->dropTable('game_sessions', true);
        $this->forge->dropTable('questions', true);
        $this->forge->dropTable('materials', true);
        $this->forge->dropTable('levels', true);
        $this->forge->dropTable('students', true);
        $this->forge->dropTable('classes', true);
        $this->forge->dropTable('teachers', true);
    }
}