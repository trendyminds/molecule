# <img src="resources/img/logo.svg" width="35" alt="Molecule logo"> Molecule

Grab Twig components from outside the primary template folder. Useful for creating folder structures like the following:
```
/
├── components/
│   ├── ButtonPrimary/
│   │   ├── index.css
│   │   ├── index.jsx
│   │   ├── index.twig
│   │   └── READMD.md
│   ├── Hero/
└── public/
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
