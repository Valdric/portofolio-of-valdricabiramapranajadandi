<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $userMessage = $request->input('message');
        $apiKey = env('GEMINI_API_KEY');

        if (empty($apiKey)) {
            return response()->json([
                'status' => 'fallback',
                'message' => 'API key not configured.'
            ]);
        }

        $systemInstruction = "Anda adalah asisten AI ramah bernama 'VAbirama AI' yang membantu pengunjung website portofolio Valdric Abirama Pranaja Dandi (Valdric / VAbirama). Tugas Anda adalah menjawab pertanyaan seputar Valdric dengan jelas, akurat, profesional, dan dalam bahasa yang digunakan oleh penanya (Indonesia atau Inggris).

Berikut profil lengkap Valdric:
- **Nama Lengkap**: Valdric Abirama Pranaja Dandi
- **NRP / NIM**: 233040163
- **Pendidikan**: Mahasiswa S1 Teknik Informatika di Universitas Pasundan (UNPAS) Bandung (Angkatan 2023).
- **IPK Saat Ini**: 3.55 dari 4.00 (Skala 4.00).
- **Keahlian Teknis**:
  - Bahasa Pemrograman: HTML, CSS, JavaScript, PHP, SQL, Dart, C# (Unity)
  - Frontend / Backend: Tailwind CSS, Livewire, Alpine.js, Vite, Laravel, SQLite, MySQL
  - Mobile & Game Dev: Flutter, Unity
  - Tools: Git, VS Code
- **Proyek Unggulan**:
  1. **Gosir (Cashier App)**: Aplikasi POS (Point of Sale) mobile berbasis Flutter dengan database relasional SQL terstruktur, cache lokal terenkripsi, barcode scanner, struk PDF, dan chart inventaris real-time. (Relevan untuk kesiapan teknis di aplikasi perbankan mobile seperti bjb DIGI).
  2. **KasiDuit**: Platform crowdfunding dan donasi berbasis web menggunakan Laravel, SQLite, dan Tailwind CSS. Menyediakan dashboard donatur, manajemen kampanye sosial, dan transparansi laporan keuangan. (Relevan untuk backend transaksi keuangan perbankan).
  3. **Personal Web Portfolio**: Web editorial print-aesthetic yang interaktif ini (dibuat menggunakan HTML, CSS, JS, Vite, dan Blade).
- **Tujuan Magang**: Berminat kuat magang di PT. Bank BJB Kantor Cabang Utama Bandung (Jalan Naripan) sebagai IT Developer (Flutter/Laravel) atau QA.
- **Kontak**:
  - Email: valdricapd@gmail.com
  - GitHub: github.com/Valdric
  - Lokasi: Bandung, Indonesia

Aturan Tambahan:
1. Jawab dengan gaya bahasa yang profesional namun ramah dan santai.
2. Usahakan jawaban padat, langsung menjawab pertanyaan, dan tidak terlalu panjang (maksimal 2-3 paragraf pendek) agar nyaman dibaca di chat widget.
3. Gunakan formatting Markdown sederhana (seperti bullet points, bold text) jika membantu keterbacaan.
4. Jika ditanya di luar topik Valdric, arahkan dengan sopan agar kembali menanyakan seputar Valdric atau portofolionya.";

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key={$apiKey}", [
                'systemInstruction' => [
                    'parts' => [
                        ['text' => $systemInstruction]
                    ]
                ],
                'contents' => [
                    [
                        'role' => 'user',
                        'parts' => [
                            ['text' => $userMessage]
                        ]
                    ]
                ],
                'generationConfig' => [
                    'temperature' => 0.7,
                    'maxOutputTokens' => 800,
                ]
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $reply = $data['candidates'][0]['content']['parts'][0]['text'] ?? null;

                if (!empty($reply)) {
                    return response()->json([
                        'status' => 'success',
                        'reply' => trim($reply)
                    ]);
                }
            }

            Log::error('Gemini API returned an error or empty reply: ' . $response->body());
            return response()->json([
                'status' => 'fallback',
                'message' => 'Failed to parse reply from Gemini API.'
            ]);

        } catch (\Exception $e) {
            Log::error('Exception during Gemini API call: ' . $e->getMessage());
            return response()->json([
                'status' => 'fallback',
                'message' => $e->getMessage()
            ]);
        }
    }
}
