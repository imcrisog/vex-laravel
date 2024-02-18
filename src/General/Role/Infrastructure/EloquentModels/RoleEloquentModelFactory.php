<?php


namespace Src\General\Role\Infrastructure\EloquentModels;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Src\General\Role\Infrastructure\EloquentFactories>
 */
class RoleEloquentModelFactory extends Factory
{
    protected $model = RoleEloquentModel::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
        ];
    }
}
