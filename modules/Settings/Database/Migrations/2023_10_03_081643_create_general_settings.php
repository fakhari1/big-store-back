<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.title');
        $this->migrator->add('general.description');
        $this->migrator->add('general.keywords');
        $this->migrator->add('general.logo_id');
        $this->migrator->add('general.icon_id');
        $this->migrator->add('general.landline_phones');
        $this->migrator->add('general.address_id');
        $this->migrator->add('general.instagram_username');
        $this->migrator->add('general.telegram_username');
    }
};
