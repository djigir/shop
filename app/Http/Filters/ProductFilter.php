<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    const CATEGORIES = 'categories';
    const COLORS = 'colors';
    const PRICES = 'prices';
    const TAGS = 'tags';



    const BIG = 'big';
    const SMALL = 'small';


    protected function getCallback(): array
    {
        return [
            self::CATEGORIES => [$this, 'categories'],
            self::COLORS => [$this, 'colors'],
            self::PRICES => [$this, 'prices'],
            self::TAGS => [$this, 'tags'],
            self::BIG => [$this, 'big'],
            self::SMALL => [$this, 'small'],
        ];
    }

    protected function categories(Builder $builder, $value)
    {
        $builder->whereIn('category_id', $value);
    }

    protected function colors(Builder $builder, $value)
    {
        $builder->whereHas('colors', function ($b) use ($value) {
            $b->whereIn('color_id', $value);
        });
    }

    protected function prices(Builder $builder, $value)
    {
        $builder->whereBetween('price', $value);
    }

    protected function tags(Builder $builder, $value)
    {
        $builder->whereHas('tags', function ($b) use ($value) {
            $b->whereIn('tag_id', $value);
        });
    }

















    protected function big(Builder $builder, $value)
    {
        $builder->where('id', 3);
    }

    protected function small(Builder $builder, $value)
    {
        $builder->where('id', 4);
    }
}
