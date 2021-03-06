<?php

namespace App\Nova\Filters;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Laravel\Nova\Filters\DateFilter;

class RegisteredDate extends DateFilter
{
    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        $value = explode(" to ", $value);

        $value = Carbon::parse($value[0]);

        return $query->where('created_at', '>', $value);
    }

    public function default()
    {
        return '2021-08-05';
    }

    public function range()
    {
        return $this->withMeta(['mode' => 'range']);
    }
}
