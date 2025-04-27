<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArQuestionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ar_questions')->delete();
        
        \DB::table('ar_questions')->insert(array (
            0 => 
            array (
                'answer' => 'افتح التطبيق، اختر خدمة "تكسي"، حدد موقعك ووجهتك، ثم اضغط على "طلب". سيصل الكابتن إليك في أقرب وقت',
                'created_at' => '2024-05-27 09:20:33',
                'id' => 11,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'question' => 'كيف يمكنني طلب تكسي عبر تطبيق أوكي؟',
                'report_id' => 186419,
                'sort' => 1716798033545400000,
                'updated_at' => '2025-01-16 13:25:03',
            ),
            1 => 
            array (
                'answer' => 'يمكنك الدفع نقدًا',
                'created_at' => '2025-01-16 13:28:05',
                'id' => 12,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'question' => 'ما هي طرق الدفع المتاحة في التطبيق؟',
                'report_id' => 186420,
                'sort' => 1737032285634900000,
                'updated_at' => '2025-01-16 13:28:05',
            ),
            2 => 
            array (
                'answer' => 'اختر خدمة "سيارة حمل" من التطبيق، حدد موقعك والوجهة، ثم اضغط "طلب". سيصل الكابتن لنقل الأثاث بسرعة وأمان',
                'created_at' => '2025-01-16 13:29:23',
                'id' => 13,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'question' => 'كيف أطلب سيارة حمل لنقل الأثاث؟',
                'report_id' => 186421,
                'sort' => 1737032363235600000,
                'updated_at' => '2025-01-16 13:29:23',
            ),
            3 => 
            array (
                'answer' => 'يمكنك إلغاء الطلب من خلال النقر  واختيار "إلغاء الطلب',
                'created_at' => '2025-01-16 13:30:23',
                'id' => 14,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'question' => 'ما هي الخطوات لإلغاء طلب بعد تأكيده؟',
                'report_id' => 186422,
                'sort' => 1737032423633700000,
                'updated_at' => '2025-01-16 13:30:23',
            ),
            4 => 
            array (
                'answer' => 'نعم، يمكنك التواصل مع فريق الدعم عبر التطبيق لحل أي مشكلة أو استفسار',
                'created_at' => '2025-01-16 13:31:42',
                'id' => 15,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'question' => 'هل توجد خدمات دعم العملاء؟',
                'report_id' => 186423,
                'sort' => 1737032502336100000,
                'updated_at' => '2025-01-16 13:31:42',
            ),
            5 => 
            array (
                'answer' => 'نعم، اختر خدمة "كرين" من التطبيق، حدد موقع سيارتك ووجهتها، وسيصل الكابتن بسرعة لسحب السيارة',
                'created_at' => '2025-01-16 13:33:15',
                'id' => 16,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'question' => 'هل يمكنني طلب كرين لسحب سيارتي المعطلة؟',
                'report_id' => 186424,
                'sort' => 1737032595627600000,
                'updated_at' => '2025-01-16 13:33:15',
            ),
            6 => 
            array (
                'answer' => 'بعد انتهاء الرحلة، ستظهر لك شاشة تقييم الكابتن. يمكنك ترك تقييمك وتعليقك لتحسين الخدمة',
                'created_at' => '2025-01-16 13:33:56',
                'id' => 17,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'question' => 'كيف أترك تقييم للكابتن بعد انتهاء الرحلة؟',
                'report_id' => 186425,
                'sort' => 1737032636095300000,
                'updated_at' => '2025-01-16 13:33:56',
            ),
            7 => 
            array (
            'answer' => 'يمكنك تحميل تطبيق أوكي من متجر التطبيقات على هاتفك (App Store أو Google Play).',
                'created_at' => '2025-01-16 13:34:49',
                'id' => 18,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'question' => 'كيف يمكنني تحميل التطبيق؟',
                'report_id' => 186426,
                'sort' => 1737032689278500000,
                'updated_at' => '2025-01-16 13:34:49',
            ),
            8 => 
            array (
                'answer' => 'يحرص أوكي على اختيار كباتن محترفين وتقديم خدمات آمنة ومريحة لكل المستخدمين',
                'created_at' => '2025-01-16 13:35:34',
                'id' => 19,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'question' => 'كيف أضمن أمان رحلتي مع أوكي؟',
                'report_id' => 186427,
                'sort' => 1737032734119500000,
                'updated_at' => '2025-01-16 13:35:34',
            ),
            9 => 
            array (
                'answer' => 'يمكنك التواصل مع فريق دعم العملاء من خلال قسم "الدعم" في التطبيق.',
                'created_at' => '2025-01-16 13:36:25',
                'id' => 20,
                'parent_id' => NULL,
                'parent_slug' => NULL,
                'question' => 'ماذا أفعل إذا واجهت مشكلة في التطبيق؟',
                'report_id' => 186428,
                'sort' => 1737032785783600000,
                'updated_at' => '2025-01-16 13:36:25',
            ),
        ));
        
        
    }
}