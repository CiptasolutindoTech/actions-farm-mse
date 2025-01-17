<?php

namespace Database\Factories;
use App\Models\AcctAccount;
use Faker\Generator as Faker;
use App\Models\AcctJournalVoucherItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AcctJournalVoucherItem>
 */
class AcctJournalVoucherItemFactory extends Factory
{
        
    protected $model = AcctJournalVoucherItem::class;
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        $account = AcctAccount::factory()->create();
        return [
            'journal_voucher_id' => null,
            'account_id' => $account->account_id, 
            'journal_voucher_description' => $this->faker->sentence,
            'journal_voucher_amount' => $this->faker->randomFloat(2, 0, 1000),
            'account_id_status' => $this->faker->boolean,
            'account_id_default_status' => $this->faker->boolean,
            'journal_voucher_debit_amount' => $this->faker->randomFloat(2, 0, 1000),
            'journal_voucher_credit_amount' => $this->faker->randomFloat(2, 0, 1000),
            'reverse_state' => $this->faker->boolean,
            'created_id' => $this->faker->randomNumber(),
            'updated_id' => $this->faker->randomNumber(),
            'deleted_id' => null, 
        ];
        
       
    }
}