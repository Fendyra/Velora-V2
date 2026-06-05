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
            if (!empty($product->image)) {
                $data['image'] = \Illuminate\Support\Facades\Storage::url($product->image);
            } else {
                $data['image'] = '/assets/images/products/product1.png'; // Fallback
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
    public static function logbook(): array
    {
        return [
            [
                'id' => 'L007',
                'date' => '14.05.26',
                'tag' => 'STUDIO',
                'title' => 'Notes from the cutting room — fitting the Mirror Tee',
                'excerpt' => "Two grams of fabric weight separate a tee that drapes from one that hangs. This week we obsessed over the drop shoulder of the Mirror Tee — the kind of seam you don't notice, until it's wrong.",
                'image' => '/assets/images/about/about2.png',
            ],
            [
                'id' => 'L006',
                'date' => '02.05.26',
                'tag' => 'PROCESS',
                'title' => 'Indigo, again. Sourcing pigments from Tegal',
                'excerpt' => 'For Quiet Riot we returned to natural indigo. Slower, less uniform, more honest. Each garment carries a fingerprint of the dye bath it was born in.',
                'image' => '/assets/images/products/product8.png',
            ],
            [
                'id' => 'L005',
                'date' => '21.04.26',
                'tag' => 'DROP',
                'title' => 'Drop 002 — release notes',
                'excerpt' => 'Drop 002 went live at 19:00 WIB. Fifteen pieces. Six sold through within the hour. Notes on what we learned, and what stays.',
                'image' => '/assets/images/products/product5.png',
            ],
            [
                'id' => 'L004',
                'date' => '09.04.26',
                'tag' => 'FIELD',
                'title' => 'Three days with the Atelier Shirt, in Jakarta',
                'excerpt' => 'A field test, not a campaign. Worn for seventy-two hours by three friends, photographed on phones, never ironed.',
                'image' => '/assets/images/home/landingpage/model2.jpg',
            ],
            [
                'id' => 'L003',
                'date' => '28.03.26',
                'tag' => 'STUDIO',
                'title' => 'On the difference between bone and ivory',
                'excerpt' => 'Our bone is one degree warmer than ivory. It changes how the garment reads against skin. A small thing that is not a small thing.',
                'image' => '/assets/images/home/landingpage/model1.jpg',
            ],
            [
                'id' => 'L002',
                'date' => '12.03.26',
                'tag' => 'INTERVIEW',
                'title' => 'In conversation with Rasya, pattern maker',
                'excerpt' => 'Eighteen years of cutting. Six years with Velora. Rasya on patience, on quiet hands, on why the first sample is never the last.',
                'image' => '/assets/images/home/landingpage/model3.jpg',
            ],
        ];
    }

    /** @return array<int, array{label:string,route:string}> */
    public static function nav(): array
    {
        return [
            ['label' => 'Shop', 'route' => 'shop'],
            ['label' => 'Logbook', 'route' => 'logbook'],
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
