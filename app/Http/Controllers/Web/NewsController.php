<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private function getArticles()
    {
        return [
            [
                'id' => 1,
                'slug' => '5-cara-efektif-mengubah-impian-gadget-jadi-target-menabung-harian',
                'title' => '5 Cara Efektif Mengubah Impian Gadget Jadi Target Menabung Harian',
                'title_en' => '5 Effective Ways to Turn Gadget Dreams into Daily Saving Goals',
                'excerpt' => 'Ingin membeli laptop atau smartphone baru tanpa utang? Pelajari bagaimana memecah target nominal besar menjadi angka harian yang realistis.',
                'excerpt_en' => 'Want to buy a new laptop or smartphone without debt? Learn how to break down big target amounts into realistic daily goals.',
                'category' => 'Tips Menabung',
                'category_en' => 'Savings Tips',
                'date' => '24 Juli 2026',
                'read_time' => '4 min read',
                'author' => 'Tim Finansial ImpiDream',
                'image' => 'assets/news-gadget.webp',
                'content' => '
                    <p class="mb-4">Membeli gadget idaman seperti MacBook Pro, iPhone 15 Pro, atau laptop gaming sering kali terasa berat jika kita hanya melihat total nominalnya yang mencapai puluhan juta rupiah. Akibatnya, banyak dari kita yang tergiur mengambil jalan pintas melalui pinjaman online atau cicilan berbunga tinggi.</p>
                    <h3 class="text-xl font-bold mt-6 mb-3 text-slate-900 dark:text-white">1. Tentukan Spesifikasi & Harga Acuan Pasar</h3>
                    <p class="mb-4">Langkah pertama yang paling krusial adalah memastikan berapa harga riil produk impianmu di marketplace resmi seperti Tokopedia, Shopee, atau Lazada. Jangan menebak-nebak nominal. Dengan angka pasti, perencanaanmu tidak akan meleset.</p>
                    <h3 class="text-xl font-bold mt-6 mb-3 text-slate-900 dark:text-white">2. Gunakan Formula Pembagian Harian</h3>
                    <p class="mb-4">Jika laptop impianmu berharga Rp 21.000.000 dan kamu ingin membelinya dalam waktu 10 bulan (300 hari), maka kamu cukup menyisihkan <strong>Rp 70.000 per hari</strong>. Angka 70 ribu terasa jauh lebih ringan dan masuk akal dibandingkan memikirkan angka 21 juta sekaligus.</p>
                    <h3 class="text-xl font-bold mt-6 mb-3 text-slate-900 dark:text-white">3. Pisahkan Pos Tabungan di E-Wallet atau Rekening Khusus</h3>
                    <p class="mb-4">Jangan mencampur uang tabungan impian dengan dana operasional harian seperti makan atau ongkos. Buat pos dana tersendiri di Bank atau E-Wallet pilihanmu.</p>
                '
            ],
            [
                'id' => 2,
                'slug' => 'mengapa-menabung-bebas-utang-lebih-menenangkan',
                'title' => 'Mengapa Menabung Bebas Utang Lebih Menenangkan daripada Cicilan Berbunga',
                'title_en' => 'Why Debt-Free Saving Brings More Peace of Mind Than Loans',
                'excerpt' => 'Membeli barang impian secara tunai dari hasil keringat sendiri memberikan rasa bangga sejati dan ketenangan pikiran tanpa beban tagihan.',
                'excerpt_en' => 'Buying your dream item in cash from your own effort brings true pride and peace of mind without monthly bill stress.',
                'category' => 'Edukasi Finansial',
                'category_en' => 'Financial Education',
                'date' => '20 Juli 2026',
                'read_time' => '5 min read',
                'author' => 'Tim Finansial ImpiDream',
                'image' => 'assets/news-debtfree.webp',
                'content' => '
                    <p class="mb-4">Di era modern saat ini, kemudahan akses kredit dan fitur paylater membuat kita sangat mudah tergiur membeli barang sebelum memiliki uangnya. Namun, rasa senang dari barang baru sering kali cepat sirna saat surat tagihan bulanan mulai berdatangan.</p>
                    <h3 class="text-xl font-bold mt-6 mb-3 text-slate-900 dark:text-white">Kenapa Bebas Utang Itu Penting?</h3>
                    <p class="mb-4">Ketika kamu membeli barang secara tunai dari hasil menabung terstruktur, kamu tidak hanya mendapatkan barang tersebut, tetapi juga melatih kedisiplinan dan mentalitas finansial yang kuat. Tidak ada kekhawatiran tentang kejutan bunga atau denda keterlambatan.</p>
                '
            ],
            [
                'id' => 3,
                'slug' => 'strategi-mengelola-multi-wallet',
                'title' => 'Strategi Mengelola Multi-Wallet: Memisahkan Dana Impian dan Operasional',
                'title_en' => 'Multi-Wallet Strategy: Separating Dream Funds and Daily Operating Cash',
                'excerpt' => 'Pelajari cara terbaik membagi alokasi tabunganmu ke dalam beberapa dompet digital dan rekening bank agar progres impianmu terpantau rapi.',
                'excerpt_en' => 'Learn the best way to split your savings allocation across digital wallets and bank accounts for clean progress tracking.',
                'category' => 'Panduan Aplikasi',
                'category_en' => 'App Guides',
                'date' => '15 Juli 2026',
                'read_time' => '3 min read',
                'author' => 'Tim Finansial ImpiDream',
                'image' => 'assets/news-multiwallet.webp',
                'content' => '
                    <p class="mb-4">Salah satu penyebab utama tabungan sering bocor adalah mencampur semua uang dalam satu rekening bank saja. Ketika saldo terlihat besar, kita cenderung merasa kaya dan membelanjakannya untuk hal-hal impulsif.</p>
                    <h3 class="text-xl font-bold mt-6 mb-3 text-slate-900 dark:text-white">Prinsip Multi-Wallet ImpiDream</h3>
                    <p class="mb-4">ImpiDream memungkinkan kamu mengalokasikan tabungan impianmu dari berbagai pos dana — baik itu Tunai di dompet fisik, Bank BCA, Mandiri, hingga E-Wallet seperti GoPay atau DANA. Dengan cara ini, kamu selalu tahu saldo bersih impianmu secara presisi.</p>
                '
            ]
        ];
    }

    public function index()
    {
        $articles = $this->getArticles();
        return view('news.index', compact('articles'));
    }

    public function show($slug)
    {
        $articles = $this->getArticles();
        $article = collect($articles)->firstWhere('slug', $slug);

        if (!$article) {
            abort(404);
        }

        $relatedArticles = collect($articles)->where('slug', '!=', $slug)->take(2);

        return view('news.show', compact('article', 'relatedArticles'));
    }
}
