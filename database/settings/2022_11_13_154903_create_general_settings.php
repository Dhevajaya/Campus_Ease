<?php

use Spatie\LaravelSettings\Exceptions\SettingAlreadyExists;
use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('web.website_logo');
        $this->migrator->add('web.website_logo_dark');
        $this->migrator->add('web.website_name', config('app.name'));
        $this->migrator->add('web.website_keywords', 'Jasa Pembuatan Website Kota Malang');
        $this->migrator->add('web.website_description', 'Web ini merupakan web sekolah');
        $this->migrator->add('web.website_phone', '+6285769782106');
        $this->migrator->add('web.website_address', 'Jln. Badawi Hudan RT 1, Jaya Klp., Kec. Mentaya Hilir Selatan, 74363');
        $this->migrator->add('web.website_email', 'admin@school.co.id');
        $this->migrator->add('web.principal_name', 'Hariyanto Budiman');
        $this->migrator->add('web.principal_welcome', 'Assalamualaikum wr.wb.

        Puji syukur kepada Alloh SWT, Tuhan Yang Maha Esa yang telah memberikan rahmat dan anugerahNya sehingga website '.config("app.name").' ini dapat terbit. Salah satu tujuan dari website ini adalah untuk menjawab akan setiap kebutuhan informasi dengan memanfaatkan sarana teknologi informasi yang ada. Kami sadar sepenuhnya dalam rangka memajukan pendidikan di era berkembangnya Teknologi Informasi yang begitu pesat, sangat diperlukan berbagai sarana prasarana yang kondusif, kebutuhan berbagai informasi siswa, guru, orangtua maupun masyarakat, sehingga kami berusaha mewujudkan hal tersebut semaksimal mungkin. Semoga dengan adanya website ini dapat membantu dan bermanfaat, terutama informasi yang berhubungan dengan pendidikan, ilmu pengetahuan dan informasi seputar '.config("app.name").'.
        
        Besar harapan kami, sarana ini dapat memberi manfaat bagi semua pihak yang ada dilingkup pendidikan dan pemerhati pendidikan secara khusus bagi '.config("app.name").'.
        
        Akhirnya kami mengharapkan masukan dari berbagai pihak untuk website ini agar kami terus belajar dan meng-update diri, sehingga tampilan, isi dan mutu website akan terus berkembang dan lebih baik nantinya. Terima kasih atas kerjasamanya, maju terus untuk mencapai '.config("app.name").' yang lebih baik lagi.
        
        Wassalamualaikum wr.wb.');
        $this->migrator->add('web.principal_avatar');
        $this->migrator->add('web.home_quotes','Dengan ilmu yang memadai, kamu bisa menggemggam dunia dan mengejar mimpi besar. Kamu pun nantinya akan menjadi orang yang berguna bagi masyarakat dan bangsa.');
        $this->migrator->add('web.home_banner');
    }
}
