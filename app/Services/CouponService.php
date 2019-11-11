<?php

namespace App\Services;

use App\Category;
use App\CouponUser;
use App\Coupon;
use App\Course;
use Auth;

class CouponService
{
    public function getTypeCoupon($type_id, $type_coupon)
    {
        if ($type_coupon == 'produto') {
            $type = Course::whereIn('id', $type_id)->get();
        } else if ($type_coupon == 'carrinho') {
            $type = [];
        } else if ($type_coupon == 'macrotema') {
            $type = Category::whereIn('id', $type_id)->whereIn('category_id', $type_id)->get();
        } else if ($type_coupon == 'subcategoria') {
            $type = Category::whereIn('category_id', $type_id)->get();
        }
        return $type;
    }

    //Valida se o cupom pode ser usado
    public function validateCoupon(Coupon $coupon): bool
    {
        $auth = Auth::guard('user')->user();
        $couponUser = CouponUser::where('user_id', $auth->id)->where('coupon_id', $coupon->id)->first();


        if (!$couponUser) {
            if ($coupon->limit != null) {
                if (!$this->limitValidate($coupon))
                    return false;
            }
            $hasDiscount = $this->generateDiscount($coupon, $auth->cart);
            if ($hasDiscount) {
                CouponUser::create([
                    'coupon_id' => $coupon->id,
                    'user_id' => $auth->id,
                ]);
            }
            return true;
        }
        return false;
    }

    //Verifica o limite do cupom
    private function limitValidate(Coupon $coupon): bool
    {
        $uses = CouponUser::where('coupon_id', $coupon->id)->count();
        if ($uses >= $coupon->limit) {
            return false;
        }
        return true;
    }

    private function generateDiscount(Coupon $coupon, $courses)
    {
        if ($coupon->type_coupon == 'carrinho') {
            return $this->fixedDiscount($coupon, $courses);
        } elseif ($coupon->type_coupon == 'produto') {
            return $this->courseDiscount($coupon, $courses);
        } elseif ($coupon->type_coupon == 'macrotema') {
            return $this->macrotemaDiscount($coupon, $courses);
        } elseif ($coupon->type_coupon == 'subcategoria') {
            return $this->subcategoryDiscount($coupon, $courses);
        }
    }



    private function fixedDiscount(Coupon $coupon, $courses)
    {
        $discount = $coupon->value_coupon / $courses->count();
        if ($coupon->type_discount == 'dinheiro') {
            foreach ($courses as $cart) {
                $cart->pivot->discount = $discount;
                $cart->pivot->coupon = $coupon->cod_coupon;
                $cart->pivot->save();
            }
        } else {
            foreach ($courses as $cart) {
                $cart->pivot->discount = ($cart->price * $discount) / 100;
                $cart->pivot->coupon = $coupon->cod_coupon;

                $cart->pivot->save();
            }
        }
        return true;
    }

    private function courseDiscount(Coupon $coupon, $courses)
    {
        $coursesCoupon = unserialize($coupon->type_id);
        $idCourse = $courses->pluck('id')->filter(function ($item) use ($coursesCoupon) {
            if (in_array($item, $coursesCoupon)) {
                return $item;
            }
        })->toArray();

        if (count($idCourse) == 0) {
            return false;
        }

        $coursesWithDiscount = $courses->whereIn('id', $idCourse);
        $discount = $coupon->value_coupon / count($coursesWithDiscount);
        if ($coupon->type_discount == 'dinheiro') {
            foreach ($coursesWithDiscount as $cart) {
                $cart->pivot->discount = $discount;
                $cart->pivot->coupon = $coupon->cod_coupon;
                $cart->pivot->save();
            }
        } else {
            foreach ($coursesWithDiscount as $cart) {
                $cart->pivot->discount = $discount;
                $cart->pivot->coupon = $coupon->cod_coupon;
                $cart->pivot->save();
            }
        }
        return true;
    }

    private function macrotemaDiscount(Coupon $coupon, $courses)
    {
        $categoriesCoupon = unserialize($coupon->type_id);

        $idCategory = $courses->pluck('category_id')->filter(function ($item) use ($categoriesCoupon) {
            if (in_array($item, $categoriesCoupon)) {
                return $item;
            }
        })->toArray();
        if (count($idCategory) == 0) {
            return false;
        }
        $categoriesWithDiscount = $courses->whereIn('category_id', $idCategory);
        $discount = $coupon->value_coupon / count($categoriesWithDiscount);

        if ($coupon->type_discount == 'dinheiro') {
            foreach ($categoriesWithDiscount as $cart) {
                $cart->pivot->discount = $discount;
                $cart->pivot->coupon = $coupon->cod_coupon;
                $cart->pivot->save();
            }
        } else {
            foreach ($categoriesWithDiscount as $cart) {
                $cart->pivot->discount = $discount;
                $cart->pivot->coupon = $coupon->cod_coupon;
                $cart->pivot->save();
            }
        }
        return true;
    }

    private function subcategoryDiscount(Coupon $coupon, $courses)
    {
        $subCategoriesCoupon = unserialize($coupon->type_id);

        $idSubCategory = $courses->pluck('subcategory_id')->filter(function ($item) use ($subCategoriesCoupon) {
            if (in_array($item, $subCategoriesCoupon)) {
                return $item;
            }
        })->toArray();
        if (count($idSubCategory) == 0) {
            return false;
        }
        $subCategoriesWithDiscount = $courses->whereIn('subcategory_id', $idSubCategory);
        $discount = $coupon->value_coupon / count($subCategoriesWithDiscount);

        if ($coupon->type_discount == 'dinheiro') {
            foreach ($subCategoriesWithDiscount as $cart) {
                $cart->pivot->discount = $discount;
                $cart->pivot->coupon = $coupon->cod_coupon;
                $cart->pivot->save();
            }
        } else {
            foreach ($subCategoriesWithDiscount as $cart) {
                $cart->pivot->discount = $discount;
                $cart->pivot->coupon = $coupon->cod_coupon;
                $cart->pivot->save();
            }
        }
        return true;
    }
}
