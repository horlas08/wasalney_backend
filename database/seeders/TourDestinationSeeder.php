<?php

namespace Database\Seeders;

use App\Models\TourDestination;
use Illuminate\Database\Seeder;

class TourDestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $destinations = [
            [
                'name' => 'Cairo',
                'name_ar' => 'القاهرة',
                'description' => 'The capital of Egypt, home to the Pyramids of Giza and the Egyptian Museum.',
                'description_ar' => 'عاصمة مصر، موطن أهرامات الجيزة والمتحف المصري.',
                'is_departure' => true,
                'active' => true
            ],
            [
                'name' => 'Luxor',
                'name_ar' => 'الأقصر',
                'description' => 'Ancient Egyptian city known for its Valley of the Kings and Karnak Temple.',
                'description_ar' => 'مدينة مصرية قديمة مشهورة بوادي الملوك ومعبد الكرنك.',
                'is_departure' => true,
                'active' => true
            ],
            [
                'name' => 'Aswan',
                'name_ar' => 'أسوان',
                'description' => 'City in southern Egypt known for its Nile River and ancient monuments.',
                'description_ar' => 'مدينة في جنوب مصر مشهورة بنهر النيل والآثار القديمة.',
                'is_departure' => true,
                'active' => true
            ],
            [
                'name' => 'Sharm El Sheikh',
                'name_ar' => 'شرم الشيخ',
                'description' => 'Egyptian resort town between the Sinai Peninsula and the Red Sea.',
                'description_ar' => 'منتجع مصري بين شبه جزيرة سيناء والبحر الأحمر.',
                'is_departure' => false,
                'active' => true
            ],
            [
                'name' => 'Hurghada',
                'name_ar' => 'الغردقة',
                'description' => 'Beach resort town along Egypt\'s Red Sea coast, known for scuba diving.',
                'description_ar' => 'منتجع شاطئي على ساحل البحر الأحمر في مصر، مشهور بالغوص.',
                'is_departure' => false,
                'active' => true
            ],
            [
                'name' => 'Alexandria',
                'name_ar' => 'الإسكندرية',
                'description' => 'Mediterranean port city in Egypt with a famous ancient lighthouse.',
                'description_ar' => 'مدينة ميناء البحر المتوسط في مصر مع منارة قديمة شهيرة.',
                'is_departure' => true,
                'active' => true
            ],
            [
                'name' => 'Siwa Oasis',
                'name_ar' => 'واحة سيوة',
                'description' => 'Ancient oasis in Egypt\'s Western Desert known for its unique culture.',
                'description_ar' => 'واحة قديمة في الصحراء الغربية لمصر معروفة بثقافتها الفريدة.',
                'is_departure' => false,
                'active' => true
            ],
            [
                'name' => 'Dahab',
                'name_ar' => 'دهب',
                'description' => 'Coastal town on the Sinai Peninsula known for its laid-back atmosphere and diving spots.',
                'description_ar' => 'مدينة ساحلية على شبه جزيرة سيناء معروفة بأجوائها الهادئة ومواقع الغوص.',
                'is_departure' => false,
                'active' => true
            ],
            [
                'name' => 'Marsa Alam',
                'name_ar' => 'مرسى علم',
                'description' => 'Resort town on Egypt\'s Red Sea known for its beautiful beaches and marine life.',
                'description_ar' => 'مدينة منتجع على البحر الأحمر في مصر معروفة بشواطئها الجميلة والحياة البحرية.',
                'is_departure' => false,
                'active' => true
            ],
            [
                'name' => 'Fayoum',
                'name_ar' => 'الفيوم',
                'description' => 'Ancient city in Egypt known for its lakes, waterfalls, and ancient ruins.',
                'description_ar' => 'مدينة قديمة في مصر معروفة ببحيراتها وشلالاتها وآثارها القديمة.',
                'is_departure' => false,
                'active' => true
            ]
        ];

        foreach ($destinations as $destination) {
            TourDestination::create($destination);
        }
    }
}
