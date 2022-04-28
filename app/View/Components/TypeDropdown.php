<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\MediaType;

class TypeDropdown extends Component
{
    public function render()
    {
        return view('components.type-dropdown', [
            'types' => MediaType::all(),
        ]);
    }
}
