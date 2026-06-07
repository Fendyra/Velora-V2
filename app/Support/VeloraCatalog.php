<?php

namespace App\Support;

final class VeloraCatalog
{
    /**
     * @return array<int, array{id:string,name:string,collection:string,price:int,image:string,tag:string,category:string,sizes:array<int,string>,colors:array<int,string>}>
     */
    public static function products(): array
    {
        return \App\Models\Product::all()->map(function ($product) {
            $data = $product->toArray();
            $data['id'] = $product->sku;
            
            // Format Image URL appropriately
            if (!empty($product->image) && !str_starts_with($product->image, '/assets')) {
                $data['image'] = \Illuminate\Support\Facades\Storage::url($product->image);
            } elseif (!empty($product->image)) {
                $data['image'] = $product->image;
            } else {
                $data['image'] = '/assets/images/products/product1.png'; // Fallback
            }

            if ($data['id'] === 'V04') {
                $data['image'] = '/assets/images/products/product1-front.png';
            } elseif ($data['id'] === 'V05') {
                $data['image'] = '/assets/images/products/product2-front.png';
            } elseif ($data['id'] === 'V06') {
                $data['image'] = '/assets/images/products/product3-front.png';
            } elseif ($data['id'] === 'V07') {
                $data['image'] = '/assets/images/products/product4-front.png';
            } elseif ($data['id'] === 'V08') {
                $data['image'] = '/assets/images/products/product5-front.png';
            }
            // Fallbacks for new dynamic fields
            $data['description'] = $product->description ?? 'Cut in heavyweight Indonesian cotton, finished by hand at our atelier in Bandung. Garment-dyed for a softened patina that deepens with wear.';
            $data['details'] = $product->details ?? '100% combed Indonesian cotton, 280gsm. Garment-dyed in small batches. Cut & sewn in our Bandung atelier. Each piece serialised at the hem.';
            $data['care_instructions'] = $product->care_instructions ?? 'Wash cold inside-out, line dry in shade. Do not bleach. Iron low. Embrace the patina — it is the point.';
            $data['shipping_returns'] = $product->shipping_returns ?? 'Free shipping over IDR 1.000.000. Despatched every Thursday from Bandung. 14-day returns, unworn, original tags attached.';

            return $data;
        })->toArray();
    }

    /** @return array<int, array{id:string,title:string,period:string,count:int,hero:string,blurb:string}> */
    public static function collections(): array
    {
        return [
            [
                'id' => 'C03',
                'title' => 'The Everyday',
                'period' => 'AUTUMN — 2026',
                'count' => 14,
                'hero' => '/assets/images/home/landingpage/collection1.png',
                'blurb' => 'A study in restraint. Garments built for the in-between hours — the walk home, the slow morning, the late call.',
            ],
            [
                'id' => 'C02',
                'title' => 'Quiet Riot',
                'period' => 'SPRING — 2026',
                'count' => 11,
                'hero' => '/assets/images/home/landingpage/collection2.png',
                'blurb' => 'Softened protest. Statement silhouettes flattened by craft, dyed in mineral tones, finished by hand.',
            ],
            [
                'id' => 'C01',
                'title' => 'Almost Forgotten',
                'period' => 'WINTER — 2025',
                'count' => 9,
                'hero' => '/assets/images/home/landingpage/collection3.png',
                'blurb' => 'The archive piece. Forms revived from a dropped capsule, re-cut at the atelier in Bandung.',
            ],
        ];
    }

