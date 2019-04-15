<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Models\Product\Product;
use App\Models\Product\Card;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public const STATUS_WAIT = 'wait';
    public const STATUS_ACTIVE = 'active';

    public const ROLE_USER = 'user';
    public const ROLE_ADMIN = 'admin';

    protected $fillable = ['name', 'last_name', 'email', 'password', 'status', 'role', 'verify_token', 'password_token'];
    protected $hidden = ['password', 'remember_token', 'password_token', 'role', 'status'];
    
    public static function register(string $name, string $email, string $password)
    {
        return static::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'verify_token' => Str::uuid(),
            'role' => self::ROLE_USER,
            'status' => self::STATUS_WAIT,
        ]);
    }

    public function setPasswordToken() 
    {
        $this->password_token = Str::uuid();
        $this->save();
    }

    public function verify(): void
    {
        if (!$this->isWait()) {
            throw new \DomainException('Ваша почта уже подтверждена');
        }

        $this->update([
            'status' => self::STATUS_ACTIVE,
            'verify_token' => null,
        ]);
    }

    public static function new($name, $email)
    {
        return static::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt(Str::random()),
            'role' => self::ROLE_USER,
            'status' => self::STATUS_WAIT,
        ]);
    }

    public function addToCard($productId, $sizeId)
    {
        $check = DB::table('card')->where('product_id', $productId)
                ->where('size_id', $sizeId)
                ->where('user_id', Auth::user()->id)
                ->exists();

        if($check) {
            DB::table('card')->where('product_id', $productId)
                ->where('size_id', $sizeId)
                ->where('user_id', Auth::user()->id)
                ->increment('quantity');
        } else {
            $this->cards()->attach($productId, ['size_id' => $sizeId]);
            $this->save();
        }
    }
    
    public function productQuantityInCard($id) {
        return $this->cards()->where('id', $id)->value('quantity');
    }

    public function cartCount()
    {
        $count = null;
        foreach (Auth::user()->cards()->get()->toArray() as $item) {
            $count += $item['pivot']['quantity'];
        }
        return $count;
    }
    
    public function removeFromCard($id)
    {    
        Card::find($id)->delete();
    }

    public function hasInCard($id)
    {
        return $this->cards()->where('id', $id)->exists();
    }

    public function isActive()
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    public function isWait()
    {
        return $this->status === self::STATUS_WAIT;
    }

    public function isAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }
    
    public function cards()
    {
        return $this->belongsToMany(Product::class, 'card')->withPivot('size_id', 'quantity', 'id');
    }
}
