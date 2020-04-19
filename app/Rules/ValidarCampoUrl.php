<?php

namespace App\Rules;

use App\Models\Admin\Menu;
use Illuminate\Contracts\Validation\Rule;

class ValidarCampoUrl implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public $accion;
    public function __construct($accion = null)
    {
        $this->accion = $accion;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //dd(Menu::where($attribute, $value)->get()->where('id', '!=', request()->route('menu')->id));
        if ($value != '#') {
            if ($this->accion == "guardar") {
                $menu = Menu::where($attribute, $value)->get();
            } else {
                $menu = Menu::where($attribute, $value)->get()->where('id', '!=', request()->route('menu')->id);
            }
            return $menu->isEmpty();
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
        return 'Esta url ya esta asignada.';
    }
}
