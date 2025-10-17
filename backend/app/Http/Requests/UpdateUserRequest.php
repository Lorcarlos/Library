<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('id');

        return [
            'nombre' => ['sometimes', 'string', 'regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+$/'],
            'apellido' => ['sometimes', 'string', 'regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+$/'],
            'correo_electronico' => ['sometimes', 'email', 'unique:users,correo_electronico,' . $id . ',id'],
            'password' => ['sometimes', 'string', 'min:6'],
            'cedula' => ['nullable', 'digits:10', 'unique:users,cedula,' . $id . ',id'],
            'pasaporte' => ['nullable', 'digits:6'],
            'telefono' => ['sometimes', 'regex:/^3\d{9}$/', 'unique:users,telefono,' . $id . ',id'],
            'direccion' => ['nullable', 'string'],
            'pais' => ['sometimes', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.regex' => 'El nombre no puede contener números ni símbolos.',
            'apellido.regex' => 'El apellido no puede contener números ni símbolos.',
            'correo_electronico.email' => 'Debe ingresar un correo electrónico válido.',
            'correo_electronico.unique' => 'Este correo electrónico ya está registrado.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'telefono.regex' => 'El teléfono debe comenzar con 3 y tener exactamente 10 dígitos.',
            'telefono.unique' => 'Este número de teléfono ya está registrado.',
            'cedula.digits' => 'La cédula debe tener exactamente 10 dígitos.',
            'cedula.unique' => 'Esta cédula ya está registrada.',
            'pasaporte.digits' => 'El pasaporte debe tener exactamente 6 caracteres.',
        ];
    }
}
