<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name"=>$this->faker->name(),
            "image"=>$this->faker->image(),
            "description"=>$this->faker->paragraph(),
            "price"=>$this->faker->numberBetween(100,5000),
            "qty"=>$this->faker->numberBetween(1,100),
            "category_id"=>mt_rand(1,50)
        ];
    }
}