    /** @return array<int, array{id:string,date:string,tag:string,title:string,excerpt:string,image:string}> */
    public static function lookbook(): array
    {
        return [
            [
                'id' => 'L001',
                'date' => '14.05.26',
                'tag' => 'STUDIO',
                'title' => 'Notes from the cutting room — fitting the Mirror Tee',
                'excerpt' => "Two grams of fabric weight separate a tee that drapes from one that hangs. This week we obsessed over the drop shoulder of the Mirror Tee — the kind of seam you don't notice, until it's wrong.",
                'image' => '/assets/images/lookbook/lookbook1.png',
            ],
            [
                'id' => 'L002',
                'date' => '02.05.26',
                'tag' => 'PROCESS',
                'title' => 'Defined by detail. Worn with intention.',
                'excerpt' => 'Developed through careful washing techniques and refined proportions, each piece reflects Velora’ s pursuit of quiet distinction.',
                'image' => '/assets/images/lookbook/lookbook2.png',
            ],
            [
                'id' => 'L003',
                'date' => '21.04.26',
                'tag' => 'DROP',
                'title' => 'Drop 002 — release notes',
                'excerpt' => 'Drop 002 went live at 19:00 WIB. Fifteen pieces. Six sold through within the hour. Notes on what we learned, and what stays.',
                'image' => '/assets/images/lookbook/lookbook3.png',
            ],
            [
                'id' => 'L004',
                'date' => '09.04.26',
                'tag' => 'FIELD',
                'title' => 'Three days with the Atelier Shirt, in Jakarta',
                'excerpt' => 'A field test, not a campaign. Worn for seventy-two hours by three friends, photographed on phones, never ironed.',
                'image' => '/assets/images/lookbook/lookbook4.png',
            ],
            [
                'id' => 'L005',
                'date' => '28.03.26',
                'tag' => 'STUDIO',
                'title' => 'Notes from the Atelier',
                'excerpt' => 'Behind every finished piece lies a process of observation and refinement. The result is clothing shaped not by excess, but by intention.',
                'image' => '/assets/images/lookbook/lookbook5.png',
            ],
            [
                'id' => 'L006',
                'date' => '12.03.26',
                'tag' => 'FIELD',
                'title' => 'The anatomy of a day.', 
                'excerpt' => 'From first step to final destination, each piece serves a purpose. Utility without compromise.',
                'image' => '/assets/images/lookbook/lookbook6.png',
            ],
            [
                'id' => 'L007',
                'date' => '01.01.26',
                'tag' => 'FIELD',
                'title' => 'Atelier, Yogyakarta.',
                'excerpt' => 'Nestled in the city where Velora began, our space brings together community, craftsmanship, and contemporary dressing.',
                'image' => '/assets/images/lookbook/lookbook7.png',
            ],
            [
                'id' => 'L008',
                'date' => '01.01.26',
                'tag' => 'DROP',
                'title' => 'The Shape of Everyday',
                'excerpt' => 'Designed to move through shifting routines with quiet confidence. Familiar in function, refined through proportion, detail, and intent.',
                'image' => '/assets/images/lookbook/lookbook8.png',
            ],
            [
                'id' => 'L009',
                'date' => '01.01.26',
                'tag' => 'DROP',
                'title' => 'Afterhours Uniform',
                'excerpt' => 'Built for the moments between destinations. Relaxed silhouettes and tonal details define a new kind of everyday essential.',
                'image' => '/assets/images/lookbook/lookbook9.png',
            ],
            [
                'id' => 'L010',
                'date' => '01.01.26',
                'tag' => 'EDITORIAL',
                'title' => 'The Quiet Statement',
                'excerpt' => 'Not designed to demand attention, but to hold it. A contemporary outerwear piece shaped through subtle contrasts and considered craftsmanship.',
                'image' => '/assets/images/lookbook/lookbook10.png',
            ]
        ];
    }

    /** @return array<int, array{label:string,route:string}> */
    public static function nav(): array
    {
        return [
            ['label' => 'Shop', 'route' => 'shop'],
            ['label' => 'Lookbook', 'route' => 'lookbook'],
            ['label' => 'Atelier', 'route' => 'atelier'],
            ['label' => 'Stockists', 'route' => 'stockists'],
        ];
    }

    public static function fmtIDR(int $n): string
    {
        return 'IDR ' . number_format($n, 0, ',', '.');
    }

    /** @return array{id:string,name:string,collection:string,price:int,image:string,tag:string,category:string,sizes:array<int,string>,colors:array<int,string>} */
    public static function findProduct(string $id): array
    {
        foreach (self::products() as $p) {
            if ($p['id'] === $id) {
                return $p;
            }
        }

        $all = self::products();
        return $all[0];
    }
}
