<?php

namespace App\Filament\Resources\Projects\Pages;

use App\Filament\Resources\Projects\ProjectResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProject extends CreateRecord
{
    protected static string $resource = ProjectResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (empty($data['slug']) && !empty($data['title'])) {
            $data['slug'] = \Str::slug($data['title']);
        }
        if (!empty($data['url_protocol']) && !empty($data['url_domain'])) {
            $data['url'] = $data['url_protocol'] . $data['url_domain'];
        }
        unset($data['url_protocol'], $data['url_domain']);
        return $data;
    }
}
