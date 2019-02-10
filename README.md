# <img src="resources/img/logo.svg" width="35" alt="Molecule logo"> Molecule

<img src="resources/img/header.png" alt="Your component structure and Craft CMS in harmony">

## Why Molecule?

Molecule allows you to grab Twig components from outside the template folder. This is useful if you want to keep your Twig partials, CSS, React/Vue files, etc in a single component folder. Now all of your components are nicely organized in individual folder structures!

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

## Example use

Setup your `ButtonPrimary/index.twig` partial:
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

You can even include components in other components!

**/components/Hero/index.twig**
```twig
<div class="Hero">
  <img src="myImage.jpg" alt="A short description">

  {{craft.molecule.get("ButtonPrimary", {
      url: "#",
      label: "Learn more"
    })
  }}
</div>
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

## Testimonials
### Matt Rothenberg @mattrothenberg
> @aaronbushnell @CraftCMS I went all in 😜.
>
>Feels so nice to be able to "compose" components in a React-y way, too. https://twitter.com/mattrothenberg/status/1094693570177654784/photo/1
>
> <img src="resources/img/testimonials/01.png" alt="AspectRatioBox component from Matt Rothenberg" width="400">

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
