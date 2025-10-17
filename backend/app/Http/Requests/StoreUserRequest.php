<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => ['required', 'string', 'regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+$/'],
            'apellido' => ['required', 'string', 'regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+$/'],
            'correo_electronico' => ['required', 'email', 'unique:users,correo_electronico'],
            'password' => ['required', 'string', 'min:6'],
            'cedula' => ['nullable', 'digits:10', 'unique:users,cedula'],
            'pasaporte' => ['nullable', 'digits:6'],
            'telefono' => ['required', 'regex:/^3\d{9}$/', 'unique:users,telefono'],
            'direccion' => ['nullable', 'string'],
            'pais' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.regex' => 'El nombre no puede contener números ni símbolos.',
            'apellido.required' => 'El apellido es obligatorio.',
            'apellido.regex' => 'El apellido no puede contener números ni símbolos.',
            'correo_electronico.required' => 'El correo electrónico es obligatorio.',
            'correo_electronico.email' => 'Debe ingresar un correo electrónico válido.',
            'correo_electronico.unique' => 'Este correo electrónico ya está registrado.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'telefono.required' => 'El número de teléfono es obligatorio.',
            'telefono.regex' => 'El teléfono debe comenzar con 3 y tener exactamente 10 dígitos.',
            'telefono.unique' => 'Este número de teléfono ya está registrado.',
            'cedula.digits' => 'La cédula debe tener exactamente 10 dígitos.',
            'cedula.unique' => 'Esta cédula ya está registrada.',
            'pasaporte.digits' => 'El pasaporte debe tener exactamente 6 caracteres.',
            'pais.required' => 'Debe especificar el país de residencia.'
        ];
    }
}
