<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            [
                'content' => 'Persyaratan dan Pelayanan',
                'service_id' => 1
            ],
            [
                'content' => 'Kecocokan Persyaratan pelayanan dengan jenis pelayanan',
                'service_id' => 1
            ],
            [
                'content' => 'Prosedur Pelayanan',
                'service_id' => 1
            ],
            [
                'content' => 'Prosedur Pelayanan yang di Standarkan',
                'service_id' => 1
            ],
            [
                'content' => 'Kecepatan Pelayanan',
                'service_id' => 1
            ],
            [
                'content' => 'Ketepatan jadwal Pelayanan',
                'service_id' => 1
            ],
            [
                'content' => 'Hasil/Produk Jenis Pelayanan yang diberikan kepada Saudara',
                'service_id' => 1
            ],
            [
                'content' => 'Kemampuan Petugas/Pegawai dalam Pelayanan',
                'service_id' => 1
            ],
            [
                'content' => 'Keahlian dan Keterampilan Petugas/Pegawai dalam Pelayanan',
                'service_id' => 1
            ],
            [
                'content' => 'Tanggung Jawab Petugas/Pegawai dalam Pelayanan',
                'service_id' => 1
            ],
            [
                'content' => 'Kesopanan dan Keramahan Petugas/Pegawai',
                'service_id' => 1
            ],
            [
                'content' => 'Petugas/Pegawai dalam melaksanakan maklumat pelayanan (apa yang telah ditulis) sesuai dengan standar pelayanan',
                'service_id' => 1
            ],
            [
                'content' => 'Penyampaian Komplain, Saran, atau Pendapat kepada Petugas/Kantor',
                'service_id' => 1
            ],
            [
                'content' => 'Kecepatan Penanganan jika ada pengaduan',
                'service_id' => 1
            ],
            [
                'content' => 'Pelaksanaan Ketatasahaan',
                'service_id' => 2
            ],
            [
                'content' => 'Pelaksanaan Sarana dan Prasarana',
                'service_id' => 2
            ],
            [
                'content' => 'Penyiapan Laporan Caturwulan Kegiatan DPRD',
                'service_id' => 2
            ],
            [
                'content' => 'Fasilitasi Pemeliharaan Kesehatan Anggota DPRD',
                'service_id' => 2
            ],
            [
                'content' => 'Pelaksanaan Kebersihan di gedung DPRD',
                'service_id' => 2
            ],
            [
                'content' => 'Kualitas Menu Makanan dan Minuman',
                'service_id' => 2
            ],
            [
                'content' => 'Pelaksanaan Keamanan di gedung DPRD',
                'service_id' => 2
            ],
            [
                'content' => 'Pengelolaan Keuangan DPRD dan Sekwan',
                'service_id' => 2
            ],
            [
                'content' => 'Pengadministrasi dan Pembukuan Keuangan',
                'service_id' => 2
            ],
            [
                'content' => 'Pelaksanaan Laporan Pertanggungjawaban Keuangan',
                'service_id' => 2
            ],
            [
                'content' => 'Kecepatan dan Ketepatan Waktu Pembayaran Gaji dan Tunjangan',
                'service_id' => 2
            ],
            [
                'content' => 'Dukungan dalam membantu penyelesaian pertanggungjawaban Keuangan',
                'service_id' => 2
            ],
            [
                'content' => 'Kecepatan Ketersediaan dana anggaran untuk Kegiatan Alat Kelengkapan Dewan',
                'service_id' => 2
            ],
            [
                'content' => 'Penyiapan Rancangan Jadwal Kegiatan DPRD',
                'service_id' => 3
            ],
            [
                'content' => 'Penyiapan alat kelengkapan Dewan (bahan-bahan rapat dan Notulensi)',
                'service_id' => 3
            ],
            [
                'content' => 'Fasilitasi Pelaksanaan Kunjungan Kerja Alat Kelengkapan Dewan',
                'service_id' => 3
            ],
            [
                'content' => 'Fasilitasi Pelaksanaan Bimbingan Teknis dan Uji Publik',
                'service_id' => 3
            ],
            [
                'content' => 'Kecepatan Pelayanan Berhubungan dengan pihak terkait yang dibutuhkan Alat Kelengkapan Dewan',
                'service_id' => 3
            ],
            [
                'content' => 'Pengumpulan data dalam pembuatan Perda dan Produk DPRD',
                'service_id' => 3
            ],
            [
                'content' => 'Penyimpanan produk hukum dan produk hukum lainnya',
                'service_id' => 3
            ],
            [
                'content' => 'Pelaksanaan Pelayanan Kegiatan Pimpinan dan Anggota DPRD pada acara resmi dan kenegaraan',
                'service_id' => 3
            ],
            [
                'content' => 'Pengumpulan bahan dan data kegiatan DPRD untuk media cetak dan elektronik',
                'service_id' => 3
            ],
            [
                'content' => 'Pengelolaan sistem Teknologi Informasi dan Komunikasi di lingkungan Sekwan',
                'service_id' => 3
            ],
            [
                'content' => 'Publikasi kegiatan dewan melalui media elektronik dan cetak lainnya',
                'service_id' => 3
            ],
            [
                'content' => 'Penyebarluasan Informasi Secara Online',
                'service_id' => 3
            ],
            [
                'content' => 'Fasilitasi Sosialisasi Peraturan Perundang - Undangan',
                'service_id' => 3
            ],
            [
                'content' => 'Fasilitasi Pelaksanaan Rapat-Rapat Penganggaran',
                'service_id' => 4
            ],
            [
                'content' => 'Fasilitasi Pelaksanaan Rapat-Rapat Pengawasan',
                'service_id' => 4
            ],
            [
                'content' => 'Perencanaan Bahan Rapat Internal',
                'service_id' => 4
            ],
            [
                'content' => 'Pelaksanaan Penegakan Kode Etik DPRD',
                'service_id' => 4
            ],
            [
                'content' => 'Fasilitasi Pelaksanaan Kegiatan Dialog dengan Pemerintah',
                'service_id' => 4
            ],
            [
                'content' => 'Fasilitasi Pelaksanaan Kegiatan Penyerapan Aspirasi Masyarakat',
                'service_id' => 4
            ],
            [
                'content' => 'Fasilitasi Penyusunan Pokok-Pokok Pikiran',
                'service_id' => 4
            ],
            [
                'content' => 'Fasilitasi Pelaksanaan Kegiatan Reses Anggota DPRD',
                'service_id' => 4
            ],

        ];

        DB::table('questions')->insert($questions);
    }
}
