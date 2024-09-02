<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Recipe;
use App\Models\Ingredient;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Test User Admin',
            'email' => 'test@example.com',
            // 'role' => 'administrator',
            'password' => 'password',
        ]);

        $recipe = Recipe::create([
            'title' => "Limonade de Coco",
            'description' => "Mettre les glaçons à votre goût dans le blender, ajouter le lait, la crème de coco, le jus de 2 citrons et le sucre. Mixer jusqu'à avoir la consistence désirée",
            'image' => 'images/Limonade de Coco.jpg',
            'time' => '10',
            'serving' => '1',
            'ustensils' => "Cuillère à soupe, verres, presse-citron",
            'appliance' => "Blender"
        ]);

        $ingredients = [
            [
                'title' => 'Lait de coco',
                'quantity' => 400,
                'unit' => 'ml'
            ],
            [
                'title' => 'Jus de citron',
                'quantity' => 2,
                'unit' => null
            ],
            [
                'title' => 'Crème de coco',
                'quantity' => 2,
                'unit' => 'cuillères à soupe'
            ],
            [
                'title' => 'Sucre',
                'quantity' => 30,
                'unit' => 'grammes'
            ],
            [
                'title' => 'Glaçons',
                'quantity' => null,
                'unit' => null
            ]
        ];

        foreach ($ingredients as $ingredientData) {
            $ingredient = Ingredient::firstOrCreate(['title' => $ingredientData['title']]);

            $recipe->ingredient()->attach($ingredient->id, [
                'quantity' => $ingredientData['quantity'],
                'unit' => $ingredientData['unit']
            ]);
        }


        $recipe = Recipe::create([
            'title' => "Poisson Cru à la tahitienne",
            'description' => "Découper le thon en dés, mettre dans un plat et recouvrir de jus de citron vert (mieux vaut prendre un plat large et peu profond). Laisser reposer au réfrigérateur au moins 2 heures. (Si possible faites-le le soir pour le lendemain. Après avoir laissé mariner le poisson, coupez le concombre en fines rondelles sans la peau et les tomates en prenant soin de retirer les pépins. Rayer la carotte. Ajouter les légumes au poissons avec le citron cette fois ci dans un Saladier. Ajouter le lait de coco. Pour ajouter un peu plus de saveur vous pouvez ajouter 1 à 2 cuillères à soupe de Crème de coco",
            'image' => 'images/Poisson Cru à la tahitienne.jpg',
            'time' => '60',
            'serving' => '2',
            'ustensils' => "Presse-citron",
            'appliance' => "Saladier"
        ]);

        $ingredients = [
            [
                'title' => 'Thon Rouge (ou blanc)',
                'quantity' => 200,
                'unit' => 'grammes'
            ],
            [
                'title' => 'Concombre',
                'quantity' => 1,
                'unit' => null
            ],
            [
                'title' => 'Tomate',
                'quantity' => 2,
                'unit' => null
            ],
            [
                'title' => 'Carotte',
                'quantity' => 1,
                'unit' => null
            ],
            [
                'title' => 'Citron Vert',
                'quantity' => 5,
                'unit' => null
            ],
            [
                'title' => 'Lait de Coco',
                'quantity' => 100,
                'unit' => 'ml'
            ]
        ];

        foreach ($ingredients as $ingredientData) {
            $ingredient = Ingredient::firstOrCreate(['title' => $ingredientData['title']]);

            $recipe->ingredient()->attach($ingredient->id, [
                'quantity' => $ingredientData['quantity'],
                'unit' => $ingredientData['unit']
            ]);
        }

        $recipe = Recipe::create([
            'title' => "Poulet coco réunionnais",
            'description' => "Découper le poulet en morceaux, les faire dorer dans une cocotte avec de l'huile d'olive. Salez et poivrez. Une fois doré, laisser cuire en ajoutant de l'eau. Au bout de 30 minutes, ajouter le coulis de tomate, le lait de coco ainsi que le poivron et l'oignon découpés en morceaux. Laisser cuisiner 30 minutes de plus. Servir avec du riz",
            'image' => 'images/Poulet coco réunionnais.jpg',
            'time' => '80',
            'serving' => '4',
            'ustensils' => "Couteau",
            'appliance' => "Cocotte"
        ]);

        $ingredients = [
            [
                'title' => 'Poulet',
                'quantity' => 1,
                'unit' => null 
            ],
            [
                'title' => 'Lait de coco',
                'quantity' => 400,
                'unit' => 'ml'
            ],
            [
                'title' => 'Coulis de tomate',
                'quantity' => 25,
                'unit' => 'cl'
            ],
            [
                'title' => 'Oignon',
                'quantity' => 1,
                'unit' => null
            ],
            [
                'title' => 'Poivron rouge',
                'quantity' => 1,
                'unit' => null
            ],
            [
                'title' => 'Huile d\'olive',
                'quantity' => 1,
                'unit' => 'cuillères à soupe'
            ]
        ];

        foreach ($ingredients as $ingredientData) {
            $ingredient = Ingredient::firstOrCreate(['title' => $ingredientData['title']]);

            $recipe->ingredient()->attach($ingredient->id, [
                'quantity' => $ingredientData['quantity'],
                'unit' => $ingredientData['unit']
            ]);
        }

        $recipe = Recipe::create(
            [
                'title' => "Salade de riz",
                'description' => "Faire cuire le riz. Une fois le riz cuit, le laisser refroidir. Couper les oeufs dur en quarts ou en lamelle au choix, coupez le tomates en dés, ajouter au riz les oeufs, les tomates, le poisson, le maïs et la vinaigrette. Ajouter au gout de chacun des corniches, olives etc..",
                'image' => 'images/Salade de riz.jpg',
                'time' => '50',
                'serving' => 4,
                'ustensils' => "saladier, passoire",
                'appliance' => "Cuiseur de riz"
            ]
        );

        $ingredients = [
            ['title' => 'Riz blanc', 'quantity' => 500, 'unit' => 'grammes'],
            ['title' => 'Thon en miettes', 'quantity' => 200, 'unit' => 'grammes'],
            ['title' => 'Tomate', 'quantity' => 2, 'unit' => null],
            ['title' => 'Oeuf dur', 'quantity' => 2, 'unit' => null],
            ['title' => 'Maïs', 'quantity' => 300, 'unit' => 'grammes'],
            ['title' => 'Vinaigrette', 'quantity' => 5, 'unit' => 'cl'],
        ];

        foreach ($ingredients as $ingredientData) {
            $ingredient = Ingredient::firstOrCreate(['title' => $ingredientData['title']]);

            $recipe->ingredient()->attach($ingredient->id, [
                'quantity' => $ingredientData['quantity'],
                'unit' => $ingredientData['unit']
            ]);
        }

        $recipe = Recipe::create(
            [
                'title' => "Tarte au thon",
                'description' => "Étaler la pâte feuilleté aux dimensions du moule, étaler la moutarde sur la pâte feuilleté, ajouter le thon. Découper les tomates en rondelles et les poser sur le poisson, ajouter un peu de crème fraîche sur toute la tarte et recouvrez de gruyère râpé. Cuire au four 30 minutes",
                'image' => 'images/Tarte au thon.jpg',
                'time' => "45",
                'serving' => 4,
                'ustensils' => "moule à tarte, râpe à fromage, couteau",
                'appliance' => "Four"
            ]
        );

        $ingredients = [
            ['title' => 'Pâte feuilletée', 'quantity' => 1, 'unit' => null],
            ['title' => 'Thon en miettes', 'quantity' => 130, 'unit' => 'grammes'],
            ['title' => 'Tomate', 'quantity' => 2, 'unit' => null],
            ['title' => 'Crème fraîche', 'quantity' => 2, 'unit' => 'cuillères à soupe'],
            ['title' => 'Gruyère râpé', 'quantity' => 100, 'unit' => 'grammes'],
            ['title' => 'Moutarde de Dijon', 'quantity' => 1, 'unit' => 'cuillères à soupe'],
        ];

        foreach ($ingredients as $ingredientData) {
            $ingredient = Ingredient::firstOrCreate(['title' => $ingredientData['title']]);

            $recipe->ingredient()->attach($ingredient->id, [
                'quantity' => $ingredientData['quantity'],
                'unit' => $ingredientData['unit']
            ]);
        }

        $recipe = Recipe::create(
            [
                'title' => "Tarte aux pommes",
                'description' => "Commencez par mélanger les oeufs le sucre et le sucre vanillé dans un saladier, découper les pommes en tranches, ajouter la crème fraîche aux oeufs. Une fois que tout est pret, étalez la tarte dans le moule. N'oubliez pas de piquer le fond avec une fourchette avant de positionner les pommes sur la tarte. Finalement verser la préparation à base d'oeufs et de crème fraîche. Laisser cuire au four pendant 30 minutes",
                'image' => 'images/Tarte aux pommes.jpg',
                'time' => "50",
                'serving' => 6,
                'ustensils' => "moule à tarte, saladier, fourchette",
                'appliance' => "Four"
            ]
        );

        $ingredients = [
            ['title' => 'Pâte brisée', 'quantity' => 1, 'unit' => null],
            ['title' => 'Pomme', 'quantity' => 3, 'unit' => null],
            ['title' => 'Oeuf', 'quantity' => 2, 'unit' => null],
            ['title' => 'Crème fraîche', 'quantity' => 25, 'unit' => 'cl'],
            ['title' => 'Sucre en poudre', 'quantity' => 100, 'unit' => 'grammes'],
            ['title' => 'Sucre vanillé', 'quantity' => 1, 'unit' => 'sachet'],
        ];

        foreach ($ingredients as $ingredientData) {
            $ingredient = Ingredient::firstOrCreate(['title' => $ingredientData['title']]);

            $recipe->ingredient()->attach($ingredient->id, [
                'quantity' => $ingredientData['quantity'],
                'unit' => $ingredientData['unit']
            ]);
        }
    }
}

