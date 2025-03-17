<?php 
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomFacilityRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Change this if needed
    }

    public function rules()
    {
        return [
            'room_id' => 'required|exists:rooms,id',
            'name' => 'required|string|max:255',
        ];
    }
}
