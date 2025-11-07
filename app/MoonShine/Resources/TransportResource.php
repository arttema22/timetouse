<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Transport;

use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Checkbox;
use MoonShine\UI\Fields\Position;
use MoonShine\UI\Components\Boolean;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;

/**
 * @extends ModelResource<Transport>
 */
class TransportResource extends ModelResource
{
    protected string $model = Transport::class;

    protected string $title = 'Transports';

    protected function indexFields(): iterable
    {
        return [
            Position::make(),
            BelongsTo::make(
                'Владелец',
                'owner',
                fn($user) => $user->name,
                TransportResource::class
            ),
            BelongsTo::make(
                'Тип ТС',
                'typeModel',
                fn($user) => $user->name,
                resource: TransportTypeResource::class
            ),
            Text::make('Название', 'name'),
            Number::make('Цена за час', 'price_per_hour'),
            Number::make('Цена за день', 'price_per_day'),
            Text::make('Место', 'location'),
            Checkbox::make('Активен', 'is_active'),
        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [
            Box::make([
                BelongsTo::make(
                    'Владелец',
                    'owner',
                    fn($user) => $user->name,
                    TransportResource::class
                )
                    ->searchable(),
                BelongsTo::make(
                    'Тип ТС',
                    'typeModel',
                    fn($user) => $user->name,
                    resource: TransportTypeResource::class
                )->associatedWith('country_id')
                    ->searchable(),
                Text::make('Название', 'name'),
                Number::make('Цена за час', 'price_per_hour'),
                Number::make('Цена за день', 'price_per_day'),
                Text::make('Место', 'location'),
                Checkbox::make('Активен', 'is_active'),
            ])
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            BelongsTo::make(
                'Владелец',
                'owner',
                fn($user) => $user->name,
                TransportResource::class
            ),
            BelongsTo::make(
                'Тип ТС',
                'typeModel',
                fn($user) => $user->name,
                resource: TransportTypeResource::class
            ),
            Text::make('Название', 'name'),
            Number::make('Цена за час', 'price_per_hour'),
            Number::make('Цена за день', 'price_per_day'),
            Text::make('Место', 'location'),
            Checkbox::make('Активен', 'is_active'),
        ];
    }

    protected function rules(mixed $item): array
    {
        return [
            'owner_id' => 'required|exists:users,id',
            'type' => 'required|exists:transport_types,slug', // связь по slug
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price_per_hour' => 'nullable|numeric|min:0',
            'price_per_day' => 'nullable|numeric|min:0',
            'location' => 'required|string|max:255',
            'is_active' => 'boolean',
        ];
    }

    public function filters(): array
    {
        return [
            BelongsTo::make(
                'Владелец',
                'owner',
                fn($user) => $user->name,
                TransportResource::class
            )->nullable()->searchable(),
            BelongsTo::make(
                'Тип ТС',
                'typeModel',
                fn($user) => $user->name,
                resource: TransportTypeResource::class
            )->nullable()->searchable(),
            Checkbox::make('Активен', 'is_active')->nullable(),
        ];
    }

    public function search(): array
    {
        return ['name', 'location', 'price_per_hour', 'price_per_day'];
    }
}
