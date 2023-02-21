<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Wandelapp backend</h1>
<p>Backend for gpx routes. It is used by students when developing a webapp.</p>
<h2>Voor de student</h2>
<p>Je kunt deze service gebruiken om routes (gpx bestanden) te bewaren op de server waar deze service draait.
Ook kun je die routes weer ophalen!</p>
<p>Als je een route upload wordt daarbij het meegegeven unieke nummer opgeslagen.
Bij het ophalen worden alleen de routes getoond die bij de cuid horen.</p>
<p>In de wandelapp die jullie moeten verbeteren wordt als cuid &#39;test&#39; gebruikt.
Iedereen krijgt met dit cuid altijd alle routes te zien.
Een van de issues die openstaan in de wandelapp is dit uniek te maken. </p>
<h2>Mogelijke requests</h2>
<h3>GET <strong>/</strong></h3>
<p>Deze pagina</p>
<hr>
<h3>GET <strong>/cuid</strong></h3>
<p>Voor het aanvragen van een nieuw identificatienummer.
Geeft een CUID terug (een uniek nummer met in PHP bv. uniqid()) waarmee het device zich later kan identificeren.
Deze is te gebruiken om alleen de routes op te halen die bij een id horen.</p>
<hr>
<h3>GET <strong>/routes?cuid=<em>cuid dat eerder is aangevraagd</em></strong></h3>
<p>Alle routes behorende bij een opgegeven cuid.
Als nog geen cuid, dan een aanvragen via get/cuid.</p>
<p>Resultaat als json:</p>
<p>[</p>
<p>{</p>
<p>&quot;_id&quot;:&quot;&quot;, // Het id van de route</p>
<p>&quot;error&quot;:false/true,         </p>
<p>&quot;msg&quot;:&quot;&quot;,</p>
<p>&quot;filename&quot;:&quot;&quot;, // De originele naam van het bestand bij upload</p>
<p>&quot;xml&quot;: &quot;&quot;, // De inhoud van het originele gpx-bestand (in xml opgemaakt)</p>
<p>&quot;json&quot;:&quot;&quot;, // De geojson (zie geojson.org)</p>
<p>&quot;cuid&quot;:&quot;&quot;</p>
<p>},</p>
<p>{
&quot;_id&quot;: &quot;&quot;,
&quot;error&quot;: false/true,
&quot;msg&quot;: &quot;&quot;,
&quot;filename&quot;: &quot;&quot;,
&quot;xml&quot;: &quot;&quot;,
&quot;json&quot;: &quot;&quot;,
&quot;cuid&quot;: &quot;&quot;
},</p>
<p>{ ... },</p>
<p>...</p>
<p>]</p>
<hr>
<h3>POST <strong>/upload?cuid=<em>cuid dat eerder is aangevraagd</em></strong></h3>
<p>Voor het uploaden van een nieuw gpx-bestand in plain/text.</p>
<p>Key / value meegeven: cuid=eerder aangevraagde cuid  </p>
<p>De geüploade gpx-file (xml) wordt vertaald naar geojson (json) (bv. met <a href="https://github.com/arenevier/gisconverter.php)">https://github.com/arenevier/gisconverter.php)</a>.</p>
<p>In de database wordt het volgende opgeslagen:
gpx (xml), geojson (omgezette gpx) en cuid (uniek nummer).</p>
<p>Bij juiste upload:
{error: false, msg: &quot;OK&quot;}</p>
<p>Bij onjuiste upload:
{error: true, msg: &quot;Invalid file&quot;}</p>
<hr>
<h3>DELETE <strong>/route?id=<em>het id van de te verwijderen route</em>&amp;cuid=<em>cuid dat eerder is aangevraagd</em></strong></h3>
<p>Als het verwijderen is gelukt:
{error: false}</p>
<hr>
<h3>GET <strong>/health</strong></h3>
<p>Geeft &#39;Im OK!&#39;</p>
</body>
</html>