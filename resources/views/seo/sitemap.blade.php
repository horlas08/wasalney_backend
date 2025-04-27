<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{url('/')}}</loc>
        <priority>1</priority>
    </url>
    @foreach(\App\Models\Route::all() as $route)
        @if($route->field_id==null)
        <url>
            <loc>{{url($route->address)}}</loc>
            <changefreq>{{$route->changefreq}}</changefreq>
            <priority>{{$route->priority}}</priority>
        </url>
        @else
            @php($field=\App\Models\Field::find($route->field_id))
            @foreach(\Illuminate\Support\Facades\DB::table(getLang().'_'.$field->category_slug)->get() as $record)
                @if($record->{$field->name}!=null)
                <url>
                    <loc>{{url($record->{$field->name})}}</loc>
                    <lastmod>{{ gmdate('Y-m-d\TH:i:s\Z',strtotime($record->updated_at)) }}</lastmod>
                    <changefreq>{{$route->changefreq}}</changefreq>
                    <priority>{{$route->priority}}</priority>
                </url>
                @endif
            @endforeach
        @endif
    @endforeach

</urlset>
