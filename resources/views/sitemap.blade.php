<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <!-- URL de la página principal -->
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    <!-- URLs dinámicas de las Imágenes -->
    @foreach ($imagenes as $imagen)
    <url>
        <loc>{{ url('/imagen/' . $imagen->id) }}</loc>
        <lastmod>{{ $imagen->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

    <!-- URLs dinámicas de los Videos -->
    @foreach ($videos as $video)
    <url>
        <loc>{{ url('/video/' . $video->id) }}</loc>
        <lastmod>{{ $video->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach
</urlset>