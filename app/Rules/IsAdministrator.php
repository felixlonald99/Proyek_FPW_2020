<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IsAdministrator implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */

    //ada 2 function di sini, passes dan message

    public function passes($attribute, $value)
    {
        //function ini untuk melakukan pengecekan atau validasi secara custom
        //isi dari inputan nya dilemparkan dengan menggunakan parameter $value
        //return hanya TRUE atau FALSE saja
        //kalau return TRUE, dia lolos validasi. kalau FALSE berarti dia gagal validasi
        //contoh dibawah ini untuk memeriksa apakah dalam nama terdapat kata "admin"
        if(str_contains(strtolower($value),'admin')) {
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        //mereturnkan pesan error apabila field tidak lolos validasi
        //pesan ini tidak perlu ditambahkan lagi pada $customError pada controller
        return 'Tidak Boleh Ada ADMIN pada NAMA';
    }
}
