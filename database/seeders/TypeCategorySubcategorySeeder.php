<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use App\Models\Category;
use App\Models\Subcategory;

class TypeCategorySubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'id' => 1001,
            'name' => 'Income',
            'about' => 'Money received by a person or business in exchange for providing labor, producing a good or service, or investing capital.',
            'nature' => 1, // debit
        ]);

        Type::create([
            'id' => 1002,
            'name' => 'Expense',
            'about' => 'Refers to the monetary costs or expenses incurred by an individual, organization to acquire goods, services or assets.',
            'nature' => 0, // credit
        ]);

        // Income Categories
        $incomecategory001 = Category::create([
            'type_id' => 1001,
            'name' => 'Wages',
        ]);
            Subcategory::create([
                'category_id' => $incomecategory001->id,
                'name' => 'Paycheck',
            ]);
            Subcategory::create([
                'category_id' => $incomecategory001->id,
                'name' => 'Tips',
            ]);
            Subcategory::create([
                'category_id' => $incomecategory001->id,
                'name' => 'Bonus',
            ]);
            Subcategory::create([
                'category_id' => $incomecategory001->id,
                'name' => 'Commission',
            ]);
            Subcategory::create([
                'category_id' => $incomecategory001->id,
                'name' => 'Other',
            ]);

        $incomecategory002 = Category::create([
            'type_id' => 1001,
            'name' => 'Other',
        ]);
            Subcategory::create([
                'category_id' => $incomecategory002->id,
                'name' => 'Transfer from savings',
            ]);
            Subcategory::create([
                'category_id' => $incomecategory002->id,
                'name' => 'Interest income',
            ]);
            Subcategory::create([
                'category_id' => $incomecategory002->id,
                'name' => 'Dividends',
            ]);
            Subcategory::create([
                'category_id' => $incomecategory002->id,
                'name' => 'Gifts',
            ]);
            Subcategory::create([
                'category_id' => $incomecategory002->id,
                'name' => 'Refunds',
            ]);
            Subcategory::create([
                'category_id' => $incomecategory002->id,
                'name' => 'Other',
            ]);
        


        // Expense Categories
        $expensecategory001 = Category::create([
            'type_id' => 1002,
            'name' => 'Debt',
        ]);
            Subcategory::create([
                'category_id' => $expensecategory001->id,
                'name' => 'Credit card',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory001->id,
                'name' => 'Student loans',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory001->id,
                'name' => 'Other loans',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory001->id,
                'name' => 'Taxes',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory001->id,
                'name' => 'Other',
            ]);
        $expensecategory002 = Category::create([
                'type_id' => 1002,
                'name' => 'Education',
        ]);
            Subcategory::create([
                'category_id' => $expensecategory002->id,
                'name' => 'Tuition',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory002->id,
                'name' => 'Books',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory002->id,
                'name' => 'Supplies',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory002->id,
                'name' => 'Suscriptions',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory002->id,
                'name' => 'Other',
            ]);
        $expensecategory003 = Category::create([
                'type_id' => 1002,
                'name' => 'Entertainment',
        ]);
            Subcategory::create([
                'category_id' => $expensecategory003->id,
                'name' => 'Books',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory003->id,
                'name' => 'Concerts/shows',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory003->id,
                'name' => 'Games',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory003->id,
                'name' => 'Hobbies',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory003->id,
                'name' => 'Movies',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory003->id,
                'name' => 'Music',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory003->id,
                'name' => 'Sports',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory003->id,
                'name' => 'TV',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory003->id,
                'name' => 'Other',
            ]);
        $expensecategory004 = Category::create([
                'type_id' => 1002,
                'name' => 'Everyday',
        ]);
            Subcategory::create([
                'category_id' => $expensecategory004->id,
                'name' => 'Groceries',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory004->id,
                'name' => 'Restaurants',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory004->id,
                'name' => 'Personal supplies',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory004->id,
                'name' => 'Clothes',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory004->id,
                'name' => 'Laundry/dry cleaning',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory004->id,
                'name' => 'Hair/beauty',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory004->id,
                'name' => 'Subscriptions',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory004->id,
                'name' => 'Other',
            ]);
        $expensecategory005 = Category::create([
                'type_id' => 1002,
                'name' => 'Gifts',
        ]);
            Subcategory::create([
                'category_id' => $expensecategory005->id,
                'name' => 'Gifts',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory005->id,
                'name' => 'Donations',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory005->id,
                'name' => 'Other',
            ]);
        $expensecategory006 = Category::create([
                'type_id' => 1002,
                'name' => 'Health/medical',
        ]);
            Subcategory::create([
                'category_id' => $expensecategory006->id,
                'name' => 'Doctors/dental/vision',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory006->id,
                'name' => 'Specialty care',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory006->id,
                'name' => 'Pharmacy',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory006->id,
                'name' => 'Emergency',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory006->id,
                'name' => 'Other',
            ]);
        $expensecategory007 = Category::create([
                'type_id' => 1002,
                'name' => 'Home',
        ]);
            Subcategory::create([
                'category_id' => $expensecategory007->id,
                'name' => 'Rent/mortgage',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory007->id,
                'name' => 'Property taxes',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory007->id,
                'name' => 'Furnishings',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory007->id,
                'name' => 'Lawn/garden',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory007->id,
                'name' => 'Supplies',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory007->id,
                'name' => 'Maintenance',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory007->id,
                'name' => 'Improvements',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory007->id,
                'name' => 'Moving',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory007->id,
                'name' => 'Other',
            ]);
        $expensecategory008 = Category::create([
                'type_id' => 1002,
                'name' => 'Insurance',
        ]);
            Subcategory::create([
                'category_id' => $expensecategory008->id,
                'name' => 'Car',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory008->id,
                'name' => 'Health',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory008->id,
                'name' => 'Home',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory008->id,
                'name' => 'Life',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory008->id,
                'name' => 'Other',
            ]);
        $expensecategory009 = Category::create([
                'type_id' => 1002,
                'name' => 'Technology',
        ]);
            Subcategory::create([
                'category_id' => $expensecategory009->id,
                'name' => 'Domains & hosting',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory009->id,
                'name' => 'Online services',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory009->id,
                'name' => 'Hardware',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory009->id,
                'name' => 'Software',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory009->id,
                'name' => 'Other',
            ]);
        $expensecategory010 = Category::create([
                'type_id' => 1002,
                'name' => 'Transportation',
        ]);
            Subcategory::create([
                'category_id' => $expensecategory010->id,
                'name' => 'Fuel',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory010->id,
                'name' => 'Car payments',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory010->id,
                'name' => 'Repairs',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory010->id,
                'name' => 'Registration/license',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory010->id,
                'name' => 'Supplies',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory010->id,
                'name' => 'Public transit',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory010->id,
                'name' => 'Parking/tolls',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory010->id,
                'name' => 'Other',
            ]);
        $expensecategory011 = Category::create([
                'type_id' => 1002,
                'name' => 'Travel',
        ]);
            Subcategory::create([
                'category_id' => $expensecategory011->id,
                'name' => 'Airfare',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory011->id,
                'name' => 'Hotels',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory011->id,
                'name' => 'Food',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory011->id,
                'name' => 'Transportation',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory011->id,
                'name' => 'Entertainment',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory011->id,
                'name' => 'Other',
            ]);
        $expensecategory012 = Category::create([
                'type_id' => 1002,
                'name' => 'Utilities',
        ]);
            Subcategory::create([
                'category_id' => $expensecategory012->id,
                'name' => 'Phone',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory012->id,
                'name' => 'TV',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory012->id,
                'name' => 'Internet',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory012->id,
                'name' => 'Electricity',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory012->id,
                'name' => 'Heat/gas',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory012->id,
                'name' => 'Water',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory012->id,
                'name' => 'Trash/recycling',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory012->id,
                'name' => 'Other',
            ]);
        $expensecategory013 = Category::create([
                'type_id' => 1002,
                'name' => 'Other',
        ]);
            Subcategory::create([
                'category_id' => $expensecategory013->id,
                'name' => 'Category 1',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory013->id,
                'name' => 'Category 2',
            ]);
            Subcategory::create([
                'category_id' => $expensecategory013->id,
                'name' => 'Category 3',
            ]);
    }
}
