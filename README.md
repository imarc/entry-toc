# Entry Table of Contents

Adds a Table of Contents to in the CMS to entry editing screens with long matrix or neo blocks to make it easier to jump down the page to the block you want to edit.

## Requirements

This plugin requires Craft CMS 4.4.0 or later, and PHP 8.0.2 or later.
Alternatively, this plugin requires Craft CMS 5.0 or later, and PHP 8.2 or later.

## Installation

You can install this plugin from the Plugin Store or with Composer.

#### From the Plugin Store

Go to the Plugin Store in your project’s Control Panel and search for “Entry TOC”. Then press “Install”.

#### With Composer

Open your terminal and run the following commands:

```bash
# go to the project directory
cd /path/to/my-project.test

# tell Composer to load the plugin
composer require imarc/craft-entry-toc

# tell Craft to install the plugin
./craft plugin/install entry-toc
```

## Configuration

To select which matrix or neo blocks show a table of contents, copy the **entry-toc.php** file into your `config` directory. Replace the example fields like `exampleNeoField` with the name of the field you want to create a table of contents for. Replace the `exampleHeading` and similar with the name of the field within the matrix or neo block that contains the block's headline.

If that fields is empty, the table of contents will just show the block type. If it is populated, it will show **Block Type - Your Headline Here**.
