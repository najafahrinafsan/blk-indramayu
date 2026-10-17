
<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        // Kolom status sudah dibuat di migrasi create_pengumumans_table.
    }

    public function down(): void
    {
        // Tidak menghapus status karena dikelola oleh migrasi pembuat tabel.
    }
};
