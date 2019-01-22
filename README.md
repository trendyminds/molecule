# <img src="resources/img/logo.svg" width="35" alt="Molecule logo"> Molecule

## Components

Grab Twig components from outside the primary template folder. Useful for creating folder structures like the following:
```
├── components/
│   ├── ButtonPrimary/
│   │   ├── index.css
│   │   ├── index.jsx
│   │   ├── index.twig
│   │   └── README.md
│   ├── Gallery/
│   ├── Hero/
│   └── VideoEmbed/
└── public/
    ├── cpresources/
    ├── index.php
    └── .htaccess
```

Setup your Twig partial:
```twig
<a href="{{url}}"{% if newWindow is defined and newWindow %} target="_blank"{% endif %}>
  {{label}}
</a>
```

Then include in your Twig templates using the following syntax:
```twig
{{craft.molecule.get("ButtonPrimary", {
    url: "https://google.com",
    label: "Visit Google.com",
    newWindow: true
  })
}}
```

## Icon Components
If you have an `Icon/` component there's an additional `craft.molecule.icon()` helper you can use to output the SVG directly into your templates.

```
├── components/
│   ├── Icon/
│   │   ├── images/
│   │   │    ├── arrow.svg
│   │   │    ├── play-button.svg
│   │   │    └── twitter.svg
│   │   ├── index.css
│   │   └── index.jsx
│   ├── Gallery/
└── public/
    ├── cpresources/
    ├── index.php
    └── .htaccess
```

```twig
{{craft.molecule.icon("twitter", { class: "custom_class" })}}
```

will compile to:

```html
<span class="Icon Icon--twitter custom_class">
  <!-- SVG contents of twitter.svg -->
</span>
```

## Requirements

This plugin requires Craft CMS 3.0.0-beta.23 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require trendyminds/molecule

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Molecule.

4. Configure the path to your components directory within Molecule's settings

## Credits
Icon by [Aaron Humphreys](https://dribbble.com/AarhCreative) &mdash; [Dribbble post](https://dribbble.com/shots/3506937-Free-iOS-App-Icons)
