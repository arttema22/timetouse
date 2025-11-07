<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\TransportType;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Position;
use MoonShine\Laravel\Fields\Slug;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\Laravel\Resources\ModelResource;

class TransportTypeResource extends ModelResource
{
    protected string $model = TransportType::class;

    protected string $title = 'TransportTypes';

    protected function indexFields(): iterable
    {
        return [
            Position::make(),
            Text::make('Название', 'name')->sortable(),
        ];
    }
    protected function formFields(): iterable
    {
        return [
            Box::make([
                Text::make('Название', 'name')->required()->reactive(),
                Slug::make('Slug', 'slug')->from('name')->hint('Используется в URL и связях')->unique()->live(),
            ])
        ];
    }
    protected function detailFields(): iterable
    {
        return [
            Text::make('Название', 'name')->required(),
            Slug::make('Slug', 'slug')->from('name'),
        ];
    }
    protected function rules(mixed $item): array
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|alpha_dash|unique:transport_types,slug,' . $item->id,
        ];
    }
}
