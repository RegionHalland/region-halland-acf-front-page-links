# Front-page-plugin för ACF-länkar på sajtens front-page

## Hur man använder Region Hallands plugin "region-halland-acf-front-page-links"

Nedan följer instruktioner hur du kan använda pluginet "region-halland-acf-front-page-links".


## Användningsområde

Denna plugin skapar en array() med länkar


## Installation och aktivering

```sh
A) Hämta pluginen via Git eller läs in det med Composer
B) Installera Region Hallands plugin i Wordpress plugin folder
C) Aktivera pluginet inifrån Wordpress admin
```


## Hämta hem pluginet via Git

```sh
git clone https://github.com/RegionHalland/region-halland-acf-front-page-links.git
```


## Läs in pluginen via composer

Dessa två delar behöver du lägga in i din composer-fil

Repositories = var pluginen är lagrad, i detta fall på github

```sh
"repositories": [
  {
    "type": "vcs",
    "url": "https://github.com/RegionHalland/region-halland-acf-front-page-links.git"
  },
],
```
Require = anger vilken version av pluginen du vill använda, i detta fall version 1.0.0

OBS! Justera så att du hämtar aktuell version.

```sh
"require": {
  "regionhalland/region-halland-acf-front-page-links": "1.0.0"
},
```


## Loopa ut länkarna via "Blade"

```sh
@php($frontPageLinks = get_region_halland_acf_front_page_links())
@if(isset($frontPageLinks) && !empty($frontPageLinks))
  @foreach($frontPageLinks as $link)
    <a href="{{ $link['url'] }}">{{ $link['title'] }}</a>
    @endforeach
@endif
```


## Exempel på hur arrayen kan se ut

```sh
array (size=2)
  0 => 
    array (size=2)
      'url' => string 'http://exempel.se/behandlingsstod/patientinformation/' (length=53)
      'title' => string 'Patientinformation' (length=18)
  1 => 
    array (size=2)
      'url' => string 'http://exempel.se//behandlingsstod/rutiner/' (length=43)
      'title' => string 'Rutiner' (length=7)
```

## Versionhistorik

### 1.0.0
- Första version