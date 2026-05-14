<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CareerPreference;

class CareerRecommendationController extends Controller
{
    public function recommend(Request $request)
    {
        $request->validate([
            'minat' => 'required',
            'skill' => 'required',
            'gaya_kerja' => 'required',
            'industri' => 'required',
        ]);

        CareerPreference::updateOrCreate(
            ['user_id' => $request->user()->id],
            [
                'minat' => $request->minat,
                'skill' => $request->skill,
                'gaya_kerja' => $request->gaya_kerja,
                'industri' => $request->industri,
            ]
        );

        $recommendations = [
            [
                'career_id' => 1,
                'title' => 'Frontend Developer',
                'match' => 95,
                'reason' => 'Cocok untuk kamu yang suka membuat tampilan website, detail visual, dan interaksi pengguna.',
                'skills' => ['HTML', 'CSS', 'JavaScript', 'React'],
                'learn' => ['TypeScript', 'Tailwind CSS', 'UI Component'],
                'roadmap' => ['HTML & CSS', 'JavaScript', 'React', 'Portfolio Website', 'Internship Frontend'],
                'insight' => 'Frontend Developer banyak dibutuhkan untuk membangun website modern. Fokus utama yang perlu diperkuat adalah responsive design, React, dan portfolio project.',
                'alumni_keyword' => 'Frontend Developer',
            ],
            [
                'career_id' => 2,
                'title' => 'Backend Developer',
                'match' => 93,
                'reason' => 'Cocok untuk kamu yang suka membangun sistem, API, database, dan logika aplikasi.',
                'skills' => ['PHP', 'Laravel', 'Database', 'REST API'],
                'learn' => ['Authentication', 'Deployment', 'API Security'],
                'roadmap' => ['Database Dasar', 'REST API', 'Laravel', 'Authentication', 'Deployment Backend'],
                'insight' => 'Backend Developer berperan penting dalam membangun sistem yang stabil, aman, dan terhubung dengan database.',
                'alumni_keyword' => 'Backend Developer',
            ],
            [
                'career_id' => 3,
                'title' => 'Software Developer',
                'match' => 92,
                'reason' => 'Cocok untuk kamu yang tertarik membuat aplikasi lengkap dan memecahkan masalah dengan teknologi.',
                'skills' => ['Programming', 'Git', 'Problem Solving'],
                'learn' => ['Software Architecture', 'Testing', 'Clean Code'],
                'roadmap' => ['Dasar Programming', 'Git', 'Project Aplikasi', 'Testing', 'Junior Software Developer'],
                'insight' => 'Software Developer cocok untuk kamu yang ingin membangun aplikasi dari awal sampai bisa digunakan oleh user.',
                'alumni_keyword' => 'Software Developer',
            ],
            [
                'career_id' => 4,
                'title' => 'Mobile Developer',
                'match' => 90,
                'reason' => 'Cocok untuk kamu yang tertarik mengembangkan aplikasi mobile Android atau iOS.',
                'skills' => ['Flutter', 'Kotlin', 'API Integration'],
                'learn' => ['Mobile UI', 'State Management', 'App Deployment'],
                'roadmap' => ['UI Mobile', 'Flutter/Kotlin', 'API Integration', 'Testing App', 'Publish App'],
                'insight' => 'Mobile Developer banyak dibutuhkan karena perusahaan semakin membutuhkan aplikasi yang mudah diakses lewat smartphone.',
                'alumni_keyword' => 'Mobile Developer',
            ],
            [
                'career_id' => 5,
                'title' => 'UI Engineer',
                'match' => 89,
                'reason' => 'Cocok untuk kamu yang suka menggabungkan kemampuan coding dengan ketelitian tampilan UI.',
                'skills' => ['React', 'CSS', 'Design System'],
                'learn' => ['Accessibility', 'Component Library', 'Frontend Performance'],
                'roadmap' => ['HTML CSS Advanced', 'React Component', 'Design System', 'Accessibility', 'UI Performance'],
                'insight' => 'UI Engineer berada di antara frontend dan desain. Profesi ini cocok untuk orang yang detail terhadap tampilan dan kualitas komponen UI.',
                'alumni_keyword' => 'UI Engineer',
            ],
            [
                'career_id' => 6,
                'title' => 'Data Analyst',
                'match' => 92,
                'reason' => 'Cocok untuk kamu yang suka membaca pola data dan mengubahnya menjadi insight bisnis.',
                'skills' => ['Excel', 'SQL', 'Data Visualization'],
                'learn' => ['Python', 'Power BI', 'Tableau'],
                'roadmap' => ['Excel', 'SQL', 'Python Dasar', 'Dashboard', 'Portfolio Data'],
                'insight' => 'Data Analyst cocok untuk kamu yang suka angka, pola, dan membuat laporan yang membantu keputusan bisnis.',
                'alumni_keyword' => 'Data Analyst',
            ],
            [
                'career_id' => 7,
                'title' => 'Data Scientist',
                'match' => 88,
                'reason' => 'Cocok untuk kamu yang tertarik dengan analisis data lanjutan, prediksi, dan machine learning.',
                'skills' => ['Python', 'Statistics', 'Machine Learning'],
                'learn' => ['Model Evaluation', 'Data Preprocessing', 'Deep Learning'],
                'roadmap' => ['Python', 'Statistik', 'Machine Learning', 'Model Evaluation', 'Project AI'],
                'insight' => 'Data Scientist cocok untuk kamu yang ingin membuat prediksi, model AI, dan analisis data yang lebih kompleks.',
                'alumni_keyword' => 'Data Scientist',
            ],
            [
                'career_id' => 8,
                'title' => 'Business Intelligence',
                'match' => 87,
                'reason' => 'Cocok untuk kamu yang suka membuat dashboard, laporan bisnis, dan insight untuk pengambilan keputusan.',
                'skills' => ['SQL', 'Dashboard', 'Business Reporting'],
                'learn' => ['Power BI', 'ETL', 'Data Storytelling'],
                'roadmap' => ['SQL', 'Data Cleaning', 'Power BI', 'Dashboard Bisnis', 'Presentasi Insight'],
                'insight' => 'Business Intelligence membantu perusahaan membaca kondisi bisnis melalui dashboard dan laporan yang mudah dipahami.',
                'alumni_keyword' => 'Business Intelligence',
            ],
            [
                'career_id' => 9,
                'title' => 'Data Engineer',
                'match' => 86,
                'reason' => 'Cocok untuk kamu yang suka membangun pipeline data, database, dan pengelolaan data skala besar.',
                'skills' => ['SQL', 'Python', 'Database'],
                'learn' => ['ETL', 'Cloud Data', 'Big Data Tools'],
                'roadmap' => ['Database', 'Python', 'ETL', 'Data Pipeline', 'Cloud Data'],
                'insight' => 'Data Engineer bertugas memastikan data siap digunakan oleh analyst, scientist, dan tim bisnis.',
                'alumni_keyword' => 'Data Engineer',
            ],
            [
                'career_id' => 10,
                'title' => 'Financial Analyst',
                'match' => 85,
                'reason' => 'Cocok untuk kamu yang tertarik menganalisis laporan keuangan, investasi, dan performa bisnis.',
                'skills' => ['Excel', 'Financial Report', 'Analytical Thinking'],
                'learn' => ['Financial Modeling', 'Investment Analysis', 'Budgeting'],
                'roadmap' => ['Excel Finance', 'Laporan Keuangan', 'Financial Modeling', 'Analisis Bisnis', 'Presentasi Keuangan'],
                'insight' => 'Financial Analyst cocok untuk kamu yang tertarik dengan angka, laporan keuangan, dan analisis performa perusahaan.',
                'alumni_keyword' => 'Financial Analyst',
            ],
            [
                'career_id' => 11,
                'title' => 'UI/UX Designer',
                'match' => 91,
                'reason' => 'Cocok untuk kamu yang suka desain, memahami kebutuhan pengguna, dan membuat pengalaman aplikasi lebih nyaman.',
                'skills' => ['Figma', 'Wireframe', 'User Flow'],
                'learn' => ['UX Research', 'Design System', 'Prototyping'],
                'roadmap' => ['Figma', 'Wireframe', 'User Flow', 'Prototype', 'UX Case Study'],
                'insight' => 'UI/UX Designer cocok untuk kamu yang suka desain dan ingin membuat aplikasi lebih mudah serta nyaman digunakan.',
                'alumni_keyword' => 'UI/UX Designer',
            ],
            [
                'career_id' => 12,
                'title' => 'Graphic Designer',
                'match' => 86,
                'reason' => 'Cocok untuk kamu yang suka membuat desain visual, branding, dan materi promosi.',
                'skills' => ['Canva', 'Adobe Illustrator', 'Visual Design'],
                'learn' => ['Branding', 'Layouting', 'Typography'],
                'roadmap' => ['Basic Design', 'Typography', 'Branding', 'Portfolio Design', 'Client Project'],
                'insight' => 'Graphic Designer banyak dibutuhkan untuk kebutuhan branding, promosi, dan konten visual perusahaan.',
                'alumni_keyword' => 'Graphic Designer',
            ],
            [
                'career_id' => 13,
                'title' => 'Video Editor',
                'match' => 84,
                'reason' => 'Cocok untuk kamu yang suka mengolah video, storytelling visual, dan konten digital.',
                'skills' => ['CapCut', 'Premiere Pro', 'Storytelling'],
                'learn' => ['Motion Graphic', 'Color Grading', 'Audio Editing'],
                'roadmap' => ['Basic Editing', 'Storytelling', 'Color Grading', 'Motion Graphic', 'Portfolio Video'],
                'insight' => 'Video Editor cocok untuk kamu yang suka produksi konten visual dan mengikuti kebutuhan media digital.',
                'alumni_keyword' => 'Video Editor',
            ],
            [
                'career_id' => 14,
                'title' => 'Animator',
                'match' => 82,
                'reason' => 'Cocok untuk kamu yang suka membuat animasi, motion graphic, dan visual kreatif.',
                'skills' => ['After Effects', 'Illustration', 'Motion Design'],
                'learn' => ['Blender', '2D Animation', 'Storyboard'],
                'roadmap' => ['Illustration', 'Storyboard', '2D Animation', 'Motion Graphic', 'Showreel'],
                'insight' => 'Animator cocok untuk kamu yang suka visual kreatif, storytelling, dan gerakan animasi.',
                'alumni_keyword' => 'Animator',
            ],
            [
                'career_id' => 15,
                'title' => 'Content Creator',
                'match' => 88,
                'reason' => 'Cocok untuk kamu yang suka membuat konten, membangun personal branding, dan mengikuti tren digital.',
                'skills' => ['Content Planning', 'Editing', 'Public Speaking'],
                'learn' => ['Script Writing', 'Analytics', 'Social Media Strategy'],
                'roadmap' => ['Content Planning', 'Script Writing', 'Editing', 'Posting Consistency', 'Analytics'],
                'insight' => 'Content Creator cocok untuk kamu yang kreatif, komunikatif, dan peka terhadap tren media sosial.',
                'alumni_keyword' => 'Content Creator',
            ],
            [
                'career_id' => 16,
                'title' => 'Digital Marketing',
                'match' => 91,
                'reason' => 'Cocok untuk kamu yang suka strategi promosi, media sosial, iklan digital, dan campaign.',
                'skills' => ['SEO', 'Social Media', 'Content Marketing'],
                'learn' => ['Meta Ads', 'Google Ads', 'Analytics'],
                'roadmap' => ['SEO Basic', 'Content Marketing', 'Social Media Ads', 'Analytics', 'Campaign Portfolio'],
                'insight' => 'Digital Marketing dibutuhkan untuk membantu perusahaan meningkatkan awareness, traffic, dan penjualan melalui kanal digital.',
                'alumni_keyword' => 'Digital Marketing',
            ],
            [
                'career_id' => 17,
                'title' => 'Product Manager',
                'match' => 90,
                'reason' => 'Cocok untuk kamu yang suka strategi produk, komunikasi tim, dan pengembangan fitur.',
                'skills' => ['Problem Solving', 'Communication', 'Product Thinking'],
                'learn' => ['Roadmap', 'User Research', 'Agile'],
                'roadmap' => ['Product Thinking', 'User Research', 'Roadmap', 'Agile', 'Product Case Study'],
                'insight' => 'Product Manager cocok untuk kamu yang suka menghubungkan kebutuhan user, bisnis, dan teknologi.',
                'alumni_keyword' => 'Product Manager',
            ],
            [
                'career_id' => 18,
                'title' => 'HR Specialist',
                'match' => 83,
                'reason' => 'Cocok untuk kamu yang suka komunikasi, pengelolaan SDM, rekrutmen, dan pengembangan karyawan.',
                'skills' => ['Communication', 'Recruitment', 'Administration'],
                'learn' => ['HRIS', 'Interviewing', 'Employee Development'],
                'roadmap' => ['HR Administration', 'Recruitment', 'Interviewing', 'HRIS', 'Employee Development'],
                'insight' => 'HR Specialist cocok untuk kamu yang suka berinteraksi dengan orang dan membantu pengelolaan sumber daya manusia.',
                'alumni_keyword' => 'HR Specialist',
            ],
            [
                'career_id' => 19,
                'title' => 'Project Manager',
                'match' => 87,
                'reason' => 'Cocok untuk kamu yang suka mengatur timeline, koordinasi tim, dan memastikan project selesai tepat waktu.',
                'skills' => ['Leadership', 'Planning', 'Coordination'],
                'learn' => ['Agile', 'Scrum', 'Risk Management'],
                'roadmap' => ['Planning', 'Team Coordination', 'Agile/Scrum', 'Risk Management', 'Project Report'],
                'insight' => 'Project Manager cocok untuk kamu yang suka mengatur pekerjaan, timeline, dan komunikasi antar tim.',
                'alumni_keyword' => 'Project Manager',
            ],
            [
                'career_id' => 20,
                'title' => 'Business Development',
                'match' => 86,
                'reason' => 'Cocok untuk kamu yang suka mencari peluang bisnis, membangun relasi, dan strategi pertumbuhan perusahaan.',
                'skills' => ['Communication', 'Negotiation', 'Business Strategy'],
                'learn' => ['Market Research', 'Sales Funnel', 'Partnership'],
                'roadmap' => ['Market Research', 'Prospecting', 'Pitching', 'Partnership', 'Business Growth'],
                'insight' => 'Business Development cocok untuk kamu yang suka networking, negosiasi, dan mencari peluang pertumbuhan bisnis.',
                'alumni_keyword' => 'Business Development',
            ],
        ];

        if ($request->minat === 'Teknologi') {
            $recommendations = array_values(array_filter($recommendations, function ($item) {
                return in_array($item['career_id'], [1, 2, 3, 4, 5]);
            }));
        }

        if ($request->minat === 'Data') {
            $recommendations = array_values(array_filter($recommendations, function ($item) {
                return in_array($item['career_id'], [6, 7, 8, 9, 10]);
            }));
        }

        if ($request->minat === 'Desain') {
            $recommendations = array_values(array_filter($recommendations, function ($item) {
                return in_array($item['career_id'], [11, 12, 13, 14, 15]);
            }));
        }

        if ($request->minat === 'Marketing') {
            $recommendations = array_values(array_filter($recommendations, function ($item) {
                return in_array($item['career_id'], [15, 16, 20]);
            }));
        }

        if ($request->minat === 'Bisnis') {
            $recommendations = array_values(array_filter($recommendations, function ($item) {
                return in_array($item['career_id'], [17, 18, 19, 20, 10]);
            }));
        }

        return response()->json([
            'success' => true,
            'message' => 'Rekomendasi karir berhasil dibuat',
            'data' => $recommendations
        ]);
    }
}