<?php

    namespace App\View\Components\Table;

    use Illuminate\Contracts\View\View;
    use Illuminate\View\Component;

    class Table extends Component
    {
        public function render(): View
        {
            return view('components.table.table');
        }
    }
