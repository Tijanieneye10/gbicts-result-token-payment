<?php

namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'scratch_cards';
    protected $primaryKey = 'card_id';
    public $timestamps = false;

    protected $fillable = [
        'card_no'
    ];

    public static function generateToken($tokenNumber)
    {
        // To generate unique tokens
        $countNum = 1;
        $nunOfTimeToGenerate = $tokenNumber;
        $card_no = [];
        while ($countNum <= $nunOfTimeToGenerate) {

            $n = 12;
            $characters = '0123456789';
            $randomString = '';
            for ($i = 0; $i < $n; $i++) {
                $index = rand(0, strlen($characters) - 1);
                $randomString .= $characters[$index];
            }
            $randomNumber = $randomString;
            $card_no['card'] = $randomNumber;

            Admin::create(['card_no' => $card_no['card']]);
            $countNum++;
        }
    }

}
